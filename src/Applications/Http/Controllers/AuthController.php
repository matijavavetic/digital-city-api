<?php

namespace src\Applications\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use src\Applications\Http\Factories\Auth\SignInRequestFactory;
use src\Applications\Http\Factories\Auth\SignUpRequestFactory;
use src\Applications\Http\FormRequests\Auth\SignInRequest;
use src\Applications\Http\FormRequests\Auth\SignUpRequest;
use src\Business\Services\AuthService;

class AuthController extends Controller
{
    public function signUp(SignUpRequest $request, AuthService $service) : JsonResponse
    {
        $data = $request->validationData();

        $requestMapper = SignUpRequestFactory::make($data);

        $responseMapper = $service->signUp($requestMapper);

        return new JsonResponse($responseMapper, Response::HTTP_CREATED);
    }

    public function signIn(SignInRequest $request, AuthService $service)
    {
        $data = $request->validationData();

        $requestMapper = SignInRequestFactory::make($data);

        $responseMapper = $service->signIn($requestMapper);

        return new JsonResponse($responseMapper, Response::HTTP_OK);
    }
}