<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Datasource\ConnectionManager;

/**
 * Alumno Entity
 *
 * @property int $id
 * @property int $legajo_numero
 * @property string $nombre
 * @property string $apellido
 * @property \Cake\I18n\FrozenTime $fecha_nacimiento
 * @property string $direccion
 * @property string $ciudad
 * @property string $codigo_postal
 * @property string $telefono
 * @property string $celular
 * @property string $nro_documento
 * @property string $email
 * @property string $observacion
 * @property bool $programa_adolecencia
 * @property string $colegio
 * @property string $nombre_madre
 * @property string $nombre_padre
 * @property string $email_padre
 * @property string $email_madre
 * @property string $celular_padre
 * @property string $celular_madre
 * @property float $monto_arancel
 * @property float $monto_materiales
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $futuro_alumno
 * @property bool $active
 * @property string $referencia_foto
 *
 * @property \App\Model\Entity\FotosAlumno[] $fotos_alumnos
 * @property \App\Model\Entity\PagosAlumno[] $pagos_alumnos
 * @property \App\Model\Entity\Clase[] $clases
 */
class Alumno extends Entity
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
    
    public function _getPresentacion()
    {
    	$nomyape = $this->_properties['nombre'] . ' ' . $this->_properties['apellido'];
    	return $nomyape;
    }
    
    public function pagoElMes($mes)
    {
    	/*
    	 * select * from alumnos WHERE alumnos.id in (select pa.alumno_id from pagos_alumnos as pa
            where pa.alumno_id = 10 AND
            pa.mes = 04 AND
            YEAR(pa.created) = 2017)
    	 */
    	$connection = ConnectionManager::get('default');
    	$result = $connection->execute("SELECT 1 FROM alumnos WHERE alumnos.id in 
			(select pa.alumno_id from pagos_alumnos as pa
            where pa.alumno_id = ".$this->_properties['id']." AND
            pa.mes = $mes AND
            YEAR(pa.created) = ".date('Y').")");
    	
    	if($result->fetch())
    	{
    		return true;
    	}
    	return false;
    }
}
