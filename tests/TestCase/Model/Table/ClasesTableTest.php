<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClasesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClasesTable Test Case
 */
class ClasesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ClasesTable
     */
    public $Clases;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.clases',
        'app.profesores',
        'app.horarios',
        'app.ciclolectivo',
        'app.disciplinas',
        'app.seguimientos_clases',
        'app.alumnos',
        'app.pagos_alumnos',
        'app.users',
        'app.roles',
        'app.notificaciones',
        'app.pagos_conceptos',
        'app.clases_alumnos',
        'app.seguimientos_clases_alumnos',
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
        $config = TableRegistry::exists('Clases') ? [] : ['className' => ClasesTable::class];
        $this->Clases = TableRegistry::get('Clases', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Clases);

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
