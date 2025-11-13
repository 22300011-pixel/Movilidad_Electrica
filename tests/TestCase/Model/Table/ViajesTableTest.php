<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ViajesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ViajesTable Test Case
 */
class ViajesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ViajesTable
     */
    protected $Viajes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Viajes',
        'app.Users',
        'app.Vehiculos',
        'app.MetodoDePagos',
        'app.Estaciones',
        'app.Promociones',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Viajes') ? [] : ['className' => ViajesTable::class];
        $this->Viajes = $this->getTableLocator()->get('Viajes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Viajes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\ViajesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\ViajesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
