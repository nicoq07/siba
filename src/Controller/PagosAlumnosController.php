<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
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
    	$where1 = null;
    	if ($this->request->is('post'))
    	{
    		$mes = $this->request->getData()['mes']['month'];
    		$where1= ['PagosAlumnos.mes' => $mes];
    	}
        $this->paginate = [
            'contain' => ['Alumnos', 'Users','PagosConceptos'],
        		'conditions' => [$where1]
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
    }
	public function pagoManual($idAlumno = null)
	{
	    	//pago particular de un alumno, que puede venir desde el alumno (forzar a siempre es lo ideal) o desde pago.
	    	//Guarda en base y genera pdf
		$alumno = null;
		//Si viene desde el view del alumno
		if (!empty($idAlumno) && $this->request->is('get'))
		{
			$alumnos = TableRegistry::get('Alumnos');
			$alumno = $alumnos->get($idAlumno);
			if (empty($alumno))
			{
				$this->Flash->error(__('El alumno no existe'));
				return $this->redirect($this->referer());
			}
			
		}
	    		
	    	$pagosAlumno = $this->PagosAlumnos->newEntity();
	    	if ($this->request->is('post')) {
	    		$detalles = null;
	    		$total = 0;
	    		$cont = 0;
	    		foreach ($this->request->getData()['concepto'] as $conceptos)
	    		{
	    			$total = $this->request->getData()['monto'][$cont] + $total;
	    			$detalles[$conceptos] = $this->request->getData()['monto'][$cont];
	    			$cont++;
	    		}
	    		$pagosAlumno = $this->PagosAlumnos->patchEntity($pagosAlumno, $this->request->getData());
	    		//$pagosAlumno->alumno_id = $alumno->id;
	    		$pagosAlumno->mes = $this->request->getData()['mes']['month'];
	    		$pagosAlumno->monto = $total;
	    		$pagosAlumno->pagado = false;
	    		$pagosAlumno->user_id = null;
	    		if ($idPago = $this->PagosAlumnos->save($pagosAlumno)) 
	    		{
	    			
	    			$pagosConceptos = TableRegistry::get('PagosConceptos');
	    			
	    			foreach ($detalles as $clave => $valor) 
	    			{
	    				$pc = $pagosConceptos->newEntity();
	    				$pc->pago_alumno_id = $idPago->id;
	    				$pc->monto = $valor;
	    				$pc->detalle = $clave;
	    				$pc->cantidad = 1;
	    				$pagosConceptos->save($pc);
	    			}
	    			
	    			return $this->redirect(['action' => 'pago_manual_pdf', $pagosAlumno->id ,'_ext' => 'pdf']);
	    		}
	    		$this->Flash->error(__('El pago no pudo ser generado. Avise al administrador'));
	    	}
	    	$alumnos = $this->PagosAlumnos->Alumnos->find('list', ['limit' => 200]);
	    	$users = $this->PagosAlumnos->Users->find('list', ['limit' => 200]);
	    	$this->set(compact('pagosAlumno', 'alumnos', 'users','alumno'));
	    	$this->set('_serialize', ['pagosAlumno']);
	 }
	 
	 public function pagoManualPdf($idPago)
	 {
	 	$pagoAlumno = $this->PagosAlumnos->get($idPago, [ 
	 			'contain' => ['Alumnos','PagosConceptos']
	 	]);
	 	
	 	$this->prepararPDFManual($pagoAlumno->mes, $pagoAlumno->alumno->nro_documento, "A5", "portrait");
	 	$this->set(compact('pagoAlumno'));
	 	
	 }
	 
	 public function pagoGeneral()
	 {
	 	//activos = 0
	 	//sin pago del mes = 1
	 	
	    	//Guarda base y genera pdf de todos los alumnos
	 	//return $this->redirect(['action' => 'pago_general_pdf', $pagosAlumnos,'_ext' => 'pdf']);
	 	if ($this->request->is(['patch', 'post', 'put'])) 
	 	{
	 		$mes = $this->request->getData('mes')['month'];
	 		$concepto = $this->request->getData('concepto');
	 		$noCobroAQuienPago = $this->request->getData('tienepago');
	 		
	 		$alumnosTable = TableRegistry::get('Alumnos');
	 		$alumnos = $alumnosTable->find()->where(['alumnos.active' => true , 'alumnos.programa_adolecencia' => false]);
	 		foreach ($alumnos as $alumno)
	 		{
	 			//si pago y no quieren que vuelva a generar un pago
	 			if ($alumno->pagoElMes($mes) && $noCobroAQuienPago)
	 			{
	 				//si pago y no quieren que le vuelva cobrar sigo al siguente alumno
	 				continue;
	 			}
	 			else 
	 			{
	 				$pagosAlumno = $this->PagosAlumnos->newEntity();
	 				$pagosAlumno->mes = $mes;
	 				$pagosAlumno->monto = $alumno->monto_arancel;
	 				$pagosAlumno->pagado = false;
	 				$pagosAlumno->user_id = null;
	 				$pagosAlumno->alumno_id = $alumno->id;
	 				if ($idPago = $this->PagosAlumnos->save($pagosAlumno))
	 				{
	 					$pagosConceptos = TableRegistry::get('PagosConceptos');
	 						$pc = $pagosConceptos->newEntity();
	 						$pc->pago_alumno_id = $idPago->id;
	 						$pc->monto = $alumno->monto_arancel;
	 						$pc->detalle = $concepto;
	 						$pc->cantidad = 1;
	 						$pagosConceptos->save($pc);
	 					
	 					//return $this->redirect(['action' => 'pago_manual_pdf', $pagosAlumno->id ,'_ext' => 'pdf']);
	 				}
	 				
	 			}// fin else si no pago
	 		}// fin foreach
	 		return $this->redirect(['action' => 'pago_general_pdf', $mes ,'_ext' => 'pdf']);
	 	} //fin post
	 	
	 	$pagosAlumnos = $this->paginate($this->PagosAlumnos);
	 	
	 	$this->set(compact('pagosAlumnos'));
	}
    
	public function pagoGeneralPdf($mes)
	{
		$pagosAlumnos = $this->PagosAlumnos->find()
		->contain( ['Alumnos' => ['Clases'=> ['Disciplinas'] ]
				,'PagosConceptos']) 
		->where(['PagosAlumnos.mes' => $mes, 'YEAR(PagosAlumnos.created)' => date('Y')]);
		debug($pagosAlumnos->first()->alumno->clases[0]->disciplina); exit();
		$this->prepararPDFGeneral($mes, "A5", "landscape");
		$this->set(compact('pagosAlumnos'));
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

                return $this->redirect($this->referer());
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
    public function pagar($id = null)
    {
    	$pagosAlumno = $this->PagosAlumnos->get($id, []);
    	if ($this->request->is(['patch', 'post', 'put'])) 
    	{
    		$pagosAlumno->pagado = true;
    		$pagosAlumno->fecha_pagado = new Time();
    		if ($this->PagosAlumnos->save($pagosAlumno)) 
    		{
    			$this->Flash->success(__('Pago registrado.'));
    		}
    		else 
    		{
    			$this->Flash->error(__('Error registrando el pago'));
    		}
    		
    	}
    	return $this->redirect($this->referer());
    	
    }
    
    private function prepararPDFManual($mes,$dniAlumno,$tipoHoja,$orientacion)
    {
    	$this->viewBuilder()->setOptions([
    			'pdfConfig' => [
    					'margin-bottom' => 0,
    					'margin-right' => 0,
    					'margin-left' => 0,
    					'margin-top' => 0,
    					'pageSize' => $tipoHoja,
    					'orientation' => $orientacion,
    					'filename' => "Pago del mes " .$mes.' de '.$dniAlumno. '.pdf'
    			]
    	]);
    }
    
    private function prepararPDFGeneral($mes,$tipoHoja,$orientacion)
    {
    	$this->viewBuilder()->setOptions([
    			'pdfConfig' => [
    					'margin-bottom' => 0,
    					'margin-right' => 0,
    					'margin-left' => 0,
    					'margin-top' => 0,
    					'pageSize' => $tipoHoja,
    					'orientation' => $orientacion,
    					'filename' => "Pagos del mes " .$mes. '.pdf'
    			]
    	]);
    }
}
