<?php


namespace App\Entity;

/**
 * Class Magazine
 * @package App\Entity
 *
 * @property int $id
 * @property int $magazine_id
 * @property int $number
 * @property string $name
 * @property string $date
 */
class Magazine extends Model
{
    public function fields(): array
    {
        return [
            'id',
            'magazine_id',
            'number',
            'name',
            'date',
        ];
    }
}
