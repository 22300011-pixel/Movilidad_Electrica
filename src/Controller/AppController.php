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

        // acciones públicas que no requieren login (añadir las que necesite)
        $this->Authentication->addUnauthenticatedActions([
            'display', // Pages::display (home)
            'index', 'view', // listados y detalles
            'login', 'register', 'forgotPassword'
        ]);
    }

    public function beforeFilter(EventInterface $event): void
    {
        parent::beforeFilter($event);

        $action = strtolower((string)$this->request->getParam('action'));
        $controller = strtolower((string)$this->request->getParam('controller'));
        $identity = $this->Authentication->getIdentity();

        // Administrador: acceso total
        if ($identity && (string)$identity->rol === 'Administrador') {
            return;
        }

        // Cliente: accesos restringidos a controladores/acciones específicas
        if ($identity && (string)$identity->rol === 'Cliente') {
            $allowed = [
                // controladores => acciones permitidas para Cliente (todo en minúsculas)
                'metodospago' => ['index', 'view', 'select', 'pay'],
                'vehiculos'   => ['index', 'view', 'search'],
                'viajes'      => ['add', 'end', 'finish', 'index', 'view'],
                'users'       => ['view', 'edit', 'profile']
            ];

            // Permitir edición/visualización solo de su propio perfil
            if ($controller === 'users' && in_array($action, ['edit', 'view', 'profile'], true)) {
                $targetId = $this->request->getParam('pass.0') ?? $this->request->getQuery('id') ?? $this->request->getParam('id');
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
                'users'     => ['login', 'register', 'forgotpassword', 'forgot_password', 'forgot-password'],
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