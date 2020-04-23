<?php


namespace App\Controllers;


class Controller
{
    protected function view(string $template, array $data)
    {
        if (!empty($data)) {
            extract($data);
        }
        ob_start();
        include '../views/layout.php';
        echo ob_get_clean();
        exit();
    }
}
