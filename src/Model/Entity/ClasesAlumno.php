<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

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
    
    public function existeSeguimiento()
    {
    	$Seguimientos = TableRegistry::get("SeguimientosClasesAlumnos");
    	
    	if($Seguimientos->exists(["clase_alumno_id" => $this->id, 'DATE(fecha) ']))
    	{
    		return true;
    	}
    	
    	return false;
    }
    
    public function _getMostrarAlumno()
    {
		$alumno = TableRegistry::get("Alumnos")->get($this->alumno_id);
		$texto = $alumno->presentacion; 
    	return $texto;
    }
    
}
