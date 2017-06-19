<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PuntosExamenTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PuntosExamenTable Test Case
 */
class PuntosExamenTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PuntosExamenTable
     */
    public $PuntosExamen;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.puntos_examen',
        'app.examenes',
        'app.clases_alumnos',
        'app.alumnos',
        'app.fotos_alumnos',
        'app.pagos_alumnos',
        'app.users',
        'app.clases',
        'app.profesores',
        'app.horarios',
        'app.ciclolectivo',
        'app.disciplinas',
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
        $config = TableRegistry::exists('PuntosExamen') ? [] : ['className' => PuntosExamenTable::class];
        $this->PuntosExamen = TableRegistry::get('PuntosExamen', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PuntosExamen);

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
