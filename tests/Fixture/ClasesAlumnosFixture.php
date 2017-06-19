<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ClasesAlumnosFixture
 *
 */
class ClasesAlumnosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'alumnno_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'clase_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'active' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'FK_AlumnoClase_idx' => ['type' => 'index', 'columns' => ['alumnno_id'], 'length' => []],
            'FK_ClaseClase_idx' => ['type' => 'index', 'columns' => ['clase_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'FK_AlumnoClase' => ['type' => 'foreign', 'columns' => ['alumnno_id'], 'references' => ['alumnos', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'FK_ClaseClase' => ['type' => 'foreign', 'columns' => ['clase_id'], 'references' => ['clases', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'alumnno_id' => 1,
            'clase_id' => 1,
            'created' => '2017-06-18 23:05:21',
            'modified' => '2017-06-18 23:05:21',
            'active' => 1
        ],
    ];
}
