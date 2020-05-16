<?php

namespace Tests\Integration\Role;

use Illuminate\Http\Response;
use src\Applications\Http\Enum\ErrorCodes\RoleErrorCode;
use Tests\Integration\TestCase;
use Faker\Factory as Faker;

class RoleInfoTest extends TestCase
{
    private string $endpoint = '/api/role.info';

    /**
     * @test
     */
    public function callRoleInfoEndpointWithValidData_ExpectOkResponse()
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
            'name'       => $role['name']
        ]);
    }

    /**
     * @test
     */
    public function callRoleInfoEndpointWithEmptyIdentifier_ExpectBadRequestResponse()
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
}
