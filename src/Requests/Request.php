<?php


namespace App\Requests;


class Request
{
    public function post($param)
    {
        return $_POST[$param] ?? null;
    }

    public function get($param)
    {
        return $_GET[$param] ?? null;
    }

    public function files($param)
    {
        return $_FILES[$param] ?? [];
    }
}
