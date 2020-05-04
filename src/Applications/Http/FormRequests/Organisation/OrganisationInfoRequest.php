<?php

namespace src\Applications\Http\FormRequests\Organisation;

use src\Applications\Http\Enum\ErrorCodes\OrganisationErrorCode;
use src\Applications\Http\FormRequests\FormRequest;

class OrganisationInfoRequest extends FormRequest
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
                'string',
            ],
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
            'identifier.required' => OrganisationErrorCode::ERR_EMPTY_IDENTIFIER,
            'identifier.string'   => OrganisationErrorCode::ERR_INVALID_IDENTIFIER,
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
            'identifier' => $this->input('identifier')
        ];

        return $input;
    }
}
