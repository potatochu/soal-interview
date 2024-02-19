<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:6',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);

        $accessToken = $user->createToken('auth_token')->plainTextToken;

        return response(['user' => $user, 'access_token' => $accessToken]);
    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($loginData)) {
            return response(['message' => 'Invalid credentials']);
        }

        $accessToken = Auth::user()->createToken('auth_token')->plainTextToken;

        return response(['user' => Auth::user(), 'access_token' => $accessToken]);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response(['message' => 'Successfully logged out']);
    }
}
