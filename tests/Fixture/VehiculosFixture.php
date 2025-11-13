<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VehiculosFixture
 */
class VehiculosFixture extends TestFixture
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
                'numero_de_serie' => 'Lorem ipsum dolor sit amet',
                'estado' => 'Lorem ipsum dolor sit amet',
                'nivel_de_bateria' => 1,
                'latitud' => 1.5,
                'longitud' => 1.5,
                'estacion_id' => 1,
                'modelo_id' => 1,
                'created' => '2025-11-12 14:17:49',
                'modified' => '2025-11-12 14:17:49',
            ],
        ];
        parent::init();
    }
}
