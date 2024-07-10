<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $authService;
    public function __construct()
    {
        $this->authService = app(AuthService::class);
    }

    public function login(LoginRequest $request)
    {
        $response = $this->authService->login($request->validated());
        if ($response == 401) {
            return $this->failResponse("Un Authenticated", 401);
        }
        return $this->successResponse($response);
    }
}
