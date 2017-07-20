<?php
namespace App\Test\TestCase\Controller;

use App\Controller\SeguimientosClasesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\SeguimientosClasesController Test Case
 */
class SeguimientosClasesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.seguimientos_clases',
        'app.clases',
        'app.profesores',
        'app.horarios',
        'app.ciclolectivo',
        'app.disciplinas',
        'app.alumnos',
        'app.pagos_alumnos',
        'app.users',
        'app.roles',
        'app.pagos_conceptos',
        'app.clases_alumnos',
        'app.calificaciones'
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
