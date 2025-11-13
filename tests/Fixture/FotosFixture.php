<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FotosFixture
 */
class FotosFixture extends TestFixture
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
                'url_foto' => 'Lorem ipsum dolor sit amet',
                'descripcion' => 'Lorem ipsum dolor sit amet',
                'modelo_id' => 1,
                'created' => '2025-11-12 14:17:42',
                'modified' => '2025-11-12 14:17:42',
            ],
        ];
        parent::init();
    }
}
