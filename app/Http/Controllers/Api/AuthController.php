<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required'
        ]);

        //pass input email and password
        $user = User::where('email', $request->email)->first();

        //if not allow
        if (!$user) {
            throw ValidationException::withMessages([
                'email' => ['email incorrect']
            ]);
        }

        //check password match
        if (Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'password' => ['email incorrect']
            ]);
        }

        //if success
        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'jwt-token' => $token,
            'user' => new UserResource($user),
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json([
            'message' => 'logout successfully',
        ]);
    }
}
