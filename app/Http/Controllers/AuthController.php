<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Banknet;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request) {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'id' =>mt_rand(),
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;
        $account =
        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }


    public function login(Request $request) {
         $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::where('email', $request['email'])->first();

        // Check password
        if(!$user || !Hash::check($request['password'], $user->password)) {
            // return response([
            //     'message' => 'Bad creds'
            // ], 401);
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ])->redirectTo('/register');
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();
        return [
            'message' => 'Logged out'
        ];
    }
}
