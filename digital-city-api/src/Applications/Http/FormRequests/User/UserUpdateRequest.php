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
            'roleID' => 'integer',
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
            'identifier.required' => UserErrorCode::ERR_EMPTY_IDENTIFIER,
            'identifier.string'   => UserErrorCode::ERR_NOT_STRING,
            'email.email'         => UserErrorCode::ERR_INVALID_EMAIL,
            'roleID.integer'      => UserErrorCode::ERR_INVALID_ROLE_ID,
            'password.string'     => UserErrorCode::ERR_NOT_STRING,
            'firstName.string'    => UserErrorCode::ERR_NOT_STRING,
            'lastName.string'     => UserErrorCode::ERR_NOT_STRING,
            'birthDate.date'      => UserErrorCode::ERR_INVALID_DATE,
            'country.string'      => UserErrorCode::ERR_NOT_STRING,
            'city.string'         => UserErrorCode::ERR_NOT_STRING
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
            'roleID' => $this->input('roleID'),
            'email' => $this->input('email'),
            'password' => $this->input('password'),
            'firstName' => $this->input('first_name'),
            'lastName' => $this->input('last_name'),
            'birthDate' => $this->input('birth_date'),
            'country' => $this->input('country'),
            'city' => $this->input('city'),
        ];

        return $input;
    }
}
