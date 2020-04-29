<?php

namespace src\Applications\Http\Enum\ErrorCodes;

final class TenderErrorCode extends ErrorCodes
{
    const ERR_INVALID_SORT       = 'ERR_INVALID_SORT';
    const ERR_EMPTY_IDENTIFIER   = 'ERR_EMPTY_IDENTIFIER';
    const ERR_INVALID_IDENTIFIER = 'ERR_INVALID_IDENTIFIER';
    const ERR_EMPTY_NAME         = 'ERR_EMPTY_NAME';
    const ERR_INVALID_NAME       = 'ERR_INVALID_NAME';
    const ERR_EMPTY_TYPE         = 'ERR_EMPTY_TYPE';
    const ERR_INVALID_TYPE       = 'ERR_INVALID_TYPE';
    const ERR_INVALID_DATE_FROM  = 'ERR_INVALID_DATE_FROM';
    const ERR_INVALID_DATE_TO    = 'ERR_INVALID_DATE_TO';
}
