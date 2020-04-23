<?php


namespace App\Controllers;


use App\Entity\AuthUser;
use App\Requests\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $login = $request->post('login');
        $password = $request->post('password');
        if (AuthUser::login($login, $password)) {
            header('Location: http://' . $_SERVER['HTTP_HOST'] . '/', true, 302);
        }
        $this->view('login', ['login' => $login]);
    }
}
