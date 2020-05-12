<?php

namespace Tests\Integration\User;

use Illuminate\Http\Response;
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
}
