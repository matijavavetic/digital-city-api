<?php

namespace Tests\Integration\Organisation;

use Illuminate\Http\Response;
use src\Applications\Http\Enum\ErrorCodes\OrganisationErrorCode;
use Tests\Integration\TestCase;
use Faker\Factory as Faker;

class OrganisationDeleteTest extends TestCase
{
    private string $endpoint = '/api/organisation.delete';

    /**
     * @test
     */
    public function callOrganisationDeleteEndpointWithValidData_ExpectOkResponse()
    {
        // Arrange
        $listResponse = $this->json('GET', '/api/organisation.list');

        // Get first organisation from the list
        $organisation = $listResponse->json('data.0');

        $data = [
            'identifier' => $organisation['identifier'],
        ];

        // Act
        $response = $this->json('POST', $this->endpoint, $data);

        // Assert
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJsonFragment([
            'identifier' => $organisation['identifier'],
        ]);
    }


    /**
     * @test
     */
    public function callOrganisationDeleteEndpointWithEmptyIdentifier_ExpectBadRequestResponse()
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
            'code' => OrganisationErrorCode::ERR_EMPTY_IDENTIFIER,
        ]);
    }

    /**
     * @test
     */
    public function callOrganisationDeleteEndpointWithNonExistingIdentifier_ExpectBadRequestResponse()
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
            'code' => 'Organisation with that identifier does not exist',
        ]);
    }
}
