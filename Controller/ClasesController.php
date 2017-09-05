<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Clases Controller
 *
 * @property \App\Model\Table\ClasesTable $Clases
 *
 * @method \App\Model\Entity\Clase[] paginate($object = null, array $settings = [])
 */
class ClasesController extends AppController
{
	
	public function isAuthorized($user)
	{
		if(isset($user['rol_id']) &&  $user['rol_id'] === PROFESOR)
		{
			return false;
		}
		return parent::isAuthorized($user);
		return true;
	}
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Profesores', 'Horarios', 'Disciplinas'],
        	'finder' => 'ordered',
        ];
        $clases = $this->paginate($this->Clases);

        $this->set(compact('clases'));
        $this->set('_serialize', ['clases']);
    }

    /**
     * View method
     *
     * @param string|null $id Clase id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $clase = $this->Clases->get($id, [
        		'contain' => ['Profesores', 'Horarios', 'Disciplinas', 'Alumnos']
        ]);
		
        $clasesAlumnosTable = TableRegistry::get('ClasesAlumnos');
        $clasesAlumnos = $clasesAlumnosTable->find('all')
        ->where(['ClasesAlumnos.clase_id' => $id , 'ClasesAlumnos.active' => true]);
        $this->set(['clase','clasesAlumnos'], [$clase,$clasesAlumnos]);
        $this->set('_serialize', ['clase']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $clase = $this->Clases->newEntity();
        if ($this->request->is('post')) {
        	//debug($this->request->getData());
            $clase = $this->Clases->patchEntity($clase, $this->request->getData());
            //debug($clase);
          
            if (!empty($this->request->getData("alumnos")['_ids']))
            {
            	$clase->alumno_count = count($this->request->getData("alumnos")['_ids']);
            }
            if ($this->Clases->save($clase)) {
            	if (!empty($this->request->getData("alumnos")['_ids']))
            	{
            			if (!$this->insertarSeguimiento($clase->id, $this->request->getData("alumnos")['_ids']))
            			{
            				$this->Flash->error(__('Problema creando los seguimientos.'));
            			}
            	}
                $this->Flash->success(__('Clase guardada!.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Error creando la clase, por favor reintente!.'));
        }
        $profesores = $this->Clases->Profesores->find('list')->find('ordered')->where(['Profesores.active' => true]);
        $horarios = $this->Clases->Horarios->find('list')->find('ordered');
        $disciplinas = $this->Clases->Disciplinas->find('list', ['limit' => 200])->find('ordered');
        $alumnos = $this->Clases->Alumnos->find('list')->find('ordered')->where(['Alumnos.active' => true]);
        $this->set(compact('clase', 'profesores', 'horarios', 'disciplinas', 'alumnos'));
        $this->set('_serialize', ['clase']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Clase id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
    	$cambioDia = false;
        $clase = $this->Clases->get($id, [
            'contain' => ['Alumnos']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $clase = $this->Clases->patchEntity($clase, $this->request->getData());
         
            if($clase->isDirty('horario_id'))
            {
            	$cambioDia = true;
            }
			
			$clase->alumno_count = count($clase->alumnos);
           /* if (!empty($this->request->getData("alumnos")['_ids']))
            {
            	$clase->alumno_count = count($this->request->getData("alumnos")['_ids']);
            }*/
            if ($this->Clases->save($clase))
            {
            	$r = 0;
            	if ($cambioDia)
            	{
            		$ClasesAlumno = TableRegistry::get('ClasesAlumnos');
            		
            		$clasesAlumnos = $ClasesAlumno->find('all')->select(['ClasesAlumnos.id'])
            		->where(['ClasesAlumnos.clase_id' => $clase->id])->toArray();
            		$ids = array();
            		foreach ($clasesAlumnos as $ca)
            		{
            			array_push($ids, $ca->id);
            		}
            		
            		$Seguimientos = TableRegistry::get('SeguimientosClasesAlumnos');
            		$r = $Seguimientos->deleteAll(['clase_alumno_id IN' => $ids]);
            		
            	}
            	if (!empty($this->request->getData("alumnos")['_ids']))
            	{
            		if (!$this->insertarSeguimiento($clase->id, $this->request->getData("alumnos")['_ids']))
            		{
            			$this->Flash->error(__('Problema creando los seguimientos.'));
            		}
            		
            	}
                $this->Flash->success(__("Clase guardada. Se actualizaron $r seguimientos"));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Error guardando la clase'));
        }
        $profesores = $this->Clases->Profesores->find('list')->find('ordered')->where(['Profesores.active' => true]);
        $horarios = $this->Clases->Horarios->find('list')->find('ordered');
        $disciplinas = $this->Clases->Disciplinas->find('list', ['limit' => 200])->find('ordered');
        $alumnos = $this->Clases->Alumnos->find('list')->find('ordered')->where(['Alumnos.active' => true]);
        $this->set(compact('clase', 'profesores', 'horarios', 'disciplinas', 'alumnos'));
        $this->set('_serialize', ['clase']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Clase id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $clase = $this->Clases->get($id);
        if ($this->Clases->delete($clase)) {
            $this->Flash->success(__('The clase has been deleted.'));
        } else {
            $this->Flash->error(__('The clase could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function desactivarClaseAlumno($alumnoId,$claseId)
    {
    	$this->request->allowMethod(['post', 'delete']);
    	
    	
    	$ClasesAlumno = TableRegistry::get('ClasesAlumnos');
    	$id = $ClasesAlumno->find('all')->select(['ClasesAlumnos.id'])->where(['ClasesAlumnos.alumno_id' => $alumnoId, 'ClasesAlumnos.clase_id' => $claseId])->first();
    	
    	$claseAlumno = $ClasesAlumno->get($id['id']);
    	
	    	if ($ClasesAlumno->delete($claseAlumno))
	    	{
	    		$this->Flash->success(__('Alumno quitado de la clase.'));
	    	}
	    	else 
	    	{
	    		$this->Flash->error(__('Error quitando al alumno de la clase.'));
	    	}
    	return $this->redirect($this->referer());
    	
    }
    
    private function insertarSeguimiento($idClase,$idsAlumnos)
    {
    	
    	
    	//creo un array con los dias con clave y valor para despues poder compararlo con la funcion DATE
    	$days = ['Monday' => 1, 'Tuesday' => 2, 'Wednesday' => 3, 'Thursday' => 4, 'Friday' => 5];
    	
    	//me traigo la tabla de seguimientos
    	$Seguimientos = TableRegistry::get('SeguimientosClasesAlumnos');
    	$AlumnosTable= TableRegistry::get('Alumnos');
    	
    	$clase = $this->Clases->get($idClase,['contain' => ['Horarios'  => ['Ciclolectivo']]]);
    	
    	$ClasesAlumno = TableRegistry::get('ClasesAlumnos');
    	
    	
    	
    	//Recorro los ids de clases que voy a necesitar para crear los seguimientos
    	foreach ($idsAlumnos as $pos => $idAlumno)
    	{
    		
    		
    		//Busco en la base el ID de ClasesAlumnos con id Id de Clase y el ID de Alumno
    		$idClaseAlumno = $ClasesAlumno->find('all')
    		->where(['ClasesAlumnos.alumno_id' => $idAlumno, 'ClasesAlumnos.clase_id' => $idClase]);
    		$claseAlumno = $ClasesAlumno->get($idClaseAlumno->first()->id);
    		
    		//Me traigo el obj de claseAlumno con todas las propiedasdes y asociaciones
    		//$alumno = $AlumnosTable->get($idAlumno);
    		if(!$claseAlumno->existeSeguimiento($idAlumno))
    		{
    			
    			$alu = $AlumnosTable->get($idAlumno);
    			
    			//Creo las fechas de incio y fin para  recorrerlas
    			$fechaInicio = strtotime($clase->modified->format('Y-m-d'));
    			$fechaFin = strtotime($clase->horario->ciclolectivo->fecha_fin->format('Y-m-d'));
    			
    			//recorro por dia hasta la fecha fin
    			for($i=$fechaInicio; $i<=$fechaFin; $i+=86400)
    			{
    				//me traigo el nombre del dia
    				$dia = date('N', $i);
    				
    				//si el dia es el mismo que que el dia de la clase, tengo que crear un seguimiento para ese dia
    				if($dia == $days[$clase->horario->nombre_dia])
    				{
    					//     				echo $clase->horario->nombre_dia. " ". date ("Y-m-d", $i)."<br>";
    					$seguimiento = $Seguimientos->newEntity(
    							[
    									'clase_alumno_id' => $claseAlumno->id,
    									'observacion' => "SIN DATOS",
    									'presente' => false,
    									'fecha' => new  \DateTime(date('Y-m-d H:i:s', $i)),
    									'created' => new \DateTime('now'),
    									'created' => new \DateTime('now')
    							]);
    					//$seguimiento->fecha = date ("Y-m-d H:i:s", $i);
    					//guardo y valido
    					if (!$Seguimientos->save($seguimiento))
    					{
    						$this->Flash->error("Seguimiento de fecha " .$seguimiento->fecha . " no creado");
    						return false;
    					}
    				}
    			}
    		}
    	} //fin foreach de IDSclases
    	return true;
    }
    
    
    
}