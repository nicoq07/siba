<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Alumnos Controller
 *
 * @property \App\Model\Table\AlumnosTable $Alumnos
 *
 * @method \App\Model\Entity\Alumno[] paginate($object = null, array $settings = [])
 */
class AlumnosController extends AppController
{
	public function initialize()
	{
		parent::initialize();
	}

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
    	$where1 = null;
    	$where2 = null;
    	$where3 = null;
    	$where4 = null;
    	
	    if ($this->request->is('post'))
	    {
	    	
	     		$esActive = $this->request->getData()['activos'];
	     		$where1= ['alumnos.active' => $esActive];
	     	
	     		$esAdolecencia =$this->request->getData()['adolecencia'];
	     		$where2= ['alumnos.programa_adolecencia' => $esAdolecencia];
	     	
	     		$esFuturo = $this->request->getData()['futuro'];
	     		$where3= ['alumnos.futuro_alumno' => $esFuturo];
	     	
	     	if (!(empty($this->request->getData()['palabra_clave'])))
	     	{
	     		$palabra = $this->request->getData()['palabra_clave'];
	     		$where4= ["alumnos.nombre LIKE '%$palabra%' OR alumnos.apellido LIKE '%$palabra%' OR alumnos.nro_documento LIKE '%$palabra%'"];
	     	}
	    }
	    else 
	    {
	    	$where1 =['alumnos.active' => true];
	    }
    	
     	$this->paginate = [
     			'conditions' => [$where1,$where2,$where3,$where4]
     	];
     
        $alumnos = $this->paginate($this->Alumnos);

