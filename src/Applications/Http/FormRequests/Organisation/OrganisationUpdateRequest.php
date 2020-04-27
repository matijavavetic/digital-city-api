<?php

namespace src\Applications\Http\FormRequests\Organisation;

use src\Applications\Http\Enum\ErrorCodes\UserErrorCode;
use src\Applications\Http\FormRequests\FormRequest;

class OrganisationUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'identifier' => [
                'required',
                'string'
            ],
            'name' => 'nullable|string',
            'description' => 'nullable|string',
            'city' => 'nullable|string',
            'county' => 'nullable|string',
            'country' => 'nullable|string',
            'primaryColor' => 'nullable|string',
            'secondaryColor' => 'nullable|string',
            'tertiaryColor' => 'nullable|string',
            'logo' => 'nullable|string'
        ];
    }

    /**
     * Get the validation error codes for the request.
     *
     * @return array
     */
    public function errorCodes() : array
    {
        return [
            'identifier.required'   => OrganisationErrorCode::ERR_EMPTY_IDENTIFIER,
            'identifier.string'     => OrganisationErrorCode::ERR_INVALID_IDENTIFIER,
            'name.email'            => OrganisationErrorCode::ERR_INVALID_NAME,
            'description.string'    => OrganisationErrorCode::ERR_INVALID_DESCRIPTION,
            'city.string'           => OrganisationErrorCode::ERR_INVALID_CITY,
            'county.string'         => OrganisationErrorCode::ERR_INVALID_COUNTY,
            'country.date'          => OrganisationErrorCode::ERR_INVALID_COUNTRY,
            'primaryColor.string'   => OrganisationErrorCode::ERR_INVALID_PRIMARY_COLOR,
            'secondaryColor.string' => OrganisationErrorCode::ERR_INVALID_SECONDARY_COLOR,
            'tertiaryColor.string'  => OrganisationErrorCode::ERR_INVALID_TERTIARY_COLOR,
            'logo.string'           => OrganisationErrorCode::ERR_INVALID_LOGO
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get data to be validated from the request.
     *
     * @return array
     */
    public function validationData() : array
    {
        $input = [
            'identifier'     => $this->input('identifier'),
            'name'           => $this->input('name'),
            'city'           => $this->input('city'),
            'county'         => $this->input('county'),
            'country'        => $this->input('country'),
            'description'    => $this->input('description'),
            'primaryColor'   => $this->input('primaryColor'),
            'secondaryColor' => $this->input('secondaryColor'),
            'tertiaryColor'  => $this->input('tertiaryColor'),
            'logo'           => $this->input('logo')
        ];

        return $input;
    }
}
