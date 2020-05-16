<?php

namespace Tests\Integration\Organisation;

use Illuminate\Http\Response;
use src\Applications\Http\Enum\ErrorCodes\OrganisationErrorCode;
use src\Applications\Http\Enum\ErrorCodes\UserErrorCode;
use Tests\Integration\TestCase;
use Faker\Factory as Faker;

class OrganisationInfoTest extends TestCase
{
    private string $endpoint = '/api/organisation.info';

    /**
     * @test
     */
    public function callOrganisationInfoEndpointWithValidData_ExpectOkResponse()
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
            'name'       => $organisation['name']
        ]);
    }

    /**
     * @test
     */
    public function callOrganisationInfoEndpointWithEmptyIdentifier_ExpectBadRequestResponse()
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
    public function callOrganisationInfoEndpointWithInvalidIdentifierDataType_ExpectBadRequestResponse()
    {
        // Arrange
        $faker = Faker::create();

        $data = [
            'identifier' => $faker->boolean,
        ];

        // Act
        $response = $this->json('POST', $this->endpoint, $data);

        // Assert
        $response->assertStatus(Response::HTTP_BAD_REQUEST);
        $response->assertJsonFragment([
            'code' => OrganisationErrorCode::ERR_INVALID_IDENTIFIER,
        ]);
    }
}
