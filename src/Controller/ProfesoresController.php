<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Database\Connection;
/**
 * Profesores Controller
 *
 * @property \App\Model\Table\ProfesoresTable $Profesores
 *
 * @method \App\Model\Entity\Profesore[] paginate($object = null, array $settings = [])
 */
class ProfesoresController extends AppController
{
	public function isAuthorized($user)
	{
		if(isset($user['rol_id']) &&  $user['rol_id'] === PROFESOR)
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
    	$this->paginate = [
    			'finder' => 'ordered'
    	];
        $profesores = $this->paginate($this->Profesores);

        $this->set(compact('profesores'));
        $this->set('_serialize', ['profesores']);
    }

    /**
     * View method
     *
     * @param string|null $id Profesore id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $profesore = $this->Profesores->get($id, [
            'contain' => ['Clases'=>['Horarios','Disciplinas']]
        ]);

        $this->set('profesore', $profesore);
        $this->set('_serialize', ['profesore']);
    }
    public function pView($id = null)
    {
    	$profesore = $this->Profesores->get($id, [
    			'contain' =>  ['Clases'=>['Horarios','Disciplinas']]
    	]);
    	
    	$this->set('profesore', $profesore);
    	$this->set('_serialize', ['profesore']);
    }
    
    
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $profesore = $this->Profesores->newEntity();
        if ($this->request->is('post')) {
            $profesore = $this->Profesores->patchEntity($profesore, $this->request->getData());
            if ($this->Profesores->save($profesore)) {
                $this->Flash->success(__('The profesore has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The profesore could not be saved. Please, try again.'));
        }
        $this->set(compact('profesore'));
        $this->set('_serialize', ['profesore']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Profesore id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
    	$user = false;
        $profesore = $this->Profesores->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $profesore = $this->Profesores->patchEntity($profesore, $this->request->getData());
            
//             $id = TableRegistry::get('Users')->find()->select('Users.id')->where(['Users.profesor_id' => $profesore->id]);
//             if($id->count() < 1)
//             {
//             	$user = true;
//             }
//             else
//             {
//             	$user = TableRegistry::get('Users')->get($id->first()->id);
//             	$user->set('active',$profesore->active);
//             }
            
//             if (TableRegistry::get('Users')->save($user) || $user)
//             {
	            if ($this->Profesores->save($profesore)) {
	                $this->Flash->success(__('Profesor guardado.'));
	
	                return $this->redirect(['action' => 'index']);
	            }
//             }
            $this->Flash->error(__('Error guardando el profesor! Reintete!'));
        }
        $this->set(compact('profesore'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Profesore id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $profesore = $this->Profesores->get($id);
        if ($this->Profesores->delete($profesore)) {
            $this->Flash->success(__('The profesore has been deleted.'));
        } else {
            $this->Flash->error(__('The profesore could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function baja($id)
    {
    	$flag = false;
    	$this->request->allowMethod(['post', 'delete']);
    	$profesore = $this->Profesores->get($id);
    	$profesore->set('active',false);
    	$id = TableRegistry::get('Users')->find()->select('Users.id')->where(['Users.profesor_id' => $profesore->id]);
    	if($id->count() < 1)
    	{
    		$flag= true;
    	}
    	else
    	{
    		$user = TableRegistry::get('Users')->get($id->first()->id);
    		$user->set('active',false);
    		if(TableRegistry::get('Users')->save($user)) 
    		{
    			$flag = true;
    		}
    	}
    	
    	if ($flag)
    	{
	    	if ($this->Profesores->save($profesore))
	    	{
	    		$this->Flash->success(__('Profesor dado de baja y usuario desactivado. Nota: Debe reasignar sus clases!'));
    			return $this->redirect(['action' => 'index']);
    		}
    		
    	}
    		$this->Flash->error(__('Error dando de baja al profesor y su usuario'));
    }
    
    public function planillas()
    {
    	
    }
    
    public function planillaCursos()
    {	
    	$profesores = $this->Profesores->find('list')
    	->where(['profesores.active ' => true])
    	->matching('Clases');
    	if ($this->request->is(['post'])) 
    	{
    	
    		if(empty($this->request->getData('profesor_id')) )
    		{
	    		$this->Flash->error("Debe seleccionar un profesor");
	    		$this->redirect($this->referer());
    		}
    		$id = $this->request->getData('profesor_id');
    		$mes = $this->request->getData('mes')['month'];
    	
    	return  $this->redirect(['action' => 'planilla_cursos_pdf',$id,$mes,'_ext' => 'pdf']);
    	
    	}
    	
    	$this->set(compact('profesores'));
    }
    
    public function planillaCursosPdf($id, $mes)
    {
   	
    	$profesor = $this->Profesores->get($id);
  		$idProfesor = $profesor->id;

		$qClases = "select ca.id  as clasealumno_id,  CONCAT_WS(' ',a.apellido ,a.nombre) as alumno, h.nombre_dia as nom_dia,
					 h.hora as hora , c.id clase_id, h.num_dia as dia , d.descripcion as disci
					from  horarios as h, seguimientos_clases_alumnos as s, profesores as p, alumnos as a, clases as c, clases_alumnos as ca
					, disciplinas as d
					WHERE
					h.id = c.horario_id AND
					c.id = ca.clase_id AND
					c.disciplina_id = d.id AND
					p.id = $idProfesor AND
					c.profesor_id = p.id AND
					ca.alumno_id = a.id AND
					ca.id = s.clase_alumno_id AND
					MONTH(s.fecha) = $mes
					GROUP by ca.id, h.nombre_dia , h.hora
					ORDER BY h.num_dia, h.hora";
    	
		
		$connection = ConnectionManager::get('default');
		$rClases = $connection->execute($qClases);
		
		$arrayClases = $this->groupBy($rClases, 'nom_dia');
		
		
    	$dias = $profesor->workingDays($mes);
    	if(empty($dias))
    	{
    		$this->Flash->error("Este mes el profesor no tuvo trabajo");
    		return $this->redirect($this->referer());
    	}
    	$mes = __(date("F", strtotime("2017-$mes-01")));
    	

    	$this->prepararListado($mes, $profesor->presentacion, 'A4', 'portrait');
    	$this->set(compact('profesor','dias','arrayClases','mes'));
    	
    }
    private function prepararListado($mes,$profesor,$tipoHoja,$orientacion)
    {
    	$this->viewBuilder()->setOptions([
    			'pdfConfig' => [
    					'margin-bottom' => 0,
    					'margin-right' => 0,
    					'margin-left' => 0,
    					'margin-top' => 0,
    					'pageSize' => $tipoHoja,
    					'orientation' => $orientacion,
    					'filename' => "Listado de".$profesor.' del mes'.$mes.'.pdf'
    			]
    	]);
    }
    function groupBy($array, $key) {
    	$return = array();
    	foreach($array as $val) {
    		$return[$val[$key]][] = $val;
    	}
    	return $return;
    }
    
}
