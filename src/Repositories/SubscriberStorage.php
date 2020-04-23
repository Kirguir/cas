<?php


namespace App\Repositories;


use App\Entity\Subscriber;
use PDO;

class SubscriberStorage extends Storage
{
    public static function findByID($id): ?Subscriber
    {
        $sql = "SELECT * FROM `subscribers` WHERE `id` = ?";
        $stm = self::$db->prepare($sql);
        $stm->setFetchMode(PDO::FETCH_CLASS, Subscriber::class);
        $stm->execute([$id]);
        return $stm->fetch(PDO::FETCH_CLASS) ?: null;
    }

    public static function findByLikeName(string $name): array
    {
        $sql = 'SELECT * FROM `subscribers` WHERE LOWER(`name`) LIKE ? LIMIT 10';
        $stm = self::$db->prepare($sql);
        $stm->setFetchMode(PDO::FETCH_CLASS, Subscriber::class);
        $stm->execute(['%' . strtolower($name) . '%']);
        return $stm->fetchAll(PDO::FETCH_CLASS);
    }
}
