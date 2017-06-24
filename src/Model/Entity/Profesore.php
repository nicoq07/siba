<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Profesore Entity
 *
 * @property int $id
 * @property int $legajo_numero
 * @property string $apellido
 * @property string $nombre
 * @property string $nro_documento
 * @property string $direccion
 * @property string $ciudad
 * @property string $codigo_postal
 * @property string $email
 * @property string $cuit
 * @property string $telefono
 * @property string $celular
 * @property string $nombre_contacto
 * @property string $celular_contacto
 * @property string $titulo
 * @property string $observacion
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $active
 */
class Profesore extends Entity
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
}
