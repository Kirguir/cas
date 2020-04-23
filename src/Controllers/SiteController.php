<?php


namespace App\Controllers;


use App\Entity\AuthUser;
use App\Requests\Request;

class SiteController extends Controller
{
    public function index(Request $request)
    {
        $user = AuthUser::loggedUser();
        $this->view('home', ['user' => $user]);
    }
}
