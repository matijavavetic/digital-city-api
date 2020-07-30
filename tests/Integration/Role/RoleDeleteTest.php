<?php

namespace Tests\Integration\Role;

use Illuminate\Http\Response;
use src\Applications\Http\Enum\ErrorCodes\RoleErrorCode;
use Tests\Integration\TestCase;

class RoleDeleteTest extends TestCase
{
    private string $endpoint = '/api/role.delete';

    /**
     * @test
     */
    public function callRoleDeleteEndpointWithValidData_ExpectOkResponse()
    {
        // Arrange
        $listResponse = $this->json('GET', '/api/role.list');

        // Get first role from the list
        $role = $listResponse->json('data.0');

        $data = [
            'identifier' => $role['identifier'],
        ];

        // Act
        $response = $this->json('POST', $this->endpoint, $data);

        // Assert
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJsonFragment([
            'identifier' => $role['identifier'],
        ]);
    }

    /**
     * @test
     */
    public function callRoleDeleteEndpointWithEmptyIdentifier_ExpectBadRequestResponse()
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
            'code' => RoleErrorCode::ERR_EMPTY_IDENTIFIER,
        ]);
    }

    /**
     * @test
     */
    public function callRoleDeleteEndpointWithNonExistingIdentifier_ExpectBadRequestResponse()
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
            'code' => 'Permission with that identifier does not exist',
        ]);
    }

    /**
     * @test
     */
    public function callRoleDeleteEndpointWithInvalidIdentifierDataType_ExpectBadRequestResponse()
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
            'code' => RoleErrorCode::ERR_INVALID_IDENTIFIER,
        ]);
    }
}
