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
    public function callEndpointWithValidAcceptHeader_ExpectRequestExpectsJsonTrue()
    {
        $request = Request::create('/', 'GET');

        $request->headers->set('Accept', 'application/json');

        $middleware = new Jsonify;

        $middleware->handle($request, function ($response) {
            $this->assertTrue($response->expectsJson());
        });
    }

    /**
     * @test
     */
    public function callEndpointWithNoAcceptHeader_ExpectBadResponse()
    {
        $request = Request::create('/', 'GET');

        $middleware = new Jsonify;

        try {
            $middleware->handle($request, function () {} );
        } catch (\Exception $e) {
            $this->assertFalse($request->expectsJson());
            $this->assertEquals(400, $e->getCode());
        }
    }
}
