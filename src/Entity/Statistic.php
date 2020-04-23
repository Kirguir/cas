<?php


namespace App\Entity;

/**
 * Class Statistic
 * @package App\Entity
 *
 * @property string $date
 * @property string $loaded
 * @property string $processed_current
 * @property string $processed_before
 * @property string $unprocessed
 */
class Statistic extends Model
{
    public function fields(): array
    {
        return [
            'date',
            'loaded',
            'processed_current',
            'processed_before',
            'unprocessed',
        ];
    }

}
