<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Systems\Homeease;
use App\Http\Controllers\Systems\Crm;

use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    use ResponseTrait;

    public function updateUser(Request $request, Homeease $Homeease, Crm $Crm)
    {

        DB::beginTransaction();
        DB::connection('mysqlhease')->beginTransaction();
        DB::connection('mysqlcrm')->beginTransaction();

        try {
            $data = $request->validate([
                'id' => 'required',
                'name' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'nationalcode' => 'required|string|max:10',
                'birthday' => 'required|date',
                'mobile' => 'required|string|max:11',
                'phone' => 'required|string|max:11',
                'email' => 'required|email',
                'password' => 'required|string|min:6',
                'subscriptionid' => 'required|string|min:6',
                'isactive' => 'boolean',
                'isblock' => 'boolean',
                'isavailable' => 'boolean'
            ]);

            $user = User::find($data['id']);
            if (!$user)
                return $this->notFoundResponse();
            $user->update([
                'name' => $data['name'],
                'lastname' => $data['lastname'],
                'nationalcode' => $data['nationalcode'],
                'subscriptionid' => $data['subscriptionid'],
                'birthday' => $data['birthday'],
                'mobile' => $data['mobile'],
                'phone' => $data['phone'],
                'email' => $data['email'],
                'isblock' => $data['isblock'],
            ]);

            if ($request->hasFile('image') && isset($request->imagechanged) && $request->imagechanged == 1) {
                $imagePath = null;

                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg|max:2120',
                ]);

                $filename = time() . '-' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
                $imagePath = $request->file('image')->storeAs('images/users', $filename, 'public');

                $user->update([
                    'image' => $imagePath,
                ]);
            }

            $Homeease->updateUser($data, $data['id']);
            $Crm->updateUser($data, $data['id']);

            DB::commit();
            DB::connection('mysqlhease')->commit();
            DB::connection('mysqlcrm')->commit();

            return $this->successMessage($user);

        } catch (\Exception $e) {
            DB::rollBack();
            DB::connection('mysqlhease')->rollBack();
            DB::connection('mysqlcrm')->rollBack();

            return $this->serverErrorResponse(__('messages.error.server') . ' ' . $e->getMessage());
        }
    }
    public function createUser(Request $request)
    {
        $Homeease = new Homeease();
        $Crm = new Crm();

        DB::beginTransaction();
        DB::connection('mysqlhease')->beginTransaction();
        DB::connection('mysqlcrm')->beginTransaction();

        try {
            if (isset(auth()->user()->fk_company)) {
                $fk_company = auth()->user()->fk_company;

                $data = $request->validate([
                    'name' => 'required|string|max:255',
                    'lastname' => 'required|string|max:255',
                    'nationalcode' => 'required|string|max:10|unique:users,nationalcode',
                    'birthday' => 'required|date',
                    'mobile' => 'required|string|max:11|unique:users,mobile',
                    'phone' => 'required|string|max:11|unique:users,phone',
                    'password' => 'required|string|min:8',
                    'descriptions' => 'nullable|string|max:255',
                ]);

                $imagePath = null;
                if ($request->hasFile('image')) {
                    $request->validate([
                        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120', // حداکثر 5 مگابایت
                    ]);

                    $filename = time() . '-' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
                    $imagePath = $request->file('image')->storeAs('images/users', $filename, 'public');
                }
                if (isset($request->isblock))
                    $isblock = $request->isblock;

                $user = User::create([
                    'fk_company' => $fk_company,
                    'name' => $data['name'],
                    'lastname' => $data['lastname'],
                    'nationalcode' => $data['nationalcode'],
                    'birthday' => $data['birthday'],
                    'mobile' => $data['mobile'],
                    'phone' => $data['phone'],
                    'descriptions' => $data['descriptions'],
                    'password' => bcrypt($data['password']),
                    'image' => $imagePath,
                    'isblock' => $this->setBoolian($isblock),
                ]);

                $Homeease->createUser($user);
                $Crm->createUser($user);

                DB::connection('mysqlhease')->commit();
                DB::connection('mysqlcrm')->commit();
                DB::commit();

                return $this->successMessage($user);
            }
        } catch (\Exception $e) {
            DB::rollBack();

            return $this->serverErrorResponse(__('messages.error.server') . ' ' . $e->getMessage());
        }
    }

    function forCompany()
    {
        if (isset(auth()->user()->fk_company)) {
            $data = User::select(
                'users.*',
                DB::Raw('CONCAT(users.name," ",users.lastname) userfullname')
            )
                ->where('fk_company', auth()->user()->fk_company)
                ->get();

            return $data;
        }
    }
    function justShowUser($id)
    {
        $data = User::where('id', $id)->first();

        if (isset($data->id))
            return $data;
        return false;
    }
    function lessData()
    {
        if (isset(auth()->user()->fk_company)) {
            $data = User::select('users.id', 'users.mobile', DB::raw("CONCAT(users.name,' ',users.lastname) userfullname"))
                ->where('fk_company', auth()->user()->fk_company)
                ->get();

            return $data;
        }
    }
}
