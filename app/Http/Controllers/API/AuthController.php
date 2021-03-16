<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request) 
    {
        $user = User::where('email',$request->email)->first();
        
        if (!$user || !Hash::check($request->password, $user->password)) {
            // return response()->json([
            //     'message' => 'Unauthorized'
            // ], 401);
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        $token =  $user->createToken('token-name', ['server:update'])->plainTextToken;
        return response()->json([
            'message' => 'Success',
            'user' => $user,
            'toke' => $token
        ], 200);
    }
    public function logout(Request $request) 
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();

        return response()->json([
            "message" =>  "Berhasil Logout"
        ]);
    }

}
