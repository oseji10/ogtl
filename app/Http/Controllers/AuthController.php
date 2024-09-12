<?php

namespace App\Http\Controllers;
// use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Log the user in
        auth()->login($user);

        return response()->json(['message' => 'User registered successfully', 'user' => $user], 201);
    }


    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            // Authentication passed, session cookie will be created automatically
            return response()->json(['message' => 'Login successful']);
        }
    
        return response()->json(['message' => 'Unauthorized'], 401);
    }
    
}
