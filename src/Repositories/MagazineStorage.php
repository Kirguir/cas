<?php


namespace App\Repositories;


use App\Entity\Magazine;
use PDO;

class MagazineStorage extends Storage
{
    public static function findByLikeName(string $name): array
    {
        $sql = "SELECT mr.*, m.name FROM magazines AS m
                JOIN magazine_release AS mr ON m.id = mr.magazine_id
                WHERE LOWER(m.name) LIKE ? LIMIT 10";
        $stm = self::$db->prepare($sql);
        $stm->setFetchMode(PDO::FETCH_CLASS, Magazine::class);
        $stm->execute(['%' . strtolower($name) . '%']);
        return $stm->fetchAll(PDO::FETCH_CLASS);
    }

    public static function findByID(int $id): ?Magazine
    {
        $sql = "SELECT mr.*, m.name FROM magazines AS m
                JOIN magazine_release AS mr ON m.id = mr.magazine_id
                WHERE mr.id = ?";
        $stm = self::$db->prepare($sql);
        $stm->setFetchMode(PDO::FETCH_CLASS, Magazine::class);
        $stm->execute([$id]);
        return $stm->fetch(PDO::FETCH_CLASS) ?: null;
    }
}
