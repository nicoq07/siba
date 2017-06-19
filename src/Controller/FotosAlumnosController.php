<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FotosAlumnos Controller
 *
 * @property \App\Model\Table\FotosAlumnosTable $FotosAlumnos
 *
 * @method \App\Model\Entity\FotosAlumno[] paginate($object = null, array $settings = [])
 */
class FotosAlumnosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Alumnos']
        ];
        $fotosAlumnos = $this->paginate($this->FotosAlumnos);

        $this->set(compact('fotosAlumnos'));
        $this->set('_serialize', ['fotosAlumnos']);
    }

    /**
     * View method
     *
     * @param string|null $id Fotos Alumno id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fotosAlumno = $this->FotosAlumnos->get($id, [
            'contain' => ['Alumnos']
        ]);

        $this->set('fotosAlumno', $fotosAlumno);
        $this->set('_serialize', ['fotosAlumno']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fotosAlumno = $this->FotosAlumnos->newEntity();
        if ($this->request->is('post')) {
            $fotosAlumno = $this->FotosAlumnos->patchEntity($fotosAlumno, $this->request->getData());
            if ($this->FotosAlumnos->save($fotosAlumno)) {
                $this->Flash->success(__('The fotos alumno has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fotos alumno could not be saved. Please, try again.'));
        }
        $alumnos = $this->FotosAlumnos->Alumnos->find('list', ['limit' => 200]);
        $this->set(compact('fotosAlumno', 'alumnos'));
        $this->set('_serialize', ['fotosAlumno']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Fotos Alumno id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fotosAlumno = $this->FotosAlumnos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fotosAlumno = $this->FotosAlumnos->patchEntity($fotosAlumno, $this->request->getData());
            if ($this->FotosAlumnos->save($fotosAlumno)) {
                $this->Flash->success(__('The fotos alumno has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fotos alumno could not be saved. Please, try again.'));
        }
        $alumnos = $this->FotosAlumnos->Alumnos->find('list', ['limit' => 200]);
        $this->set(compact('fotosAlumno', 'alumnos'));
        $this->set('_serialize', ['fotosAlumno']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Fotos Alumno id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fotosAlumno = $this->FotosAlumnos->get($id);
        if ($this->FotosAlumnos->delete($fotosAlumno)) {
            $this->Flash->success(__('The fotos alumno has been deleted.'));
        } else {
            $this->Flash->error(__('The fotos alumno could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
