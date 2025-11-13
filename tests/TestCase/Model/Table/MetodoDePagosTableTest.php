<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MetodoDePagosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MetodoDePagosTable Test Case
 */
class MetodoDePagosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MetodoDePagosTable
     */
    protected $MetodoDePagos;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.MetodoDePagos',
        'app.Users',
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
        $config = $this->getTableLocator()->exists('MetodoDePagos') ? [] : ['className' => MetodoDePagosTable::class];
        $this->MetodoDePagos = $this->getTableLocator()->get('MetodoDePagos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->MetodoDePagos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\MetodoDePagosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\MetodoDePagosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
