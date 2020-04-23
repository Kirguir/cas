<?php


namespace App;


use App\Controllers\AuthController;
use App\Controllers\CheckController;
use App\Controllers\MagazineController;
use App\Controllers\SiteController;
use App\Controllers\StatisticController;
use App\Controllers\SubscriberController;
use App\Entity\AuthUser;
use App\Repositories\Storage;
use App\Requests\Request;

class App
{
    public function run()
    {
        Conf::parseFromFile();
        Storage::init(Conf::$Database);

        Router::route('/', function () {
            $controller = new SiteController();
            $controller->index(new Request());
        });

        Router::route('/login', function () {
            $controller = new AuthController();
            $controller->login(new Request());
        });

        Router::route('/checks', function () {
            if ($operator = AuthUser::loggedUser()) {
                $controller = new CheckController();
                $controller->index($operator);
            }
            header('Location: http://' . $_SERVER['HTTP_HOST'] . '/', true, 302);
        });

        Router::route('/checks/load', function () {
            if ($operator = AuthUser::loggedUser()) {
                $controller = new CheckController();
                $controller->load(new Request(), $operator);
            }
            header('Location: http://' . $_SERVER['HTTP_HOST'] . '/', true, 302);
        });

        Router::route('/checks/processed/(\d+)', function (int $id) {
            if ($operator = AuthUser::loggedUser()) {
                $controller = new CheckController();
                $controller->processed($operator, $id);
            }
            header('Location: http://' . $_SERVER['HTTP_HOST'] . '/', true, 302);
        });

        Router::route('/checks/update/(\d+)', function (int $id) {
            if ($operator = AuthUser::loggedUser()) {
                $controller = new CheckController();
                $controller->update(new Request(), $operator, $id);
            }
            header('Location: http://' . $_SERVER['HTTP_HOST'] . '/', true, 302);
        });

        Router::route('/subscribers', function () {
            if ($operator = AuthUser::loggedUser()) {
                $controller = new SubscriberController();
                $controller->search(new Request());
            }
            header('Location: http://' . $_SERVER['HTTP_HOST'] . '/', true, 302);
        });

        Router::route('/magazines', function () {
            if ($operator = AuthUser::loggedUser()) {
                $controller = new MagazineController();
                $controller->search(new Request());
            }
            header('Location: http://' . $_SERVER['HTTP_HOST'] . '/', true, 302);
        });

        Router::route('/report', function () {
            if ($operator = AuthUser::loggedUser()) {
                $controller = new StatisticController();
                $controller->index(new Request(), $operator);
            }
            header('Location: http://' . $_SERVER['HTTP_HOST'] . '/', true, 302);
        });

        Logger::log('debug', $_SERVER['REQUEST_URI']);
        Router::execute($_SERVER['REQUEST_URI']);
    }
}
