<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ClasesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ClasesController Test Case
 */
class ClasesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.clases',
        'app.profesores',
        'app.horarios',
        'app.ciclolectivo',
        'app.disciplinas',
        'app.alumnos',
        'app.fotos_alumnos',
        'app.pagos_alumnos',
        'app.users',
        'app.roles',
        'app.clases_alumnos'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
