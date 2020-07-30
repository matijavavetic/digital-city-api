<?php

namespace src\Applications\Http\Middleware;

use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use Closure;

class Authorization
{
    public function handle($request, Closure $next)
    {
        $hasAuthorizationHeader = $request->hasHeader("Authorization");

        if ($hasAuthorizationHeader === false) {
            throw new \Exception("Authorization is missing.", 400);
        }

        $authorizationHeader = $request->header('Authorization');

        $jwtToken = str_replace("Bearer ", "", $authorizationHeader);

        $pathToPublicKey = base_path()."/public.pem";
        $publicKey = file_get_contents($pathToPublicKey);

        try {
            $jwtTokenDecoded = JWT::decode($jwtToken, $publicKey, array('RS256'));
        } catch (ExpiredException $exception) {
            throw new \Exception("Token has expired! Please, sign in!", 400);
        }

        $data = [
            'username'    => $jwtTokenDecoded->data->username,
            'email'       => $jwtTokenDecoded->data->email,
            'accessToken' => $jwtTokenDecoded->data->accessToken,
        ];

        $request->userData = $data;

        return $next($request);
    }
}
