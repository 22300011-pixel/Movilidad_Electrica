<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MetodoDePago Entity
 *
 * @property int $id
 * @property string $tipo_de_tarjeta
 * @property string $nombre_del_titular
 * @property string $cvv
 * @property string $fecha_de_vencimiento
 * @property bool $es_predeterminado
 * @property string|null $alias
 * @property int|null $user_id
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Viaje[] $viajes
 */
class MetodoDePago extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'tipo_de_tarjeta' => true,
        'nombre_del_titular' => true,
        'cvv' => true,
        'fecha_de_vencimiento' => true,
        'es_predeterminado' => true,
        'alias' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'viajes' => true,
    ];
}
