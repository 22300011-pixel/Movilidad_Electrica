<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\ORM\Entity;

class User extends Entity
{

    protected function _setPassword(string $password) : ?string         // PARA OFUSCAR LA CONTRASEÑA
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
        return null;
    }


    protected array $_hidden = [        // EVITA QUE MUESTRE LA CONTRASEÑA EN UN pj($usuario)
        'password',
    ];
}