<?php

namespace Tests\Integration\Role;

use Illuminate\Http\Response;
use src\Applications\Http\Enum\ErrorCodes\RoleErrorCode;
use Tests\Integration\TestCase;

class RoleUpdateTest extends TestCase
{
    private string $endpoint = '/api/role.update';

    /**
     * @test
     */
    public function callRoleUpdateEndpointWithValidData_ExpectOkResponse()
    {
        // Arrange
        $listResponse = $this->json('GET', '/api/role.list');

        // get first role from the list
        $role = $listResponse->json('data.0');

        $data = [
            'identifier'  => $role['identifier'],
            'name'        => 'New updated role name',
            'permissions' => [1],
        ];

        // Act
        $response = $this->json('POST', $this->endpoint, $data);

        // Assert
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJsonFragment([
            'identifier' => $role['identifier'],
            'name'       => 'New updated role name',
        ]);
    }

    /**
     * @test
     */
    public function callRoleUpdateEndpointWithEmptyIdentifier_ExpectBadRequestResponse()
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
    public function callRoleUpdateEndpointWithValidEmptyName_ExpectBadRequestResponse()
    {
        // Arrange
        $listResponse = $this->json('GET', '/api/role.list');

        // get first role from the list
        $role = $listResponse->json('data.0');

        $data = [
            'identifier' => $role['identifier'],
            'name'       => '',
        ];

        // Act
        $response = $this->json('POST', $this->endpoint, $data);

        // Assert
        $response->assertStatus(Response::HTTP_BAD_REQUEST);
        $response->assertJsonFragment([
            'code' => RoleErrorCode::ERR_EMPTY_NAME,
        ]);
    }

    /**
     * @test
     */
    public function callRoleUpdateEndpointWithInvalidIdentifier_ExpectBadRequestResponse()
    {
        // Arrange
        $data = [
            'identifier' => 'invalid-uuid-identifier',
        ];

        // Act
        $response = $this->json('POST', $this->endpoint, $data);

        // Assert
        $response->assertStatus(Response::HTTP_BAD_REQUEST);
        $response->assertJsonFragment([
            'code' => RoleErrorCode::ERR_INVALID_IDENTIFIER,
        ]);
    }

    /**
     * @test
     */
    public function callRoleUpdateEndpointWithInvalidIdentifierAndName_ExpectBadRequestResponse()
    {
        // Arrange
        $data = [
            'identifier' => 'invalid-uuid-identifier',
            'name'       => 'valid-name-but-none-existing-identifier',
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
