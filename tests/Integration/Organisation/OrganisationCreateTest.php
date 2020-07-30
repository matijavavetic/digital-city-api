<?php

namespace Tests\Integration\Organisation;

use Illuminate\Http\Response;
use src\Applications\Http\Enum\ErrorCodes\OrganisationErrorCode;
use Tests\Integration\TestCase;
use Faker\Factory as Faker;

class OrganisationCreateTest extends TestCase
{
    private string $endpoint = '/api/organisation.create';

    /**
     * @test
     */
    public function callOrganisationCreateEndpointWithValidData_ExpectCreatedResponse()
    {
        // Arrange
        $faker = Faker::create();

        $data = [
            'name' => $faker->name,
            'cityIdentifier' => 1,
            'countyIdentifier' => 1
        ];

        // Act
        $response = $this->json('POST', $this->endpoint, $data);

        // Assert
        $response->assertStatus(Response::HTTP_CREATED);
        $response->assertJsonFragment($data);
    }

    public function callOrganisationCreateEndpointWithInvalidData_ExpectBadRequestResponse()
    {
        // Arrange
        $faker = Faker::create();

        $data = [
            'name' => $faker->randomDigit,
        ];

        // Act
        $response = $this->json('POST', $this->endpoint, $data);

        // Assert
        $response->assertStatus(Response::HTTP_BAD_REQUEST);
        $response->assertJsonFragment([
            'code' => OrganisationErrorCode::ERR_INVALID_NAME,
        ]);
    }


    public function callOrganisationCreateEndpointWithExistingName_ExpectBadRequestResponse()
    {
        // Arrange
        $data = [
            'name' => 'Grad Vukovar'
        ];

        // Act
        $response = $this->json('POST', $this->endpoint, $data);

        // Assert
        $response->assertStatus(Response::HTTP_BAD_REQUEST);
        $response->assertJsonFragment([
            'code' => 'Organisation with this name already exists.'
        ]);
    }
}
