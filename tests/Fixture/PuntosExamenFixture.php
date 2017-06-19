<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PuntosExamenFixture
 *
 */
class PuntosExamenFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'puntos_examen';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'examen_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'descripcion' => ['type' => 'string', 'length' => 150, 'null' => false, 'default' => null, 'collate' => 'latin1_spanish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'nota' => ['type' => 'integer', 'length' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'calificacion_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'FK_PuntosExamenExamen_idx' => ['type' => 'index', 'columns' => ['examen_id'], 'length' => []],
            'FK_CalificacionPuntosExamen_idx' => ['type' => 'index', 'columns' => ['calificacion_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'FK_CalificacionPuntosExamen' => ['type' => 'foreign', 'columns' => ['calificacion_id'], 'references' => ['calificaciones', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'FK_ExamenPuntosExamen' => ['type' => 'foreign', 'columns' => ['examen_id'], 'references' => ['examenes', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'examen_id' => 1,
            'descripcion' => 'Lorem ipsum dolor sit amet',
            'nota' => 1,
            'created' => '2017-06-18 23:05:22',
            'modified' => '2017-06-18 23:05:22',
            'calificacion_id' => 1
        ],
    ];
}
