<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Session;

/**
 * SeguimientosClases Controller
 *
 * @property \App\Model\Table\SeguimientosClasesTable $SeguimientosClases
 *
 * @method \App\Model\Entity\SeguimientosClase[] paginate($object = null, array $settings = [])
 */
class SeguimientosClasesController extends AppController
{

	/*
	 * CREATE TABLE IF NOT EXISTS `seguimientos_clases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clase_id` int(11) DEFAULT NULL,
  `alumno_id` int(11) NOT NULL,
  `observacion` text COLLATE latin1_spanish_ci,
  `presente` tinyint(1) NOT NULL DEFAULT '1',
  `calificacion_id` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ClaseAlumnoSeguimiento_idx` (`clase_id`),
  KEY `FK_CalificacionSeguimiento_idx` (`calificacion_id`),
  KEY `alumno_id` (`alumno_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `seguimientos_clases`
--
ALTER TABLE `seguimientos_clases`
  ADD CONSTRAINT `FK_CalificacionSeguimiento` FOREIGN KEY (`calificacion_id`) REFERENCES `calificaciones` (`id`);
	 */
	
	
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
    	//$comboClases = false;
    	
    	if ($this->request->is('post'))
    	{
    		$this->request->session()->delete('where');
    		$esActive = $this->request->getData()['activos'];
    		$where1= ['Alumnos.active' => $esActive];
    		
    		$esAdolecencia =$this->request->getData()['adolecencia'];
    		$where2= ['Alumnos.programa_adolecencia' => $esAdolecencia];
    		
    		if (!(empty($this->request->getData()['clase'])))
    		{
    			$idClase = $this->request->getData()['clase'];
    			$where3= ["Clases.id = $idClase"];
    		///	$comboClases = true;
    		}
    		
    		if (!(empty($this->request->getData()['palabra_clave_alumno'])))
    		{
    			$palabra = $this->request->getData()['palabra_clave_alumno'];
    			/*if ($comboClases)
    			{
    				$where4= ["Alumnos.id = $palabra"];
    			}
    			else 
    			{*/
    				$where4= ["Alumnos.nombre LIKE '%$palabra%' OR Alumnos.apellido LIKE '%$palabra%' OR Alumnos.nro_documento LIKE '%$palabra%'"];
    			//}
    			
    		}
    		$this->request->session()->write('where',[$where1,$where2,$where3,$where4]);
    	}
    	else
    	{
    		if ($this->request->session()->check('where'))
    		{
    			$where1 = $this->request->session()->read('where')[0];
    			$where2= $this->request->session()->read('where')[1];
    			$where3= $this->request->session()->read('where')[2];
    			$where4= $this->request->session()->read('where')[3];
    		}
    		else 
    		{
    			$where1 =['alumnos.active' => true];
    		}
    		
    		
    	}
    	
    	///
        $this->paginate = [
            'contain' => ['Clases', 'Alumnos', 'Calificaciones'],
        	'conditions' => [$where1,$where2,$where3,$where4]
        ];
        $seguimientosClases = $this->paginate($this->SeguimientosClases);
		$clases = $this->SeguimientosClases->Clases->find('list')
		->select(['Clases.id','Clases.disciplina_id','Clases.profesor_id','Clases.horario_id'])
		->matching('SeguimientosClases')
		->where(['Clases.active' => true]);
		/*$alumnos = $this->SeguimientosClases->Alumnos->find('list')
		->select(['Alumnos.id','Alumnos.apellido','Alumnos.nombre'])
		->matching('Clases')
		->where(['Clases.active' => true]);*/
		
        $this->set(compact('seguimientosClases','clases',/*'comboClases',*/'alumnos'));
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
            'contain' => ['Clases' => ['Horarios'], 'Alumnos', 'Calificaciones']
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
            $seguimientosClase = $this->SeguimientosClases->patchEntity($seguimientosClase, $this->request->getData());
            if ($this->SeguimientosClases->save($seguimientosClase)) {
                $this->Flash->success(__('The seguimientos clase has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The seguimientos clase could not be saved. Please, try again.'));
        }
        $clases = $this->SeguimientosClases->Clases->find('list', ['limit' => 200]);
        $alumnos = $this->SeguimientosClases->Alumnos->find('list', ['limit' => 200]);
        $calificaciones = $this->SeguimientosClases->Calificaciones->find('list', ['limit' => 200]);
        $this->set(compact('seguimientosClase', 'clases', 'alumnos', 'calificaciones'));
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
        $clases = $this->SeguimientosClases->Clases->find('list', ['limit' => 200]);
        $alumnos = $this->SeguimientosClases->Alumnos->find('list', ['limit' => 200]);
        $calificaciones = $this->SeguimientosClases->Calificaciones->find('list', ['limit' => 200]);
        $this->set(compact('seguimientosClase', 'clases', 'alumnos', 'calificaciones'));
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
