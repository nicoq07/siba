<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * GestorTarea Entity
 *
 * @property int $id
 * @property string $titulo
 * @property string $descripcion
 * @property int $prioridad_id
 * @property \Cake\I18n\FrozenTime $fecha_vencimiento
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\GestorTareasPrioridad $gestor_tareas_prioridad
 */
class GestorTarea extends Entity
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
