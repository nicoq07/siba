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
		if(isset($user['rol_id']) &&  $user['rol_id'] == PROFESOR)
		{
			if(in_array($this->request->action, ['pView']))
			{
				return true;
			}
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
	   	   
		$whereProfesores = $whereHorarios = $whereDisciplinas = $condiciones = null;
		if ($this->request->is('post'))
		{
			if ($this->request->getData('profesores') != '')
			{
				$profesor_id = $this->request->getData('profesores');
				$whereProfesores = ['Clases.profesor_id' => $profesor_id];
				
			}
			if ($this->request->getData('disciplinas') != '')
			{
				$disciplina_id = $this->request->getData('disciplinas');
				$whereDisciplinas= ['Clases.disciplina_id' => $disciplina_id];
			}
			if ($this->request->getData('horarios') != '')
			{
				$horarios_id = $this->request->getData('horarios');
				$whereHorarios= ['Clases.horario_id' => $horarios_id];
			}
			$condiciones = [$whereProfesores,$whereDisciplinas,$whereHorarios];
			
		}
		
		$clases = $this->Clases->find('all')
		->contain(['Profesores', 'Horarios' => ['Ciclolectivo'] , 'Disciplinas'])
		->where($condiciones)
		->find('orderedIndex')
		->find('currentYear');
		
		$profesores = $this->Clases->Profesores->find('list')
		->where(['active' => true]) ;
		$auxClases = $this->Clases->find('all')->contain(['Profesores', 'Horarios' => ['Ciclolectivo'] , 'Disciplinas'])
		->select(['Disciplinas.id'])
		->find('currentYear');
		$disciplinas = $this->Clases->Disciplinas->find('list')
		->where(['active' => true])->where(['Disciplinas.id IN' => $auxClases])
		->order('descripcion')
		;
		$horarios = $this->Clases->Horarios->find('list')
		->contain('Ciclolectivo')->find('currentYear')->find('ordered')
		->where(['Horarios.active' => true]) ;
		
		$clases = $this->paginate($clases,
				[
						'limit' => 50
				]);
		
		
		$this->set(compact('clases','profesores','disciplinas','horarios'));
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
		
        
        $this->set(['clase'], [$clase,]);
    }
    
    public function pView($id = null)
    {
    	$clase = $this->Clases->get($id, [
    	    'contain' => ['Profesores', 'Horarios', 'Disciplinas', 'Alumnos' ]
    	]);
    	$clasesAlumnosTable = TableRegistry::get('ClasesAlumnos');
    	$clasesAlumnos = $clasesAlumnosTable->find('all')
    	->contain(['SeguimientosClasesAlumnos' => ['conditions' => ['DATE(SeguimientosClasesAlumnos.fecha)' => date('Y-m-d')]]])
    	->where(['ClasesAlumnos.clase_id' => $clase->id, 'ClasesAlumnos.active' => true]);
    	
    	
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
    		
    		$clase->set('alumno_count',count($clase->alumnos));
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
    	$horarios = $this->Clases->Horarios->find('list')->contain('Ciclolectivo')->find('ordered')->find('currentYear');
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
		$horarioDiaAnterior = $horarioDiaNuevo = $cambioDia = false;
    	$clase = $this->Clases->get($id, [
    			'contain' => ['Alumnos']
    	]);
    	if ($this->request->is(['patch', 'post', 'put'])) {

    		$clase = $this->Clases->patchEntity($clase, $this->request->getData());
			
    		if($clase->isDirty('horario_id'))
    		{
    			
    			$horarioDiaAnterior= TableRegistry::get('Horarios')->get($clase->getOriginal('horario_id'))->get('nombre_dia');
    			$horarioDiaNuevo= TableRegistry::get('Horarios')->get($clase->horario_id)->get('nombre_dia');
    			if ($horarioDiaAnterior === $horarioDiaNuevo)
    			{
    				$cambioDia = false;
    			}
    			else 
    			{
    				$cambioDia = true;
    			}
    			
			}
			
    		$clase->set('alumno_count',count($clase->alumnos));
    		if ($this->Clases->save($clase))
    		{
				$r = 0;
				/**	
				 * Acá ver si cambio de día, borrar los seguimientos posteriores
				 * actualizar el horario en la clase
				 * crear los seguimientos nuevos segun el horario nuevo de la clase
				 */
				 //aca ya tengo la clase con el horario nuevo.
    			if ($cambioDia)
    			{
    			    $clasesAlumnos = TableRegistry::get('ClasesAlumnos');
    			    $idClasesAlumnos = $clasesAlumnos->find('all')
    			    ->select('ClasesAlumnos.id')
    			    ->distinct(['ClasesAlumnos.id'])
    			    ->where(['clase_id' => $clase->id]);
    			    
    			    $idAlumnos =  $clasesAlumnos->find('all')
    			    ->select('ClasesAlumnos.alumno_id')
    			    ->distinct(['ClasesAlumnos.alumno_id'])
    			    ->where(['clase_id' => $clase->id]);
    			    
    			    $Seguimientos = TableRegistry::get('SeguimientosClasesAlumnos');
    			    $idSeguimientos = $Seguimientos->find('all')
    			    ->select('SeguimientosClasesAlumnos.id')
    			    ->distinct(['SeguimientosClasesAlumnos.id'])
    			    ->where(["DATE(SeguimientosClasesAlumnos.fecha) > " => date('Y-m-d'), "SeguimientosClasesAlumnos.clase_alumno_id IN" => $idClasesAlumnos]);
    			    
    			   
    			    if($idSeguimientos->count() > 0)
    			    {
    			       
        			    $r= $checkBorrado = $Seguimientos->deleteAll(['SeguimientosClasesAlumnos.id IN' => $idSeguimientos->extract('id')->toList()]);
    
        			    if (!$checkBorrado) {
        			        $this->Flash->error("Seguimientos posteriores no borrados");
        			    }
    			    }
    			    
    			  
    			   $checkActSeg = $this->insertarSeguimiento($clase->id, $idAlumnos->extract('alumno_id')->toList(),true);
    			   if ($checkActSeg)
    			   {
    			       $this->Flash->success(__("Se actualizaron $r seguimientos"));
    			   }
    				    				
    			}
    			
    			$this->Flash->success(__("Clase guardada."));
    			
    			return $this->redirect(['action' => 'index']);
    		}
    		$this->Flash->error(__('Error guardando la clase'));
    	}
    	$profesores = $this->Clases->Profesores->find('list')->find('ordered')->where(['Profesores.active' => true]);
    	$horarios = $this->Clases->Horarios->find('list')->contain('Ciclolectivo')->find('ordered')->find('currentYear');
    	$disciplinas = $this->Clases->Disciplinas->find('list', ['limit' => 200])->find('ordered');
    	$this->set(compact('clase', 'profesores', 'horarios', 'disciplinas'));
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
    
    private function insertarSeguimiento($idClase,$idsAlumnos, $esEdicion = false)
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
    		if(!$claseAlumno->existeSeguimiento($idAlumno) || $esEdicion)
    		{
    			
    			$alu = $AlumnosTable->get($idAlumno);
    			
    			//Creo las fechas de incio y fin para  recorrerlas
    			$fechaInicio = null;
    			if ($clase->horario->ciclolectivo->fecha_inicio->format('Y-m-d') >= date('Y-m-d'))
    			{
    			    $fechaInicio = strtotime($clase->horario->ciclolectivo->fecha_inicio->format('Y-m-d'));
    			}
    			else
    			{
    			    $fechaInicio = strtotime(date('Y-m-d'));
    			}
    			
    			
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
    
    public function searchCurrentYear()
    {
    	$this->autoRender = false;
    	$this->paginate = null;
    	$year = $this->request->getData()['cboYear']['year'];
    	if (is_numeric($year))
    	{
    		$where = ['YEAR(Ciclolectivo.fecha_inicio)' => $year];
    		
    		$this->paginate = [
    				'contain' => ['Profesores', 'Horarios' => ['Ciclolectivo'] , 'Disciplinas'],
    				'finder' => 'orderedIndex',
    				'conditions' => $where,
    				'limit' => 100
    		];
    		$clases = $this->paginate($this->Clases);
    		$this->set(compact('clases'));
    		$this->set('_serialize', ['clases']);
    	}
    	$this->render('/Clases/index');
    	
    }
    
    
}
