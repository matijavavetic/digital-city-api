<?php

namespace src\Applications\Http\FormRequests\User;

use src\Applications\Http\Enum\ErrorCodes\RoleErrorCode;
use src\Applications\Http\Enum\ErrorCodes\UserErrorCode;
use src\Applications\Http\FormRequests\FormRequest;
use src\Data\Entities\User;

class UserInfoRequest extends FormRequest
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
            'identifier.required' => UserErrorCode::ERR_EMPTY_IDENTIFIER,
            'identifier.string'   => UserErrorCode::ERR_INVALID_IDENTIFIER,
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
