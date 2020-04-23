<?php


namespace App\Repositories;

use App\Entity\User;
use PDO;

/**
 * Description of UserStorage
 */
class UserStorage extends Storage
{
    public static function checkUser($login, $password): ?User
    {
        $params = [$login, $password];

        $sql = "SELECT `id`, `login` FROM `users` WHERE `login` = ? AND `password` = ?";
        $stm = self::$db->prepare($sql);
        $stm->setFetchMode(PDO::FETCH_CLASS, User::class);
        $stm->execute($params);

        return $stm->fetch(PDO::FETCH_CLASS) ?: null;
    }

    public static function findByID($id): ?User
    {
        $sql = "SELECT `id`, `login` FROM `users` WHERE `id` = ?";
        $stm = self::$db->prepare($sql);
        $stm->setFetchMode(PDO::FETCH_CLASS, User::class);
        $stm->execute([$id]);
        return $stm->fetch(PDO::FETCH_CLASS) ?: null;
    }
}
