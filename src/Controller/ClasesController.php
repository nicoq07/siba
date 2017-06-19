<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Clases Controller
 *
 * @property \App\Model\Table\ClasesTable $Clases
 *
 * @method \App\Model\Entity\Clase[] paginate($object = null, array $settings = [])
 */
class ClasesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Profesores', 'Horarios', 'Disciplinas']
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

        $this->set('clase', $clase);
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
            $clase = $this->Clases->patchEntity($clase, $this->request->getData());
            if ($this->Clases->save($clase)) {
                $this->Flash->success(__('The clase has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The clase could not be saved. Please, try again.'));
        }
        $profesores = $this->Clases->Profesores->find('list', ['limit' => 200]);
        $horarios = $this->Clases->Horarios->find('list', ['limit' => 200]);
        $disciplinas = $this->Clases->Disciplinas->find('list', ['limit' => 200]);
        $alumnos = $this->Clases->Alumnos->find('list', ['limit' => 200]);
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
        $clase = $this->Clases->get($id, [
            'contain' => ['Alumnos']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $clase = $this->Clases->patchEntity($clase, $this->request->getData());
            if ($this->Clases->save($clase)) {
                $this->Flash->success(__('The clase has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The clase could not be saved. Please, try again.'));
        }
        $profesores = $this->Clases->Profesores->find('list', ['limit' => 200]);
        $horarios = $this->Clases->Horarios->find('list', ['limit' => 200]);
        $disciplinas = $this->Clases->Disciplinas->find('list', ['limit' => 200]);
        $alumnos = $this->Clases->Alumnos->find('list', ['limit' => 200]);
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
}
