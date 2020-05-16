<?php

namespace Tests\Unit\Middleware;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Faker\Factory as Faker;
use Mockery;
use Psy\Util\Json;
use src\Applications\Http\Middleware\Jsonify;
use Tests\TestCase;

class JsonifyMiddlewareTest extends TestCase
{
    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function callEndpointWithValidAcceptHeader_expectTestPass()
    {

        $request = Request::create('/', 'GET');

        $request->headers->set('Accept', 'application/json');

        $middleware = new Jsonify;

        $middleware->handle($request, function () {});
    }
}
