<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Clase Entity
 *
 * @property int $id
 * @property int $profesor_id
 * @property int $horario_id
 * @property int $disciplina_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $active
 *
 * @property \App\Model\Entity\Profesore $profesore
 * @property \App\Model\Entity\Horario $horario
 * @property \App\Model\Entity\Disciplina $disciplina
 * @property \App\Model\Entity\Alumno[] $alumnos
 */
class Clase extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
