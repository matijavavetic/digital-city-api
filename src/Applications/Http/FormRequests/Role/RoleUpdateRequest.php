<?php

namespace src\Applications\Http\FormRequests\Role;

use src\Applications\Http\Enum\ErrorCodes\RoleErrorCode;
use src\Applications\Http\FormRequests\FormRequest;

class RoleUpdateRequest extends FormRequest
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
            'permissions' => [
                'nullable',
                'array',
            ],
            'permissions.*' => [
                'distinct',
                'integer'
            ]
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
            'name.required'          => RoleErrorCode::ERR_EMPTY_NAME,
            'identifier.required'    => RoleErrorCode::ERR_EMPTY_IDENTIFIER,
            'identifier.string'      => RoleErrorCode::ERR_INVALID_IDENTIFIER,
            'permissions.array'      => RoleErrorCode::ERR_INVALID_PERMISSIONS_FIELD,
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
            'identifier'  => $this->input('identifier'),
            'name'        => $this->input('name'),
            'permissions' => $this->input('permissions')
        ];

        return $input;
    }
}
