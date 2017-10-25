<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ParametrosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ParametrosTable Test Case
 */
class ParametrosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ParametrosTable
     */
    public $Parametros;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.parametros'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Parametros') ? [] : ['className' => ParametrosTable::class];
        $this->Parametros = TableRegistry::get('Parametros', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Parametros);

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
