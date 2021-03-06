<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use App\Model\Entity\SeguimientosClasesAlumno;
use Migrations\Table;
/**
 * SeguimientosClasesAlumnos Controller
 *
 * @property \App\Model\Table\SeguimientosClasesAlumnosTable $SeguimientosClasesAlumnos
 *
 * @method \App\Model\Entity\SeguimientosClasesAlumno[] paginate($object = null, array $settings = [])
 */
class SeguimientosClasesAlumnosController extends AppController
{
	public function isAuthorized($user)
	{
		if(isset($user['rol_id']) &&  $user['rol_id'] == PROFESOR)
		{
			if(in_array($this->request->action, ['pIndex','edit','view','pSearch','addProfesor','pPorDia','pCargaMultiple','getDisciplinas','getDiaHorario','pReset']))
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
    	$this->paginate = [
    			'contain' => ['ClasesAlumnos' => ['Alumnos','Clases' => ['Disciplinas','Horarios','Profesores'] ], 'Calificaciones'],
    			'conditions' => ['fecha' => date('Y-m-d') ],
    			'order' => ['Horarios.hora'],
    			'limit' => 20
    	];
    	$mensaje[0]= 'Seguimientos del día de hoy.';
    	$seguimientosClasesAlumnos= $this->paginate($this->SeguimientosClasesAlumnos);
    	$this->set(compact('seguimientosClasesAlumnos','mensaje'));
    }
    public function search()
    {
    	$wherePalabraClave= $whereClase = $whereFecha = $whereProfesor = $whereYaCargados= $where6 = $palabra = null;
    	//$whereFecha = ["YEAR(fecha) = YEAR('".date('Y-m-d')."')"];
    	$mensaje  = ['Seguimientos del día del hoy'];
    	if ($this->request->is('post'))
    	{
    		$mensaje = null;
    		
    		if(!empty($this->request->getData()) && $this->request->getData() !== null )
    		{
    			if ($this->request->getData()['profesores'] > 0)
    			{
    				$profe_id = $this->request->getData()['profesores'];
    				$ProfeTable = TableRegistry::get("Profesores");
    				$profe = $ProfeTable->get($profe_id);
    				$whereProfesor= "Profesores.id = $profe_id";
    				$mensaje ['Se buscó por']["Profesor :"] = [$profe->presentacion];
    			}
    			
    			if ($this->request->getData()['modificados'])
    			{
    				$whereYaCargados= 'SeguimientosClasesAlumnos.created <> SeguimientosClasesAlumnos.modified';
    				$mensaje ['Se buscó por']["Seguimientos :"] = ["Ya cargados"];
    			}
    			
    			if (!(empty($this->request->getData()['clases'])))
    			{
    				$clase = $this->request->getData()['clases'];
    				$whereClase= ["clases.id = $clase"];
    				$clasesTable = TableRegistry::get("Clases");
    				$clase = $clasesTable->get($clase);
    				$mensaje ['Se buscó por']["Clase de :"]=   [$clase->presentacionCorta];
    			}
    			
    			$mes= $this->request->getData()['mob']['month'];
    			$year= $this->request->getData()['year']['year'];
    			if ($year && $mes)
    			{
    				$fecha =date('Y-m-d',strtotime("$year-$mes-01"));
    				$whereFecha = ["EXTRACT(YEAR_MONTH FROM fecha) = EXTRACT(YEAR_MONTH FROM '$fecha')"];
    				$mensaje ['Se buscó por']["Mes y año :"]= [date('m-Y',strtotime($fecha))];
    			}
    			elseif ($year)
    			{
    				$fecha =date('Y-m-d',strtotime("$year-01-01"));
    				$whereFecha = ["YEAR(fecha) = YEAR('$fecha')"];
    				$mensaje['Se buscó por']["Año :"]=  [date('Y',strtotime($fecha))];
    			}
    			elseif ($mes)
    			{
    				$fecha =date('Y-m-d',strtotime("2000-$mes-01"));
    				$whereFecha = ["MONTH(fecha) = MONTH('$fecha')"];
    				$mensaje['Se buscó por']["Mes:"]=  [date('m',strtotime($fecha))];
    			}
    			else {
    				$fecha =date('Y-m-d');
    				$whereFecha = ["YEAR(fecha) = YEAR('$fecha')"];
    				$mensaje['Se buscó por']["Año :"]=  [date('Y',strtotime($fecha))];
    			}
    			if (!(empty($this->request->getData()['palabra_clave'])))
    			{
    				$palabra = $this->request->getData()['palabra_clave'];
    				$wherePalabraClave=  ["(alumnos.nombre LIKE '%".addslashes($palabra)."%' OR alumnos.apellido LIKE '%".addslashes($palabra)."%' OR
							 alumnos.nro_documento LIKE '%".addslashes($palabra)."%' OR  CONCAT_WS(' ',alumnos.nombre ,alumnos.apellido) LIKE '".addslashes($palabra)."'
	     				OR  CONCAT_WS(' ',alumnos.apellido ,alumnos.nombre) LIKE '".addslashes($palabra)."'
							OR profesores.nombre LIKE '%".addslashes($palabra)."%'  OR profesores.apellido LIKE '%".addslashes($palabra)."%')"
    				];
    				$mensaje['Se buscó por']["Alumno :"] = [$palabra] ;
    			}
    			$this->request->session()->write('searchCond', [$wherePalabraClave,$whereClase,$whereFecha,$whereProfesor,$whereYaCargados]);
    			$this->request->session()->write('search_key', $palabra);
    		}
    	}
    	if ($this->request->session()->check('searchCond')) {
    		$conditions = $this->request->session()->read('searchCond');
    	} else {
    		$conditions = null;
    		if (!empty($fecha))
    		{
    			$where6 = ['YEAR(ciclolectivo.fecha_inicio)' => $year];
    		}
    		else {
    			$where6 = ['YEAR(ciclolectivo.fecha_inicio)' => date('Y')];
    		}
    	}
    	$this->paginate = [
    			'contain' => ['ClasesAlumnos' => ['Alumnos','Clases' => ['Disciplinas','Horarios','Profesores'] ], 'Calificaciones'],
    			'conditions' => $conditions,
    			'limit' => 20
    	];
    	
    	
    	
    	$seguimientosClasesAlumnos= $this->paginate($this->SeguimientosClasesAlumnos);
    	$this->set(compact('seguimientosClasesAlumnos','mensaje'));
    	
    	$this->render('/SeguimientosClasesAlumnos/index');
    }
    /**
     * View method
     *
     * @param string|null $id Seguimientos Clases Alumno id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $seguimientosClasesAlumno = $this->SeguimientosClasesAlumnos->get($id, [
            'contain' => ['ClasesAlumnos' => ['Clases','Alumnos'], 'Calificaciones']
        ]);

        $this->set('seguimientosClasesAlumno', $seguimientosClasesAlumno);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $seguimientosClasesAlumno = $this->SeguimientosClasesAlumnos->newEntity();
        if ($this->request->is('post')) {
        	debug($this->request->getData()); exit;
            $seguimientosClasesAlumno = $this->SeguimientosClasesAlumnos->patchEntity($seguimientosClasesAlumno, $this->request->getData());
            if ($this->SeguimientosClasesAlumnos->save($seguimientosClasesAlumno)) {
                $this->Flash->success(__('Seguimiento guardado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Error, reintente!.'));
        }
        $clasesAlumnos = $this->SeguimientosClasesAlumnos->ClasesAlumnos->find('list', ['limit' => 200]);
        $calificaciones = $this->SeguimientosClasesAlumnos->Calificaciones->find('list', ['limit' => 200]);
        $this->set(compact('seguimientosClasesAlumno', 'clasesAlumnos', 'calificaciones'));
        $this->set('_serialize', ['seguimientosClasesAlumno']);
    }
    
    
    public function addProfesor($claseAlumno = null)
    {
    	$seg = $this->SeguimientosClasesAlumnos->find()
    	->where(['clase_alumno_id' => $claseAlumno,'fecha' => date('Y-m-d',strtotime('now'))]);
    	if($seg->count() == 0)
    	{
    		$this->Flash->error(__('El día de hoy no se puede cargar este seguimiento. Dirigase a Ver Seguimientos.'));
    		return $this->redirect($this->referer());
    	}
    	$seguimientosClasesAlumno = $this->SeguimientosClasesAlumnos->get($seg->first()->id, [
    			'contain' => ['ClasesAlumnos']
    	]);
    	if ($this->request->is(['patch', 'post', 'put'])) {
    		$seguimientosClasesAlumno = $this->SeguimientosClasesAlumnos->patchEntity($seguimientosClasesAlumno, $this->request->getData());
    		if ($this->SeguimientosClasesAlumnos->save($seguimientosClasesAlumno)) {
    			$this->Flash->success(__('Seguimiento guardado'));
    			$url = ['controller' => 'Clases' ,'action' => 'pView', $seguimientosClasesAlumno->clases_alumno->clase_id];
    			return $this->redirect($url);
    		}
    		$this->Flash->error(__('El seguimiento no ha podido guardarse, reintente!.'));
    	}
    	$ClasesAlumnos = $this->SeguimientosClasesAlumnos->ClasesAlumnos->find('list', ['limit' => 200]);
    	$calificaciones = $this->SeguimientosClasesAlumnos->Calificaciones->find('list', ['limit' => 200]);
    	$this->set(compact('seguimientosClasesAlumno', 'ClasesAlumnos', 'calificaciones'));
    	$this->set('_serialize', ['seguimientosClasesAlumno']);
    	$this->render('/SeguimientosClasesAlumnos/edit/');
    	
    }

    /**
     * Edit method
     *
     * @param string|null $id Seguimientos Clases Alumno id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $seguimientosClasesAlumno = $this->SeguimientosClasesAlumnos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $seguimientosClasesAlumno = $this->SeguimientosClasesAlumnos->patchEntity($seguimientosClasesAlumno, $this->request->getData());
            if ($this->SeguimientosClasesAlumnos->save($seguimientosClasesAlumno)) {
            	$this->Flash->success(__('Seguimiento guardado'));
            	
                $url = ['action' => 'index'];
                if($this->Auth->user('rol_id') === PROFESOR)
                {
                	$url = ['action' => 'pIndex'];
                }
                return $this->redirect($url);
            }
            $this->Flash->error(__('El seguimiento no ha podido guardarse, reintente!.'));
        }
        $ClasesAlumnos = $this->SeguimientosClasesAlumnos->ClasesAlumnos->find('list', ['limit' => 200]);
        $calificaciones = $this->SeguimientosClasesAlumnos->Calificaciones->find('list', ['limit' => 200]);
        $this->set(compact('seguimientosClasesAlumno', 'ClasesAlumnos', 'calificaciones'));
        $this->set('_serialize', ['seguimientosClasesAlumno']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Seguimientos Clases Alumno id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $seguimientosClasesAlumno = $this->SeguimientosClasesAlumnos->get($id);
        if ($this->SeguimientosClasesAlumnos->delete($seguimientosClasesAlumno)) {
            $this->Flash->success(__('The seguimientos clases alumno has been deleted.'));
        } else {
            $this->Flash->error(__('The seguimientos clases alumno could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    
    public  function informe()
    {
    	if ($this->request->is('post')) 
    	{
    		$alumno = null;
    		$clase = null;
    		if($this->request->getData('clases') && $this->request->getData('alumnos'))
    		{
    			$idClase = $this->request->getData('clases');
    			$idAlumno = $this->request->getData('alumnos');
				$alumno = TableRegistry::get('Alumnos')->get($idAlumno);
				$clase= TableRegistry::get('Clases')->get($idClase,['contain' => 'Disciplinas']);
				
    			return  $this->redirect(['action' => 'listado_pdf',$idAlumno,$idClase,'_ext' => 'pdf']);
    		}  		
    	}
    	
    	$this->set('seg');
    }
    
    public function listadoPdf($idAlumno,$idClase)
    {
    	$seguimientos = $this->SeguimientosClasesAlumnos->find('all',[
    			'contain' => ['ClasesAlumnos','Calificaciones'],
    			'order' => ['SeguimientosClasesAlumnos.fecha' => 'ASC']
    			
    	])
    	->matching('ClasesAlumnos.Alumnos', function ($q) use($idAlumno){
    		return $q->where(['Alumnos.id' => $idAlumno]);
    	})
    	->matching('ClasesAlumnos.Clases', function ($q) use($idClase){
    		return $q->where(['Clases.id' => $idClase]);
     	})
    	->where(['DATE(SeguimientosClasesAlumnos.fecha) <= ' => date('Y-m-d')]) 
     	->order('SeguimientosClasesAlumnos.fecha')
     	;
     	
    	
    	$alumno = TableRegistry::get('Alumnos')->get($idAlumno);
    	$clase = TableRegistry::get('Clases')->get($idClase,
    			[
    					'contain' => ['Profesores','Disciplinas']
    			]);
    	$this->prepararListadoSeguimiento($clase->disciplina->descripcion, $alumno->presentacion, "A4", "portrait");
    	
//     	->matching('ClasesAlumnos.Clases.Profesores', function ($q) use($idClase){
//     		return $q->where(['Clases.id' => $idClase]);
//     	})->toArray();
    	$this->set(compact('seguimientos','clase','alumno'));
    }
    
   
    
    public function pIndex()
    {
    	$this->paginate = [
				'contain' => ['ClasesAlumnos' => ['Alumnos','Clases' => ['Disciplinas','Horarios' => ['Ciclolectivo'],'Profesores'] ] , 'Calificaciones'],
				'conditions' => ['SeguimientosClasesAlumnos.created = SeguimientosClasesAlumnos.modified',
    					'DATE(SeguimientosClasesAlumnos.fecha) <= ' => date('Y-m-d'),'clases.profesor_id' => $this->Auth->user('profesor_id'),
    							'YEAR(Ciclolectivo.fecha_inicio)' => date('Y'), 'ClasesAlumnos.active' => true],
    			'finder' => 'Ordered',
    	];
    	$seguimientosClasesAlumnos = $this->paginate($this->SeguimientosClasesAlumnos);
    	$mensaje['Se buscó: '][0]= 'Seguimientos que me faltan cargar hasta hoy.';
    	
    	$this->set(compact('seguimientosClasesAlumnos','mensaje'));
    }
    public function pPorDia()
    {
    	$idProfesor = $this->Auth->user('profesor_id');
    	$dia =  date('l');
    	$fecha = date('Y-m-d');
    	
    	$rFechas = $this->SeguimientosClasesAlumnos->find('all')
    	->select('fecha')
    	->contain(['ClasesAlumnos' => ['Clases' => ['Horarios' => ['Ciclolectivo']]]])
    	    	->where(['Clases.profesor_id' => $idProfesor,
    	    			'SeguimientosClasesAlumnos.created = SeguimientosClasesAlumnos.modified',
    	    			'DATE(SeguimientosClasesAlumnos.fecha) <=' => date('Y-m-d'),
						'YEAR(Ciclolectivo.fecha_inicio)' => date('Y'),
						'ClasesAlumnos.active' => true
    	    	])
    	->distinct('fecha');
    	
    	if ($rFechas->count() > 0)
    	{
    		$fechas = array();
    		foreach ($rFechas as $f)
    		{
    			$fechas[$f->fecha->format('d-m-Y')]=$f->fecha->format('d-m-Y');
    		}
    	}
    	else
    	{
    		$fechas = false;
    	}
    	if ($this->request->is('post'))
    	{
    		if(!empty($this->request->getData()) && $this->request->getData() !== null )
    		{
    			if ( $fecha = $this->request->getData()['fechas'] != '')
    			{
    				$fecha = $this->request->getData()['fechas'];
    				$dia = date('l',strtotime($fecha));
    			}
    		}	 
    	}
    	
    	$clasesHorarios = TableRegistry::get('Clases')->find('all')
    	->select(['Horarios.id'])
    	->contain(['ClasesAlumnos' => ['conditions' => ['ClasesAlumnos.active' => true]] , 'Horarios' => ['Ciclolectivo' => ['conditions' => ['YEAR(Ciclolectivo.fecha_inicio)' => date('Y')]]]])
		->where(['Clases.profesor_id' => $idProfesor, 'Horarios.nombre_dia' =>$dia]);

    	$horarios = TableRegistry::get('Horarios')->find('all')
		->contain(['Clases' => 
					['conditions' => 
							['Clases.profesor_id' => $idProfesor]]
				])
				->contain(['Clases' => ['ClasesAlumnos' => ['conditions' => ['ClasesAlumnos.active' => true]] ]])
    	->where(['Horarios.id IN' => $clasesHorarios])
    	->orderAsc("hora");
    	
	

    	$fecha =  bin2hex ($fecha);
    	$this->set(compact('horarios','fechas','dia','fecha'));
    }
    
    public function pCargaMultiple($idClase, $fecha)
    {
    	$fecha = hex2bin($fecha);
    	
    	$seguimientosClasesAlumnos = $this->SeguimientosClasesAlumnos->find('all')
		->contain(['ClasesAlumnos' => ['Alumnos','Clases']])
    	->where(['Clases.id' => $idClase, 'DATE(fecha)' => date('Y-m-d',strtotime($fecha)),
				'SeguimientosClasesAlumnos.created = SeguimientosClasesAlumnos.modified',
				'ClasesAlumnos.active' => true
    	])
    	->toArray();
    	
    	
    	if ($this->request->is(['patch', 'post', 'put'])) {
    		
    		if ($this->request->getData()['id'] != '')
    		{
    			$id = $this->request->getData()['id'];
    			$seguimientosClasesAlumno = $this->SeguimientosClasesAlumnos->get($id);
    			$seguimientosClasesAlumno = $this->SeguimientosClasesAlumnos->patchEntity($seguimientosClasesAlumno, $this->request->getData());
    			if ($this->SeguimientosClasesAlumnos->save($seguimientosClasesAlumno)) {
    				$this->Flash->success(__('Seguimiento guardado'));
    				
    				return $this->redirect($this->referer());
    			}
    			$this->Flash->error(__('El seguimiento no ha podido guardarse, reintente!.'));
    		}
    	}
    	
    	$clase = TableRegistry::get('Clases')->get($idClase);
    	$calificaciones = $this->SeguimientosClasesAlumnos->Calificaciones->find('list', ['limit' => 200]);
    	$ClasesAlumnos = $this->SeguimientosClasesAlumnos->ClasesAlumnos->find('list');
    	$this->set(compact('seguimientosClasesAlumnos', 'calificaciones','clase','fecha'));
    	
    }
    
    public function pSearch()
    {
    	$wherePalabraClave= $whereDisciplinas =	$whereClase = $whereFecha = $whereYaCargados 
    	= $whereFaltanCargar  = $palabra = $mensaje = $whereHastaHoy =null;
    	
    	$whereProfesor = ['Clases.profesor_id' => $this->Auth->user('profesor_id')];
    	
    	if ($this->request->is('post'))
    	{
    		if(!empty($this->request->getData()) && $this->request->getData() !== null )
    		{
    			if(!empty($this->request->getData()) && $this->request->getData() !== null )
    			{
	    				if ($this->request->getData()['faltantes'])
	    				{
	    					$whereFaltanCargar= 'SeguimientosClasesAlumnos.created = SeguimientosClasesAlumnos.modified';
	    					$mensaje ['Se buscó por']["Seguimientos :"] = ["Faltantes de cargar"];
	    				}
	    				if ($this->request->getData()['modificados'])
	    				{
	    					$whereYaCargados= 'SeguimientosClasesAlumnos.created <> SeguimientosClasesAlumnos.modified';
	    					$mensaje ['Se buscó por']["Seguimientos :"] = ["Ya cargados"];
	    				}
	    				if (!(empty($this->request->getData()['disciplinas'])))
	    				{
	    					$disc = $this->request->getData()['disciplinas'];
	    					$whereDisciplinas= ["Clases.disciplina_id = $disc"];
	    					$discTable = TableRegistry::get("Disciplinas");
	    					$disciplina = $discTable->get($disc);
	    					$mensaje ['Se buscó por']["Disciplina :"]=   [$disciplina->descripcion];
	    				}
	    				if (!(empty($this->request->getData()['clases'])))
	    				{
	    					$clase = $this->request->getData()['clases'];
	    					$whereClase= ["clases.id = $clase"];
	    					$clasesTable = TableRegistry::get("Clases");
	    					$clase = $clasesTable->get($clase);
	    					$mensaje ['Se buscó por']["Clase de :"]=   [$clase->presentacionCorta];
	    				}
	    				
	    				$year= $this->request->getData()['year']['year'];
	    				if ($year)
	    				{
	    					$fecha =date('Y-m-d',strtotime("$year-01-01"));
	    					$whereFecha = ["YEAR(fecha) = YEAR('$fecha')"];
	    					$hoy =date('Y-m-d');
	    					$whereHastaHoy = ["DATE(fecha) <=  '$hoy'"];
	    					$mensaje['Se buscó por']["Año :"]=  [date('Y',strtotime($fecha))];
	    				}
	    				else {
	    					$fecha =date('Y-m-d');
	    					$whereFecha = ["YEAR(fecha) = YEAR('$fecha')"];
	    					$mensaje['Se buscó por']["Año :"]=  [date('Y',strtotime($fecha))];
	    				}
	    				if (!(empty($this->request->getData()['palabra_clave'])))
	    				{
	    					$palabra = $this->request->getData()['palabra_clave'];
	    					$wherePalabraClave=  ["(alumnos.nombre LIKE '%".addslashes($palabra)."%' OR alumnos.apellido LIKE '%".addslashes($palabra)."%' OR
								 alumnos.nro_documento LIKE '%".addslashes($palabra)."%' OR  CONCAT_WS(' ',alumnos.nombre ,alumnos.apellido) LIKE '".addslashes($palabra)."'
		     				OR  CONCAT_WS(' ',alumnos.apellido ,alumnos.nombre) LIKE '".addslashes($palabra)."'
								)"
	    					];
	    					$mensaje['Se buscó por']["Alumno :"] = [$palabra] ;
	    				}
	    			
	    			$this->request->session()->write('searchCond', [$whereHastaHoy,$wherePalabraClave,$whereFecha,$whereClase,$whereYaCargados,$whereFaltanCargar,$whereProfesor,$whereDisciplinas]);
	    			$this->request->session()->write('search_key', $palabra);
	    		}
    		}
    	}
    	if ($this->request->session()->check('searchCond')) {
    		$conditions = $this->request->session()->read('searchCond');
    	} else {
    		$conditions = null;
    	}
    	
    	$clases = $this->SeguimientosClasesAlumnos->ClasesAlumnos->Clases->find('list')->find('ordered')->contain('Horarios')
    	->where(['Clases.profesor_id' => $this->Auth->user('profesor_id')]);
    	
    	$this->paginate = [
    			'contain' => ['ClasesAlumnos' => ['Alumnos','Clases' => ['Disciplinas','Horarios' => ['Ciclolectivo'],'Profesores'] ] , 'Calificaciones'],
    			'conditions' => [$conditions,'ClasesAlumnos.active' => true],
    			'finder' => 'ordered',
    			
    	];
    	$seguimientosClasesAlumnos = $this->paginate($this->SeguimientosClasesAlumnos);
    	
    	
    	
    	$this->set(compact('seguimientosClasesAlumnos','mensaje'));
    	
    	$this->render('/SeguimientosClasesAlumnos/p_index');
    }
    public function reset()
    {
    	if ($this->request->session()->check('searchCond')) {
    		$this->request->session()->delete('searchCond');
    	}
    	$this->redirect("/SeguimientosClasesAlumnos/index");
    }
    public function pReset()
    {
    	if ($this->request->session()->check('searchCond')) {
    		$this->request->session()->delete('searchCond');
    	}
    	$this->redirect("/SeguimientosClasesAlumnos/p_index");
    }
    public function getProfesoresPorAnio() {
    	$this->autoRender = false; // We don't render a view in this example
    	$year = $this->request->getQuery('year');
    	$profes = TableRegistry::get('Profesores')->find('all')
    	->distinct('Profesores.id')
    	->matching('Clases.Horarios.Ciclolectivo')
    	->where(['YEAR(Ciclolectivo.fecha_inicio)' => $year])
    	->order(['Profesores.nombre','Profesores.apellido'])
    	;
    	$i = 0;
    	foreach ($profes as $d){
    		$i++;
    		
    		if($i != $profes->count())
    		{
    			echo $d->id.'-'.$d->presentacion.".";
    		}
    		else {
    			echo $d->id.'-'.$d->presentacion;
    		}
    	}
    	//print $array;
    	exit;
    }
    public function getDisciplinas() {
    	$this->autoRender = false; // We don't render a view in this example
    	$profesor_id = $this->request->getQuery('profesor_id');
    	$year = $this->request->getQuery('year');
    	$discs = TableRegistry::get('Disciplinas')->find('all')
    	//	->select(['Disciplinas.id' => 'id','Disciplinas.descripcion' => 'desc' ])
    	->distinct('Disciplinas.descripcion')
    	->matching('Clases.Horarios.Ciclolectivo')
    	->where(['Clases.profesor_id' => $profesor_id, 'YEAR(Ciclolectivo.fecha_inicio)' => $year])
    	->order('Disciplinas.descripcion')
    	;
    	$i = 0;
    	foreach ($discs as $d){
    		$i++;
    		
    		if($i != $discs->count())
    		{
    			echo $d->id.'-'.$d->descripcion.".";
    		}
    		else {
    			echo $d->id.'-'.$d->descripcion;
    		}
    	}
    	//print $array;
    	exit;
    }
    public function getDiaHorario()
    {
    	$this->autoRender = false; // We don't render a view in this example
    	$disciplina_id = $this->request->getQuery('idDisciplina');
    	$profesor_id= $this->request->getQuery('profesor_id');
    	$year = $this->request->getQuery('year');
    	$clases = TableRegistry::get('Clases')->find('all')
    	//	->select(['Disciplinas.id' => 'id','Disciplinas.descripcion' => 'desc' ])
    	->contain(['Disciplinas','Horarios' => ['Ciclolectivo']])
    	->where(['Clases.profesor_id' => $profesor_id, 'Clases.disciplina_id' => $disciplina_id,'YEAR(Ciclolectivo.fecha_inicio)' => $year])
    	//->find('currentYear')
    	->order('Horarios.num_dia','Horarios.hora')
    	;
    	$i = 0;
    	foreach ($clases as $c){
    		$i++;
    		$dia = __($c->horario->nombre_dia);
    		if($i != $clases->count())
    		{
    			
    			echo  $c->id."-".$dia.' '.$c->horario->hora->format('H:i').".";
    		}
    		else {
    			echo  $c->id."-".$dia.' '.$c->horario->hora->format('H:i');
    		}
    		
    	}
    	
    	//print $array;
    	exit;
    }
    
    public function getAlumnoClase()
    {
    	$this->autoRender = false; // We don't render a view in this example
    	$clase = $this->request->getQuery('clase');
    	$clases = TableRegistry::get('Clases')->find('all')
    	->select(['alumnos.id',"alumnos.apellido" ,"alumnos.nombre"])
    	->matching('Alumnos')
    	->where(['Clases.id' => $clase])
    	->order('Alumnos.apellido','Alumnos.nombre')
    	;
    	$i = 0;
    	foreach ($clases as $c){
    		$i++;
     		if($i != $clases->count())
     		{
     			echo  $c->alumnos['id']."-".$c->alumnos['apellido']." ".$c->alumnos['nombre'].".";
     		}
     		else {
     			echo $c->alumnos['id']."-".$c->alumnos['apellido']." ".$c->alumnos['nombre'];
     		}
    		
    		
    	}
    	
    	exit;
    }
    
    
    private function prepararListadoSeguimiento($clase,$alumno,$tipoHoja,$orientacion)
    {
    	$this->viewBuilder()->setOptions([
    			'pdfConfig' => [
    					'margin-bottom' => 0,
    					'margin-right' => 0,
    					'margin-left' => 0,
    					'margin-top' => 0,
    					'pageSize' => $tipoHoja,
    					'orientation' => $orientacion,
    					'filename' => "Seguimientos  de ".$alumno.' en '.$clase.'.pdf'
    			]
    	]);
    }
}
