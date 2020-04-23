<?php


namespace App\Entity;

/**
 * Class Subscription
 * @package App\Entity
 *
 * @property int $id
 * @property int $subscriber_id
 * @property int $magazine_id
 * @property string $start
 * @property int $period
 */
class Subscription extends Model
{
    public function fields(): array
    {
        return [
            'id',
            'subscriber_id',
            'magazine_id',
            'start',
            'period',
        ];
    }
}
