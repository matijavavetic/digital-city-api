<?php

namespace src\Applications\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use src\Applications\Http\Middleware\Authenticate;
use src\Applications\Http\Middleware\Authorization;
use src\Applications\Http\Middleware\Jsonify;

class Kernel extends HttpKernel
{
    protected $middlewareGroups = [
        'api' => [
            Jsonify::class,
            Authorization::class,
            Authenticate::class,
        ],
    ];
}
