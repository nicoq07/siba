<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CiclolectivoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CiclolectivoTable Test Case
 */
class CiclolectivoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CiclolectivoTable
     */
    public $Ciclolectivo;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ciclolectivo',
        'app.horarios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Ciclolectivo') ? [] : ['className' => CiclolectivoTable::class];
        $this->Ciclolectivo = TableRegistry::get('Ciclolectivo', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Ciclolectivo);

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
}
