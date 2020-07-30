<?php

namespace src\Applications\Http\FormRequests\Auth;

use src\Applications\Http\FormRequests\FormRequest;

class SignOutRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
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
        $header = $this->header('Authorization');

        $token = substr($header, strrpos($header, ' ') + 1);

        $input = [
            'token' => $token
        ];

        return $input;
    }
}
