<?php

namespace Tests\Integration\User;

use Illuminate\Http\Response;
use src\Applications\Http\Enum\ErrorCodes\UserErrorCode;
use Tests\Integration\TestCase;

class UserDeleteTest extends TestCase
{
    private string $endpoint = '/api/user.delete';

    /**
     * @test
     */
    public function callUserDeleteEndpointWithValidData_ExpectOkResponse()
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
        ]);
    }

    /**
     * @test
     */
    public function callUserDeleteEndpointWithEmptyIdentifier_ExpectBadRequestResponse()
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
    public function callUserDeleteEndpointWithNonExistingIdentifier_ExpectBadRequestResponse()
    {
        // Arrange
        $data = [
            'identifier' => 'non-existing-identifier'
        ];

        // Act
        $response = $this->json('POST', $this->endpoint, $data);

        // Assert
        $response->assertStatus(Response::HTTP_BAD_REQUEST);
        $response->assertJsonFragment([
            'code' => 'User with that identifier does not exist',
        ]);
    }

    /**
     * @test
     */
    public function callUserDeleteEndpointWithInvalidIdentifierDataType_ExpectBadRequestResponse()
    {
        // Arrange
        $data = [
            'identifier' => 123,
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
