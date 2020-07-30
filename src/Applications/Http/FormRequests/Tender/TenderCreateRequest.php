<?php

namespace src\Applications\Http\FormRequests\Tender;

use src\Applications\Http\Enum\ErrorCodes\TenderErrorCode;
use src\Applications\Http\FormRequests\FormRequest;

class TenderCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'name' => [
                'required',
                'string',
            ],
            'type' => [
                'required',
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
            'name.required'   => TenderErrorCode::ERR_EMPTY_NAME,
            'name.string'     => TenderErrorCode::ERR_INVALID_NAME,
            'type.required'   => TenderErrorCode::ERR_EMPTY_TYPE,
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
            'organisationIdentifier' => $this->input('organisationIdentifier')
        ];

        return $input;
    }
}
