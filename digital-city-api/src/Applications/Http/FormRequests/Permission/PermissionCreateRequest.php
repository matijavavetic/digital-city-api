<?php

namespace src\Applications\Http\FormRequests\Permission;

use src\Applications\Http\Enum\ErrorCodes\PermissionErrorCode;
use src\Applications\Http\FormRequests\FormRequest;

class PermissionCreateRequest extends FormRequest
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
            'name.required' => PermissionErrorCode::ERR_EMPTY_NAME,
            'name.string'   => PermissionErrorCode::ERR_INVALID_NAME,
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
            'name' => $this->input('name'),
        ];

        return $input;
    }
}