        $this->set(compact('alumnos'));
        $this->set('_serialize', ['alumnos']);
    }

    /**
     * View method
     *
     * @param string|null $id Alumno id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
       
    	$ids = null;
    	
        $clasesTable= TableRegistry::get('Clases');
        $clases = $clasesTable->find()
        ->select('Clases.id')
        ->matching('Alumnos', function ($q) use ($id) {
        	return $q->where(['ClasesAlumnos.active' => true, 'ClasesAlumnos.alumno_id' => $id]);
        })
        ->toArray();
        foreach ($clases as $c)
        {
        	$ids[] = $c['id'];
        }
        if (empty($ids))
        {
        	$where = ['Clases.id IN ' => -1];
        }
        else
        {
        	$where = ['Clases.id IN ' => $ids];
        }
        
        $alumno = $this->Alumnos->get($id, [
        		'contain' => ['PagosAlumnos','Clases' => ['conditions' => $where]]
        ]);
        
        $this->set(['alumno','clases'],[$alumno,$clases]);
        $this->set('_serialize', ['alumno']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $alumno = $this->Alumnos->newEntity();
        if ($this->request->is('post')) 
        {
            $alumno = $this->Alumnos->patchEntity($alumno, $this->request->getData());
            
	            if ($ref = $this->guardarImg($this->request->getData()['foto'], $alumno->presentacion))
	            {
	            	$alumno->referencia_foto = $ref;
	            	if ($this->Alumnos->save($alumno)) 
	            	{
	            		
	            		if (!empty($this->request->getData("clases")['_ids']))
	            		{
	            			if (!$this->insertarSeguimiento($alumno->id, $this->request->getData("clases")['_ids']))
	            			{
	            				$this->Alumnos->delete($alumno);
	            				$this->Flash->error(__('Problema al crear los seguimientos. Alumno no guardado'));
	            			}
	            		}
	            		
	            		$this->Flash->success(__('Alumno guardado.'));
	            		return $this->redirect(['action' => 'index']);
	            	}
	            }
	            else
	            {
	            	$this->Flash->error(__('Problema al guardar la foto. Alumno no guardado'));
	            }
            
      	  	
        }
        $clases = $this->Alumnos->Clases->find('list', ['limit' => 200]);
        $this->set(compact('alumno', 'clases'));
        $this->set('_serialize', ['alumno']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Alumno id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $alumno = $this->Alumnos->get($id, [
            'contain' => ['Clases']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $alumno = $this->Alumnos->patchEntity($alumno, $this->request->getData());
            
			if ($alumno->isDirty("clases"))
			{
				if (!empty($this->request->getData("clases")['_ids']))
				{
					if (!$this->insertarSeguimiento($alumno->id, $this->request->getData("clases")['_ids']))
					{
						$this->Flash->error(__('Problema creando los seguimientos.'));
					}
				}
				
			}
			
            if ($this->Alumnos->save($alumno)) 
            {
                $this->Flash->success(__('Alumno actualizado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The alumno could not be saved. Please, try again.'));
        }
        $clases = $this->Alumnos->Clases->find('list', ['limit' => 200]);
        $this->set(compact('alumno', 'clases'));
        $this->set('_serialize', ['alumno']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Alumno id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $alumno = $this->Alumnos->get($id);
        if ($this->Alumnos->delete($alumno)) {
            $this->Flash->success(__('The alumno has been deleted.'));
        } else {
            $this->Flash->error(__('The alumno could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function baja($id = null)
    {
    	$this->request->allowMethod(['post', 'delete']);
    	$alumno = $this->Alumnos->get($id);
    	$alumno->active = false;
    	
    	if ($this->Alumnos->save($alumno))
    	{
    		$alumno->clases->active = false;
    		$this->Flash->success(__('Alumno dado de baja.'));
    	}
    	$this->Flash->error(__('Error al dar de baja, reintente!'));
    	
    	return $this->redirect(['action' => 'index']);
    }
    
    public function fichaInterna($id)
    {
    	$alumno = $this->Alumnos->get($id);
		$this->prepararPDF($alumno,"interna","A6","landscape");
    	$this->set(compact('alumno'));
    	
    }
    
    public function fichaExterna($id)
    {
    	$alumno = $this->Alumnos->get($id, [
    			'contain' => ['Clases']
    	]);
    	$this->prepararPDF($alumno,"externa","A5","portrait");
    	
    	$this->set(compact('alumno'));
    	
    }
    
    
    private function guardarImg($data,$alu)
    {
    	$uploadFile = WWW_ROOT  . 'img' . DS. 'alumnos' . DS;
    	// debug($data); exit;
    	if(!empty($data) && !empty($data['tmp_name']) && !$data['error'])
    	{
    		$referencia = $uploadFile .$alu. "-"  .$data['name'];
    		
    		if(!move_uploaded_file($data['tmp_name'],$referencia))
    		{
    			$this->Flash->error("Tenemos un problema para cargar la foto");
    			return false;
    		}
    		return $alu. "-"  .$data['name'];
    	}
    	$this->Flash->error("Tenemos un problema para cargar la foto");
    	return false;
    }
    
    private function prepararPDF($alumno,string $tipo,string $tipoHoja, string $orientacion)
    {
    	$this->viewBuilder()->setOptions([
    			'pdfConfig' => [
    					'margin-bottom' => 0,
    					'margin-right' => 0,
    					'margin-left' => 0,
    					'margin-top' => 0,
    					'pageSize' => $tipoHoja,
    					'orientation' => $orientacion,
    					'filename' => "Ficha $tipo de :" . $alumno->get('presentacion').'-'.$alumno->nro_documento. '.pdf'
    			]
    	]);
    }

    private function insertarSeguimiento($idAlumno, $idsClases)
    {
    	//creo un array con los dias con clave y valor para despues poder compararlo con la funcion DATE
    	$days = ['Monday' => 1, 'Tuesday' => 2, 'Wednesday' => 3, 'Thursday' => 4, 'Friday' => 5];
    	
    	//me traigo la tabla de seguimientos 
    	$Seguimientos = TableRegistry::get('SeguimientosClases');
    	$ClasesTables = TableRegistry::get('Clases');
    	
    	//Recorro los ids de clases que voy a necesitar para crear los seguimientos
    	foreach ($idsClases as  $pos => $idClase)
    	{
    		//Me traigo el obj de claseAlumno con todas las propiedasdes y asociaciones
    		$clase = $ClasesTables->get($idClase,['contain' => ['Horarios'  => ['Ciclolectivo']]]);
    		
    		if(!$clase->existeSeguimiento($idAlumno))
    		{	
	    		//Creo las fechas de incio y fin para  recorrerlas
	    		$fechaInicio = strtotime($clase->horario->ciclolectivo->fecha_inicio->format('Y-m-d'));
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
	    								'clase_id' => $clase->id,
	    								'alumno_id' => $idAlumno,
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
    
    /*
     * @param int @idAlumno id del alumno
     * @param   array $idClases clases en las que deberia seguir estando
     */
//     public function desactivarClaseAlumno($idAlumno,$idsClases)
//     {
    	
//     	if (!is_array($idsClases))
//     	{
//     		$idsClases = array($idsClases);
//     	}
//     	$cont = 0;
//     	//Me traigo la tabla de ClasesAlumnos
//     	$ClasesAlumno = TableRegistry::get('ClasesAlumnos');
//     	$idsClaseAlumno = $ClasesAlumno->find('all')
//     	->select(['ClasesAlumnos.id'])
//     	->where(['ClasesAlumnos.active' => true ,'ClasesAlumnos.alumno_id' => $idAlumno, ['ClasesAlumnos.clase_id NOT IN' => $idsClases]])
//     	->toList();
    	
//     	foreach ($idsClaseAlumno as $claseAlu)
//     	{
//     		$claseAlumno = $ClasesAlumno->get($claseAlu['id']);
//     		$claseAlumno->set("active",false);
//     		if ($ClasesAlumno->save($claseAlumno))
//     		{
//     			$cont++;
//     		}
    		
//     	}
//     	if (sizeof($idsClaseAlumno) == $cont)
//     	{
//     		return true;
//     	}
//     	else 
//     	{
//     		return false;
//     	}
//     }
    
}
