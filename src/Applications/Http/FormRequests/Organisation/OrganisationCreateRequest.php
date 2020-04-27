<?php

namespace src\Applications\Http\FormRequests\Organisation;

use src\Applications\Http\Enum\ErrorCodes\UserErrorCode;
use src\Applications\Http\FormRequests\FormRequest;

class OrganisationCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'name' => [
                'required',
                'string',
            ],
            'city' => [
                'required',
                'string'
            ],
            'county' => [
                'required',
                'string'
            ],
            'country' => [
                'required',
                'string',
            ],
            'description' => 'nullable|string',
            'primaryColor' => 'nullable|string',
            'secondaryColor' => 'nullable|date',
            'tertiaryColor' => 'nullable|string',
            'logo' => 'nullable|string',
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
            'name.required'         => OrganisationErrorCode::ERR_EMPTY_NAME,
            'name.string'           => OrganisationErrorCode::ERR_INVALID_NAME,
            'city.required'         => OrganisationErrorCode::ERR_EMPTY_CITY,
            'city.string'           => OrganisationErrorCode::ERR_INVALID_CITY,
            'county.required'       => OrganisationErrorCode::ERR_EMPTY_COUNTY,
            'county.string'         => OrganisationErrorCode::ERR_INVALID_COUNTY,
            'country.required'      => OrganisationErrorCode::ERR_EMPTY_COUNTRY,
            'country.string'        => OrganisationErrorCode::ERR_INVALID_COUNTRY,
            'description.string'    => OrganisationErrorCode::ERR_INVALID_DESCRIPTION,
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
