<?php

namespace Tests\Integration;

use Illuminate\Http\Response;
use src\Applications\Http\Enum\ErrorCodes\RoleErrorCode;

class RoleListTest extends TestCase
{
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
