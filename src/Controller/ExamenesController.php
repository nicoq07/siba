<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Examenes Controller
 *
 * @property \App\Model\Table\ExamenesTable $Examenes
 *
 * @method \App\Model\Entity\Examene[] paginate($object = null, array $settings = [])
 */
class ExamenesController extends AppController
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
            'contain' => ['ClasesAlumnos']
        ];
        $examenes = $this->paginate($this->Examenes);

        $this->set(compact('examenes'));
        $this->set('_serialize', ['examenes']);
    }

    /**
     * View method
     *
     * @param string|null $id Examene id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $examene = $this->Examenes->get($id, [
            'contain' => ['ClasesAlumnos']
        ]);

        $this->set('examene', $examene);
        $this->set('_serialize', ['examene']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $examene = $this->Examenes->newEntity();
        if ($this->request->is('post')) {
            $examene = $this->Examenes->patchEntity($examene, $this->request->getData());
            if ($this->Examenes->save($examene)) {
                $this->Flash->success(__('The examene has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The examene could not be saved. Please, try again.'));
        }
        $clasesAlumnos = $this->Examenes->ClasesAlumnos->find('list', [
        		'groupField' => 'clase.disciplina.descripcion'
        		])
        		->contain(['Clases' => ['Disciplinas']]);

        		$calificaciones = TableRegistry::get('Calificaciones')->find('list')
        		->toArray()
        		;
       $calificaciones =  array_combine(array_values($calificaciones), 	array_values($calificaciones));
        	
        $this->set(compact('examene', 'clasesAlumnos','calificaciones'));
        $this->set('_serialize', ['examene']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Examene id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $examene = $this->Examenes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $examene = $this->Examenes->patchEntity($examene, $this->request->getData());
            if ($this->Examenes->save($examene)) {
                $this->Flash->success(__('The examene has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The examene could not be saved. Please, try again.'));
        }
        $clasesAlumnos = $this->Examenes->ClasesAlumnos->find('list', ['limit' => 200]);
        $this->set(compact('examene', 'clasesAlumnos'));
        $this->set('_serialize', ['examene']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Examene id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $examene = $this->Examenes->get($id);
        if ($this->Examenes->delete($examene)) {
            $this->Flash->success(__('The examene has been deleted.'));
        } else {
            $this->Flash->error(__('The examene could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
