<?php

namespace src\Business\Mappers\Auth\Response;

use JsonSerializable;

class SignUpResponseMapper implements JsonSerializable
{
    private string $message;
    private int $status;

    public function __construct(string $message, string $status)
    {
        $this->message = $message;
        $this->status  = $status;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function jsonSerialize()
    {
        return [
            'message' => $this->message,
            'status'  => $this->status,
        ];
    }
}
