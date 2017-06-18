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
        'app.disciplinas',
        'app.alumnos',
        'app.fotos_alumnos',
        'app.pagos_alumnos',
        'app.clases_alumnos'
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
}
