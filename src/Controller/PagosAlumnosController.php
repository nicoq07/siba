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
	private $conditions=null;
	
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
    	$where1 = null;
    	$where2 = null;
    	$where3 = null;
    	$where4 = null;
    	$cond = null;
    	$this->conditions = array();
    	$session = $this->request->session();
    	if ($this->request->is('post'))
    	{
    		$cond = array();
    		$session->delete('conditions');
    		$mes = $this->request->getData()['mes']['month'];
    		
    		if ($mes)
    		{
    			$where1= ['PagosAlumnos.mes' => $mes];
    			array_push($this->conditions,$where1);
    			array_push($cond,['mes' => $mes]);
    			
    		}
    		$year= $this->request->getData()['year']['year'];
    		if ($year)
    		{
    			$fecha =date('Y-m-d h:i:s',strtotime("$year-01-01"));
    			$where2 = ["YEAR(PagosAlumnos.created) = YEAR('$fecha')"];
    			array_push($this->conditions,$where2);
    			array_push($cond,['year' => $year]);
    		}
    		if (!(empty($this->request->getData()['palabra_clave'])))
    		{
    			$palabra = $this->request->getData()['palabra_clave'];
    			$where3= ["(alumnos.nombre LIKE '%".addslashes($palabra)."%' OR alumnos.apellido LIKE '%".addslashes($palabra)."%' OR
							 alumnos.nro_documento LIKE '%".addslashes($palabra)."%' OR  CONCAT_WS(' ',alumnos.nombre ,alumnos.apellido) LIKE '".addslashes($palabra)."'
	     				OR  CONCAT_WS(' ',alumnos.apellido ,alumnos.nombre) LIKE '".addslashes($palabra)."')"
    			];
    			array_push($this->conditions,$where3);
    			array_push($cond,['palabra' => $palabra]);
    		}
    		
    		if (!(empty($this->request->getData()['deuda'])))
    		{
    			$where4= ["PagosAlumnos.pagado" => false];
    			array_push($this->conditions,$where4);
    			array_push($cond,['deuda' => true]);
    		}
    		
    		$session->write('conditions',$this->conditions);
    		
    	}
    	if ($session->check('conditions'))
    	{
    		$this->conditions= $session->read('conditions');
    	}
    	else
    	{
    		$this->conditions= null;
    	}
    	$this->paginate = [
    			'contain' => ['Alumnos', 'Users','PagosConceptos'],
    			'conditions' => [$this->conditions],
				//'order' => ['Alumnos.apellido'],
				'finder' => 'ordered',
    			'limit' => 25
    	];
    	
    	
    	$pagosAlumnos = $this->paginate($this->PagosAlumnos);
    	
    	$this->set(compact('pagosAlumnos','cond'));
    	
        
    }
    public function search()
    {
    	$where1 = $where2 = $where3 = $where4 = $palabra = null;
    	if ($this->request->is('post'))
    	{
    		if(!empty($this->request->getData()) && $this->request->getData() !== null )
    		{
    			
    			$mes = $this->request->getData()['mes']['month'];
    			
    			if ($mes)
    			{
    				$where1= ['PagosAlumnos.mes' => $mes];
    				
    			}
    			$year= $this->request->getData()['year']['year'];
    			if ($year)
    			{
    				$fecha =date('Y-m-d h:i:s',strtotime("$year-01-01"));
    				$where2 = ["YEAR(PagosAlumnos.created) = YEAR('$fecha')"];
    			}
    			if (!(empty($this->request->getData()['palabra_clave'])))
    			{
    				$palabra = $this->request->getData()['palabra_clave'];
    				$where3= ["(alumnos.nombre LIKE '%".addslashes($palabra)."%' OR alumnos.apellido LIKE '%".addslashes($palabra)."%' OR
							 alumnos.nro_documento LIKE '%".addslashes($palabra)."%' OR  CONCAT_WS(' ',alumnos.nombre ,alumnos.apellido) LIKE '".addslashes($palabra)."'
	     				OR  CONCAT_WS(' ',alumnos.apellido ,alumnos.nombre) LIKE '".addslashes($palabra)."')"
    				];
    			}
    			
    			if (!(empty($this->request->getData()['deuda'])))
    			{
    				$where4= ["PagosAlumnos.pagado" => false];
    			}
    			$this->request->session()->write('searchCond', [$where1,$where2,$where3,$where4]);
    			$this->request->session()->write('search_key', $palabra);
    		}
    	}
    	
    	if ($this->request->session()->check('searchCond')) {
    		$conditions = $this->request->session()->read('searchCond');
    	} else {
    		$conditions = null;
    	}
    	
    	$this->paginate = [
    			'contain' => ['Alumnos', 'Users','PagosConceptos'],
    			'conditions' => $conditions,
    			//'order' => ['Alumnos.apellido'],
    			'finder' => 'ordered',
    			'limit' => 25
    	];
    	
    	
    	$pagosAlumnos = $this->paginate($this->PagosAlumnos);
    	
    	
    	$this->set(compact('pagosAlumnos'));
    	
    	$this->render('/PagosAlumnos/index');
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
            'contain' => ['Alumnos', 'Users','PagosConceptos']
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
	    	$alumnos = $this->PagosAlumnos->Alumnos->find('list')->where(['Alumnos.programa_adolecencia' => false,'alumnos.futuro_alumno' => false])
	    	->orderAsc('apellido');
	    	$users = $this->PagosAlumnos->Users->find('list', ['limit' => 200]);
	    	$this->set(compact('pagosAlumno', 'alumnos', 'users','alumno'));
	    	$this->set('_serialize', ['pagosAlumno']);
	 }
	 
	 public function pagoManualPdf($idPago)
	 {
	 	$pagoalumno = $this->PagosAlumnos->get($idPago, [ 
	 			'contain' => ['Alumnos' => ['Clases'=> ['Disciplinas','Horarios' => ['Ciclolectivo' => ['conditions' => ['YEAR(ciclolectivo.fecha_inicio)' => date('Y')] ]]] ]
	 					,'PagosConceptos']
	 	]);
	 	$this->prepararPDFManual($pagoalumno->mes, $pagoalumno->alumno->nro_documento, "A4", "landscape");
	 	$this->set(compact('pagoalumno'));
	 	
	 }
	 
	 public function pagoGeneral()
	 {
	 	
	 	//activos = 0
	 	//sin pago del mes = 1
	 	
	    	//Guarda base y genera pdf de todos los alumnos
	 	//return $this->redirect(['action' => 'pago_general_pdf', $pagosAlumnos,'_ext' => 'pdf']);
	 	$idsAlumnos=null;
	 	if ($this->request->is(['patch', 'post', 'put'])) 
	 	{
	 		$mes = $this->request->getData('mes')['month'];
	 		$concepto = $this->request->getData('concepto');
	 		$noCobroAQuienPago = $this->request->getData('tienepago');
	 		
	 		$alumnosTable = TableRegistry::get('Alumnos');
	 		$alumnos = $alumnosTable->find()
	 		
	 		->where(['alumnos.active' => true , 'alumnos.programa_adolecencia' => false,'alumnos.futuro_alumno' => false,
	 				'alumnos.monto_arancel >' => 0])
	 		;
	 		
	 		
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
	 			$idsAlumnos .= $alumno->id . "-";
	 			
	 			
	 		}// fin foreach
	 	
	 		return $this->redirect(['action' => 'pago_general_pdf', $mes, $idsAlumnos,'_ext' => 'pdf']);
	 	} //fin post
	 	
	 	$pagosAlumnos = $this->paginate($this->PagosAlumnos);
	 	
	 	$this->set(compact('pagosAlumnos'));
	}
    
	public function pagoGeneralPdf($mes, $idsAlumnos)
	{
		if(empty($idsAlumnos) ||  ($idsAlumnos == null))
		{
			$this->Flash->error("Los pagos ya fueron generados");
			return $this->redirect(['action' => 'index']);
		}
		$aux = explode('-', $idsAlumnos);
		$pagosAlumnos = $this->PagosAlumnos->find()
		->find('ordered')
		->contain( ['Alumnos' => ['Clases'=> ['Disciplinas','Horarios' => ['Ciclolectivo' => ['conditions' => ['YEAR(ciclolectivo.fecha_inicio)' => date('Y')] ]]] ]
				,'PagosConceptos'])
				->where(['PagosAlumnos.monto > ' => 0,'PagosAlumnos.mes' => $mes, 'YEAR(PagosAlumnos.created)' => date('Y'), 'PagosAlumnos.alumno_id IN ' => $aux]);
		$this->prepararPDFGeneral($mes, "A4", "landscape");
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
                $this->Flash->success(__('Guarado.'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('Error, reintente.'));
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
            $this->Flash->success(__('Borrado.'));
        } else {
            $this->Flash->error(__('Error, reintente.'));
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
    		$pagosAlumno->user_id = $this->Auth->user('id');
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
    public function desafectarPago($id = null)
    {
        $pagosAlumno = $this->PagosAlumnos->get($id, []);
        if ($this->request->is(['patch', 'post', 'put']))
        {
            $pagosAlumno->pagado = false;
            $pagosAlumno->fecha_pagado = null;
            $pagosAlumno->user_id = null;
            if ($this->PagosAlumnos->save($pagosAlumno))
            {
                $this->Flash->success(__('Se volvío para atrás el pago.'));
            }
            else
            {
                $this->Flash->error(__('Error, reintente.'));
            }
            
        }
        return $this->redirect($this->referer());
        
    }
    
    
    public function informePagos()
    {
    	
    	$mes = null;
    	$year=null;
    	if ($this->request->is(['post']))
    	{
    		$mes = $this->request->getData('mob')['month'];
    		$year = $this->request->getData('year')['year'];
    		if ($mes && $year)
    		{
    			return $this->redirect(['action' => 'informe_pagos_pdf', $mes,$year,'_ext' => 'pdf']);
    		}
    	}
    	
    }
    
    public function informePagosAnual()
    {
    	
    	$year=null;
    	if ($this->request->is(['post']))
    	{
    		$year = $this->request->getData('year')['year'];
    		if ($year)
    		{
    			return $this->redirect(['action' => 'informe_pagos_anual_pdf', $year,'_ext' => 'pdf']);
    		}
    	}
    	
    }
    public function informePagosAnualPdf($year)
    {
    	$cantPagosGenerados= null;
    	$cantPagosPagados= null;
    	$cantPagosNoPagados = null;
    	$alumnosDeudores = null;
    	
    	
    	$qcantPagosGenerados   = $this->PagosAlumnos->find()
    	//->select(["sum(PagosAlumnos.monto) as 'MontoTotal'"])
    	->where(["YEAR(PagosAlumnos.created)" => $year]);
    	$cantPagosGenerados = $qcantPagosGenerados->select(['pagosgenerados' => $qcantPagosGenerados->func()->count('PagosAlumnos.id'),
    			'montototal' => $qcantPagosGenerados->func()->sum('PagosAlumnos.monto')])->first()
    			;
    	
    	$qcantPagosPagados   = $this->PagosAlumnos->find()
    	//->select(["count(*) as 'cantidadDePagosPagados'"," sum(pa.monto) as 'cantidadDePagosPagados'"])
    	->where(["YEAR(PagosAlumnos.created)" => $year,"PagosAlumnos.pagado" => true]);
    	$cantPagosPagados= $qcantPagosPagados->select(['cantidadDePagosPagados' => $qcantPagosPagados->func()->count('PagosAlumnos.id'),
    			'montoTotal' => $qcantPagosPagados->func()->sum('PagosAlumnos.monto')])->first()
    			;
    	
    	$qcantPagosNoPagados   = $this->PagosAlumnos->find()
    	//->select(["count(*) as cantidadDePagosPagados"," sum(pa.monto) as 'cantidadDePagosPagados'"])
    	->where(["YEAR(PagosAlumnos.created)" => $year,"PagosAlumnos.pagado" => false]);
    	$cantPagosNoPagados= $qcantPagosNoPagados->select(['noPagados' => $qcantPagosNoPagados->func()->count('PagosAlumnos.id'),
    			'montoTotal' => $qcantPagosNoPagados->func()->sum('PagosAlumnos.monto')])->first()
    			;
    	
    	$alumnosDeudores= $this->PagosAlumnos->find()
    	->select(['alumno' => 'CONCAT_WS(" ",Alumnos.apellido,Alumnos.nombre) ', 'montoadeudado' => "SUM(PagosAlumnos.monto)" ])
    	->matching('Alumnos')
    	->where(["YEAR(PagosAlumnos.created)" => $year, 'PagosAlumnos.pagado' => false])
    	->group(['alumno'])
    	->orderAsc('PagosAlumnos.fecha_pagado' ,'Alumnos.apellido');
    	
    	$this->prepararPDFInforme($year,'A4','portrait');
    	$this->set(compact('year','alumnosDeudores','cantPagosNoPagados','cantPagosPagados','cantPagosGenerados'));
    }
    
	public function pagosDelDiaPdf()
    {
		$pagos = TableRegistry::get('PagosAlumnos')->find()
		->contain(['PagosConceptos','Users','Alumnos'])
		->where(['DATE(PagosAlumnos.fecha_pagado)' => date('Y-m-d'), 'PagosAlumnos.pagado' => true ])
		->orderDesc('PagosAlumnos.fecha_pagado');
		
		$sumaDelDia = TableRegistry::get('PagosAlumnos')->find()
		->where(['DATE(PagosAlumnos.fecha_pagado)' => date('Y-m-d'), 'PagosAlumnos.pagado' => true ])
		;
		$suma = $sumaDelDia
		->select(['cant' => $sumaDelDia->func()->count('PagosAlumnos.id'),
		'montoTotal' => $sumaDelDia->func()->sum('PagosAlumnos.monto')])->first();

		

    	$this->prepararListado("A4", "portrait");

    	$this->set(compact('pagos','suma'));
    }
	private function prepararListado($tipoHoja,$orientacion)
    {
    	$this->viewBuilder()->setOptions([
    			'pdfConfig' => [
    					'margin-bottom' => 0,
    					'margin-right' => 0,
    					'margin-left' => 0,
    					'margin-top' => 0,
    					'pageSize' => $tipoHoja,
    					'orientation' => $orientacion,
    					'filename' => "Pagos.pdf"
    			]
    	]);
    }
    public function informePagosPdf($mes,$year)
    {
    	$pagosAlDiez= null;
    	$pagosDelOnceAFin= null;
    	$cantPagosGenerados= null;
    	$cantPagosPagados= null;
    	$cantPagosNoPagados = null;
    	$alumnosDeudoresDelMes = null;
    	
    	$pagosAlDiez = $this->PagosAlumnos->find()
    	->select(['alumno' =>'CONCAT_WS(" ",Alumnos.apellido,Alumnos.nombre)','fecha' =>'PagosAlumnos.fecha_pagado' ])
    	->matching('Alumnos')
    	->where(['PagosAlumnos.mes' => $mes, 'PagosAlumnos.pagado' => true,"PagosAlumnos.fecha_pagado >= cast('$year-$mes-01' as datetime)",
    			"PagosAlumnos.fecha_pagado <= cast('$year-$mes-10 23:59:59' as datetime)"])->orderAsc('PagosAlumnos.fecha_pagado' ,'Alumnos.apellido')
    	;
    	$pagosDelOnceAFin = $this->PagosAlumnos->find()
    	->select(['alumno' => 'CONCAT_WS(" ",Alumnos.apellido,Alumnos.nombre)','fecha' =>'PagosAlumnos.fecha_pagado' ])
    	->matching('Alumnos')
    	->where(['PagosAlumnos.mes' => $mes, 'PagosAlumnos.pagado' => true,"PagosAlumnos.fecha_pagado >= cast('$year-$mes-11' as datetime)",
    			"PagosAlumnos.fecha_pagado <= LAST_DAY(cast('$year-$mes-01 23:59:59' as datetime))",
    	])->orderAsc('PagosAlumnos.fecha_pagado' ,'Alumnos.apellido')
    	;
    	
    	$qcantPagosGenerados   = $this->PagosAlumnos->find()
    	//->select(["sum(PagosAlumnos.monto) as 'MontoTotal'"])
    	->where(["PagosAlumnos.mes" => $mes]);
    	$cantPagosGenerados = $qcantPagosGenerados->select(['pagosgenerados' => $qcantPagosGenerados->func()->count('PagosAlumnos.id'),
    			'montototal' => $qcantPagosGenerados->func()->sum('PagosAlumnos.monto')])->first()
    			;
    	
    	$qcantPagosPagados   = $this->PagosAlumnos->find()
    	//->select(["count(*) as 'cantidadDePagosPagados'"," sum(pa.monto) as 'cantidadDePagosPagados'"])
    	->where(["PagosAlumnos.mes" => $mes,"PagosAlumnos.pagado" => true]);
    	$cantPagosPagados= $qcantPagosPagados->select(['cantidadDePagosPagados' => $qcantPagosPagados->func()->count('PagosAlumnos.id'),
    			'montoTotal' => $qcantPagosPagados->func()->sum('PagosAlumnos.monto')])->first()
    			;
    	
    	$qcantPagosNoPagados   = $this->PagosAlumnos->find()
    	//->select(["count(*) as cantidadDePagosPagados"," sum(pa.monto) as 'cantidadDePagosPagados'"])
    	->where(["PagosAlumnos.mes" => $mes,"PagosAlumnos.pagado" => false]);
    	$cantPagosNoPagados= $qcantPagosNoPagados->select(['noPagados' => $qcantPagosNoPagados->func()->count('PagosAlumnos.id'),
    			'montoTotal' => $qcantPagosNoPagados->func()->sum('PagosAlumnos.monto')])->first()
    			;
    	
    	$alumnosDeudoresDelMes = $this->PagosAlumnos->find()
    	->select(['alumno' => 'CONCAT_WS(" ",Alumnos.apellido,Alumnos.nombre) ', 'montoadeudado' => "PagosAlumnos.monto" ])
    	->matching('Alumnos')
    	->where(['PagosAlumnos.mes' => $mes, 'PagosAlumnos.pagado' => false])
    	->orderAsc('PagosAlumnos.fecha_pagado' ,'Alumnos.apellido');
    	
    	
    	$date = new \DateTime('2017-'.$mes.'-01');
    	$nombreMes = __($date->format('F'));
    	
    	$this->prepararPDFInforme($mes,'A4','portrait');
    	$this->set(compact('year','nombreMes','alumnosDeudoresDelMes','cantPagosNoPagados','cantPagosPagados','cantPagosGenerados','pagosDelOnceAFin','pagosAlDiez'));
    }
    
    
    private function prepararPDFManual($mes,$dniAlumno,$tipoHoja,$orientacion)
    {
    	$nombreMes = __(date('F'),strtotime('2017-'.$mes.'-01'));
    
    	$this->viewBuilder()->setOptions([
    			'pdfConfig' => [
    					'pageSize' => $tipoHoja,
    					'margin-bottom' => 1,
    					'margin-right' => 1,
    					'margin-left' => 1,
    					'margin-top' => 1,
    					'orientation' => $orientacion,
    					'filename' => "Pago del mes " .$nombreMes.' de '.$dniAlumno. '.pdf'
    			]
    	]);
    }
    
    private function prepararPDFGeneral($mes,$tipoHoja,$orientacion)
    {
    	$nombreMes = __(date('F'),strtotime('2017-'.$mes.'-01'));
    	$this->viewBuilder()->setOptions([
    			'pdfConfig' => [
    					'margin-bottom' => 0,
    					'margin-right' => 0,
    					'margin-left' => 0,
    					'margin-top' => 0,
    					'pageSize' => $tipoHoja,
    					'orientation' => $orientacion,
    					'filename' => "Pagos del mes " .$nombreMes. '.pdf'
    			]
    	]);
    	
    }
    
    private function prepararPDFInforme($mes,$tipoHoja,$orientacion)
    {
    	$nombreMes = __(date('F'),strtotime('2017-'.$mes.'-01'));
    	$this->viewBuilder()->setOptions([
    			'pdfConfig' => [
    					'margin-bottom' => 0,
    					'margin-right' => 0,
    					'margin-left' => 0,
    					'margin-top' => 0,
    					'pageSize' => $tipoHoja,
    					'orientation' => $orientacion,
    					'filename' => "Informe del mes " .$nombreMes. '.pdf'
    			]
    	]);
    	
    }
}
