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
    }

    public function beforeFilter(EventInterface $event): void
    {
        parent::beforeFilter($event);

        $action = $this->request->getParam('action');
        $controller = $this->request->getParam('controller');
        $identity = $this->Authentication->getIdentity();

        // Administrador: acceso total
        if ($identity && (string)$identity->rol === 'Administrador') {
            return;
        }

        // Cliente: accesos restringidos a controladores/acciones específicas
        if ($identity && (string)$identity->rol === 'Cliente') {
            $allowed = [
                // controladores => acciones permitidas para Cliente
                'MetodosPago' => ['index', 'view', 'select', 'pay'], // seleccionar y pagar
                'Vehiculos'   => ['index', 'view', 'search'],        // identificar vehículos disponibles
                'Viajes'      => ['add', 'end', 'finish', 'index', 'view'], // crear y terminar viajes
                'Usuarios'    => ['view', 'edit', 'profile']         // gestión de su propio perfil
            ];

            // Permitir edición/visualización solo de su propio perfil
            if ($controller === 'Usuarios' && in_array($action, ['edit', 'view', 'profile'], true)) {
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
                'Pages'    => ['display', 'home', 'index'],
                'Users'    => ['login', 'register', 'forgotPassword'],
                'Vehiculos'=> ['index', 'view'] // ver vehículos disponibles
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
