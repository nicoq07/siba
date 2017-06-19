<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExamenesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExamenesTable Test Case
 */
class ExamenesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ExamenesTable
     */
    public $Examenes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.examenes',
        'app.clases_alumnos',
        'app.alumnos',
        'app.fotos_alumnos',
        'app.pagos_alumnos',
        'app.clases',
        'app.profesores',
        'app.horarios',
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
        $config = TableRegistry::exists('Examenes') ? [] : ['className' => ExamenesTable::class];
        $this->Examenes = TableRegistry::get('Examenes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Examenes);

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
