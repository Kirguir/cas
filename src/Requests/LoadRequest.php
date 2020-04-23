<?php


namespace App\Requests;


class LoadRequest
{
    public string $filename;

    /**
     * LoadRequest constructor.
     * @param array $request
     */
    public function __construct(array $request)
    {
        if (isset($request['check_file']['tmp_name'])) {
            $this->check_file = $request['check_file'];
        }
    }
}
