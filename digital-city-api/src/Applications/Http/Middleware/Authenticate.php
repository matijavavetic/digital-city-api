<?php

namespace src\Applications\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use src\Data\Repositories\UserRepository;
use Closure;

class Authenticate
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle($request, Closure $next)
    {
        $user = $this->userRepository->findOneByEmailAndAccessToken($request->userData['email'], $request->userData['accessToken']);

        if ($user === null) {
            throw new \Exception("User not found!", 404);
        }

        Auth::setUser($user);

        return $next($request);
    }
}
