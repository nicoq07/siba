<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NotificacionesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NotificacionesTable Test Case
 */
class NotificacionesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NotificacionesTable
     */
    public $Notificaciones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.notificaciones'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Notificaciones') ? [] : ['className' => NotificacionesTable::class];
        $this->Notificaciones = TableRegistry::get('Notificaciones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Notificaciones);

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
