<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Vehiculo Entity
 *
 * @property int $id
 * @property string $numero_de_serie
 * @property string $estado
 * @property int $nivel_de_bateria
 * @property string $latitud
 * @property string $longitud
 * @property int|null $estacion_id
 * @property int|null $modelo_id
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Estacion $estacion
 * @property \App\Model\Entity\Modelo $modelo
 * @property \App\Model\Entity\Viaje[] $viajes
 */
class Vehiculo extends Entity
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
        'numero_de_serie' => true,
        'estado' => true,
        'nivel_de_bateria' => true,
        'latitud' => true,
        'longitud' => true,
        'estacion_id' => true,
        'modelo_id' => true,
        'created' => true,
        'modified' => true,
        'estacion' => true,
        'modelo' => true,
        'viajes' => true,
    ];
}
