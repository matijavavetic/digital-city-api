<?php

namespace src\Applications\Http\FormRequests\User;

use src\Applications\Http\Enum\ErrorCodes\UserErrorCode;
use src\Applications\Http\FormRequests\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'email' => 'nullable|email',
            'password' => 'nullable|string',
            'firstName' => 'nullable|string',
            'lastName' => 'nullable|string',
            'birthDate' => 'nullable|date',
            'country' => 'nullable|string',
            'city' => 'nullable|string',
            'roles' => 'nullable|array',
            'roles.*' => [
                'integer',
                'distinct'
            ],
            'permissions' => 'nullable|array',
            'permissions.*' => [
                'distinct',
                'integer'
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
            'email.email'         => UserErrorCode::ERR_INVALID_EMAIL,
            'password.string'     => UserErrorCode::ERR_INVALID_PASSWORD,
            'firstName.string'    => UserErrorCode::ERR_INVALID_FIRSTNAME,
            'lastName.string'     => UserErrorCode::ERR_INVALID_LASTNAME,
            'birthDate.date'      => UserErrorCode::ERR_INVALID_DATE,
            'country.string'      => UserErrorCode::ERR_INVALID_COUNTRY,
            'city.string'         => UserErrorCode::ERR_INVALID_CITY,
            'roles.string'        => UserErrorCode::ERR_INVALID_ROLES,
            'permissions.string'  => UserErrorCode::ERR_INVALID_PERMISSIONS
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
            'email'       => $this->input('email'),
            'password'    => $this->input('password'),
            'firstName'   => $this->input('firstName'),
            'lastName'    => $this->input('lastName'),
            'birthDate'   => $this->input('birthDate'),
            'country'     => $this->input('country'),
            'city'        => $this->input('city'),
            'roles'       => $this->input('roles'),
            'permissions' => $this->input('permissions')
        ];

        return $input;
    }
}
