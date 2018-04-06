<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HistorialMailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HistorialMailsTable Test Case
 */
class HistorialMailsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HistorialMailsTable
     */
    public $HistorialMails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.historial_mails'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('HistorialMails') ? [] : ['className' => HistorialMailsTable::class];
        $this->HistorialMails = TableRegistry::get('HistorialMails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->HistorialMails);

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
