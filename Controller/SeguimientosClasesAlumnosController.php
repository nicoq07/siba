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
			if(in_array($this->request->action, ['pIndex','edit','view']))
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
    	$number = null;
    	$where = null;
    	$session = $this->request->session();
    
    	if ($this->request->is('post'))
    	{
    		$session->delete('where');
    		$where1 = null;
    		$where2 = null;
    		$where3 = null;
    		if (!(empty($this->request->getData()['palabra_clave'])))
    		{ 
    			$palabra = $this->request->getData()['palabra_clave'];
    			$where1= $where4= ["(alumnos.nombre LIKE '%".addslashes($palabra)."%' OR alumnos.apellido LIKE '%".addslashes($palabra)."%' OR
							 alumnos.nro_documento LIKE '%".addslashes($palabra)."%' OR  CONCAT_WS(' ',alumnos.nombre ,alumnos.apellido) LIKE '".addslashes($palabra)."'
	     				OR  CONCAT_WS(' ',alumnos.apellido ,alumnos.nombre) LIKE '".addslashes($palabra)."'
							OR profesores.nombre LIKE '%".addslashes($palabra)."%'  OR profesores.apellido LIKE '%".addslashes($palabra)."%')"
    			];
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
    				$fecha =date('Y-m-d h:i:s',strtotime("$year-$mes-01"));
    				$where3 = ["EXTRACT(YEAR_MONTH FROM fecha) = EXTRACT(YEAR_MONTH FROM '$fecha')"];
    			}
    			elseif ($year)
    			{
    				$fecha =date('Y-m-d h:i:s',strtotime("$year-01-01"));
    				$where3 = ["YEAR(fecha) = YEAR('$fecha')"];
    			}
    			elseif ($mes)
    			{
    				$fecha =date('Y-m-d h:i:s',strtotime("2000-$mes-01"));
    				$where3 = ["MONTH(fecha) = MONTH('$fecha')"];
    			}
    			$session->write('where',[$where1,$where2,$where3]);
    			
    	}
    	
    	if ($session->check('where'))
    	{
    		$where = $session->read('where');
    	}
    	else 
    	{
    		$where = null;
    	}
    	$clases = $this->SeguimientosClasesAlumnos->ClasesAlumnos->Clases->find('list');
    	
        $this->paginate = [
        		'conditions' => $where,
        		'contain' => ['ClasesAlumnos' => ['Alumnos','Clases' => ['Disciplinas','Horarios','Profesores'] ] , 'Calificaciones']
        ];
        $seguimientosClasesAlumnos = $this->paginate($this->SeguimientosClasesAlumnos);
        $this->set(compact('seguimientosClasesAlumnos','clases'));
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
                $this->Flash->success(__('The seguimientos clases alumno has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The seguimientos clases alumno could not be saved. Please, try again.'));
        }
        $ClasesAlumnos = $this->SeguimientosClasesAlumnos->ClasesAlumnos->find('list', ['limit' => 200]);
        $calificaciones = $this->SeguimientosClasesAlumnos->Calificaciones->find('list', ['limit' => 200]);
        $this->set(compact('seguimientosClasesAlumno', 'ClasesAlumnos', 'calificaciones'));
        $this->set('_serialize', ['seguimientosClasesAlumno']);
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
                $this->Flash->success(__('The seguimientos clases alumno has been saved.'));
				
                $url = ['action' => 'index'];
                if($this->Auth->user('rol_id') === PROFESOR)
                {
                	$url = ['action' => 'pIndex'];
                }
                return $this->redirect($url);
            }
            $this->Flash->error(__('The seguimientos clases alumno could not be saved. Please, try again.'));
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
    	$clases = $this->SeguimientosClasesAlumnos->ClasesAlumnos->Clases->find('list')->where(['clases.active' => true]) ;
    	if (!empty($where))
    	{
	    	$clasesAlu = $this->SeguimientosClasesAlumnos->ClasesAlumnos->find('all')->where($where)->select(['alumno_id']);
	    	foreach ($clasesAlu as $alu)
	    	{
	    		array_push($arrayAlumnos, $alu['alumno_id']) ;
	    	}
	    	
    	}
    	$alumnos = TableRegistry::get('Alumnos')->find('list')
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
    	$where = null;
    	$session = $this->request->session();
    	$session->delete('where');
    	if ($this->request->is('post'))
    	{
    		
    		$where1 = null;
    		$where2 = null;
    		if (!(empty($this->request->getData()['clases'])))
    		{
    			$clase = $this->request->getData()['clases'];
    			$where1= ["clases.id = $clase"];
    		}
    		if ($this->request->getData()['nomodificados'])
    		{
    			$where2= 'SeguimientosClasesAlumnos.created = SeguimientosClasesAlumnos.modified';
    		}
    		$session->write('where',[$where1,$where2]);
    		
    	}
    	
    	if ($session->check('where'))
    	{
    		$where = $session->read('where');
    	}
    	else
    	{
    		$where = null;
    	}
    	$clases = $this->SeguimientosClasesAlumnos->ClasesAlumnos->Clases->find('list')
    	->where(['Clases.profesor_id' => $this->Auth->user('profesor_id')]);
    	
    	$this->paginate = [
    			'conditions' => [$where, 'fecha <= ' => new \DateTime('now'),'clases.profesor_id' => $this->Auth->user('profesor_id')],
    			'contain' => ['ClasesAlumnos' => ['Alumnos','Clases' => ['Disciplinas','Horarios','Profesores'] ] , 'Calificaciones']
    	];
    	$seguimientosClasesAlumnos = $this->paginate($this->SeguimientosClasesAlumnos);
    	
    	
    	
    	$this->set(compact('seguimientosClasesAlumnos','clases'));
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
