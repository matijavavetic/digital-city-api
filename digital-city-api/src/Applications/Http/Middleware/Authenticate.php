<?php

namespace src\Applications\Http\Middleware;

use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Auth;
use src\Data\Entities\User;
use Closure;

class Authenticate
{
    public function handle($request, Closure $next)
    {
        if (! $request->expectsJson()) {
            throw new \Exception("Message does not contain Accept: application/json header.", 400);
        }

        $hasAuthorizationHeader = $request->hasHeader("Authorization");

        if($hasAuthorizationHeader === false) {
            throw new \Exception("Authorization is missing.", 400);
        }

        $authorizationHeader = $request->header('Authorization');

        $jwtToken = str_replace("Bearer ", "", $authorizationHeader);

        $pathToPublicKey = base_path()."/public.pem";
        $publicKey = file_get_contents($pathToPublicKey);

        try {
            $tokenDecoded = JWT::decode($jwtToken, $publicKey, array('RS256'));
        } catch (ExpiredException $exception) {
            throw new \Exception("Token has expired! Please, sign in!", 400);
        }

        $userModel = new User();

        $user = $userModel->where("email", $tokenDecoded->data->email)
            ->where("access_token", $tokenDecoded->data->accessToken)
            ->first();

        Auth::setUser($user);

        return $next($request);
    }
}
