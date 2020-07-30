<?php

namespace src\Applications\Http\Middleware;

use Closure;

class Jsonify
{
    public function handle($request, Closure $next)
    {
        if (! $request->expectsJson()) {
            throw new \Exception("Message does not contain Content-type: application/json header.", 400);
        }

        return $next($request);
    }
}
