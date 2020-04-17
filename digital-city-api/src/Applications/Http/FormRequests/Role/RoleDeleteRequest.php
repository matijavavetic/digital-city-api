<?php

namespace src\Applications\Http\FormRequests\Role;

use src\Applications\Http\Enum\ErrorCodes\RoleErrorCode;
use src\Applications\Http\FormRequests\FormRequest;

class RoleDeleteRequest extends FormRequest
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
            'identifier.required' => RoleErrorCode::ERR_EMPTY_IDENTIFIER,
            'identifier.string'   => RoleErrorCode::ERR_INVALID_IDENTIFIER,
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
            'identifier' => $this->input('identifier'),
        ];

        return $input;
    }
}
