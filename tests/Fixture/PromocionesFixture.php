<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PromocionesFixture
 */
class PromocionesFixture extends TestFixture
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
                'codigo' => 'Lorem ipsum dolor sit amet',
                'porcentaje_de_descuento' => 1.5,
                'fecha_de_expiracion' => '2025-11-12',
                'activa' => 1,
                'created' => '2025-11-12 14:17:46',
                'modified' => '2025-11-12 14:17:46',
            ],
        ];
        parent::init();
    }
}
