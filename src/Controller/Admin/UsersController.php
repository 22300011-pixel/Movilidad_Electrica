<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Datasource\Exception\RecordNotFoundException;

/**
 * Users Controller (Admin)
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    public function index()
    {
        $query = $this->Users->find();
        $users = $this->paginate($query);

        $this->set(compact('users'));
    }

    public function view($id = null)
    {
        if ($id === null) {
            $this->Flash->error(__('Registro inválido.'));
            return $this->redirect(['action' => 'index']);
        }

        try {
            $user = $this->Users->get($id, contain: ['MetodoDePagos', 'Viajes']);
        } catch (RecordNotFoundException $e) {
            $this->Flash->error(__('Registro no encontrado.'));
            return $this->redirect(['action' => 'index']);
        }

        $this->set(compact('user'));
    }

    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('El usuario ha sido guardado.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo guardar el usuario. Por favor, intente de nuevo.'));
        }
        $this->set(compact('user'));
    }

    public function edit($id = null)
    {
        if ($id === null) {
            $this->Flash->error(__('Registro inválido.'));
            return $this->redirect(['action' => 'index']);
        }

        try {
            $user = $this->Users->get($id, contain: []);
        } catch (RecordNotFoundException $e) {
            $this->Flash->error(__('Registro no encontrado.'));
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            if (isset($data['password']) && $data['password'] === '') {
                unset($data['password']);
            }

            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('El usuario ha sido guardado.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo guardar el usuario. Por favor, intente de nuevo.'));
        }

        $this->set(compact('user'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        if ($id === null) {
            $this->Flash->error(__('Registro inválido.'));
            return $this->redirect(['action' => 'index']);
        }

        try {
            $user = $this->Users->get($id);
        } catch (RecordNotFoundException $e) {
            $this->Flash->error(__('Registro no encontrado.'));
            return $this->redirect(['action' => 'index']);
        }

        if ($this->Users->delete($user)) {
            $this->Flash->success(__('El usuario ha sido eliminado.'));
        } else {
            $this->Flash->error(__('No se pudo eliminar el usuario. Por favor, intente de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function logout()
    {
        $this->request->allowMethod(['post', 'get']);

        if ($this->Authentication) {
            $this->Authentication->logout();
        }

        $this->getRequest()->getSession()->destroy();

        $this->Flash->success(__('Sesión cerrada correctamente.'));

        return $this->redirect([
            'prefix' => false,
            'controller' => 'Pages',
            'action' => 'display',
            'home'
        ]);
    }
}
