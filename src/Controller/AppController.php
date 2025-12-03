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

        // Acciones públicas que no requieren login
        $this->Authentication->addUnauthenticatedActions([
            'display', // Pages::display (home)
            'index', 'view', // Listados y detalles
            'login', 'register', 'forgotPassword', 'add'
        ]);
    }

    public function beforeFilter(EventInterface $event): void
    {
        parent::beforeFilter($event);

        $action = strtolower((string)$this->request->getParam('action'));
        $controller = strtolower((string)$this->request->getParam('controller'));
        
        // Obtenemos el prefijo (ej. 'Admin') para proteger esas rutas
        $prefix = $this->request->getParam('prefix');
        
        $identity = $this->Authentication->getIdentity();

        // --- BLOQUEO DE SEGURIDAD ADMIN ---
        // Si intenta entrar a una ruta /admin/... y NO es Administrador
        if ($prefix === 'Admin') {
            if (!$identity || (string)$identity->rol !== 'Administrador') {
                $this->Flash->error(__('Acceso denegado. Área exclusiva de administradores.'));
                
                // CORRECCIÓN: Llamar a redirect sin 'return' delante, y luego hacer return;
                if ($identity) {
                    // Si es cliente, al dashboard
                    $this->redirect(['prefix' => false, 'controller' => 'Viajes', 'action' => 'dashboard']);
                    return; 
                }
                
                // Si no está logueado, al login
                $this->redirect(['prefix' => false, 'controller' => 'Users', 'action' => 'login']);
                return;
            }
            // Si es admin en ruta admin, permitir todo
            return;
        }

        // Administrador: acceso total (fuera del prefijo Admin también)
        if ($identity && (string)$identity->rol === 'Administrador') {
            return;
        }

        // Cliente: accesos restringidos a controladores/acciones específicas
        if ($identity && (string)$identity->rol === 'Cliente') {
            $allowed = [
                // Controladores => acciones permitidas para Cliente (todo en minúsculas)
                'metodospago' => ['index', 'view', 'select', 'pay'],
                'vehiculos'   => ['index', 'view', 'search'],
                'viajes'      => ['add', 'end', 'finish', 'index', 'view', 'dashboard'], 
                'users'       => ['view', 'edit', 'profile']
            ];

            // Permitir edición/visualización solo de su propio perfil
            if ($controller === 'users' && in_array($action, ['edit', 'view', 'profile'], true)) {
                $targetId = $this->request->getParam('pass.0') ?? $this->request->getQuery('id') ?? $this->request->getParam('id');
                // Si intenta ver otro ID que no sea el suyo
                if ($targetId !== null && (string)$targetId !== (string)$identity->id) {
                    $this->Flash->error(__('No tiene permisos para editar/visualizar otro perfil.'));
                    $this->redirect('/');
                    return;
                }
                return;
            }

            if (isset($allowed[$controller]) && in_array($action, $allowed[$controller], true)) {
                return;
            }

            $this->Flash->error(__('No tiene permisos para acceder a esta acción.'));
            $this->redirect('/');
            return;
        }

        // Público (no registrado): accesos limitados
        if (!$identity) {
            $guestAllowed = [
                'pages'     => ['display', 'home', 'index'],
                'users'     => ['login', 'register', 'forgotpassword', 'forgot_password', 'forgot-password', 'add'],
                'vehiculos' => ['index', 'view'],
                'viajes'    => ['index', 'view']
            ];

            if (isset($guestAllowed[$controller]) && in_array($action, $guestAllowed[$controller], true)) {
                return;
            }

            $this->Flash->error(__('Debe iniciar sesión para acceder a esta acción.'));
            $this->redirect('/users/login');
            return;
        }
    }
}