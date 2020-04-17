<?php

namespace Tests\Integration;

use src\Applications\Http\Enum\ErrorCodes\RoleErrorCode;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;

class RoleListTest extends TestCase
{
    use RefreshDatabase;

    private string $endpoint = '/api/role.list';

    /**
     * @test
     */
    public function callRoleListEndpoint_ExpectOkResponse()
    {
        // Arrange
        $data = [
            'sort' => 'ASC',
        ];

        // Act
        $response = $this->json('GET', $this->endpoint, $data);

        // Assert
        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function callRoleListEndpointWithInvalidSort_ExpectBadRequestResponse()
    {
        // Arrange
        $data = [
            'sort' => 'wrong-asc-desc-sort',
        ];

        // Act
        $response = $this->json('GET', $this->endpoint, $data);

        // Assert
        $response->assertStatus(Response::HTTP_BAD_REQUEST);
        $response->assertJsonFragment([
            'code' => RoleErrorCode::ERR_INVALID_SORT,
        ]);
    }
}
