<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MetodoDePagosFixture
 */
class MetodoDePagosFixture extends TestFixture
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
                'tipo_de_tarjeta' => 'Lorem ipsum dolor sit amet',
                'nombre_del_titular' => 'Lorem ipsum dolor sit amet',
                'cvv' => 'Lo',
                'fecha_de_vencimiento' => 'Lor',
                'es_predeterminado' => 1,
                'alias' => 'Lorem ipsum dolor sit amet',
                'user_id' => 1,
                'created' => '2025-11-12 14:17:43',
                'modified' => '2025-11-12 14:17:43',
            ],
        ];
        parent::init();
    }
}
