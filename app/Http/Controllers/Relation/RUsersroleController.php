<?php

namespace App\Http\Controllers\Relation;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;

use App\Models\r_usersrole;
use Illuminate\Http\Request;

class RUsersroleController extends Controller
{
    function addUserToRole(Request $request)
    {
        $request->validate([
            'roleId' => 'required',
            'userId' => 'required',
        ]);

        if (isset(auth()->user()->id) && isset($request->roleId) && isset($request->userId)) {
            $fk_user = $request->userId;
            $fk_role = $request->roleId;
            $fk_registrar = auth()->user()->id;

            if ($this->checkNotExist($fk_user, $fk_role)) {
                r_usersrole::create([
                    'fk_role' => $fk_role,
                    'fk_user' => $fk_user,
                    'fk_registrar' => $fk_registrar,
                ]);
            }
        }
    }
    function checkNotExist($fk_user, $fk_role)
    {
        $data = r_usersrole::where('fk_user', $fk_user)
            ->where('fk_role', $fk_role)
            ->first();

        if (isset($data->fk_user))
            return false;
        return true;
    }
    function deleteUser(Request $request)
    {
        if (isset($request->userId) && isset($request->roleId)) {
            $fk_user = $request->userId;
            $fk_role = $request->roleId;

            r_usersrole::where('fk_user', $fk_user)
                ->where('fk_role', $fk_role)
                ->delete();
        }
    }
    function roleUsers(Request $request)
    {

        if (isset($request->id)) {
            $fk_role = $request->id;

            $data = r_usersrole::select(
                'users.id',
                'users.mobile',
                'r_usersroles.fk_role',
                DB::raw("CONCAT(users.name,' ',users.lastname) userfullname")
            )
                ->join('users', 'users.id', '=', 'r_usersroles.fk_user')
                ->where('r_usersroles.fk_role', $fk_role)
                ->get();

            return $data;
        }
    }
    function userRoles(Request $request)
    {

        if (isset($request->id)) {
            $fk_user = $request->id;

            $data = r_usersrole::select(
                'r_usersroles.fk_user',
                'r_usersroles.fk_role',
                'b_roles.role'
            )
                ->join('b_roles', 'b_roles.pk_role', '=', 'r_usersroles.fk_role')
                ->where('r_usersroles.fk_user', $fk_user)
                ->get();

            return $data;
        }
    }
    function createCustomer($customerId)
    {
        r_usersrole::create([
            'fk_registrar' => $customerId,
            'fk_role' => 4,
            'fk_user' => $customerId
        ]);
    }
}
