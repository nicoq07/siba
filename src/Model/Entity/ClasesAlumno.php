<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ClasesAlumno Entity
 *
 * @property int $id
 * @property int $alumno_id
 * @property int $clase_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $active
 *
 * @property \App\Model\Entity\Alumno $alumno
 * @property \App\Model\Entity\Clase $clase
 */
class ClasesAlumno extends Entity
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
