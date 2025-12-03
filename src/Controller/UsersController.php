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

    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();

        // Si el login es válido
        if ($result && $result->isValid()) {
            
            // 1. Obtenemos quién es el usuario y qué rol tiene
            $identity = $this->Authentication->getIdentity();
            $rol = (string)$identity->rol; // Asegúrate que en tu BD la columna se llame 'rol'

            // 2. Definimos a dónde va cada uno
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

            // 3. Redirigimos ignorando el 'redirect' anterior para forzar la ruta segura según el rol
            // Nota: Si prefieres que CakePHP recuerde la URL anterior, usa getQuery('redirect', $target)
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