<?php

namespace src\Applications\Http\FormRequests\Permission;

use src\Applications\Http\Enum\ErrorCodes\PermissionErrorCode;
use src\Applications\Http\FormRequests\FormRequest;

class PermissionUpdateRequest extends FormRequest
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
            'name.required'       => PermissionErrorCode::ERR_EMPTY_NAME,
            'name.string'         => PermissionErrorCode::ERR_INVALID_NAME,
            'identifier.required' => PermissionErrorCode::ERR_EMPTY_IDENTIFIER,
            'identifier.string'   => PermissionErrorCode::ERR_INVALID_IDENTIFIER,
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
            'name'       => $this->input('name'),
        ];

        return $input;
    }
}
