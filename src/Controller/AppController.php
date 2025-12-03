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
            'forgotPassword'
        ]);
    }

    // Mantenemos el : void, pero ajustamos la lógica interna
    public function beforeFilter(EventInterface $event): void
    {
        parent::beforeFilter($event);

        $action = strtolower((string)$this->request->getParam('action'));
        $controller = strtolower((string)$this->request->getParam('controller'));
        $prefix = $this->request->getParam('prefix');
        
        $identity = $this->Authentication->getIdentity();

        // ---------------------------------------------------------
        // 1. BLOQUEO DE SEGURIDAD ADMIN
        // ---------------------------------------------------------
        if ($prefix === 'Admin') {
            if (!$identity || (string)$identity->rol !== 'Administrador') {
                $this->Flash->error(__('Acceso denegado. Área exclusiva de administradores.'));
                
                if ($identity) {
                    // CORRECCIÓN: Ejecutar redirect y luego return vacío
                    $this->redirect(['prefix' => false, 'controller' => 'Viajes', 'action' => 'dashboard']);
                    return;
                }
                
                $this->redirect(['prefix' => false, 'controller' => 'Users', 'action' => 'login']);
                return;
            }
            return;
        }

        // ---------------------------------------------------------
        // 2. LÓGICA DE USUARIOS LOGUEADOS
        // ---------------------------------------------------------
        
        // A) Administrador
        if ($identity && (string)$identity->rol === 'Administrador') {
            return;
        }

        // B) Cliente
        if ($identity && (string)$identity->rol === 'Cliente') {
            $allowed = [
                'metodospago' => ['index', 'view', 'select', 'pay'],
                'vehiculos'   => ['index', 'view', 'search'],
                'viajes'      => ['add', 'end', 'finish', 'index', 'view', 'dashboard'], 
                'users'       => ['view', 'edit', 'profile', 'logout'], 
                'pages'       => ['display']
            ];

            // Validación de Perfil
            if ($controller === 'users' && in_array($action, ['edit', 'view', 'profile'], true)) {
                $targetId = $this->request->getParam('pass.0') ?? $this->request->getQuery('id') ?? $this->request->getParam('id');
                
                if ($targetId !== null && (string)$targetId !== (string)$identity->id) {
                    $this->Flash->error(__('No tiene permisos para editar/visualizar otro perfil.'));
                    // CORRECCIÓN
                    $this->redirect(['controller' => 'Viajes', 'action' => 'dashboard']);
                    return;
                }
                return;
            }

            if (isset($allowed[$controller]) && in_array($action, $allowed[$controller], true)) {
                return;
            }

            $this->Flash->error(__('No tiene permisos para acceder a esta acción.'));
            // CORRECCIÓN
            $this->redirect(['controller' => 'Viajes', 'action' => 'dashboard']);
            return;
        }

        // ---------------------------------------------------------
        // 3. PÚBLICO GENERAL (Sin Loguear)
        // ---------------------------------------------------------
        if (!$identity) {
            $guestAllowed = [
                'pages'       => ['display', 'home'],
                'users'       => ['login', 'register', 'forgotpassword', 'forgot-password'],
                'promociones' => ['index', 'view'], 
                'estaciones'  => ['index', 'view'],
                'modelos'     => ['index', 'view'],
                'vehiculos'   => ['index', 'view'] 
            ];

            if (isset($guestAllowed[$controller]) && in_array($action, $guestAllowed[$controller], true)) {
                return;
            }

            $this->Flash->error(__('Debe iniciar sesión para acceder a esta acción.'));
            // CORRECCIÓN final
            $this->redirect(['controller' => 'Users', 'action' => 'login']);
            return;
        }
    }
}