<?php

namespace src\Applications\Http\Controllers;

use Firebase\JWT\JWT;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use src\Applications\Http\Factories\Auth\SignUpRequestFactory;
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

    public function signIn()
    {
        $privatepath = base_path()."/private.pem";
        $privateKey = file_get_contents($privatepath);

        $publicPath = base_path()."/public.pem";
        $publicKey = file_get_contents($publicPath);

        $user = new User();
        $luka = $user->where("username", "luka.vavetic")->first();

        $string = Str::random("100");

        $rememberToken = Hash::make($string);

        //dd(Hash::check($string, $rememberToken));

        $data = [
            "username" => $luka->username,
            "rememberToken" => $rememberToken
        ];

        $payload = array(
            "data" => $data,
            "iss" => "http://example.org",
            "aud" => "http://example.com",
            "iat" => 1356999524,
            "nbf" => 1357000000
        );

        $jwt = JWT::encode($payload, $privateKey, "RS256");

        $decoded = JWT::decode($jwt, $publicKey, array('RS256'));

        return new JsonResponse(["username" => $luka, "token" => $jwt]);
    }
}