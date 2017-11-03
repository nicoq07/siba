<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Http\Response;
use Cake\Mailer\Email;

/**
 * Alumnos Controller
 *
 * @property \App\Model\Table\AlumnosTable $Alumnos
 *
 * @method \App\Model\Entity\Alumno[] paginate($object = null, array $settings = [])
 */
class AlumnosController extends AppController
{
	public function initialize()
	{
		parent::initialize();
	}

	
	
	public function isAuthorized($user)
	{
		if(isset($user['rol_id']) &&  $user['rol_id'] == PROFESOR)
		{
			if(in_array($this->request->action, ['pView','pIndex']))
			{
				return true;
			}
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
     			'conditions' => ['alumnos.active' => true],
     			'finder' => 'ordered',
     	];
     
        $alumnos = $this->paginate($this->Alumnos);
// 		$alus= $this->Alumnos->find('all');
// 		foreach ($alus as $alumno)
//         {
//         	$id = $alumno->id;
//         	$connection = ConnectionManager::get('default');
//         	$queryEdad = "(SELECT DATEDIFF(CURRENT_DATE, t.fecha_nacimiento)/365 as edad
//         	FROM alumnos t where t.id = $id)";
//         	$rEdad=$connection->execute($queryEdad);
//         	$edad = intval($rEdad->fetch()[0]);
//         	$connection->execute("UPDATE alumnos SET edad= $edad  WHERE alumnos.id = $id");
        	
//         }
        
        $this->set(compact('alumnos'));
    }

