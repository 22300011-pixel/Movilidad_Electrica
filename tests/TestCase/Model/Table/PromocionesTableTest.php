<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PromocionesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PromocionesTable Test Case
 */
class PromocionesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PromocionesTable
     */
    protected $Promociones;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Promociones',
        'app.Viajes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Promociones') ? [] : ['className' => PromocionesTable::class];
        $this->Promociones = $this->getTableLocator()->get('Promociones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Promociones);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\PromocionesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
