<?php
namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;

use App\Models\b_productcategory;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BProductcategoryController extends Controller
{
    use ResponseTrait;

    public function forCompany()
    {
        if (isset(auth()->user()->fk_company)) {
            $data = DB::table('b_productcategories')
                ->select(
                    'b_productcategories.pk_productcategory',
                    'b_productcategories.productcategory',
                    'b_productcategories.productcategorysec',
                    'b_productcategories.descriptions',
                    'b_productcategories.imagepath',
                    DB::raw("CONCAT(users.name, ' ', users.lastname) as registrarfullname")
                )
                ->join('users', 'b_productcategories.fk_registrar', '=', 'users.id')
                ->where('users.fk_company', '=', auth()->user()->fk_company)
                ->get();

            return $data;
        }

    }

    public function create(Request $request)
    {
        DB::beginTransaction();
        try {
            $finaldata = $request->validate([
                'productcategory' => 'required|string|max:255',
                'productcategorysec' => 'nullable|string|max:255',
                'descriptions' => 'nullable|string|max:255',
            ]);

            $finaldata = $this->addRegistrar($finaldata);

            $imagePath = null;
            if ($request->hasFile('image')) {
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
                ]);

                $filename = time() . '-' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
                $imagePath = $request->file('image')->storeAs('images/productcategories', $filename, 'public');
            }
            $finaldata['imagepath'] = $imagePath;

            $result = b_productcategory::create($finaldata);

            DB::commit();

            return $this->successMessage($result);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->serverErrorResponse($e->getMessage());
        }
    }

    public function update(Request $request)
    {
        try {
            $data = $request->validate([
                'pk_productcategory' => 'required|integer',
                'productcategory' => 'required|string|max:255',
                'productcategorysec' => 'nullable|string|max:255',
                'descriptions' => 'nullable|string|max:255',
            ]);

            $pk = $data['pk_productcategory'];

            $this->isCorrectCompany(b_productcategory::class, [$pk]);

            $row = b_productcategory::findOrFail($pk);

            $imagePath = null;
            if (isset($request->imagechanged) && $request->imagechanged == 1) {
                if ($request->hasFile('image')) {
                    $request->validate([
                        'image' => 'required|image|mimes:jpeg,png,jpg|max:2120',
                    ]);
                    $filename = time() . '-' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
                    $imagePath = $request->file('image')->storeAs('images/productcategories', $filename, 'public');
                }
                $row->update(['imagepath' => $imagePath]);
            }

            $row->update($data);

            return response()->json($row);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->serverErrorResponse($e->getMessage());
        }
    }

    public function delete(Request $request)
    {
        try {
            $request->validate(['pk' => 'required|array']);
            if (isset($request->pk)) {

                $pk = $request->pk;

                $this->isCorrectCompany(b_productcategory::class, $pk);

                b_productcategory::whereIn('pk_productcategory', $pk)->delete();

                return $this->successDelete();
            }
        } catch (\Exception $e) {
            return $this->clientErrorResponse($e->getMessage());
        }
    }
}
