<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PagosAlumnos Controller
 *
 * @property \App\Model\Table\PagosAlumnosTable $PagosAlumnos
 *
 * @method \App\Model\Entity\PagosAlumno[] paginate($object = null, array $settings = [])
 */
class PagosAlumnosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Alumnos', 'Users']
        ];
        $pagosAlumnos = $this->paginate($this->PagosAlumnos);

        $this->set(compact('pagosAlumnos'));
        $this->set('_serialize', ['pagosAlumnos']);
    }

    /**
     * View method
     *
     * @param string|null $id Pagos Alumno id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pagosAlumno = $this->PagosAlumnos->get($id, [
            'contain' => ['Alumnos', 'Users']
        ]);

        $this->set('pagosAlumno', $pagosAlumno);
        $this->set('_serialize', ['pagosAlumno']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pagosAlumno = $this->PagosAlumnos->newEntity();
        if ($this->request->is('post')) {
            $pagosAlumno = $this->PagosAlumnos->patchEntity($pagosAlumno, $this->request->getData());
            if ($this->PagosAlumnos->save($pagosAlumno)) {
                $this->Flash->success(__('The pagos alumno has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pagos alumno could not be saved. Please, try again.'));
        }
        $alumnos = $this->PagosAlumnos->Alumnos->find('list', ['limit' => 200]);
        $users = $this->PagosAlumnos->Users->find('list', ['limit' => 200]);
        $this->set(compact('pagosAlumno', 'alumnos', 'users'));
        $this->set('_serialize', ['pagosAlumno']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pagos Alumno id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pagosAlumno = $this->PagosAlumnos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pagosAlumno = $this->PagosAlumnos->patchEntity($pagosAlumno, $this->request->getData());
            if ($this->PagosAlumnos->save($pagosAlumno)) {
                $this->Flash->success(__('The pagos alumno has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pagos alumno could not be saved. Please, try again.'));
        }
        $alumnos = $this->PagosAlumnos->Alumnos->find('list', ['limit' => 200]);
        $users = $this->PagosAlumnos->Users->find('list', ['limit' => 200]);
        $this->set(compact('pagosAlumno', 'alumnos', 'users'));
        $this->set('_serialize', ['pagosAlumno']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pagos Alumno id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pagosAlumno = $this->PagosAlumnos->get($id);
        if ($this->PagosAlumnos->delete($pagosAlumno)) {
            $this->Flash->success(__('The pagos alumno has been deleted.'));
        } else {
            $this->Flash->error(__('The pagos alumno could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
