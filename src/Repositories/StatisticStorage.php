<?php


namespace App\Repositories;


use App\Entity\Statistic;
use PDO;

class StatisticStorage extends Storage
{
    public static function get(string $from, string $to)
    {
        $sql = "SELECT c.delivery_date, count(c.id) as loaded, p.processed_current, pb.processed_before, up.unprocessed
                FROM checks AS c
                LEFT JOIN (SELECT delivery_date, count(id) as processed_current FROM checks WHERE status != 'new' AND delivery_date = processed_at GROUP BY delivery_date) AS p ON c.delivery_date = p.delivery_date
                LEFT JOIN (SELECT processed_at, count(id) as processed_before FROM checks WHERE status != 'new' AND delivery_date < processed_at GROUP BY processed_at) AS pb ON c.delivery_date = pb.processed_at
                LEFT JOIN (SELECT delivery_date, count(id) as unprocessed FROM checks WHERE status = 'new' GROUP BY delivery_date) AS up ON c.delivery_date = up.delivery_date
                WHERE c.delivery_date BETWEEN ? AND ?
                GROUP BY c.delivery_date, processed_before";
        $stm = self::$db->prepare($sql);
        $stm->setFetchMode(PDO::FETCH_CLASS, Statistic::class);
        $stm->execute([$from, $to]);
        return $stm->fetchAll(PDO::FETCH_CLASS);
    }
}
