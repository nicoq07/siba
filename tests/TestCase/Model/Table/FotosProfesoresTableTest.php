<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FotosProfesoresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FotosProfesoresTable Test Case
 */
class FotosProfesoresTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FotosProfesoresTable
     */
    public $FotosProfesores;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.fotos_profesores',
        'app.profesores'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('FotosProfesores') ? [] : ['className' => FotosProfesoresTable::class];
        $this->FotosProfesores = TableRegistry::get('FotosProfesores', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FotosProfesores);

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
