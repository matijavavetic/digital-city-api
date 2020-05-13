<?php

namespace Tests\Integration\Permission;

use Illuminate\Http\Response;
use src\Applications\Http\Enum\ErrorCodes\PermissionErrorCode;
use Tests\Integration\TestCase;

class PermissionDeleteTest extends TestCase
{
    private string $endpoint = '/api/permission.delete';

    /**
     * @test
     */
    public function callPermissionDeleteEndpointWithValidData_ExpectOkResponse()
    {
        // Arrange
        $listResponse = $this->json('GET', '/api/permission.list');

        // Get first permission from the list
        $permission = $listResponse->json('data.0');

        $data = [
            'identifier' => $permission['identifier'],
        ];

        // Act
        $response = $this->json('POST', $this->endpoint, $data);

        // Assert
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJsonFragment([
            'identifier' => $permission['identifier'],
        ]);
    }

    /**
     * @test
     */
    public function callPermissionDeleteEndpointWithEmptyIdentifier_ExpectBadRequestResponse()
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
    public function callPermissionDeleteEndpointWithNonExistingIdentifier_ExpectBadRequestResponse()
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
    public function callPermissionDeleteEndpointWithInvalidIdentifierDataType_ExpectBadRequestResponse()
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
}
