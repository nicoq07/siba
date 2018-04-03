<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use Cake\Auth\DefaultPasswordHasher;
/**
 * User Entity
 *
 * @property int $id
 * @property string $dni
 * @property int $profesor_id
 * @property string $nombre
 * @property string $apellido
 * @property string $nombre_usuario
 * @property string $password
 * @property int $rol_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $active
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\PagosAlumno[] $pagos_alumnos
 */
class User extends Entity
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

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
    
    public function _getPresentacion()
    {
    	$nomyape = $this->_properties['nombre'] . ' ' . $this->_properties['apellido'];
    	return $nomyape;
    }
    
    public function _getPresentacionNotificaciones()
    {
    	$tipo = empty($this->_properties['profesor_id']) ? "Admin" : "Profesor";
    	$nomyape = $this->_properties['nombre'] . ' ' . $this->_properties['apellido']. ' - ' . $tipo;
    	return $nomyape;
    }
    
    protected function _setPassword($value)
    {
    	if (!empty($value))
    	{
    		$hasher = new DefaultPasswordHasher();
    		return $hasher->hash($value);
    	}
    	else
    	{
    		$id = $this->_properties['id'];
    		$user = TableRegistry::get('Users')->recoverPassword($id);
    		return $user;
    	}
    }
    
   
}
