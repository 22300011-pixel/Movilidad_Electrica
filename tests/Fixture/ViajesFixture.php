<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ViajesFixture
 */
class ViajesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'hora_inicio' => '2025-11-12 14:17:51',
                'hora_fin' => '2025-11-12 14:17:51',
                'costo_total' => 1.5,
                'estado_viaje' => 'Lorem ipsum dolor sit amet',
                'user_id' => 1,
                'vehiculo_id' => 1,
                'metodo_de_pago_id' => 1,
                'estacion_id' => 1,
                'promocion_id' => 1,
                'created' => '2025-11-12 14:17:51',
                'modified' => '2025-11-12 14:17:51',
            ],
        ];
        parent::init();
    }
}
