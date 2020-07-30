<?php

namespace Tests\Integration\Organisation;

use Illuminate\Http\Response;
use src\Applications\Http\Enum\ErrorCodes\OrganisationErrorCode;
use Tests\Integration\TestCase;

class OrganisationListTest extends TestCase
{
    private string $endpoint = '/api/organisation.list';

    /**
     * @test
     */
    public function callOrganisationListEndpoint_ExpectOkResponse()
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
    public function callOrganisationListEndpointWithInvalidSort_ExpectBadRequestResponse()
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
            'code' => OrganisationErrorCode::ERR_INVALID_SORT,
        ]);
    }
}
