<?php

namespace src\Applications\Http\Controllers;

use Firebase\JWT\JWT;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use src\Applications\Http\Factories\Auth\SignInRequestFactory;
use src\Applications\Http\Factories\Auth\SignUpRequestFactory;
use src\Applications\Http\FormRequests\Auth\SignInRequest;
use src\Applications\Http\FormRequests\Auth\SignUpRequest;
use src\Business\Services\AuthService;
use src\Data\Entities\User;

class AuthController extends Controller
{
    public function signUp(SignUpRequest $request, AuthService $service) : JsonResponse
    {
        $data = $request->validationData();

        $requestMapper = SignUpRequestFactory::make($data);

        $responseMapper = $service->signUp($requestMapper);

        return new JsonResponse($responseMapper);
    }

    public function signIn(SignInRequest $request, AuthService $service)
    {
        $data = $request->validationData();

        $requestMapper = SignInRequestFactory::make($data);

        $r = $service->signIn($requestMapper);

        return new JsonResponse($r);
    }
}