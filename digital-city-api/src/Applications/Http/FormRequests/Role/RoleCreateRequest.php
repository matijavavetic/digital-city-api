<?php

namespace src\Applications\Http\FormRequests\Role;

use src\Applications\Http\Enum\ErrorCodes\RoleErrorCode;
use src\Applications\Http\FormRequests\FormRequest;
use src\Data\Entities\Role;

class RoleCreateRequest extends FormRequest
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
            'permissions' => [
                'required',
                'array'
            ],
            'permissions.*' => [
                'required',
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
            'name.string'            => RoleErrorCode::ERR_INVALID_NAME,
            'permissions.required'   => RoleErrorCode::ERR_EMPTY_PERMISSIONS_FIELD,
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
            'name'        => $this->input('name'),
            'permissions' => $this->input('permissions')
        ];

        return $input;
    }
}
