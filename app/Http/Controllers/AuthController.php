<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Relation\RUsersroleController;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'mobile' => 'required|min:10',
            'password' => 'required|min:6',
        ]);

        $user = User::where('mobile', $request->nationalcode)->first();

        if (!$user) {
            return response()->json(['error' => __('auth.unauthorized')], 401);
        }
        if (!Hash::check($request->password, $user->password)) {
            return response()->json(['error' => __('auth.failed')], 401);
        }

        $token = JWTAuth::fromUser($user);

        return $token;
    }

    public function profile()
    {
        $user = JWTAuth::user();

        return response()->json(['user' => $user]);
    }
}
