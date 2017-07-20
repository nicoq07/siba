<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SeguimientosClasesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SeguimientosClasesTable Test Case
 */
class SeguimientosClasesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SeguimientosClasesTable
     */
    public $SeguimientosClases;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.seguimientos_clases',
        'app.calificaciones'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SeguimientosClases') ? [] : ['className' => SeguimientosClasesTable::class];
        $this->SeguimientosClases = TableRegistry::get('SeguimientosClases', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SeguimientosClases);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
