<?php

namespace src\Applications\Http\FormRequests\User;

use src\Applications\Http\Enum\ErrorCodes\UserErrorCode;
use src\Applications\Http\FormRequests\FormRequest;

class UserCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'email' => [
                'required',
                'email',
            ],
            'password' => [
                'required',
                'string'
            ],
            'roles' => [
                'required',
                'array'
            ],
            'roles.*' => [
                'required',
                'integer',
                'distinct'
            ],
            'permissions' => 'nullable|array',
            'permissions.*' => [
                'distinct',
                'integer'
            ],
            'organisations' => [
                'required',
                'array'
            ],
            'organisations.*' => [
                'required',
                'distinct',
                'integer'
            ],
            'firstName' => 'nullable|string',
            'lastName' => 'nullable|string',
            'birthDate' => 'nullable|date',
            'country' => 'nullable|string',
            'city' => 'nullable|string',
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
            'email.required'         => UserErrorCode::ERR_EMPTY_EMAIL,
            'email.email'            => UserErrorCode::ERR_INVALID_EMAIL,
            'password.required'      => UserErrorCode::ERR_EMPTY_PASSWORD,
            'password.string'        => UserErrorCode::ERR_INVALID_PASSWORD,
            'roles.required'         => UserErrorCode::ERR_EMPTY_ROLES_FIELD,
            'roles.array'            => UserErrorCode::ERR_INVALID_ROLES_FIELD,
            'organisations.required' => UserErrorCode::ERR_EMPTY_ORGANISATIONS_FIELD,
            'organisations.array'    => UserErrorCode::ERR_INVALID_ORGANISATIONS_FIELD,
            'firstName.string'       => UserErrorCode::ERR_INVALID_FIRSTNAME,
            'lastName.string'        => UserErrorCode::ERR_INVALID_LASTNAME,
            'birthDate.date'         => UserErrorCode::ERR_INVALID_DATE,
            'country.string'         => UserErrorCode::ERR_INVALID_COUNTRY,
            'city.string'            => UserErrorCode::ERR_INVALID_CITY,
            'permissions.array'      => UserErrorCode::ERR_INVALID_PERMISSIONS_FIELD
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
            'email'         => $this->input('email'),
            'password'      => $this->input('password'),
            'firstName'     => $this->input('firstName'),
            'lastName'      => $this->input('lastName'),
            'birthDate'     => $this->input('birthDate'),
            'country'       => $this->input('country'),
            'city'          => $this->input('city'),
            'roles'         => $this->input('roles'),
            'permissions'   => $this->input('permissions'),
            'organisations' => $this->input('organisations')
        ];

        return $input;
    }
}
