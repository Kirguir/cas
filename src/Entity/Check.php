<?php


namespace App\Entity;

/**
 * Class Check
 * @package App\Entity
 *
 * @property int $id
 * @property int $number
 * @property int $tracking
 * @property int $subscriber_id
 * @property int $magazine_rel_id
 * @property int $operator_id
 * @property string $status
 * @property string $delivery_date
 * @property string $filename
 * @property string $processed_at
 */
class Check extends Model
{
    const NEW = 'new';
    const PROCESSED = 'processed';
    const WRONG = 'wrong';

    public function fields(): array
    {
        return [
            'id',
            'number',
            'tracking',
            'subscriber_id',
            'magazine_rel_id',
            'operator_id',
            'status',
            'delivery_date',
            'filename',
            'processed_at',
        ];
    }

}
