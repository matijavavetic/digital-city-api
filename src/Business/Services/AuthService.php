<?php

namespace src\Business\Services;

use Carbon\Carbon;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use src\Business\Factories\Auth\SignUpResponseMapperFactory;
use src\Business\Factories\Auth\SignInResponseMapperFactory;
use src\Business\Mappers\Auth\Request\SignInRequestMapper;
use src\Business\Mappers\Auth\Request\SignUpRequestMapper;
use src\Business\Mappers\Auth\Response\SignInResponseMapper;
use src\Business\Mappers\Auth\Response\SignUpResponseMapper;
use src\Data\Entities\User;
use src\Data\Enums\HttpStatusCode;
use src\Data\Repositories\UserRepository;

class AuthService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function signUp(SignUpRequestMapper $mapper) : SignUpResponseMapper
    {
        $user = new User();

        $user->identifier = $mapper->getIdentifier();
        $user->username = $mapper->getUsername();
        $user->email = $mapper->getEmail();
        $user->password = $mapper->getPassword();

        $stored = null;

        $stored = $this->userRepository->store($user);

        if ($stored === false) {
            throw new \Exception("Failed to store new user!", HttpStatusCode::HTTP_BAD_REQUEST);
        }

        $responseMapper = SignUpResponseMapperFactory::make();

        return $responseMapper;
    }

    public function signIn(SignInRequestMapper $mapper) : SignInResponseMapper
    {
        $user = $this->userRepository->findOneByEmail($mapper->getEmail());

        if (! $user) {
            throw new \Exception("User not found!", HttpStatusCode::HTTP_NOT_FOUND);
        }

        $isPasswordCorrect = Hash::check($mapper->getPassword(), $user->password);

        if ($isPasswordCorrect === false) {
            throw new \Exception("Incorrect password!", HttpStatusCode::HTTP_BAD_REQUEST);
        }

        $randomString = Str::random(100);
        $accessToken = Hash::make($randomString);

        $user->access_token = $accessToken;

        $stored = $this->userRepository->store($user);

        if ($stored === false) {
            throw new \Exception("Error occurred!", HttpStatusCode::HTTP_BAD_REQUEST);
        }

        $pathToPrivateKey = base_path()."/private.pem";
        $privateKey = file_get_contents($pathToPrivateKey);

        $data = [
            "username"    => $user->username,
            "email"       => $user->email,
            "accessToken" => $accessToken
        ];

        $payload = [
            "data" => $data,
            "iss"  => "http://digital-city.com",
            "aud"  =>  "http://digital-city.com",
            "iat"  => 1356999524,
            "nbf"  => 1357000000,
            "exp"  => time() + 30*24*60*60
        ];

        $jwt = JWT::encode($payload, $privateKey, "RS256");

        $responseMapper = SignInResponseMapperFactory::make($jwt, "Bearer");

        return $responseMapper;
    }
}
