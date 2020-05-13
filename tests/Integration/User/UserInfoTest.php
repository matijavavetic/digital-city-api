<?php

namespace Tests\Integration\User;

use Illuminate\Http\Response;
use src\Applications\Http\Enum\ErrorCodes\UserErrorCode;
use Tests\Integration\TestCase;

class UserInfoTest extends TestCase
{
    private string $endpoint = '/api/user.info';

    /**
     * @test
     */
    public function callUserInfoEndpointWithValidData_ExpectOkResponse()
    {
        // Arrange
        $listResponse = $this->json('GET', '/api/user.list');

        // Get first user from the list
        $user = $listResponse->json('data.0');

        $data = [
            'identifier' => $user['identifier'],
        ];

        // Act
        $response = $this->json('POST', $this->endpoint, $data);

        // Assert
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJsonFragment([
            'identifier' => $user['identifier'],
            'email'      => $user['first_name']
        ]);
    }

    /**
     * @test
     */
    public function callUserInfoEndpointWithEmptyIdentifier_ExpectBadRequestResponse()
    {
        // Arrange
        $data = [
            'identifier' => '',
        ];

        // Act
        $response = $this->json('POST', $this->endpoint, $data);

        // Assert
        $response->assertStatus(Response::HTTP_BAD_REQUEST);
        $response->assertJsonFragment([
            'code' => UserErrorCode::ERR_EMPTY_IDENTIFIER,
        ]);
    }

    /**
     * @test
     */
    public function callUserUpdateEndpointWithInvalidIdentifierDataType_ExpectBadRequestResponse()
    {
        // Arrange
        $data = [
            'identifier' => 1,
        ];

        // Act
        $response = $this->json('POST', $this->endpoint, $data);

        // Assert
        $response->assertStatus(Response::HTTP_BAD_REQUEST);
        $response->assertJsonFragment([
            'code' => UserErrorCode::ERR_INVALID_IDENTIFIER,
        ]);
    }
}
