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
            'uuid' => [
                'required',
                'string'
            ],
            'email' => 'email',
            'password' => 'string',
            'firstName' => 'string',
            'lastName' => 'string',
            'birthDate' => 'date',
            'country' => 'string',
            'city' => 'string'
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
            'uuid.required' => UserErrorCode::ERR_EMPTY_IDENTIFIER,
            'uuid.string' => UserErrorCode::ERR_NOT_STRING,
            'email.email' => UserErrorCode::ERR_INVALID_EMAIL,
            'password.string' => UserErrorCode::ERR_NOT_STRING,
            'firstName.string' => UserErrorCode::ERR_NOT_STRING,
            'lastName.string' => UserErrorCode::ERR_NOT_STRING,
            'birthDate.date' => UserErrorCode::ERR_INVALID_DATE,
            'country.string' => UserErrorCode::ERR_NOT_STRING,
            'city.string' => UserErrorCode::ERR_NOT_STRING
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
            'uuid' => $this->input('uuid'),
            'email' => $this->input('email'),
            'password' => $this->input('password'),
            'firstName' => $this->input('first_name'),
            'lastName' => $this->input('last_name'),
            'birthDate' => $this->input('birth_date'),
            'country' => $this->input('country'),
            'city' => $this->input('city'),
        ];

        return array_filter($input);
    }
}
