<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ModelosFixture
 */
class ModelosFixture extends TestFixture
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
                'nombre_del_modelo' => 'Lorem ipsum dolor sit amet',
                'marca' => 'Lorem ipsum dolor sit amet',
                'tipo_de_vehiculo' => 'Lorem ipsum dolor sit amet',
                'tarifa_por_minuto' => 1.5,
                'capacidad_maxima_kg' => 1,
                'capacidad_de_bateria' => 1,
                'created' => '2025-11-12 14:17:45',
                'modified' => '2025-11-12 14:17:45',
            ],
        ];
        parent::init();
    }
}
