<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClasesAlumnosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClasesAlumnosTable Test Case
 */
class ClasesAlumnosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ClasesAlumnosTable
     */
    public $ClasesAlumnos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.clases_alumnos',
        'app.alumnos',
        'app.fotos_alumnos',
        'app.pagos_alumnos',
        'app.users',
        'app.profesores',
        'app.roles',
        'app.clases',
        'app.horarios',
        'app.ciclolectivo',
        'app.disciplinas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ClasesAlumnos') ? [] : ['className' => ClasesAlumnosTable::class];
        $this->ClasesAlumnos = TableRegistry::get('ClasesAlumnos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ClasesAlumnos);

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
