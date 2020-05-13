<?php

namespace Tests\Integration\User;

use Illuminate\Http\Response;
use src\Applications\Http\Enum\ErrorCodes\UserErrorCode;
use Tests\Integration\TestCase;

class UserUpdateTest extends TestCase
{
    private string $endpoint = '/api/user.update';

    /**
     * @test
     */
    public function callUserUpdateEndpointWithValidData_ExpectOkResponse()
    {
        // Arrange
        $listResponse = $this->json('GET', '/api/user.list');

        // Get first user from the list
        $user = $listResponse->json('data.0');

        $data = [
            'identifier' => $user['identifier'],
            'firstName'  => 'Updated'
        ];

        // Act
        $response = $this->json('POST', $this->endpoint, $data);

        // Assert
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJsonFragment([
            'identifier' => $user['identifier'],
            'name'       => 'Updated',
        ]);
    }

    /**
     * @test
     */
    public function callUserUpdateEndpointWithEmptyIdentifier_ExpectBadRequestResponse()
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
    public function callUserUpdateEndpointWithValidIdentifierAndInvalidFirstNameDataType_ExpectBadRequestResponse()
    {
        // Arrange
        $listResponse = $this->json('GET', '/api/user.list');

        // Get first user from the list
        $user = $listResponse->json('data.0');

        $data = [
            'identifier' => $user['identifier'],
            'firstName'  => 1,
        ];

        // Act
        $response = $this->json('POST', $this->endpoint, $data);

        // Assert
        $response->assertStatus(Response::HTTP_BAD_REQUEST);
        $response->assertJsonFragment([
            'code' => UserErrorCode::ERR_INVALID_FIRSTNAME,
        ]);
    }

    /**
     * @test
     */
    public function callUserUpdateEndpointWithInvalidIdentifierAndValidFirstNameDataType_ExpectBadRequestResponse()
    {
        // Arrange
        $data = [
            'identifier' => 'invalid-uuid-identifier',
            'firstName'  => 'valid-name',
        ];

        // Act
        $response = $this->json('POST', $this->endpoint, $data);

        // Assert
        $response->assertStatus(Response::HTTP_BAD_REQUEST);
        $response->assertJsonFragment([
            'code' => "User with that identifier doesn't exist.",
        ]);
    }
}
