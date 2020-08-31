<?php

namespace Tests\Integration\Permission;

use Illuminate\Http\Response;
use src\Applications\Http\Enum\ErrorCodes\PermissionErrorCode;
use Tests\Integration\TestCase;

class PermissionUpdateList extends TestCase
{
    private string $endpoint = '/api/permission.update';

    /**
     * @test
     */
    public function callPermissionUpdateEndpointWithValidData_ExpectOkResponse()
    {
        // Arrange
        $listResponse = $this->json('GET', '/api/permission.list');

        // Get first permission from the list
        $permission = $listResponse->json('data.0');

        $data = [
            'identifier' => $permission['identifier'],
            'name'       => 'New updated permission name'
        ];

        // Act
        $response = $this->json('POST', $this->endpoint, $data);

        // Assert
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJsonFragment([
            'identifier' => $permission['identifier'],
            'name'       => 'New updated role name',
        ]);
    }

    /**
     * @test
     */
    public function callPermissionUpdateEndpointWithEmptyIdentifier_ExpectBadRequestResponse()
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
            'code' => PermissionErrorCode::ERR_EMPTY_IDENTIFIER,
        ]);
    }

    /**
     * @test
     */
    public function callPermissionUpdateEndpointWithValidIdentifierAndEmptyName_ExpectBadRequestResponse()
    {
        // Arrange
        $listResponse = $this->json('GET', '/api/permission.list');

        // Get first permission from the list
        $permission = $listResponse->json('data.0');

        $data = [
            'identifier' => $permission['identifier'],
            'name'       => '',
        ];

        // Act
        $response = $this->json('POST', $this->endpoint, $data);

        // Assert
        $response->assertStatus(Response::HTTP_BAD_REQUEST);
        $response->assertJsonFragment([
            'code' => PermissionErrorCode::ERR_EMPTY_NAME,
        ]);
    }

    /**
     * @test
     */
    public function callPermissionUpdateEndpointWithInvalidIdentifierDataType_ExpectBadRequestResponse()
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
            'code' => PermissionErrorCode::ERR_INVALID_IDENTIFIER,
        ]);
    }

    /**
     * @test
     */
    public function callPermissionUpdateEndpointWithInvalidIdentifierAndValidName_ExpectBadRequestResponse()
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
            'code' => "Permission with that identifier doesn't exist.",
        ]);
    }
}
