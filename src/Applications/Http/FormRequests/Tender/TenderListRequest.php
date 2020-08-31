<?php

namespace src\Applications\Http\FormRequests\Tender;

use src\Applications\Http\Enum\ErrorCodes\TenderErrorCode;
use src\Applications\Http\FormRequests\FormRequest;

class TenderListRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'sort' => [
                'nullable',
                'in:ASC,DESC',
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
            'sort.in' => TenderErrorCode::ERR_INVALID_SORT,
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
            'sort' => $this->input('sort')
        ];

        return $input;
    }
}
