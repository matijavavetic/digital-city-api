<?php

namespace Tests\Integration;

use Illuminate\Http\Response;
use src\Applications\Http\Enum\ErrorCodes\RoleErrorCode;

class RoleCreateTest extends TestCase
{
    private string $endpoint = '/api/role.create';

    /**
     * @test
     */
    public function callRoleCreateEndpointWithValidData_ExpectCreatedResponse()
    {
        // Arrange
        $data = [
            'name' => 'New role name',
        ];

        // Act
        $response = $this->json('POST', $this->endpoint, $data);

        // Assert
        $response->assertStatus(Response::HTTP_CREATED);
        $response->assertJsonFragment([
            'name' => 'New role name',
        ]);
    }

    /**
     * @test
     */
    public function callRoleListEndpointWithInvalidData_ExpectBadRequestResponse()
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
            'code' => RoleErrorCode::ERR_EMPTY_NAME,
        ]);
    }
}
