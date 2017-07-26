<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SeguimientosClasesAlumnosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SeguimientosClasesAlumnosTable Test Case
 */
class SeguimientosClasesAlumnosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SeguimientosClasesAlumnosTable
     */
    public $SeguimientosClasesAlumnos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.seguimientos_clases_alumnos',
        'app.clase_alumnos',
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
        $config = TableRegistry::exists('SeguimientosClasesAlumnos') ? [] : ['className' => SeguimientosClasesAlumnosTable::class];
        $this->SeguimientosClasesAlumnos = TableRegistry::get('SeguimientosClasesAlumnos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SeguimientosClasesAlumnos);

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
