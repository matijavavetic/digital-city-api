<?php

namespace Tests\Integration\User;

use Illuminate\Http\Response;
use src\Applications\Http\Enum\ErrorCodes\PermissionErrorCode;
use src\Applications\Http\Enum\ErrorCodes\UserErrorCode;
use Tests\Integration\TestCase;
use Faker\Factory as Faker;

class UserCreateTest extends TestCase
{
    private string $endpoint = '/api/user.create';

    /**
     * @test
     */
    public function callUserCreateEndpointWithValidData_ExpectCreatedResponse()
    {
        // Arrange
        $faker = Faker::create();

        $data = [
            'email' => $faker->safeEmail
        ];

        // Act
        $response = $this->json('POST', $this->endpoint, $data);

        // Assert
        $response->assertStatus(Response::HTTP_CREATED);
        $response->assertJsonFragment($data);
    }

    public function callUserCreateEndpointWithInvalidData_ExpectBadRequestResponse()
    {
        // Arrange
        $faker = Faker::create();

        $data = [
            'email' => $faker->randomDigit,
        ];

        // Act
        $response = $this->json('POST', $this->endpoint, $data);

        // Assert
        $response->assertStatus(Response::HTTP_BAD_REQUEST);
        $response->assertJsonFragment([
            'code' => UserErrorCode::ERR_INVALID_EMAIL,
        ]);
    }
}
