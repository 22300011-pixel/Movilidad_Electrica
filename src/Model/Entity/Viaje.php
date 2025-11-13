<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Viaje Entity
 *
 * @property int $id
 * @property \Cake\I18n\DateTime $hora_inicio
 * @property \Cake\I18n\DateTime $hora_fin
 * @property string|null $costo_total
 * @property string $estado_viaje
 * @property int|null $user_id
 * @property int|null $vehiculo_id
 * @property int|null $metodo_de_pago_id
 * @property int|null $estacion_id
 * @property int|null $promocion_id
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Vehiculo $vehiculo
 * @property \App\Model\Entity\MetodoDePago $metodo_de_pago
 * @property \App\Model\Entity\Estacion $estacion
 * @property \App\Model\Entity\Promocion $promocion
 */
class Viaje extends Entity
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
        'hora_inicio' => true,
        'hora_fin' => true,
        'costo_total' => true,
        'estado_viaje' => true,
        'user_id' => true,
        'vehiculo_id' => true,
        'metodo_de_pago_id' => true,
        'estacion_id' => true,
        'promocion_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'vehiculo' => true,
        'metodo_de_pago' => true,
        'estacion' => true,
        'promocion' => true,
    ];
}
