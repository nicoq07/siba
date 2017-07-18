<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SeguimientosClases Controller
 *
 * @property \App\Model\Table\SeguimientosClasesTable $SeguimientosClases
 *
 * @method \App\Model\Entity\SeguimientosClase[] paginate($object = null, array $settings = [])
 */
class SeguimientosClasesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ClasesAlumnos', 'Calificaciones']
        ];
        $seguimientosClases = $this->paginate($this->SeguimientosClases);

        $this->set(compact('seguimientosClases'));
        $this->set('_serialize', ['seguimientosClases']);
    }

    /**
     * View method
     *
     * @param string|null $id Seguimientos Clase id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $seguimientosClase = $this->SeguimientosClases->get($id, [
            'contain' => ['ClasesAlumnos', 'Calificaciones']
        ]);

        $this->set('seguimientosClase', $seguimientosClase);
        $this->set('_serialize', ['seguimientosClase']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $seguimientosClase = $this->SeguimientosClases->newEntity();
        if ($this->request->is('post')) {
        	debug($this->request->getData()); exit;
            $seguimientosClase = $this->SeguimientosClases->patchEntity($seguimientosClase, $this->request->getData());
            if ($this->SeguimientosClases->save($seguimientosClase)) {
                $this->Flash->success(__('The seguimientos clase has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The seguimientos clase could not be saved. Please, try again.'));
        }
        $clasesAlumnos = $this->SeguimientosClases->ClasesAlumnos->find('list', ['limit' => 200]);
        $calificaciones = $this->SeguimientosClases->Calificaciones->find('list', ['limit' => 200]);
        $this->set(compact('seguimientosClase', 'clasesAlumnos', 'calificaciones'));
        $this->set('_serialize', ['seguimientosClase']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Seguimientos Clase id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $seguimientosClase = $this->SeguimientosClases->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $seguimientosClase = $this->SeguimientosClases->patchEntity($seguimientosClase, $this->request->getData());
            if ($this->SeguimientosClases->save($seguimientosClase)) {
                $this->Flash->success(__('The seguimientos clase has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The seguimientos clase could not be saved. Please, try again.'));
        }
        $clasesAlumnos = $this->SeguimientosClases->ClasesAlumnos->find('list', ['limit' => 200]);
        $calificaciones = $this->SeguimientosClases->Calificaciones->find('list', ['limit' => 200]);
        $this->set(compact('seguimientosClase', 'clasesAlumnos', 'calificaciones'));
        $this->set('_serialize', ['seguimientosClase']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Seguimientos Clase id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $seguimientosClase = $this->SeguimientosClases->get($id);
        if ($this->SeguimientosClases->delete($seguimientosClase)) {
            $this->Flash->success(__('The seguimientos clase has been deleted.'));
        } else {
            $this->Flash->error(__('The seguimientos clase could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
