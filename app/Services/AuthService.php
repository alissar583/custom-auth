<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

/**
 * Class AuthService.
 */
class AuthService
{
    public function login(array $data)
    {
        $credentials = [
            'email' => $data['email'],
            'password' => $data['password']
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->generateToken();
            return [
                'user' => $user,
                'token' => $token
            ];
        }

        return 401;
    }
}
