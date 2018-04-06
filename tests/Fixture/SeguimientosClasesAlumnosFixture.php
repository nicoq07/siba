<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SeguimientosClasesAlumnosFixture
 *
 */
class SeguimientosClasesAlumnosFixture extends TestFixture
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
        'observacion' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'latin1_spanish_ci', 'comment' => '', 'precision' => null],
        'presente' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null],
        'calificacion_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'fecha' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'FK_ClaseAlumnoSeguimiento_idx' => ['type' => 'index', 'columns' => ['clase_alumno_id'], 'length' => []],
            'FK_CalificacionSeguimiento_idx' => ['type' => 'index', 'columns' => ['calificacion_id'], 'length' => []],
            'clase_id' => ['type' => 'index', 'columns' => ['clase_alumno_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'FK_CalificacionSeguimiento' => ['type' => 'foreign', 'columns' => ['calificacion_id'], 'references' => ['calificaciones', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'FK_ClasesAlumnoSeguimiento' => ['type' => 'foreign', 'columns' => ['clase_alumno_id'], 'references' => ['clases_alumnos', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
            'observacion' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'presente' => 1,
            'calificacion_id' => 1,
            'fecha' => '2017-07-24 12:09:40',
            'created' => '2017-07-24 12:09:40',
            'modified' => '2017-07-24 12:09:40'
        ],
    ];
}
