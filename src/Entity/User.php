<?php


namespace App\Entity;

/**
 * Class User
 * @package App\Entity
 *
 * @property int $id
 * @property string $login
 */
class User extends Model
{
    public function fields(): array
    {
        return [
            'id',
            'login'
        ];
    }
}
