<?php

namespace Tests\Integration\Permission;

use Illuminate\Http\Response;
use src\Applications\Http\Enum\ErrorCodes\PermissionErrorCode;
use Tests\Integration\TestCase;

class PermissionCreateTest extends TestCase
{
    private string $endpoint = '/api/permission.create';

    /**
     * @test
     */
    public function callPermissionCreateEndpointWithValidData_ExpectCreatedResponse()
    {
        // Arrange
        $data = [
            'name' => 'New permission name'
        ];

        // Act
        $response = $this->json('POST', $this->endpoint, $data);

        // Assert
        $response->assertStatus(Response::HTTP_CREATED);
        $response->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function callPermissionCreateEndpointWithInvalidData_ExpectBadRequestResponse()
    {
        // Arrange
        $data = [
            'name' => '',
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
    public function callPermissionCreateEndpointWithExistingName_ExpectBadRequestResponse()
    {
        // Arrange
        $data = [
            'name' => 'scholarship_create',
        ];

        // Act
        $response = $this->json('POST', $this->endpoint, $data);

        // Assert
        $response->assertStatus(Response::HTTP_BAD_REQUEST);
        $response->assertJsonFragment([
            'code' => 'Permission with that name already exists.'
        ]);
    }
}
