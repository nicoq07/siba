<?php
namespace App\Controller;

use App\Controller\AppController;
use Psy\Command\WhereamiCommand;
use Cake\ORM\TableRegistry;
use Cake\Database\Connection;
use Cake\Datasource\ConnectionManager;
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
        $profesore = $this->Profesores->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $profesore = $this->Profesores->patchEntity($profesore, $this->request->getData());
            if ($this->Profesores->save($profesore)) {
                $this->Flash->success(__('The profesore has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The profesore could not be saved. Please, try again.'));
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
    
    public function planillas()
    {
    	
    }
    
    public function planillaCursos()
    {	
    	$profesores = $this->Profesores->find('list')
    	->where(['profesores.active ' => true]);
    	
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
    	
    	$connection = ConnectionManager::get('default');
    	$lista = $connection->execute("SELECT profe.nombre as profesor, a.nombre as alumno  ,d.descripcion, h.nombre_dia, DATE_FORMAT(h.hora, '%H:%i') as hora ,DATE_FORMAT(s.fecha, '%d-%m-%y') as fecha
    			FROM
    			profesores as profe, clases as c , clases_alumnos as ca,disciplinas as d,horarios as h,seguimientos_clases_alumnos as s, alumnos as a
    			WHERE
    			profe.id = $profesor->id AND
    			profe.id = c.profesor_id AND
    			d.id = c.disciplina_id AND
    			h.id = c.horario_id AND
    			ca.clase_id = c.id AND
    			ca.id = s.clase_alumno_id AND
    			ca.alumno_id = a.id AND
    			MONTH(s.fecha) = $mes
    			ORDER BY (s.fecha)")->fetchAll('assoc');
    	$mes = __(date("F", strtotime("01-$mes-2017")));
    	$this->prepararListado($mes, $profesor->presentacion, 'A4', 'portrait');
    	$this->set(compact('profesor','lista','mes'));
    	
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
    
}
