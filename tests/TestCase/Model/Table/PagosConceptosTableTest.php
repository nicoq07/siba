<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PagosConceptosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PagosConceptosTable Test Case
 */
class PagosConceptosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PagosConceptosTable
     */
    public $PagosConceptos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pagos_conceptos',
        'app.pagos_alumnos',
        'app.alumnos',
        'app.fotos_alumnos',
        'app.clases',
        'app.profesores',
        'app.horarios',
        'app.ciclolectivo',
        'app.disciplinas',
        'app.clases_alumnos',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PagosConceptos') ? [] : ['className' => PagosConceptosTable::class];
        $this->PagosConceptos = TableRegistry::get('PagosConceptos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PagosConceptos);

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
