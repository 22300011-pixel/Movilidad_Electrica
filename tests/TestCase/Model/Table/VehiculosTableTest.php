<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VehiculosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VehiculosTable Test Case
 */
class VehiculosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\VehiculosTable
     */
    protected $Vehiculos;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Vehiculos',
        'app.Estaciones',
        'app.Modelos',
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
        $config = $this->getTableLocator()->exists('Vehiculos') ? [] : ['className' => VehiculosTable::class];
        $this->Vehiculos = $this->getTableLocator()->get('Vehiculos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Vehiculos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\VehiculosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\VehiculosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
