<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EstacionesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EstacionesTable Test Case
 */
class EstacionesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EstacionesTable
     */
    protected $Estaciones;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Estaciones',
        'app.Vehiculos',
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
        $config = $this->getTableLocator()->exists('Estaciones') ? [] : ['className' => EstacionesTable::class];
        $this->Estaciones = $this->getTableLocator()->get('Estaciones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Estaciones);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\EstacionesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
