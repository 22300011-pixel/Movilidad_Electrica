<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Modelo Entity
 *
 * @property int $id
 * @property string $nombre_del_modelo
 * @property string $marca
 * @property string $tipo_de_vehiculo
 * @property string $tarifa_por_minuto
 * @property int|null $capacidad_maxima_kg
 * @property int|null $capacidad_de_bateria
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Foto[] $fotos
 * @property \App\Model\Entity\Vehiculo[] $vehiculos
 */
class Modelo extends Entity
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
        'nombre_del_modelo' => true,
        'marca' => true,
        'tipo_de_vehiculo' => true,
        'tarifa_por_minuto' => true,
        'capacidad_maxima_kg' => true,
        'capacidad_de_bateria' => true,
        'created' => true,
        'modified' => true,
        'fotos' => true,
        'vehiculos' => true,
    ];
}
