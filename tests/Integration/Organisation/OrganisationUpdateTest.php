<?php

namespace Tests\Integration\Organisation;

use Illuminate\Http\Response;
use src\Applications\Http\Enum\ErrorCodes\OrganisationErrorCode;
use Tests\Integration\TestCase;

class OrganisationUpdateTest extends TestCase
{
    private string $endpoint = '/api/organisation.update';

    /**
     * @test
     */
    public function callOrganisationUpdateEndpointWithValidData_ExpectOkResponse()
    {
        // Arrange
        $listResponse = $this->json('GET', '/api/organisation.list');

        // Get first organisation from the list
        $organisation = $listResponse->json('data.0');

        $data = [
            'identifier' => $organisation['identifier'],
            'name'       => 'Updated Name'
        ];

        // Act
        $response = $this->json('POST', $this->endpoint, $data);

        // Assert
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJsonFragment([
            'identifier' => $organisation['identifier'],
            'name'       => 'Updated',
        ]);
    }


    /**
     * @test
     */
    public function callOrganisationUpdateEndpointWithEmptyIdentifier_ExpectBadRequestResponse()
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
}
