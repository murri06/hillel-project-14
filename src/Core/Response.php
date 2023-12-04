<?php

namespace App\Core;

class Response
{
    public function setCode(int $code): bool|int
    {
        return http_response_code($code);
    }
}