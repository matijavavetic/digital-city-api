<?php

namespace src\Applications\Http\Enum\ErrorCodes;

final class AuthErrorCode extends ErrorCodes
{
    const ERR_EMPTY_EMAIL      = 'ERR_EMPTY_EMAIL';
    const ERR_INVALID_EMAIL    = 'ERR_INVALID_EMAIL';
    const ERR_EMPTY_PASSWORD   = 'ERR_EMPTY_PASSWORD';
    const ERR_INVALID_PASSWORD = 'ERR_INVALID_PASSWORD';
}
