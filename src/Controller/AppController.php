<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\EventInterface;

class AppController extends Controller
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Flash');
        $this->loadComponent('Authentication.Authentication');

        $this->Authentication->addUnauthenticatedActions([
            'display', 
            'login', 
            'register', 
            'add', 
            'forgotPassword'
        ]);
    }

    public function beforeFilter(EventInterface $event): void
    {
        parent::beforeFilter($event);

        $action = strtolower((string)$this->request->getParam('action'));
        $controller = strtolower((string)$this->request->getParam('controller'));
        $prefix = $this->request->getParam('prefix');
        
        $identity = $this->Authentication->getIdentity();

        
        if ($prefix === 'Admin') {
            if (!$identity || (string)$identity->rol !== 'Administrador') {
                $this->Flash->error(__('Acceso denegado. Área exclusiva de administradores.'));
                
                if ($identity) {
                    $this->redirect(['prefix' => false, 'controller' => 'Viajes', 'action' => 'dashboard']);
                    return;
                }
                
                $this->redirect(['prefix' => false, 'controller' => 'Users', 'action' => 'login']);
                return;
            }
            return;
        }

       
        if ($identity && (string)$identity->rol === 'Administrador') {
            return;
        }

       
        if ($identity && (string)$identity->rol === 'Cliente') {
            $allowed = [
               
                'metododepagos' => ['index', 'view', 'add', 'edit', 'delete'], 
                
                
                'estaciones'    => ['index', 'view', 'home'],
                'modelos'       => ['index', 'view'],
                'promociones'       => ['index', 'view'],
                
                'vehiculos'     => ['index', 'view', 'search'],
                'viajes'        => ['add','index', 'view', 'dashboard'], 
                'users'         => ['view', 'edit', 'logout'], 
                'pages'         => ['display']
            ];

      
            if ($controller === 'users' && in_array($action, ['edit', 'view', 'profile'], true)) {
                $targetId = $this->request->getParam('pass.0') ?? $this->request->getQuery('id') ?? $this->request->getParam('id');
                
                if ($targetId !== null && (string)$targetId !== (string)$identity->id) {
                    $this->Flash->error(__('No tiene permisos para editar/visualizar otro perfil.'));
                    $this->redirect(['controller' => 'Viajes', 'action' => 'dashboard']);
                    return;
                }
                return;
            }

            if (isset($allowed[$controller]) && in_array($action, $allowed[$controller], true)) {
                return;
            }

            $this->Flash->error(__('No tiene permisos para acceder a esta acción.'));
            $this->redirect(['controller' => 'Viajes', 'action' => 'dashboard']);
            return;
        }

        if (!$identity) {
            $guestAllowed = [
                'pages'       => ['display', 'home'],
                'users'       => ['login', 'add'], 
                'promociones' => ['index', 'view'], 
                
                
                'estaciones'  => ['index', 'view', 'home'],
                
                'modelos'     => ['index', 'view'],
                'vehiculos'   => ['index', 'view'] 
            ];

            if (isset($guestAllowed[$controller]) && in_array($action, $guestAllowed[$controller], true)) {
                
                $this->Authentication->addUnauthenticatedActions([$this->request->getParam('action')]);
                return;
            }

            $this->Flash->error(__('Debe iniciar sesión para acceder a esta acción.'));
            $this->redirect(['controller' => 'Users', 'action' => 'login']);
            return;
        }
    }
}