<?php

namespace Tests\Integration\Permission;

use Illuminate\Http\Response;
use src\Applications\Http\Enum\ErrorCodes\PermissionErrorCode;
use Tests\Integration\TestCase;

class PermissionListTest extends TestCase
{
    private string $endpoint = '/api/permission.list';

    /**
     * @test
     */
    public function callPermissionListEndpoint_ExpectOkResponse()
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
    public function callPermissionListEndpointWithInvalidSort_ExpectBadRequestResponse()
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
            'code' => PermissionErrorCode::ERR_INVALID_SORT,
        ]);
    }
}
