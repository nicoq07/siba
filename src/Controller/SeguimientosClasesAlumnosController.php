<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use App\Model\Entity\SeguimientosClasesAlumno;
/**
 * SeguimientosClasesAlumnos Controller
 *
 * @property \App\Model\Table\SeguimientosClasesAlumnosTable $SeguimientosClasesAlumnos
 *
 * @method \App\Model\Entity\SeguimientosClasesAlumno[] paginate($object = null, array $settings = [])
 */
class SeguimientosClasesAlumnosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
    	$where = null;
    	$session = $this->request->session();
    
    	if ($this->request->is('post'))
    	{
    		$session->delete('where');
    		$where1 = null;
    		$where2 = null;
    		$where3 = null;
    		if (!(empty($this->request->getData()['palabra_clave'])))
    		{ 
    			$palabra = $this->request->getData()['palabra_clave'];
    			$where1= ["(alumnos.nombre LIKE '%$palabra%' OR alumnos.apellido LIKE '%$palabra%' OR alumnos.nro_documento LIKE '%$palabra%')"];
    		}
    		if (!(empty($this->request->getData()['clases'])))
    		{
    			$clase = $this->request->getData()['clases'];
    			$where2= ["clases.id = $clase"];
    		}
    		
    			$mes= $this->request->getData()['mob']['month'];
    			 $year= $this->request->getData()['year']['year'];
    			if ($year && $mes)
    			{
    				$fecha =date('Y-m-d h:i:s',strtotime("$year-$mes-01"));
    				$where3 = ["EXTRACT(YEAR_MONTH FROM fecha) = EXTRACT(YEAR_MONTH FROM '$fecha')"];
    			}
    			elseif ($year)
    			{
    				$fecha =date('Y-m-d h:i:s',strtotime("$year-01-01"));
    				$where3 = ["YEAR(fecha) = YEAR('$fecha')"];
    			}
    			elseif ($mes)
    			{
    				$fecha =date('Y-m-d h:i:s',strtotime("2000-$mes-01"));
    				$where3 = ["MONTH(fecha) = MONTH('$fecha')"];
    			}
    			$session->write('where',[$where1,$where2,$where3]);
    			
    	}
    	
    	if ($session->check('where'))
    	{
    		$where = $session->read('where');
    	}
    	else 
    	{
    		$where = null;
    	}
    	$clases = $this->SeguimientosClasesAlumnos->ClasesAlumnos->Clases->find('list');
    	
        $this->paginate = [
        		'conditions' => $where,
        		'contain' => ['ClasesAlumnos' => ['Alumnos','Clases' => ['Disciplinas','Horarios','Profesores'] ] , 'Calificaciones']
        ];
        $seguimientosClasesAlumnos = $this->paginate($this->SeguimientosClasesAlumnos);

        
        
        $this->set(compact('seguimientosClasesAlumnos','clases'));
    }

    /**
     * View method
     *
     * @param string|null $id Seguimientos Clases Alumno id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $seguimientosClasesAlumno = $this->SeguimientosClasesAlumnos->get($id, [
            'contain' => ['ClasesAlumnos', 'Calificaciones']
        ]);

        $this->set('seguimientosClasesAlumno', $seguimientosClasesAlumno);
        $this->set('_serialize', ['seguimientosClasesAlumno']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $seguimientosClasesAlumno = $this->SeguimientosClasesAlumnos->newEntity();
        if ($this->request->is('post')) {
            $seguimientosClasesAlumno = $this->SeguimientosClasesAlumnos->patchEntity($seguimientosClasesAlumno, $this->request->getData());
            if ($this->SeguimientosClasesAlumnos->save($seguimientosClasesAlumno)) {
                $this->Flash->success(__('The seguimientos clases alumno has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The seguimientos clases alumno could not be saved. Please, try again.'));
        }
        $ClasesAlumnos = $this->SeguimientosClasesAlumnos->ClasesAlumnos->find('list', ['limit' => 200]);
        $calificaciones = $this->SeguimientosClasesAlumnos->Calificaciones->find('list', ['limit' => 200]);
        $this->set(compact('seguimientosClasesAlumno', 'ClasesAlumnos', 'calificaciones'));
        $this->set('_serialize', ['seguimientosClasesAlumno']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Seguimientos Clases Alumno id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $seguimientosClasesAlumno = $this->SeguimientosClasesAlumnos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $seguimientosClasesAlumno = $this->SeguimientosClasesAlumnos->patchEntity($seguimientosClasesAlumno, $this->request->getData());
            if ($this->SeguimientosClasesAlumnos->save($seguimientosClasesAlumno)) {
                $this->Flash->success(__('The seguimientos clases alumno has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The seguimientos clases alumno could not be saved. Please, try again.'));
        }
        $ClasesAlumnos = $this->SeguimientosClasesAlumnos->ClasesAlumnos->find('list', ['limit' => 200]);
        $calificaciones = $this->SeguimientosClasesAlumnos->Calificaciones->find('list', ['limit' => 200]);
        $this->set(compact('seguimientosClasesAlumno', 'ClasesAlumnos', 'calificaciones'));
        $this->set('_serialize', ['seguimientosClasesAlumno']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Seguimientos Clases Alumno id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $seguimientosClasesAlumno = $this->SeguimientosClasesAlumnos->get($id);
        if ($this->SeguimientosClasesAlumnos->delete($seguimientosClasesAlumno)) {
            $this->Flash->success(__('The seguimientos clases alumno has been deleted.'));
        } else {
            $this->Flash->error(__('The seguimientos clases alumno could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
