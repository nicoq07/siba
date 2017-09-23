<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GestorTareasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GestorTareasTable Test Case
 */
class GestorTareasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GestorTareasTable
     */
    public $GestorTareas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.gestor_tareas',
        'app.gestor_tareas_prioridad'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('GestorTareas') ? [] : ['className' => GestorTareasTable::class];
        $this->GestorTareas = TableRegistry::get('GestorTareas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GestorTareas);

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

    /**
     * Test findOrdered method
     *
     * @return void
     */
    public function testFindOrdered()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
