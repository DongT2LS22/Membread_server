<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password, [])) {
            return response()->json(
                ['message' => "Sai mat khau"],
                404
            );
        };

        $token = $user->createToken('authToken')->plainTextToken;
        return response()->json(
            [
                'token' => $token,
                'type' => 'Beared'
            ],
            200
        );
    }

    public function register(Request $request)
    {
        $messages = [
            'email.email' => 'Loi email',
            'email.required' => 'Vui long nhap day du email'
        ];
        $validate = Validator::make($request->all(), [
            'email' => 'email|required',
            'password' => 'required|min:8',
            'name' => 'required'
        ], $messages);

        if ($validate->fails()) {
            return response()->json(
                ['message' => $validate->errors()],
                404
            );
        }

        User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password)
        ]);

        return response()->json(
            ['message' => "Created"],
            200
        );
    }

    public function logout() {
        auth()->user()->tokens()->delete();
    }

}
