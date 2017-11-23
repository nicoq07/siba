<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SeguimientosProgramaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SeguimientosProgramaTable Test Case
 */
class SeguimientosProgramaTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SeguimientosProgramaTable
     */
    public $SeguimientosPrograma;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.seguimientos_programa',
        'app.clases_alumnos',
        'app.alumnos',
        'app.pagos_alumnos',
        'app.users',
        'app.profesores',
        'app.clases',
        'app.horarios',
        'app.ciclolectivo',
        'app.disciplinas',
        'app.seguimientos_clases',
        'app.roles',
        'app.notificaciones',
        'app.pagos_conceptos',
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
        $config = TableRegistry::exists('SeguimientosPrograma') ? [] : ['className' => SeguimientosProgramaTable::class];
        $this->SeguimientosPrograma = TableRegistry::get('SeguimientosPrograma', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SeguimientosPrograma);

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
