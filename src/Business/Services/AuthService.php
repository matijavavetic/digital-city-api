<?php

namespace src\Business\Services;

use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use src\Business\Factories\Auth\SignOutResponseMapperFactory;
use src\Business\Factories\Auth\SignUpResponseMapperFactory;
use src\Business\Factories\Auth\SignInResponseMapperFactory;
use src\Business\Mappers\Auth\Request\SignInRequestMapper;
use src\Business\Mappers\Auth\Request\SignOutRequestMapper;
use src\Business\Mappers\Auth\Request\SignUpRequestMapper;
use src\Business\Mappers\Auth\Response\SignInResponseMapper;
use src\Business\Mappers\Auth\Response\SignUpResponseMapper;
use src\Data\Entities\User;
use src\Data\Enums\HttpStatusCode;
use src\Data\Repositories\Contracts\IUserRepository;

class AuthService
{
    private IUserRepository $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function signUp(SignUpRequestMapper $mapper) : SignUpResponseMapper
    {
        $user = new User();

        $user->setIdentifier($mapper->getIdentifier());
        $user->setUsername($mapper->getUsername());
        $user->setEmail($mapper->getEmail());
        $user->setPassword($mapper->getPassword());

        $stored = $this->userRepository->store($user, null);

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

        $isPasswordCorrect = Hash::check($mapper->getPassword(), $user->getPassword());

        if ($isPasswordCorrect === false) {
            throw new \Exception("Incorrect password!", HttpStatusCode::HTTP_BAD_REQUEST);
        }

        $randomString = Str::random(100);
        $accessToken = Hash::make($randomString);

        $user->setAccessToken($accessToken);

        $stored = $this->userRepository->store($user, null);

        if ($stored === false) {
            throw new \Exception("Error occurred!", HttpStatusCode::HTTP_BAD_REQUEST);
        }

        $pathToPrivateKey = base_path()."/private.pem";
        $privateKey = file_get_contents($pathToPrivateKey);

        $data = [
            "username"    => $user->getUsername(),
            "email"       => $user->getEmail(),
            "accessToken" => $accessToken
        ];

        $payload = [
            "data" => $data,
            "iss"  => "http://digital-city.com",
            "aud"  => "http://digital-city.com",
            "iat"  => 1356999524,
            "nbf"  => 1357000000,
            "exp"  => time() + 30*24*60*60
        ];

        $jwt = JWT::encode($payload, $privateKey, "RS256");

        $responseMapper = SignInResponseMapperFactory::make($jwt, "Bearer");

        return $responseMapper;
    }

    public function signOut(SignOutRequestMapper $mapper)
    {
        $pathToPublicKey = base_path()."/public.pem";
        $publicKey = file_get_contents($pathToPublicKey);

        $jwt = JWT::decode($mapper->getAccessToken(), $publicKey, array('RS256'));

        $user = $this->userRepository->findOneByAccessToken($jwt->data->accessToken);

        if (! $user) {
            throw new \Exception("User not found!", HttpStatusCode::HTTP_NOT_FOUND);
        }

        $user->setAccessToken(null);

        $this->userRepository->store($user, null);

        Auth::logout();

        $responseMapper = SignOutResponseMapperFactory::make();

        return $responseMapper;
    }
}
