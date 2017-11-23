<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ClasesFixture
 *
 */
class ClasesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'profesor_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'operador_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'horario_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'disciplina_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'programa_adolescencia' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => '0', 'comment' => '', 'precision' => null],
        'alumno_count' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => 'cantidad de alumnos por clase', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'active' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'FK_DisciplinaClase_idx' => ['type' => 'index', 'columns' => ['disciplina_id'], 'length' => []],
            'FK_ProfesorClase_idx' => ['type' => 'index', 'columns' => ['profesor_id'], 'length' => []],
            'FK_HorarioClase_idx' => ['type' => 'index', 'columns' => ['horario_id'], 'length' => []],
            'FK_OperadorClase' => ['type' => 'index', 'columns' => ['operador_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'FK_DisciplinaClase' => ['type' => 'foreign', 'columns' => ['disciplina_id'], 'references' => ['disciplinas', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'FK_HorarioClase' => ['type' => 'foreign', 'columns' => ['horario_id'], 'references' => ['horarios', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'FK_OperadorClase' => ['type' => 'foreign', 'columns' => ['operador_id'], 'references' => ['operadores', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'FK_ProfesorClase' => ['type' => 'foreign', 'columns' => ['profesor_id'], 'references' => ['profesores', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'profesor_id' => 1,
            'operador_id' => 1,
            'horario_id' => 1,
            'disciplina_id' => 1,
            'programa_adolescencia' => 1,
            'alumno_count' => 1,
            'created' => '2017-11-19 12:30:31',
            'modified' => '2017-11-19 12:30:31',
            'active' => 1
        ],
    ];
}
