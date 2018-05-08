<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\Number;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

	public function beforeFilter(\Cake\Event\Event $event)
	{
		parent::beforeFilter($event);
		$this->Auth->allow(['add']);
	}
	
	public function isAuthorized($user)
	{
		if(isset($user['rol_id']) &&  $user['rol_id'] == PROFESOR)
		{
			if(in_array($this->request->action, ['cargarFondo','cambiarPassword','index','view','logout','home','pPerfil','home']))
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
            'contain' => ['Roles']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles', 'PagosAlumnos']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        
        if ($this->request->is('post'))
        {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($user->profesor_id > 0)
            {
	            $profe =  $this->Users->Profesores->get($user->profesor_id);
	            $user->set(['nombre' => $profe->nombre, 'apellido' => $profe->apellido,'dni' => $profe->cuit]);
            }
            else 
            {
            	$user->set('profesor_id',null);
            }
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Usuario creado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Error, verifique los campos.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 3]);
        
        $subquery = $this->Users
	    ->find('list')
	    ->where(['Users.profesor_id = Profesores.id']);

	    $profesores= $this->Users->Profesores
		    ->find('list')
		    ->where([
		        'NOT EXISTS'  => $subquery
		    ]);
		    
        $this->set(compact('user', 'roles','profesores'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function login()
    {
    	if($this->request->is('post'))
    	{
    		$user = $this->Auth->identify();
    		if($user)
    		{
    			$this->Auth->setUser($user);
    			{
    				return $this->redirect($this->Auth->redirectUrl());
    			}
    		}
    		else
    		{
    			$this->Flash->error('Datos invalidos, por favor intente nuevamente', ['key' => 'auth']);
    		}
    	}
    	if ($this->Auth->user())
    	{
    		return $this->redirect(['controller' => 'Users', 'action' => 'home']);
    	}
    }
    
    public function logout()
    {
    	return $this->redirect($this->Auth->logout());
    }
    
    public function cambiarPassword($id = null)
    {
    	$user = $this->Users->get($id);
    	if ($this->request->is(['patch', 'post', 'put'])) {
    		$user = $this->Users->patchEntity($user, $this->request->getData());
    		if ($this->Users->save($user)) {
    			$this->Flash->success(__('Password cambiada!'));
    			
    			return $this->redirect(['action' => 'perfil']);
    		}
    		$this->Flash->error(__('Error, reitentá por favor!.'));
    	}

    	$this->set(compact('user'));
    }
    
    public function home()
    {
    	$user = $this->Users->get($this->Auth->user('id'), [
    			'contain' => ['Roles']
    	]);
    	$notificaciones = $this->Users->Notificaciones->find('all')
    	->where(['receptor' => $user->id , 'leida' => false])
    	->toArray();
    	;
    	
    	$tareas = TableRegistry::get("GestorTareas")->find('all')
    	->where(['resuelta' => false])
    	->toArray();
    	;
    	
    	$tareas = TableRegistry::get("GestorTareas")->find('all')
    	->where(['resuelta' => false])
    	->toArray();
    	;
    	
    	$this->loadComponent('Day');
    	
    	$saludo = $this->Day->momentoDelDia();
    	
    	$this->set(compact('user','notificaciones','tareas','saludo'));
    }
    
    
    
    public function perfil()
    {
       	$qClases = "SELECT * FROM view_clases as v WHERE v.cantAlu = 0 order by dia, hora";
       	$connection = ConnectionManager::get('default');
    	$clasesD = $connection->execute($qClases);
    	
    	$horarios = TableRegistry::get('Horarios')->find('all')
    	->contain(['Clases','Ciclolectivo'])
    	->where(['nombre_dia' =>  date('l'),'YEAR(ciclolectivo.fecha_inicio)' => date('Y') ])
    	->orderAsc("hora");
		
		

		$pagos = TableRegistry::get('PagosAlumnos')->find()
		->contain(['PagosConceptos','Users'])
		->where(['YEAR(PagosAlumnos.created)' => date('Y'), 'PagosAlumnos.pagado' => true ])
		->orderDesc('PagosAlumnos.created')
		;

		$qPagos = 'Select SUM(monto) as monto, fecha FROM view_pagos_por_dia as vp  GROUP BY DATE(fecha) ORDER BY fecha DESC LIMIT 10;';
    	$resultPagos = $connection->execute($qPagos);
    	$montos=array();
    	$fechas=array();
    	foreach ($resultPagos as $pago)
    	{
    	    array_push($montos,floatval($pago['monto']));
    	    array_push($fechas,date('d-m-y',strtotime($pago['fecha'])));
    	}
    	$montos = json_encode(array_reverse($montos));
    	$fechas = json_encode(array_reverse($fechas));
    	$user = $this->Users->get($this->Auth->user('id'), [
    			'contain' => ['Roles']
    	]);
    	$this->set(compact('user','horarios','clasesD','montos','fechas','pagos'));
    	
    	
    }
    
    public  function pPerfil()
    {
    	
    	$id = $this->Auth->user('profesor_id');
    	
    	$horarios = TableRegistry::get('Horarios')->find('all')
    	->contain('Ciclolectivo')
    	->matching('Clases', function ($q)
    			{
    			return $q->where(['Clases.alumno_count >' => 0 ]);
    	})
    	->where(['nombre_dia' => date('l'), 'Clases.profesor_id' => $id,'YEAR(ciclolectivo.fecha_inicio)' => date('Y')])
    	->orderAsc("hora")
    	;
    	$mensaje = '';
    	if ($horarios->count() == 0)
    	{
    		$mensaje= 'No tenés alumnos en tus clases para hoy.';
    		
    	}
    	$this->set(compact('horarios','mensaje'));
    }
    
    
    public function desactivar($id = null)
    {
    	
    	$this->request->allowMethod(['post', 'delete']);
    	$user = $this->Users->get($id);
    	$user->set('active',false);
    	if ($this->Users->save($user)) {
    		$this->Flash->success(__('Usuario desactivado.'));
    	} else {
    		$this->Flash->error(__('Error, reitente!.'));
    	}
    	
    	return $this->redirect(['action' => 'index']);
    	//
    }
    
    public function cargarFondo()
    {
    	if ($this->request->is('post'))
    	{
    		$id = $this->Auth->user('id');
    		$user = $this->Users->get($id);
    		$user->set('fondo',$this->request->getData('fondo'));
    		if ($this->Users->save($user)) {
    			$this->Flash->success(__('Fondo cargado! Cierre sesión y vuelva a entrar.'));
    		} else {
    			$this->Flash->error(__('Error, reitente!.'));
    		}
    	}
    	$fondos = array(
    		    "Batería" =>"bateria.jpg",
    			"Ciudad" =>"ciudad.jpg",
    			"Bajo" =>"bajo.jpg",
    			"Guitarra" =>"guitarra.jpg",
    			"Canto" =>"mic.jpg",
    			"Montañas" =>"montanas.jpg",
    			"Piano" =>"piano.jpg" ,
    			"Ruta" =>"ruta.jpg",
    			"Trombón" =>"tromp.jpg",
    			"Violín" =>"violin.jpg" 
				    			
    	);
    	$this->set('fondos',$fondos);
    	
    }
    
    
}
