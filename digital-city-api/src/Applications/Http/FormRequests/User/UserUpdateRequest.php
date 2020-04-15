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
            'roleIdentifier' => 'integer',
            'email' => 'nullable|email',
            'password' => 'nullable|string',
            'firstName' => 'nullable|string',
            'lastName' => 'nullable|string',
            'birthDate' => 'nullable|date',
            'country' => 'nullable|string',
            'city' => 'nullable|string'
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
            'identifier.required'   => UserErrorCode::ERR_EMPTY_IDENTIFIER,
            'identifier.string'     => UserErrorCode::ERR_INVALID_IDENTIFIER,
            'email.email'           => UserErrorCode::ERR_INVALID_EMAIL,
            'roleIdentifier.string' => UserErrorCode::ERR_INVALID_ROLE_IDENTIFIER,
            'password.string'       => UserErrorCode::ERR_INVALID_PASSWORD,
            'firstName.string'      => UserErrorCode::ERR_INVALID_FIRSTNAME,
            'lastName.string'       => UserErrorCode::ERR_INVALID_LASTNAME,
            'birthDate.date'        => UserErrorCode::ERR_INVALID_DATE,
            'country.string'        => UserErrorCode::ERR_INVALID_COUNTRY,
            'city.string'           => UserErrorCode::ERR_INVALID_CITY
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
            'identifier'     => $this->input('identifier'),
            'roleIdentifier' => $this->input('roleIdentifier'),
            'email'          => $this->input('email'),
            'password'       => $this->input('password'),
            'firstName'      => $this->input('firstName'),
            'lastName'       => $this->input('lastName'),
            'birthDate'      => $this->input('birthDate'),
            'country'        => $this->input('country'),
            'city'           => $this->input('city'),
        ];

        return $input;
    }
}
