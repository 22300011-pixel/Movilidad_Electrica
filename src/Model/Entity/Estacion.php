<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Estacion Entity
 *
 * @property int $id
 * @property string $nombre
 * @property string $direccion
 * @property string $latitud
 * @property string $longitud
 * @property int|null $capacidad
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Vehiculo[] $vehiculos
 * @property \App\Model\Entity\Viaje[] $viajes
 */
class Estacion extends Entity
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
        'nombre' => true,
        'direccion' => true,
        'latitud' => true,
        'longitud' => true,
        'capacidad' => true,
        'created' => true,
        'modified' => true,
        'vehiculos' => true,
        'viajes' => true,
    ];
}
