<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GestorTareasPrioridadTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GestorTareasPrioridadTable Test Case
 */
class GestorTareasPrioridadTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GestorTareasPrioridadTable
     */
    public $GestorTareasPrioridad;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('GestorTareasPrioridad') ? [] : ['className' => GestorTareasPrioridadTable::class];
        $this->GestorTareasPrioridad = TableRegistry::get('GestorTareasPrioridad', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GestorTareasPrioridad);

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
}
