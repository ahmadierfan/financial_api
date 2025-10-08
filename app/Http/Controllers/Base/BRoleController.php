<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Traits\ResponseTrait;

use App\Models\b_role;

class BRoleController extends Controller
{
    use ResponseTrait;

    public function createRole(Request $request)
    {
        if (isset($request->user()->id)) {
            $data = $request->validate([
                'role' => 'required',
            ]);

            $role = b_role::create([
                'role' => $data['role'],
                'fk_registrar' => $request->user()->id,
            ]);

            return $this->successMessage($role);
        }

    }

    public function updateRole(Request $request)
    {
        $data = $request->validate([
            'pk_role' => 'required',
            'role' => 'required',
        ]);

        $role = b_role::find($data['pk_role']);
        if (!$role) {
            return $this->notFoundResponse();
        }

        $role->update([
            'role' => $data['role'],
        ]);

        return $this->successMessage($role);
    }

    public function deleteRole(Request $request)
    {
        if (isset(auth()->user()->fk_company) && isset($request->pk)) {
            $request->validate(rules: [
                'pk' => 'required',
            ]);

            $receivedPks = $request->pk;

            $counter = b_role::whereIn('pk_role', $receivedPks)
                ->join('users as registrar', 'b_roles.fk_registrar', '=', 'registrar.id')
                ->where('registrar.fk_company', auth()->user()->fk_company)
                ->count();

            if ($counter != count($receivedPks))
                return $this->notFoundResponse();

            b_role::whereIn('pk_role', $receivedPks)->delete();

            return $this->successDelete();
        }

    }

    function index()
    {
        if (isset(auth()->user()->fk_company)) {
            $data = b_role::select(
                'b_roles.pk_role',
                'b_roles.role',
                DB::raw("
                CONCAT(users.name,' ',users.lastname) registrarfullname,
                substr( `b_roles`.`created_at`, 1, 10 ) createddate,
                substr( `b_roles`.`created_at`, 12, 5 ) AS `createdtime`,
                `pdate` (substr( `b_roles`.`created_at`, 1, 10 )) AS `jalalicreateddate`

            "),
            )
                ->join('users', 'b_roles.fk_registrar', 'users.id')
                ->where('users.fk_company', auth()->user()->fk_company)
                ->get();

            return $data;
        }
    }
}
