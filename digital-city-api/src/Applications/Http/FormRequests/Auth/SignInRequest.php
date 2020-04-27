<?php

namespace src\Applications\Http\FormRequests\Auth;

use src\Applications\Http\Enum\ErrorCodes\AuthErrorCode;
use src\Applications\Http\FormRequests\FormRequest;

class SignInRequest extends FormRequest
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
            'email.required'    => AuthErrorCode::ERR_EMPTY_EMAIL,
            'email.email'       => AuthErrorCode::ERR_INVALID_EMAIL,
            'password.required' => AuthErrorCode::ERR_EMPTY_PASSWORD,
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
            'email'    => $this->input('email'),
            'password' => $this->input('password'),
        ];

        return $input;
    }
}
