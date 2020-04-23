<?php

namespace App\Entity;

use App\Repositories\UserStorage;

/**
 * Description of AuthUser
 */
class AuthUser
{
    public static function loggedUser(): ?User
    {
        session_start();

        $user = null;
        if (isset($_SESSION['user_id'])) {
            $user = UserStorage::findByID($_SESSION['user_id']);
        }

        if ($user === null) {
            unset($_SESSION['user_id']);
        }

        session_write_close();

        return $user;
    }


    public static function login($login, $password): bool
    {
        session_start();

        $user = UserStorage::checkUser($login, $password);

        if ($user !== null) {
            $_SESSION['user_id'] = $user->id;
            return true;
        }

        session_write_close();

        return false;
    }

    public static function logout()
    {
        session_start();

        unset($_SESSION['user_id']);

        session_write_close();

        return true;
    }
}
