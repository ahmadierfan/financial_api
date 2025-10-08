<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Relation\RUsersroleController;
use App\Http\Controllers\Sub\SUserloginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request, SUserloginController $SUserlogin)
    {
        $request->validate([
            'mobile' => 'required',
            'password' => 'required|min:6',
        ]);

        $pk_userlogin = $SUserlogin->create($request, 'mobile');

        $user = User::where('mobile', $request->mobile)->first();

        if (!$user) {
            $SUserlogin->update($pk_userlogin, null, "UserNotExist");
            return response()->json(['error' => __('auth.unauthorized')], 401);
        }

        if (!Hash::check($request->password, $user->password)) {
            $SUserlogin->update($pk_userlogin, null, "IncorrectPassword");
            return response()->json(['error' => __('auth.password')], 401);
        }

        $token = JWTAuth::fromUser($user);

        $SUserlogin->update($pk_userlogin, null, null, $user->id);

        $userData = [
            'id' => $user->id,
            'name' => $user->name,
            'mobile' => $user->mobile,
            'email' => $user->email,
        ];

        return response()->json([
            'user' => $userData,
            'token' => $token,
            'message' => __('auth.login_success')
        ]);
    }
    public function loginJustToken(Request $request, SUserloginController $SUserlogin)
    {
        $request->validate([
            'nationalcode' => 'required|min:10',
            'password' => 'required|min:6',
        ]);

        $pk_userlogin = $SUserlogin->create($request, 'nationalcode');

        $user = User::where('nationalcode', $request->nationalcode)->first();

        if (!$user) {
            $SUserlogin->update($pk_userlogin, null, "UserNotExist");
            return response()->json(['error' => __('auth.unauthorized')], 401);
        }
        if (!Hash::check($request->password, $user->password)) {
            $SUserlogin->update($pk_userlogin, null, "IncorrectPassword");
            return response()->json(['error' => __('auth.failed')], 401);
        }

        $token = JWTAuth::fromUser($user);

        $SUserlogin->update($pk_userlogin, null, null, $user->id);

        return $token;
    }
    public function companyLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            $user = User::create([
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
        }

        $token = JWTAuth::fromUser($user);

        return response()->json([
            'token' => $token,
            'message' => __('auth.success')
        ]);
    }
    public function syncUser(Request $request, RUsersroleController $RUsersrole)
    {
        $user = null;

        if (isset($request->email)) {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]);

            $user = User::where('email', $request->email)->first();

            $arr = [
                'id' => $request->id,
                'subscriptionid' => $request->subscriptionid,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ];
            User::create($arr);
        } elseif (isset($request->mobile)) {
            $request->validate([
                'mobile' => 'required',
            ]);

            $arr = [
                'id' => $request->id,
                'subscriptionid' => $request->subscriptionid,
                'mobile' => $request->mobile,
            ];

            $user = User::where('mobile', $request->mobile)->first();
            User::create($arr);

            $RUsersrole->createCustomer($request->id);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => __('messages.error.validation'),
                'code' => 400,
                'issues' => "email or mobile not send",
            ], 400);
        }
    }

    public function profile()
    {
        $user = JWTAuth::user();

        return response()->json(['user' => $user]);
    }
}
