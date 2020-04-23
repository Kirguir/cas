<?php


namespace App\Repositories;


use App\Entity\Check;
use PDO;

class CheckStorage extends Storage
{
    /**
     * @param Check $check
     * @return Check
     */
    public static function add(Check $check): Check
    {
        $values = [
            $check->delivery_date,
            $check->operator_id,
            $check->filename,
            $check->status,
        ];
        $sql = "INSERT INTO checks (delivery_date, operator_id, filename, status) VALUES (?,?,?,?)";
        $stm = self::$db->prepare($sql);
        $stm->execute($values);
        $check->id = self::$db->lastInsertId();
        return $check;
    }

    /**
     * @param int $id
     * @return Check|null
     */
    public static function findByID(int $id): ?Check
    {
        $sql = "SELECT * FROM checks WHERE id = ?";
        $stm = self::$db->prepare($sql);
        $stm->execute([$id]);
        return $stm->fetchObject(Check::class) ?: null;
    }

    /**
     * @param int $operator_id
     * @return array
     */
    public static function findAllNewByOperator(int $operator_id): array
    {
        $sql = "SELECT * FROM checks WHERE status != ? AND operator_id = ?";
        $stm = self::$db->prepare($sql);
        $stm->setFetchMode(PDO::FETCH_CLASS, Check::class);
        $stm->execute([Check::PROCESSED, $operator_id]);
        return $stm->fetchAll(PDO::FETCH_CLASS);
    }

    public static function update(Check $check)
    {
        $params = [
            $check->magazine_rel_id,
            $check->number,
            $check->subscriber_id,
            $check->tracking,
            $check->status,
            date('Y-m-d'),
            $check->id,
        ];
        $sql = "UPDATE checks SET magazine_rel_id=?, number=?, subscriber_id=?, tracking=?, status=?, processed_at=? WHERE id=?";
        $stm = self::$db->prepare($sql);
        $stm->execute($params);
    }
}
