<?php


namespace App\Entity;

/**
 * Class Subscriber
 * @package App\Entity
 *
 * @property int $id
 * @property string $name
 * @property string $address
 */
class Subscriber extends Model
{
    public function fields(): array
    {
        return [
            'id',
            'name',
            'address',
        ];
    }
}
