<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PagosConceptos Controller
 *
 * @property \App\Model\Table\PagosConceptosTable $PagosConceptos
 *
 * @method \App\Model\Entity\PagosConcepto[] paginate($object = null, array $settings = [])
 */
class PagosConceptosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['PagosAlumnos']
        ];
        $pagosConceptos = $this->paginate($this->PagosConceptos);

        $this->set(compact('pagosConceptos'));
        $this->set('_serialize', ['pagosConceptos']);
    }

    /**
     * View method
     *
     * @param string|null $id Pagos Concepto id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pagosConcepto = $this->PagosConceptos->get($id, [
            'contain' => ['PagosAlumnos']
        ]);

        $this->set('pagosConcepto', $pagosConcepto);
        $this->set('_serialize', ['pagosConcepto']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pagosConcepto = $this->PagosConceptos->newEntity();
        if ($this->request->is('post')) {
            $pagosConcepto = $this->PagosConceptos->patchEntity($pagosConcepto, $this->request->getData());
            if ($this->PagosConceptos->save($pagosConcepto)) {
                $this->Flash->success(__('The pagos concepto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pagos concepto could not be saved. Please, try again.'));
        }
        $pagosAlumnos = $this->PagosConceptos->PagosAlumnos->find('list', ['limit' => 200]);
        $this->set(compact('pagosConcepto', 'pagosAlumnos'));
        $this->set('_serialize', ['pagosConcepto']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pagos Concepto id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pagosConcepto = $this->PagosConceptos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pagosConcepto = $this->PagosConceptos->patchEntity($pagosConcepto, $this->request->getData());
            if ($this->PagosConceptos->save($pagosConcepto)) {
                $this->Flash->success(__('The pagos concepto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pagos concepto could not be saved. Please, try again.'));
        }
        $pagosAlumnos = $this->PagosConceptos->PagosAlumnos->find('list', ['limit' => 200]);
        $this->set(compact('pagosConcepto', 'pagosAlumnos'));
        $this->set('_serialize', ['pagosConcepto']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pagos Concepto id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pagosConcepto = $this->PagosConceptos->get($id);
        if ($this->PagosConceptos->delete($pagosConcepto)) {
            $this->Flash->success(__('The pagos concepto has been deleted.'));
        } else {
            $this->Flash->error(__('The pagos concepto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
