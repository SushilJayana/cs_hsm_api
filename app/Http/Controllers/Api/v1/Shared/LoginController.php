<?php

namespace App\Http\Controllers\Api\v1\Shared;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends ApiBaseController
{
    //
    public function login(Request $request)
    {
        try{
            $login = $request->validate(['username' => 'required|string', 'password' => 'required|string']);

            if (!Auth::attempt($login)) return response(['message' => 'Invalid credentials', 'status' => 'error']);

            $accessToken = Auth::user()->createToken('authToken')->accessToken;
            return response(['message' => 'Token generated', 'status' => 'success', 'access_token' => $accessToken]);
        } catch (\Exception $exception) {
            return response(['message' => $exception->getMessage(), 'status' => 'error']);
        }
    }
}
