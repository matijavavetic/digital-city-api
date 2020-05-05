<?php

namespace src\Applications\Http\FormRequests\Tender;

use src\Applications\Http\Enum\ErrorCodes\TenderErrorCode;
use src\Applications\Http\FormRequests\FormRequest;

class TenderUpdateRequest extends FormRequest
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
            'name' => [
                'nullable',
                'string',
            ],
            'type' => [
                'nullable',
                'string'
            ],
            'dateFrom' => [
                'nullable',
                'string',
            ],
            'dateTo' => [
                'nullable',
                'string'
            ]
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
            'name.string'     => TenderErrorCode::ERR_INVALID_NAME,
            'type.string'     => TenderErrorCode::ERR_INVALID_TYPE,
            'dateFrom.string' => TenderErrorCode::ERR_INVALID_DATE_FROM,
            'dateTo.string'   => TenderErrorCode::ERR_INVALID_DATE_TO,
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
            'name'                   => $this->input('name'),
            'type'                   => $this->input('type'),
            'dateFrom'               => $this->input('dateFrom'),
            'dateTo'                 => $this->input('dateTo'),
        ];

        return $input;
    }
}
