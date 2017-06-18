<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CalificacionesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CalificacionesTable Test Case
 */
class CalificacionesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CalificacionesTable
     */
    public $Calificaciones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('Calificaciones') ? [] : ['className' => CalificacionesTable::class];
        $this->Calificaciones = TableRegistry::get('Calificaciones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Calificaciones);

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
