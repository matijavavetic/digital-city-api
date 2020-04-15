<?php

namespace src\Business\Services;

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
            throw new \Exception("Failed to store new user!", 400);
        }

        $responseMapper = SignUpResponseMapperFactory::make();

        return $responseMapper;
    }

    public function signIn(SignInRequestMapper $mapper) : SignInResponseMapper
    {
        $user = $this->userRepository->findOneByEmail($mapper->getEmail());

        if (! $user) {
            throw new \Exception("User not found!", 404);
        }

        $isPasswordCorrect = Hash::check($mapper->getPassword(), $user->password);

        if ($isPasswordCorrect === false) {
            throw new \Exception("Incorrect password!", 400);
        }

        $randomString = Str::random(100);
        $rememberToken = Hash::make($randomString);

        $user->remember_token = $rememberToken;

        $stored = $this->userRepository->store($user);

        if ($stored === false) {
            throw new \Exception("Error occured!", 400);
        }

        $pathToPrivateKey = base_path()."/private.pem";
        $privateKey = file_get_contents($pathToPrivateKey);
//        $publicPath = base_path()."/public.pem";
//        $publicKey = file_get_contents($publicPath);
//        $decoded = JWT::decode($jwt, $publicKey, array('RS256'));

        $data = [
            "username"      => $user->username,
            "email"         => $user->email,
            "rememberToken" => $rememberToken
        ];

        $payload = [
            "data" => $data,
            "iss"  => "http://digital-city.com",
            "aud"  =>  "http://digital-city.com",
            "iat"  => 1356999524,
            "nbf"  => 1357000000
        ];

        $jwt = JWT::encode($payload, $privateKey, "RS256");

        $responseMapper = SignInResponseMapperFactory::make($jwt, "Bearer");

        return $responseMapper;
    }
}