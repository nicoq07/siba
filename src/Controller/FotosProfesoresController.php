<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FotosProfesores Controller
 *
 * @property \App\Model\Table\FotosProfesoresTable $FotosProfesores
 *
 * @method \App\Model\Entity\FotosProfesore[] paginate($object = null, array $settings = [])
 */
class FotosProfesoresController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Profesores']
        ];
        $fotosProfesores = $this->paginate($this->FotosProfesores);

        $this->set(compact('fotosProfesores'));
        $this->set('_serialize', ['fotosProfesores']);
    }

    /**
     * View method
     *
     * @param string|null $id Fotos Profesore id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fotosProfesore = $this->FotosProfesores->get($id, [
            'contain' => ['Profesores']
        ]);

        $this->set('fotosProfesore', $fotosProfesore);
        $this->set('_serialize', ['fotosProfesore']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fotosProfesore = $this->FotosProfesores->newEntity();
        if ($this->request->is('post')) {
            $fotosProfesore = $this->FotosProfesores->patchEntity($fotosProfesore, $this->request->getData());
            if ($this->FotosProfesores->save($fotosProfesore)) {
                $this->Flash->success(__('The fotos profesore has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fotos profesore could not be saved. Please, try again.'));
        }
        $profesores = $this->FotosProfesores->Profesores->find('list', ['limit' => 200]);
        $this->set(compact('fotosProfesore', 'profesores'));
        $this->set('_serialize', ['fotosProfesore']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Fotos Profesore id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fotosProfesore = $this->FotosProfesores->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fotosProfesore = $this->FotosProfesores->patchEntity($fotosProfesore, $this->request->getData());
            if ($this->FotosProfesores->save($fotosProfesore)) {
                $this->Flash->success(__('The fotos profesore has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fotos profesore could not be saved. Please, try again.'));
        }
        $profesores = $this->FotosProfesores->Profesores->find('list', ['limit' => 200]);
        $this->set(compact('fotosProfesore', 'profesores'));
        $this->set('_serialize', ['fotosProfesore']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Fotos Profesore id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fotosProfesore = $this->FotosProfesores->get($id);
        if ($this->FotosProfesores->delete($fotosProfesore)) {
            $this->Flash->success(__('The fotos profesore has been deleted.'));
        } else {
            $this->Flash->error(__('The fotos profesore could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
