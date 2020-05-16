<?php

namespace Tests\Unit\Middleware;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use src\Applications\Http\Middleware\Jsonify;
use Tests\TestCase;

class JsonifyMiddlewareTest extends TestCase
{
    /**
     *
     */
    public function callEndpointWithValidAcceptHeader_ExpectRequestExpectsJsonTrue()
    {
        $request = Request::create('/', 'GET');

        $request->headers->set('Accept', 'application/json');

        $middleware = new Jsonify;

        $middleware->handle($request, function ($response) {
            $this->assertTrue($response->expectsJson());
        });
    }
}
