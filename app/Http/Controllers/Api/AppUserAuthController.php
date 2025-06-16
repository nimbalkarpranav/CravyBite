<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AppUser;

class AppUserAuthController extends Controller
{
    public function register(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:app_users',
        'password' => 'required|string|min:6',
    ]);

    $user = AppUser::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']),
    ]);

    $token = $user->createToken('app_token')->plainTextToken;

    return response()->json(['token' => $token, 'user' => $user]);
}
}
