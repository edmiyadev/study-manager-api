<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoginRequest;
use App\Http\Requests\StoreRegisterRequest;
use App\Models\User;
use App\Services\ApiResponseService;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(StoreLoginRequest $request)
    {
        if (! Auth::attempt($request->only('email', 'password'))) {
            return ApiResponseService::unauthorized();
        }

        $user = Auth::user();
        $token = $user->createToken('auth')->plainTextToken;

        return ApiResponseService::successTokenResponse($token);
    }

    public function register(StoreRegisterRequest $request)
    {
        $user = User::create($request->all());

        if (!$user) {
            return ApiResponseService::error(Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        $token = $user->createToken('auth')->plainTextToken;

        return ApiResponseService::successTokenResponse($token);
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();
        return ApiResponseService::success(null, 'Successfully logged out');
    }
}
