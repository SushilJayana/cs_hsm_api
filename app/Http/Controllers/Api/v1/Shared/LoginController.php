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

            if (!Auth::attempt($login)) return $this->respondWithError("Invalid Credentials", $request->username);

            $accessToken = Auth::user()->createToken('authToken')->accessToken;
            return $this->respondWithMessage('Token generated.', $accessToken);
        } catch (\Exception $exception) {
            return $this->respondWithError("Exception", $exception->getMessage());
        }
    }
}
