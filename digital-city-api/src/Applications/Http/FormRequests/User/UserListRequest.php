<?php

namespace src\Applications\Http\FormRequests\User;

use src\Applications\Http\Enum\ErrorCodes\UserErrorCode;
use src\Data\Enums\RelationEnum;
use src\Applications\Http\FormRequests\FormRequest;

class UserListRequest extends FormRequest
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
            'relations' => 'nullable|array',
            'relations.*' => [
                'string',
                'distinct',
                'enum_value:' . RelationEnum::class,
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
            'sort.in'    => UserErrorCode::ERR_INVALID_SORT,
            'relations.array' => UserErrorCode::ERR_INVALID_RELATIONS
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
            'sort'      => $this->input('sort'),
            'relations' => $this->input('relations')
        ];

        return $input;
    }
}
