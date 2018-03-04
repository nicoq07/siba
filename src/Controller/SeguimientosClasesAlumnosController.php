<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use App\Model\Entity\SeguimientosClasesAlumno;
use Migrations\Table;
use Cake\I18n\Time;
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
			if(in_array($this->request->action, ['pIndex','edit','view','pSearch',
					'addProfesor','reset','pPorDia','pCargaMultiple']))
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
    	
    	$clases = $this->SeguimientosClasesAlumnos->ClasesAlumnos->Clases->find('list')->find('ordered')->contain('Horarios');
    	
        $this->paginate = [
        		'contain' => ['ClasesAlumnos' => ['Alumnos','Clases' => ['Disciplinas','Horarios','Profesores'] ] , 'Calificaciones'],
        		'conditions' => ['SeguimientosClasesAlumnos.created = SeguimientosClasesAlumnos.modified'],
        		'finder' => 'ordered'
        ];
        $seguimientosClasesAlumnos = $this->paginate($this->SeguimientosClasesAlumnos);
        $this->set(compact('seguimientosClasesAlumnos','clases'));
    }
    public function search()
    {
    	$where1 = $where2 = $where3 = $where4 = $where5 = $palabra = null;
    	if ($this->request->is('post'))
    	{
    		if(!empty($this->request->getData()) && $this->request->getData() !== null )
    		{
    			if ($this->request->getData()['modificados'])
    			{
    				$where5= 'SeguimientosClasesAlumnos.created <> SeguimientosClasesAlumnos.modified';
    			}
    			
    			if (!(empty($this->request->getData()['clases'])))
    			{
    				$clase = $this->request->getData()['clases'];
    				$where2= ["clases.id = $clase"];
    			}
    			
    			$mes= $this->request->getData()['mob']['month'];
    			$year= $this->request->getData()['year']['year'];
    			if ($year && $mes)
    			{
    				$fecha =date('Y-m-d',strtotime("$year-$mes-01"));
    				$where3 = ["EXTRACT(YEAR_MONTH FROM fecha) = EXTRACT(YEAR_MONTH FROM '$fecha')"];
    			}
    			elseif ($year)
    			{
    				$fecha =date('Y-m-d',strtotime("$year-01-01"));
    				$where3 = ["YEAR(fecha) = YEAR('$fecha')"];
    			}
    			elseif ($mes)
    			{
    				$fecha =date('Y-m-d',strtotime("2000-$mes-01"));
    				$where3 = ["MONTH(fecha) = MONTH('$fecha')"];
    			}
    			if (!(empty($this->request->getData()['palabra_clave'])))
    			{
    				$palabra = $this->request->getData()['palabra_clave'];
    				$where1= $where4= ["(alumnos.nombre LIKE '%".addslashes($palabra)."%' OR alumnos.apellido LIKE '%".addslashes($palabra)."%' OR
							 alumnos.nro_documento LIKE '%".addslashes($palabra)."%' OR  CONCAT_WS(' ',alumnos.nombre ,alumnos.apellido) LIKE '".addslashes($palabra)."'
	     				OR  CONCAT_WS(' ',alumnos.apellido ,alumnos.nombre) LIKE '".addslashes($palabra)."'
							OR profesores.nombre LIKE '%".addslashes($palabra)."%'  OR profesores.apellido LIKE '%".addslashes($palabra)."%')"
    				];
    			}
    			$this->request->session()->write('searchCond', [$where1,$where2,$where3,$where4,$where5]);
    			$this->request->session()->write('search_key', $palabra);
    		}
    	}
    	
    	if ($this->request->session()->check('searchCond')) {
    		$conditions = $this->request->session()->read('searchCond');
    	} else {
    		$conditions = null;
    	}
    	
    	$this->paginate = [
    			'contain' => ['ClasesAlumnos' => ['Alumnos','Clases' => ['Disciplinas','Horarios','Profesores'] ] , 'Calificaciones'],
    			'conditions' => $conditions,
    			'limit' => 20
    	];
    	
    	$clases = $this->SeguimientosClasesAlumnos->ClasesAlumnos->Clases->find('list')->find('ordered')->contain('Horarios');
    	
    	$seguimientosClasesAlumnos= $this->paginate($this->SeguimientosClasesAlumnos);
    	
    	$this->set(compact('seguimientosClasesAlumnos','clases'));
    	
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
            $seguimientosClasesAlumno = $this->SeguimientosClasesAlumnos->patchEntity($seguimientosClasesAlumno, $this->request->getData());
            if ($this->SeguimientosClasesAlumnos->save($seguimientosClasesAlumno)) {
                $this->Flash->success(__('Seguimiento guardado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Error, reintente!.'));
        }
        $ClasesAlumnos = $this->SeguimientosClasesAlumnos->ClasesAlumnos->find('list', ['limit' => 200]);
        $calificaciones = $this->SeguimientosClasesAlumnos->Calificaciones->find('list', ['limit' => 200]);
        $this->set(compact('seguimientosClasesAlumno', 'ClasesAlumnos', 'calificaciones'));
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
    	$where = null;
    	$arrayAlumnos = array(null);
    	if ($this->request->is('post')) 
    	{
    		$alumno;
    		$clase;
    		if($this->request->getData('clases'))
    		{
    			$idClase = $this->request->getData('clases');
    			$clase = TableRegistry::get('Clases')->get($idClase,['contain' => ['Disciplinas']]);
    			$where = ['clase_id' => $idClase];
    		}
    		if($this->request->getData('alumnos'))
    		{
    			$idAlumno = $this->request->getData('alumnos');
    			$alumno = TableRegistry::get('Alumnos')->get($idAlumno);
    			$this->prepararListadoSeguimiento($clase->disciplina->descripcion, $alumno->presentacion, 'A4', 'portrait');
    			return  $this->redirect(['action' => 'listado_pdf',$idAlumno,$idClase,'_ext' => 'pdf']);
    		}
    		
    	}
    	
    	$seg = $this->SeguimientosClasesAlumnos->newEntity();
    	$clases = $this->SeguimientosClasesAlumnos->ClasesAlumnos->Clases->find('list')->find('ordered')->contain('Horarios')->where(['clases.active' => true]) ;
    	if (!empty($where))
    	{
	    	$clasesAlu = $this->SeguimientosClasesAlumnos->ClasesAlumnos->find('all')->where($where)->select(['alumno_id']);
	    	foreach ($clasesAlu as $alu)
	    	{
	    		array_push($arrayAlumnos, $alu['alumno_id']) ;
	    	}
	    	
    	}
    	$alumnos = TableRegistry::get('Alumnos')->find('list')->find('ordered')
    	->where(['alumnos.active' => true,'alumnos.futuro_alumno' => false,'alumnos.id IN' =>$arrayAlumnos])->toArray();
    	$this->set(compact('seg','clases', 'alumnos'));
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
    	->where(['SeguimientosClasesAlumnos.fecha <= ' => date('Y-m-d')]) 
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
    	$form = 'pSearch';
    	$where = null;
    	$session = $this->request->session();
    	$session->delete('where');
    	if ($this->request->is('post'))
    	{
    		
    		$where1 = null;
    		if (!(empty($this->request->getData()['clases'])))
    		{
    			$clase = $this->request->getData()['clases'];
    			$where1= ["clases.id = $clase"];
    		}
    		$session->write('where',[$where1]);
    		
    	}
    	
    	if ($session->check('where'))
    	{
    		$where = $session->read('where');
    	}
    	else
    	{
    		$where = null;
    	}
    	$clases = $this->SeguimientosClasesAlumnos->ClasesAlumnos->Clases->find('list')->find('ordered')->contain('Horarios')
    	->where(['Clases.profesor_id' => $this->Auth->user('profesor_id')]);
    	
    	$this->paginate = [
    			'conditions' => ['SeguimientosClasesAlumnos.created = SeguimientosClasesAlumnos.modified',$where, 'DATE(fecha) <= ' => date('Y-m-d'),'clases.profesor_id' => $this->Auth->user('profesor_id')],
    			'contain' => ['ClasesAlumnos' => ['Alumnos','Clases' => ['Disciplinas','Horarios','Profesores'] ] , 'Calificaciones'],
    			'finder' => 'ordered',
    	];
    	$seguimientosClasesAlumnos = $this->paginate($this->SeguimientosClasesAlumnos);
    	
    	
    	
    	$this->set(compact('seguimientosClasesAlumnos','clases','form'));
    }
    
    public function pSearch()
    {
    	$form = 'pSearch';
    	$where1 = $where2 = $where3 = $where4 = null;
    	if ($this->request->is('post'))
    	{
    		if(!empty($this->request->getData()) && $this->request->getData() !== null )
    		{
    			
    			if (!(empty($this->request->getData()['clases'])))
    			{
    				$clase = $this->request->getData()['clases'];
    				$where1= ["clases.id = $clase"];
    			}
    			if ($this->request->getData()['modificados'])
    			{
    				$where2= 'SeguimientosClasesAlumnos.created <> SeguimientosClasesAlumnos.modified';
    			}
    			$day= $this->request->getData()['fecha']['day'];
    			$month= $this->request->getData()['fecha']['month'];
    			$year = date('Y');
    			if ($day && $month)
    			{
    				$fecha =date('Y-m-d',strtotime("$year-$month-$day"));
    				$where3 = ["DATE(fecha) = '$fecha'"];
    			}
    			elseif ($month)
    			{
    				$fecha = date('Y-m-d h:i:s',strtotime("$year-$month-01"));
    				$where3 = ["EXTRACT(YEAR_MONTH FROM fecha) = EXTRACT(YEAR_MONTH FROM '$fecha')"];
    			}
    			if (!(empty($this->request->getData()['palabra_clave'])))
    			{
    				$palabra = $this->request->getData()['palabra_clave'];
    				$where4= ["(alumnos.nombre LIKE '%".addslashes($palabra)."%' OR alumnos.apellido LIKE '%".addslashes($palabra)."%' OR
							 CONCAT_WS(' ',alumnos.nombre ,alumnos.apellido) LIKE '".addslashes($palabra)."'
	     				OR  CONCAT_WS(' ',alumnos.apellido ,alumnos.nombre) LIKE '".addslashes($palabra)."')"
    				];
    			}
    			$this->request->session()->write('searchCond', [$where1,$where2,$where3,$where4]);
    		}
    	}
    	
    	if ($this->request->session()->check('searchCond')) {
    		$conditions = $this->request->session()->read('searchCond');
    	} else {
    		$conditions = null;
    	}
    	
    	$clases = $this->SeguimientosClasesAlumnos->ClasesAlumnos->Clases->find('list')->find('ordered')->contain('Horarios')
    	->where(['clases.profesor_id' => $this->Auth->user('profesor_id')]);
    	
    	
    	
    	$this->paginate = [
    			'contain' => ['ClasesAlumnos' => ['Alumnos','Clases' => ['Disciplinas','Horarios','Profesores'] ] , 'Calificaciones'],
    			'conditions' => [$conditions, 'DATE(fecha) <= ' => date('Y-m-d'),'clases.profesor_id' => $this->Auth->user('profesor_id')],
    			'finder' => 'ordered',
    			'limit' => 20
    	];
    	
    	
    	$seguimientosClasesAlumnos= $this->paginate($this->SeguimientosClasesAlumnos);
    	
    	$this->set(compact('seguimientosClasesAlumnos','clases','form'));
    	
    	$this->render('/SeguimientosClasesAlumnos/p_index');
    }
    
    
    public function pPorDia()
    {
    	$idProfesor = $this->Auth->user('profesor_id');
    	$dia =  date('l');
    	$fecha = date('Y-m-d');
    	$rFechas = $this->SeguimientosClasesAlumnos->find('all')
    	->select('fecha')
    	->join('Clases')
    	->where(['Clases.profesor_id' => $idProfesor, 
    			'SeguimientosClasesAlumnos.created = SeguimientosClasesAlumnos.modified',
    			'SeguimientosClasesAlumnos.fecha <=' => date('Y-m-d h:i:s') 
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
    	
    	
    	$horarios = TableRegistry::get('Horarios')->find('all')
    	->innerJoinWith('Clases')
    	->contain(['Clases' => ['Disciplinas']])
    			->where(['nombre_dia' =>$dia, 'Clases.profesor_id' => $idProfesor])
    			->orderAsc("hora");
    	
    			$fecha =  bin2hex ( $fecha );
    	$this->set(compact('horarios','fechas','dia','fecha'));
    }
    
    public function pCargaMultiple($idClase, $fecha)
    {
    	$fecha = hex2bin($fecha);
    	
    	$seguimientosClasesAlumnos = $this->SeguimientosClasesAlumnos->find('all')
    	->contain(['ClasesAlumnos' => ['Alumnos','Clases']])
    	->where(['Clases.id' => $idClase, 'DATE(fecha)' => date('Y-m-d',strtotime($fecha)), 
    			'SeguimientosClasesAlumnos.created = SeguimientosClasesAlumnos.modified'
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
    public function reset()
    {
    	if ($this->request->session()->check('searchCond')) {
    		$this->request->session()->delete('searchCond');
    	}
    	$this->redirect($this->referer());
    }
}
