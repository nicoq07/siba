<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Notificaciones Controller
 *
 * @property \App\Model\Table\NotificacionesTable $Notificaciones
 *
 * @method \App\Model\Entity\Notificacione[] paginate($object = null, array $settings = [])
 */
class NotificacionesController extends AppController
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
        $notificaciones = $this->paginate($this->Notificaciones);

        $this->set(compact('notificaciones'));
        $this->set('_serialize', ['notificaciones']);
    }

    /**
     * View method
     *
     * @param string|null $id Notificacione id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $notificacione = $this->Notificaciones->get($id, [
            'contain' => []
        ]);

        $this->set('notificacione', $notificacione);
        $this->set('_serialize', ['notificacione']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $notificacione = $this->Notificaciones->newEntity();
        if ($this->request->is('post')) {
            $notificacione = $this->Notificaciones->patchEntity($notificacione, $this->request->getData());
            if ($this->Notificaciones->save($notificacione)) {
                $this->Flash->success(__('The notificacione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The notificacione could not be saved. Please, try again.'));
        }
        $this->set(compact('notificacione'));
        $this->set('_serialize', ['notificacione']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Notificacione id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $notificacione = $this->Notificaciones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $notificacione = $this->Notificaciones->patchEntity($notificacione, $this->request->getData());
            if ($this->Notificaciones->save($notificacione)) {
                $this->Flash->success(__('The notificacione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The notificacione could not be saved. Please, try again.'));
        }
        $this->set(compact('notificacione'));
        $this->set('_serialize', ['notificacione']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Notificacione id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $notificacione = $this->Notificaciones->get($id);
        if ($this->Notificaciones->delete($notificacione)) {
            $this->Flash->success(__('The notificacione has been deleted.'));
        } else {
            $this->Flash->error(__('The notificacione could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
