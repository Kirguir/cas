<?php


namespace App\Controllers;


use App\Entity\User;
use App\Repositories\StatisticStorage;
use App\Requests\Request;

class StatisticController extends Controller
{
    public function index(Request $request, User $user)
    {
        $from = $request->post('from') ?? date('Y-m-d');
        $to = $request->post('to') ?? date('Y-m-d');
        $statistics = StatisticStorage::get($from, $to);
        $data = [
            'statistics' => $statistics,
            'user' => $user,
            'from' => $from,
            'to' => $to,
        ];
        $this->view('report', $data);
    }
}
