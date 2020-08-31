<?php

namespace Tests\Integration\User;

use Illuminate\Http\Response;
use src\Applications\Http\Enum\ErrorCodes\UserErrorCode;
use Tests\Integration\TestCase;

class UserListTest extends TestCase
{
    private string $endpoint = '/api/user.list';

    /**
     * @test
     */
    public function callUserListEndpoint_ExpectOkResponse()
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
    public function callUserListEndpointWithInvalidSort_ExpectBadRequestResponse()
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
            'code' => UserErrorCode::ERR_INVALID_SORT,
        ]);
    }

    /**
     * @test
     */
    public function callUserListEndpointWithNonExistingRelations_ExpectBadRequestResponse()
    {
        // Arrange
        $data = [
            'relations' => ['non-existing-relation'],
        ];

        // Act
        $response = $this->json('GET', $this->endpoint, $data);

        // Assert
        $response->assertStatus(Response::HTTP_BAD_REQUEST);
        $response->assertJsonFragment([
            'code' => "Relation doesn't exist.",
        ]);
    }
}
