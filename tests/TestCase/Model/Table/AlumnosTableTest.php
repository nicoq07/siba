<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AlumnosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AlumnosTable Test Case
 */
class AlumnosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AlumnosTable
     */
    public $Alumnos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.alumnos',
        'app.fotos_alumnos',
        'app.pagos_alumnos',
        'app.clases',
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
        $config = TableRegistry::exists('Alumnos') ? [] : ['className' => AlumnosTable::class];
        $this->Alumnos = TableRegistry::get('Alumnos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Alumnos);

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
