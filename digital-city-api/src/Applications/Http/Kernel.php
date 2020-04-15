<?php

namespace src\Applications\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use src\Applications\Http\Middleware\Authenticate;

class Kernel extends HttpKernel
{
    protected $middlewareGroups = [
        'api' => [
            Authenticate::class,
        ],
    ];
}
