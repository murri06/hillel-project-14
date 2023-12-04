<?php

namespace App\Core;

class Request
{

    /**
     * Returns method of the request
     * @return mixed
     */
    public function getMethod(): mixed
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * Returns path of the request
     * @return mixed
     */
    public function getPath(): mixed
    {
        return $_SERVER['REQUEST_URI'];
    }

    /**
     * Returns body of the request
     * @return array
     */
    public function getBody(): array
    {
        return $_REQUEST;
    }
}