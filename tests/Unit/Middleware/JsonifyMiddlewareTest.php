<?php

namespace Tests\Unit\Middleware;

use Illuminate\Http\Request;
use src\Applications\Http\Middleware\Jsonify;
use Tests\TestCase;

class JsonifyMiddlewareTest extends TestCase
{
    /**
     * @test
     */
    public function callEndpointWithValidAcceptHeader_expectTestPass()
    {
        $request = Request::create('/', 'GET');

        $request->headers->set('Accept', 'application/json');

        $middleware = new Jsonify;

        $middleware->handle($request, function ($response) {
            $this->assertTrue($response->expectsJson());
        });
    }
}
