<?php
declare(strict_types=1);

namespace App\Controller;

class UsersController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event): void
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['login', 'add']);
    }

    public function index()
    {
        $users = $this->paginate($this->Users->find());
        $this->set(compact('users'));
    }

    public function view($id = null)
    {
        // Si no se proporciona ID, usar el del usuario autenticado
        if ($id === null) {
            $identity = $this->Authentication->getIdentity();
            if (!$identity) {
                $this->Flash->error(__('Debes estar autenticado para ver tu perfil.'));
                return $this->redirect(['action' => 'login']);
            }
            $id = $identity->id;
        }
        
        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }

    public function edit($id = null)
    {
        if ($id === null) {
            $identity = $this->Authentication->getIdentity();
            if (!$identity) {
                $this->Flash->error(__('Debes estar autenticado para editar tu perfil.'));
                return $this->redirect(['action' => 'login']);
            }
            $id = $identity->id;
        }
        
        $user = $this->Users->get($id);
        
        if ($this->request->is(['post', 'put', 'patch'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Los datos han sido actualizados.'));
                return $this->redirect(['action' => 'view', $user->id]);
            }
            $this->Flash->error(__('No se pudieron actualizar los datos. Inténtalo de nuevo.'));
        }
        $this->set(compact('user'));
    }

    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();

        if ($result && $result->isValid()) {
            
            $identity = $this->Authentication->getIdentity();
            $rol = (string)$identity->rol; 

          
            if ($rol === 'Administrador') {
                // El Admin se va a su zona privada
                $target = [
                    'prefix' => 'Admin', 
                    'controller' => 'Viajes', 
                    'action' => 'home'
                ];
            } elseif ($rol === 'Cliente') {
                // El Cliente se va a su dashboard
                $target = [
                    'prefix' => false, 
                    'controller' => 'Viajes', 
                    'action' => 'dashboard'
                ];
            } else {
                // Si existiera otro rol, lo mandamos al inicio general
                $target = ['controller' => 'Pages', 'action' => 'display', 'home'];
            }

            return $this->redirect($target);
        }

        // Si falla el login
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Usuario o contraseña incorrectos.'));
        }
    }

    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            // Forzar rol Cliente por defecto al registrarse (seguridad)
            $user->rol = 'Cliente'; 
            
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Usuario registrado. Ahora puedes iniciar sesión.'));
                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('No se pudo registrar el usuario. Inténtalo de nuevo.'));
        }
        $this->set(compact('user'));
    }

    public function logout()
    {
        $result = $this->Authentication->getResult();
        if ($result && $result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect('/users/login');
        }
    }
}