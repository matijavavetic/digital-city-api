<?php

namespace Tests\Integration\User;

use Illuminate\Http\Response;
use Tests\Integration\TestCase;
use Faker;

class UserCreateTest extends TestCase
{
    private string $endpoint = '/api/user.create';

    /**
     * @test
     */
    public function callUserCreateEndpointWithValidData_ExpectCreatedResponse()
    {
        // Arrange
        $faker = Faker\Factory::create();

        $data = [
            'email' => $faker->safeEmail
        ];

        // Act
        $response = $this->json('POST', $this->endpoint, $data);

        // Assert
        $response->assertStatus(Response::HTTP_CREATED);
        $response->assertJsonFragment($data);
    }
}