    public function search()
    {
    	$where1 = $where2 = $where3 = $where4 = $palabra = null;
    	if ($this->request->is('post'))
    	{
    		if(!empty($this->request->getData()) && $this->request->getData() !== null )
    		{
    			
    			$esActive = $this->request->getData()['activos'];
    			$where1= ['alumnos.active' => $esActive];
    			
    			$esAdolecencia =$this->request->getData()['adolecencia'];
    			$where2= ['alumnos.programa_adolecencia' => $esAdolecencia];
    			
    			$esFuturo = $this->request->getData()['futuro'];
    			$where3= ['alumnos.futuro_alumno' => $esFuturo];
    			
    			if (!(empty($this->request->getData()['palabra_clave'])))
    			{
    				$palabra = $this->request->getData()['palabra_clave'];
    				$where4= ["(alumnos.nombre LIKE '%".addslashes($palabra)."%' OR alumnos.apellido LIKE '%".addslashes($palabra)."%' OR
							 alumnos.nro_documento LIKE '%".addslashes($palabra)."%' OR  CONCAT_WS(' ',alumnos.nombre ,alumnos.apellido) LIKE '".addslashes($palabra)."'
	     				OR  CONCAT_WS(' ',alumnos.apellido ,alumnos.nombre) LIKE '".addslashes($palabra)."')"
    				];
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
    			'conditions' => $conditions,
    			'limit' => 20,
    			'finder' => 'ordered',
    	];
    	
    	$alumnos = $this->paginate($this->Alumnos);
    	
    	$this->set(compact('alumnos'));
    	
    	$this->render('/Alumnos/index');
    }
    
    
    /**
     * View method
     *
     * @param string|null $id Alumno id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $clasesTable= TableRegistry::get('Clases');
        $clases = $clasesTable->find()
        ->select('Clases.id')
        ->matching('Alumnos', function ($q) use ($id) {
        	return $q->where(['ClasesAlumnos.active' => true, 'ClasesAlumnos.alumno_id' => $id]);
        })
        ->toArray();
        $ids = null;
        (count($clases) > 0) ? $ids = array() : $ids = -1 ;
        foreach ($clases as $c)
        {
        	$ids[] = $c['id'];
        }
        if (empty($ids))
        {
        	$where = ['Clases.id IN ' => -1];
        }
        else
        {
        	$where = ['Clases.id IN ' => $ids];
        }
        
        $segTable= TableRegistry::get('SeguimientosClasesAlumnos');
        $seguimientos = $segTable->find()
        ->limit(10)
        ->orderDesc('fecha')
        ->where(['fecha <='=>  date('Y-m-d h:m',time())])
        ->matching('ClasesAlumnos', function ($q) use ($ids,$id) {
        	return $q->where(['ClasesAlumnos.clase_id IN' => $ids,'ClasesAlumnos.alumno_id ' => $id]);
        })
        ->toArray();
        
        
        $alumno = $this->Alumnos->get($id, [
        		'contain' => ['PagosAlumnos' => ['Users'] ,'Clases' => [ 'conditions' => $where]  ]  ]);
        
        $this->set(['alumno','clases','seguimientos'],[$alumno,$clases,$seguimientos]);
        $this->set('_serialize', ['alumno']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $alumno = $this->Alumnos->newEntity();
        if ($this->request->is('post')) 
        {
		$tieneClases = false;
        	if (!empty($this->request->getData("clases")) &&  $this->request->getData("clases")[0] != '')
        	{
        		$i=0;
        		foreach ($this->request->getData("clases") as $c)
        		{
        			$ids['_ids'][$i]=  $c;
        			$i++;
        		}
        		$this->request  = $this->request->withData('clases',$ids);
				$tieneClases = true;
        	}
        	
            $alumno = $this->Alumnos->patchEntity($alumno, $this->request->getData());
            if ($this->request->getData()['foto']['error'] != 4)
            {
           		if ($this->request->getData()['foto']['error'] == 0)
	            {
	            	$ref = $this->guardarImg($this->request->getData()['foto'], $alumno->id);
	            	$alumno->referencia_foto = $ref;
	            }
	            else
	            {
	            	$this->Flash->error(__('Problema al guardar la foto. Alumno no guardado'));
	            	return $this->redirect($this->referer());
	            }
             }
             
             
             /*
             Calculo la edad sí tiene cargada la fecha de nac
             */
             if (!empty($alumno->fecha_nacimiento))
             {
	             $today = date("Y-m-d");
	             $difference = date_diff(date_create($alumno->fecha_nacimiento->format('Y-m-d')), date_create($today));
	             $alumno->set('edad',$difference->format('%y'));
             }
             /* */
            	if ($this->Alumnos->save($alumno)) 
            	{
            		if ($tieneClases)
            		{
            			if (!$this->insertarSeguimiento($alumno->id, $this->request->getData("clases")['_ids']))
            			{
            				$this->Alumnos->delete($alumno);
            				$this->Flash->error(__('Problema al crear los seguimientos. Alumno no guardado'));
            				return $this->redirect($this->referer());
            			}
            		}
            		$this->Flash->success(__('Alumno guardado.'));
            		return $this->redirect(['action' => 'index']);
            	}
	            
        }
        $profesores = TableRegistry::get('Profesores')->find('list')->where(['active' => true]);
        //$clases = $this->Alumnos->Clases->find('list', ['limit' => 200]);
        $this->set(compact('alumno', 'clases','profesores'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Alumno id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $alumno = $this->Alumnos->get($id, [
            'contain' => ['Clases']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

        	$ids = null;
        	if (!empty($this->request->getData("clasesnuevas")[0]) )
        	{
        		$i=0;
        		foreach ($this->request->getData("clasesnuevas") as $c)
        		{
        			$ids['_ids'][$i]=  $c;
        			$i++;
        		}
        		if(!empty($this->request->getData("clases")))
        		{
        				foreach ($this->request->getData("clases") as $c)
        				{
        					$ids['_ids'][$i]=  $c;
        					$i++;
        				}
        		}
        	}
        	elseif (!empty($this->request->getData("clases")) && $this->request->getData("clases"))
        	{
        		$i=0;
        		foreach ($this->request->getData("clases") as $c)
        		{
        			$ids['_ids'][$i]=  $c;
        			$i++;
        		}
        	}
        	else 
        	{
        			$ids['_ids'] = null;
        	}
        	$this->request  = $this->request->withData('clases',$ids);
        	$alumno = $this->Alumnos->patchEntity($alumno, $this->request->getData());
        	if(!$alumno->active)
        	{
        		$alumno->desactivarme();
        	}
        	else
        	{
        		$alumno->fecha_baja = NULL;
        	}
        	if ($this->request->getData()['foto']['error'] != 4)
        	{
        		if ($this->request->getData()['foto']['error'] == 0)
        		{
        			
        			$ref = $this->guardarImg($this->request->getData()['foto'], $alumno->id);
        			$alumno->referencia_foto = $ref;
        		}
        		else
        		{
        			$this->Flash->error(__('Problema al guardar la foto. Alumno no guardado'));
        			return $this->redirect($this->referer());
        		}
        	}
        	/*
        	 Calculo la edad sí tiene cargada la fecha de nac
        	 */
        	if (!empty($alumno->fecha_nacimiento))
        	{
        		$today = date("Y-m-d");
        		$difference = date_diff(date_create($alumno->fecha_nacimiento->format('Y-m-d')), date_create($today));
        		$alumno->set('edad',$difference->format('%y'));
        	}
        	/* */
            if ($this->Alumnos->save($alumno)) 
            {
            	if (!empty($this->request->getData("clases")['_ids']))
            	{
            		if (!$this->insertarSeguimiento($alumno->id, $this->request->getData("clases")['_ids']))
            		{
            			$this->Flash->error(__('Problema creando los seguimientos.'));
            		}
            	}
                $this->Flash->success(__('Alumno actualizado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The alumno could not be saved. Please, try again.'));
        }
       $clases = $this->Alumnos->Clases->find('list', ['limit' => 200]);
       $profesores = TableRegistry::get('Profesores')->find('list')->where(['active' => true]);
        $this->set(compact('alumno','clases','profesores'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Alumno id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $alumno = $this->Alumnos->get($id);
        if ($this->Alumnos->delete($alumno)) {
            $this->Flash->success(__('Alumno borrado.'));
        } else {
            $this->Flash->error(__('Error intentando borrar al alumno, reintente!.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    /*
     * Desactiva al alumno
     * Desactiva la clase_alumno
     * 
     */
    public function baja($id = null)
    {
    	//desac
    	$this->request->allowMethod(['post', 'delete']);
    	$alumno = $this->Alumnos->get($id);
    	
    	if ($alumno->desactivarme())
    	{
    		if($this->Alumnos->save($alumno))
    		{
    			$this->Flash->success(__('Alumno dado de baja. Clases y seguimientos borrados'));
    		}
    		
    	}
    	else 
    	{
    		$this->Flash->error(__('Error al dar de baja, reintente!'));
    	}
    	
    	
    	return $this->redirect(['action' => 'index']);
    }
    
    public function pIndex()
    {
    	$alumnos = $this->Alumnos->find('all')
    	->find('ordered')
    	->matching('Clases', function ($q)  {
    		return $q->where(['ClasesAlumnos.active' => true, 'Clases.profesor_id' =>  $this->Auth->user('profesor_id')]);
    	})
    	->distinct(['Alumnos.id'])
    	
    	->toArray()
    	;
    	
    	
    	$this->set(compact('alumnos'));
    }
    
    public function pView($id = null)
    {
    	$idProfesor = $this->Auth->user('profesor_id');
    	$clasesTable= TableRegistry::get('Clases');
    	$clases = $clasesTable->find()
    	->select('Clases.id')
    	->matching('Alumnos', function ($q) use ($id) {
    		return $q->where(['ClasesAlumnos.active' => true, 'ClasesAlumnos.alumno_id' => $id]);
    	})
    	->where(['Clases.profesor_id' => $idProfesor])
    	->toArray();
    	$ids = null;
    	(count($clases) > 0) ? $ids = array() : $ids = -1 ;
    	foreach ($clases as $c)
    	{
    		$ids[] = $c['id'];
    	}
    	if (empty($ids))
    	{
    		$where = ['Clases.id IN ' => -1];
    	}
    	else
    	{
    		$where = ['Clases.id IN ' => $ids];
    	}
    	
    	$segTable= TableRegistry::get('SeguimientosClasesAlumnos');
    	$seguimientos = $segTable->find()
    	->orderDesc('fecha')
    	->where(['fecha <='=>  date('Y-m-d h:m',time())])
    	->matching('ClasesAlumnos', function ($q) use ($ids,$id) {
    		return $q->where(['ClasesAlumnos.clase_id IN' => $ids, 'ClasesAlumnos.alumno_id' => $id]);
    	})
    	->toArray();
    	
		
    	
    	$alumno = $this->Alumnos->get($id, [
    			'contain' => ['Clases' => [ 'conditions' => $where]  ]  ]);
    	
    	$this->set(['alumno','clases','seguimientos'],[$alumno,$clases,$seguimientos]);
    }
    
    public function listadoCumple()
    {
    	if ($this->request->is(['post']))
    	{
    		
    		$activos = $this->request->getData('activos');
    		$mes = $this->request->getData('mob')['month'];
    		if ($mes)
    		{
    			$this->listadoCumpleExcel($mes, $activos);
//     			require_once APP.'Excel'.DS.'Excel.php';
//     			\FuncionesExcel::exportarCabecera();
    			//return $this->redirect(['action' => 'listado_cumple_excel', $mes,$activos,'_ext' => 'xlsx']);
    		}
    	}
    	$alumno = $this->Alumnos->newEntity();
    	$this->set('alumno',$alumno);
    	
    }
    
    public function listadoCumplePdf($mes,$activos)
    {
   
    	$where = null;
    	if($activos)
    	{
    		$where=['active' => $activos, 'futuro_alumno' => false];
    	}
    	$nombreMes = __(date('F',strtotime("01-$mes-2000")));
    		$alumnos = $this->Alumnos->find('all')
    		->where([
    				$where,
    		'MONTH(fecha_nacimiento)' => "$mes"
    		])
    		->select(['nombre','apellido','fecha_nacimiento'])
    		->orderAsc('DAY(fecha_nacimiento)')
    		->toArray();
    		
    		if(empty($alumnos))
    		{
    			$this->Flash->error("No hay alumnos que cumplan en el mes de ".$nombreMes);
    			return $this->redirect(['action' => 'listado_cumple']);
    		}
    		
    		$month = 'Listado del mes ' . __(date('F',strtotime("01-$mes-2000")));
    		$hoja = 'A4';
    		$ori = 'portrait';
    		$this->prepararPDFListado($month,$hoja,$ori );
    		$this->set(['alumnos','month'],[$alumnos,$nombreMes]);
    		
    }
    
    public function listadoCumpleExcel($mes,$activos)
    {
     	$this->autoRender=false;
     	$where = null;
    	if($activos)
     	{
     		$where=['active' => $activos, 'futuro_alumno' => false];
    	}
     	$nombreMes = __(date('F',strtotime("01-$mes-2000")));
     	$alumnos = $this->Alumnos->find('all')
     	->where([
     			$where,
     			'MONTH(fecha_nacimiento)' => "$mes"
    	])
     	->select(['nombre','apellido','fecha_nacimiento','email','email_madre','email_padre'])
     	->orderAsc('DAY(fecha_nacimiento)')
     	;
    	if(empty($alumnos))
    	     	{
     		$this->Flash->error("No hay alumnos que cumplan en el mes de ".$nombreMes);
     		return $this->redirect(['action' => 'listado_cumple']);
    	}
    	
      	$month =  __(date('F',strtotime("01-$mes-2000")));
//      	$this->set(compact('alumnos','month'));
//      	$this->viewBuilder()->setLayout('default');
//      	$this->viewBuilder()->setTemplate('listado_cumple_excel');
//      	$this->render();
// $fileName = "cumple ".$month.".xls";
// //$fileName = "bookreport_".date("d-m-y:h:s").".csv";
// $headerRow = array("Nombre", "Fecha", "correo", "correomadre", "correopadre");
// $data = array();
// foreach ($alumnos as $alumno)
// {
// 	$aux = array(h($alumno->presentacion),h($alumno->fecha_nacimiento->format('j')),h($alumno->email),h($alumno->email_madre),h($alumno->email_padre));
// 	array_push($data,$aux);
// }

// ini_set('max_execution_time', 1600); //increase max_execution_time to 10 min if data set is very large
// $fileContent = implode("\t ", $headerRow)."\n";

// foreach($data as $result) {
// 	$fileContent .=  implode("\t ", $result)."\n";
// }

// header('Content-type: application/ms-excel'); /// you can set csv format
// header('Content-Disposition: attachment; filename='.$fileName);
// echo $fileContent;

// exit;


$objPHPExcel = new \PHPExcel();

$objPHPExcel->
getProperties()
->setCreator($this->current_user['nombre']. " ".$this->current_user['apellido'])
->setTitle("Reporte");


// Seteo el formato por default de los bordes para las celdas
$styleCells = array(
		'borders' => array(
				'allborders' => array(
						'style' => \PHPExcel_Style_Border::BORDER_THIN
				)
		)
);

$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A1', 'Nombre y Apellido')
->setCellValue('B1', 'DNI')
->setCellValue('C1', 'Producto')
->setCellValue('D1', 'Numero Producto')
->setCellValue('E1', 'Capital Inicial')
->setCellValue('F1', 'Total')
->setCellValue('G1', 'Estado')
->setCellValue('H1', 'Ultima Gestion')
->setCellValue('I1', 'Fecha Gestion')
->setCellValue('J1', 'Operador');


$_row = 1;



// Ajusto el ancho de las columnas
foreach (range('A', $objPHPExcel->getActiveSheet()->getHighestDataColumn()) as $col) {
	$objPHPExcel->getActiveSheet()
	->getColumnDimension($col)
	->setAutoSize(true);
}

    
    //
    // Seteo el formato por default de los bordes para las celdas del encabezado y las pongo en negrita
    $styleHeader = array(
    		'borders' => array(
    				'allborders' => array(
    						'style' => \PHPExcel_Style_Border::BORDER_THIN
    				)
    		),
    		'font' => array(
    				'bold' => true
    		)
    );
    $objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($styleHeader);
    $objPHPExcel->getActiveSheet()->getStyle('B1')->applyFromArray($styleHeader);
    $objPHPExcel->getActiveSheet()->getStyle('C1')->applyFromArray($styleHeader);
    $objPHPExcel->getActiveSheet()->getStyle('D1')->applyFromArray($styleHeader);
    $objPHPExcel->getActiveSheet()->getStyle('E1')->applyFromArray($styleHeader);
    $objPHPExcel->getActiveSheet()->getStyle('F1')->applyFromArray($styleHeader);
    $objPHPExcel->getActiveSheet()->getStyle('G1')->applyFromArray($styleHeader);
    $objPHPExcel->getActiveSheet()->getStyle('H1')->applyFromArray($styleHeader);
    $objPHPExcel->getActiveSheet()->getStyle('I1')->applyFromArray($styleHeader);
    $objPHPExcel->getActiveSheet()->getStyle('J1')->applyFromArray($styleHeader);
    
    
    
    // Seteo el nombre del archivo
    
    $_file_name_aux = "Reporte ". date('d-m-Y');
    
    //header("Content-Type:   application/vnd.openxmlformats-officedocument.spreadsheetml.sheet; charset=utf-8");
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="'.$_file_name_aux.'".xls"');
    header('Cache-Control: max-age=0');
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
    header("Pragma: public");
    
    $objWriter=\PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
    $objWriter->save('php://output');
    return;
    
    ////////
    
    ///////////////////////////////////////////////////////////////////////////////


    }
    
    public function fichaInterna($id)
    {
    	$alumno = $this->Alumnos->get($id);
		$this->prepararPDF($alumno,"interna","A4","landscape");
    	$this->set(compact('alumno'));
    	
    }
    
    public function fichaExterna($id)
    {
    	$alumno = $this->Alumnos->get($id, [
    			'contain' => ['Clases']
    	]);
    	$this->prepararPDF($alumno,"externa","A4","landscape");
    	
    	$this->set(compact('alumno'));
    	
    }
    
    private function guardarImg($data,$alu)
    {
    	$uploadFile = WWW_ROOT  . 'img' . DS. 'alumnos' . DS;
    	// debug($data); exit;
    	if(!empty($data) && !empty($data['tmp_name']) && !$data['error'])
    	{
    		$referencia = $uploadFile .h($alu. "-"  .$data['name']);
    		if(!move_uploaded_file($data['tmp_name'],$referencia))
    		{
    			$this->Flash->error("Tenemos un problema para cargar la foto");
    			return false;
    		}
    		return $alu. "-"  .$data['name'];
    	}
    	$this->Flash->error("Tenemos un problema para cargar la foto");
    	return false;
    }
   
    private function prepararPDFListado($nomArchivo, $tipoHoja,  $orientacion)
    {
    	$this->viewBuilder()->setOptions([
    			'pdfConfig' => [
    					'margin-bottom' => 0,
    					'margin-right' => 0,
    					'margin-left' => 0,
    					'margin-top' => 0,
    					'pageSize' => $tipoHoja,
    					'orientation' => $orientacion,
    					'filename' => $nomArchivo.'.pdf'
    			]
    	]);
    }
    
    private function prepararPDF($alumno, $tipo, $tipoHoja,  $orientacion)
    {
    	$this->viewBuilder()->setOptions([
    			'pdfConfig' => [
    					'margin-bottom' => 0,
    					'margin-right' => 0,
    					'margin-left' => 0,
    					'margin-top' => 0,
    					'pageSize' => $tipoHoja,
    					'orientation' => $orientacion,
    					'filename' => "Ficha $tipo de :" . $alumno->get('presentacion').'-'.$alumno->nro_documento. '.pdf'
    			]
    	]);
    }

	private function insertarSeguimiento($idAlumno, $idsClases)
	{
		$alumno = $this->Alumnos->get($idAlumno);
		
		//creo un array con los dias con clave y valor para despues poder compararlo con la funcion DATE
		$days = ['Monday' => 1, 'Tuesday' => 2, 'Wednesday' => 3, 'Thursday' => 4, 'Friday' => 5];
		
		//me traigo la tabla de seguimientos
		$Seguimientos = TableRegistry::get('SeguimientosClasesAlumnos');
		
		//Me traigo la tabla de ClasesAlumnos
		$ClasesAlumno = TableRegistry::get('ClasesAlumnos');
		
		//Recorro los ids de clases que voy a necesitar para crear los seguimientos
		foreach ($idsClases as  $pos => $idClase)
		{
			
			//Busco en la base el ID de ClasesAlumnos con id Id de Clase y el ID de Alumno
			$idClaseAlumno = $ClasesAlumno->find('all')
			->where(['ClasesAlumnos.alumno_id' => $idAlumno, 'ClasesAlumnos.clase_id' => $idClase]);
			//valido que venga ID
			if(empty($idClaseAlumno->first()->id))
			{
				$this->Flash->error("El alumno no está inscripto en la clase ID: ".$idClase);
				return false;
			}
			//Me traigo el obj de claseAlumno con todas las propiedasdes y asociaciones
			$claseAlumno = $ClasesAlumno->get($idClaseAlumno->first()->id,['contain' => ['Clases' => ['Horarios' => 'Ciclolectivo'] ] ]);
			
			if(!$claseAlumno->existeSeguimiento())
			{
				//Creo las fechas de incio y fin para  recorrerlas
				$fechaInicio = strtotime($alumno->modified->format('Y-m-d'));
				$fechaFin = strtotime($claseAlumno->clase->horario->ciclolectivo->fecha_fin->format('Y-m-d'));
				
				//recorro por dia hasta la fecha fin
				for($i=$fechaInicio; $i<=$fechaFin; $i+=86400)
				{
					//me traigo el nombre del dia
					$dia = date('N', $i);
					
					//si el dia es el mismo que que el dia de la clase, tengo que crear un seguimiento para ese dia
					if($dia == $days[$claseAlumno->clase->horario->nombre_dia])
					{
						//     				echo $clase->horario->nombre_dia. " ". date ("Y-m-d", $i)."<br>";
						$seguimiento = $Seguimientos->newEntity(
								[
										'clase_alumno_id' => $claseAlumno->id,
										'observacion' => "SIN DATOS",
										'presente' => false,
										'fecha' => new  \DateTime(date('Y-m-d H:i:s', $i)),
										'created' => new \DateTime('now'),
										'created' => new \DateTime('now')
										
								]);
						//$seguimiento->fecha = date ("Y-m-d H:i:s", $i);
						//guardo y valido
						if (!$Seguimientos->save($seguimiento))
						{
							$this->Flash->error("Seguimiento de fecha " .$seguimiento->fecha . " no creado");
							return false;
						}
						
					}
				}
			}
		} //fin foreach de IDSclases
		return true;
	}
	
	/*
	 * prueba de ajax
	 */
	public function getDisciplinas() {
		$this->autoRender = false; // We don't render a view in this example
		$profesor_id = $this->request->getQuery('profesor_id');
		$discs = TableRegistry::get('Disciplinas')->find('all')
	//	->select(['Disciplinas.id' => 'id','Disciplinas.descripcion' => 'desc' ])
		->distinct('Disciplinas.descripcion')
		->matching('Clases')
		->where(['Clases.profesor_id' => $profesor_id])
		->order('Disciplinas.descripcion')
		;
		$i = 0;
		foreach ($discs as $d){
			$i++;
			
			if($i != $discs->count())
			{
				echo $d->id.'-'.$d->descripcion.".";
			}
			else {
				echo $d->id.'-'.$d->descripcion;
			}
		}
		//print $array;
		exit;
	}
	public function getDiaHorario() 
	{
		$this->autoRender = false; // We don't render a view in this example
		$disciplina_id = $this->request->getQuery('idDisciplina');
		$profesor_id= $this->request->getQuery('profesor_id');
		$clases = TableRegistry::get('Clases')->find('all')
		//	->select(['Disciplinas.id' => 'id','Disciplinas.descripcion' => 'desc' ])
		->contain(['Disciplinas','Horarios'])
		->where(['Clases.profesor_id' => $profesor_id, 'Clases.disciplina_id' => $disciplina_id])
		->order('Horarios.num_dia','Horarios.hora')
		;
		$i = 0;
		foreach ($clases as $c){
			$i++;
			$dia = __($c->horario->nombre_dia);
			if($i != $clases->count())
			{
				
				echo  $c->id."-".$dia.' '.$c->horario->hora->format('H:i').".";
			}
			else {
				echo  $c->id."-".$dia.' '.$c->horario->hora->format('H:i');
			}

		}
		
		//print $array;
		exit;
	}
	
	public function ajaxEnviarMails()
	{
		$this->autoRender = false;
		$parametro = TableRegistry::get("Parametros")->find('all')
		->where(['nombre' => ENVIAR_MAIL_AUTOMATICAMENTE]);
		if ($parametro->first()->get('valor'))
		{
			$historialHoy = TableRegistry::get('HistorialMails')->find('all')->where(['dia' => date('Y-m-d')]);
			if ($historialHoy->count() == 0)
			{
				$return = null;
				$dia = date('d');
				$mes = date('m');
				$alumnos = $this->Alumnos->find('all')
				->where(['DAY(fecha_nacimiento)' => "$dia", 'MONTH(fecha_nacimiento)' => "$mes",'active' => true ])
				->orderAsc('nombre')
				->toArray();
				
				$cantMailEnviados = 0;
				$cantMailNoEnviados = 0;
				
				foreach ($alumnos as $alumno)
				{
					if (filter_var($alumno->email, FILTER_VALIDATE_EMAIL))
					{
						$nombre = $alumno->nombre;
						$email = new Email('iba');
						$email
						->setEmailFormat('html')
						->setTo($alumno->email)
						->setSubject("Felíz cumpleaños $nombre!!!")
						->setLayout('default')
						->setTemplate('cumple')
						
						->setAttachments([
								'cumple.png' => [
										'file' => WWW_ROOT.'img'.DS.'cumple.png',
										'mimetype' => 'image/png',
										'contentId' => '4422'
								]
						])
						->setViewVars(['cid' => 4422]);
						if ($email->send(''))
						{
							$cantMailEnviados++;
						}
					}
					elseif(filter_var($alumno->email_madre, FILTER_VALIDATE_EMAIL))
					{
						$nombre = $alumno->nombre;
						$email = new Email('iba');
						$email
						->setEmailFormat('html')
						->setTo($alumno->email_madre)
						->setSubject("Felíz cumpleaños $nombre!!!")
						->setLayout('default')
						->setTemplate('cumple')
						
						->setAttachments([
								'cumple.png' => [
										'file' => WWW_ROOT.'img'.DS.'cumple.png',
										'mimetype' => 'image/png',
										'contentId' => '4422'
								]
						])
						->setViewVars(['cid' => 4422]);
						if ($email->send(''))
						{
							$cantMailEnviados++;
						}
					}
					elseif(filter_var($alumno->email_padre, FILTER_VALIDATE_EMAIL))
					{
						$nombre = $alumno->nombre;
						$email = new Email('iba');
						$email
						->setEmailFormat('html')
						->setTo($alumno->email_padre)
						->setSubject("Felíz cumpleaños $nombre!!!")
						->setLayout('default')
						->setTemplate('cumple')
						
						->setAttachments([
								'cumple.png' => [
										'file' => WWW_ROOT.'img'.DS.'cumple.png',
										'mimetype' => 'image/png',
										'contentId' => '4422'
								]
						])
						->setViewVars(['cid' => 4422]);
						if ($email->send(''))
						{
							$cantMailEnviados++;
						}
					}
					else {
						$cantMailNoEnviados++;
						$return .=' Por favor revise el mail de '. $alumno->presentacion.'  ';
					}
				}
				
				if ($cantMailEnviados > 0)
				{
					$historial = TableRegistry::get('HistorialMails')->newEntity();
					$historial->set([
							'dia' => date('Y-m-d'),
							'enviado' => true,
							'cantidad' => $cantMailEnviados
					]);
					if (!TableRegistry::get('HistorialMails')->save($historial))
					{
						$return = 'No se puedo guardar el historial de mails!';
					}
				}
				$return = "Se enviaron $cantMailEnviados mails. No pudieron enviarse $cantMailNoEnviados";
				echo $return;
				exit;
			}
			else
			{
				echo "Ya se enviaron los mails de Saludos!";
				exit;
			}
		}
	}
	
	
}
