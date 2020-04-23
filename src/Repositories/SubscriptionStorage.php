<?php


namespace App\Repositories;


use App\Entity\Subscription;
use PDO;

class SubscriptionStorage extends Storage
{
    public static function findBySubscriberAndMagazineOnDate(int $sub_id, int $magazine_id, string $date): ?Subscription
    {
        $sql = "SELECT * FROM `subscriptions` WHERE `subscriber_id`=? AND `magazine_id`=? AND `start` <= ? and date_add(`start`, interval `period` month) > ?";
        $stm = self::$db->prepare($sql);
        $stm->setFetchMode(PDO::FETCH_CLASS, Subscription::class);
        $stm->execute([$sub_id, $magazine_id, $date, $date]);
        return $stm->fetch(PDO::FETCH_CLASS) ?: null;
    }
}
