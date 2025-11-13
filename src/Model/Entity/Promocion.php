<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Promocion Entity
 *
 * @property int $id
 * @property string $codigo
 * @property string $porcentaje_de_descuento
 * @property \Cake\I18n\Date|null $fecha_de_expiracion
 * @property bool $activa
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Viaje[] $viajes
 */
class Promocion extends Entity
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
        'codigo' => true,
        'porcentaje_de_descuento' => true,
        'fecha_de_expiracion' => true,
        'activa' => true,
        'created' => true,
        'modified' => true,
        'viajes' => true,
    ];
}
