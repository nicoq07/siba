<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ExamenesFixture
 *
 */
class ExamenesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'clase_alumno_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'periodo' => ['type' => 'string', 'length' => 150, 'null' => true, 'default' => null, 'collate' => 'latin1_spanish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'aprobado' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'calificacion' => ['type' => 'string', 'length' => 2, 'null' => true, 'default' => null, 'collate' => 'latin1_spanish_ci', 'comment' => 'valor para calificación', 'precision' => null, 'fixed' => null],
        'audioperceptiva' => ['type' => 'string', 'length' => 2, 'null' => true, 'default' => null, 'collate' => 'latin1_spanish_ci', 'comment' => 'valor para audioperceptiva', 'precision' => null, 'fixed' => null],
        'practica_ensamble' => ['type' => 'string', 'length' => 2, 'null' => true, 'default' => null, 'collate' => 'latin1_spanish_ci', 'comment' => 'valor para practica_ensamble', 'precision' => null, 'fixed' => null],
        'trabajos_practicos' => ['type' => 'string', 'length' => 2, 'null' => true, 'default' => null, 'collate' => 'latin1_spanish_ci', 'comment' => 'valor para trabajos_practicos', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'FK_ClaseAlumnoExamen_idx' => ['type' => 'index', 'columns' => ['clase_alumno_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'FK_ClaseAlumnoExamen' => ['type' => 'foreign', 'columns' => ['clase_alumno_id'], 'references' => ['clases_alumnos', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_spanish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'clase_alumno_id' => 1,
            'periodo' => 'Lorem ipsum dolor sit amet',
            'aprobado' => 1,
            'calificacion' => '',
            'audioperceptiva' => '',
            'practica_ensamble' => '',
            'trabajos_practicos' => '',
            'created' => '2017-08-31 11:17:44',
            'modified' => '2017-08-31 11:17:44'
        ],
    ];
}
