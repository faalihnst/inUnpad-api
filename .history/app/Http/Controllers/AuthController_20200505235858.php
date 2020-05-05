<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate(
            [
                $validatedData = $request->validate([
                    'name' => 'required|max:55',
                    'email' => 'email|required',
                    'password' => 'required|confirmed'
                ])
            ]
        );

        $user = User::create($validatedData);

        $accessToken = $user->createToken('authToken')->accessToken;

        return response(['user' => $user, 'access_token'=> $accessToken]);
    }



    public function login()
    {
    }
}
