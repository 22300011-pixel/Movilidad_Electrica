<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\Exception\RecordNotFoundException;

class MetodoDePagosController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->MetodoDePagos = $this->getTableLocator()->get('MetodoDePagos');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->MetodoDePagos->find()
            ->contain(['Users']); // añadir relaciones si las necesitas
        $metodoDePagos = $this->paginate($query);

        $this->set(compact('metodoDePagos'));
    }

    /**
     * View method
     *
     * @param string|null $id Metodo De Pago id.
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function view($id = null)
    {
        if ($id === null) {
            $this->Flash->error(__('Registro inválido.'));
            return $this->redirect(['action' => 'index']);
        }

        try {
            $metodoDePago = $this->MetodoDePagos->get($id, contain: ['Users', 'Viajes']);
        } catch (RecordNotFoundException $e) {
            $this->Flash->error(__('Registro no encontrado.'));
            return $this->redirect(['action' => 'index']);
        }

        $this->set(compact('metodoDePago'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $metodoDePago = $this->MetodoDePagos->newEmptyEntity();
        if ($this->request->is('post')) {
            $metodoDePago = $this->MetodoDePagos->patchEntity($metodoDePago, $this->request->getData());
            if ($this->MetodoDePagos->save($metodoDePago)) {
                $this->Flash->success(__('El método de pago ha sido guardado.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo guardar el método de pago. Por favor intente de nuevo.'));
        }

        $users = $this->MetodoDePagos->Users->find('list', limit: 200)->all();
        $this->set(compact('metodoDePago', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Metodo De Pago id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     */
    public function edit($id = null)
    {
        if ($id === null) {
            $this->Flash->error(__('Registro inválido.'));
            return $this->redirect(['action' => 'index']);
        }

        try {
            $metodoDePago = $this->MetodoDePagos->get($id);
        } catch (RecordNotFoundException $e) {
            $this->Flash->error(__('Registro no encontrado.'));
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $metodoDePago = $this->MetodoDePagos->patchEntity($metodoDePago, $this->request->getData());
            if ($this->MetodoDePagos->save($metodoDePago)) {
                $this->Flash->success(__('El método de pago ha sido actualizado.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo actualizar el método de pago. Por favor intente de nuevo.'));
        }

        $users = $this->MetodoDePagos->Users->find('list', limit: 200)->all();
        $this->set(compact('metodoDePago', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Metodo De Pago id.
     * @return \Cake\Http\Response|null Redirects to index.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        if ($id === null) {
            $this->Flash->error(__('Registro inválido.'));
            return $this->redirect(['action' => 'index']);
        }

        try {
            $metodoDePago = $this->MetodoDePagos->get($id);
        } catch (RecordNotFoundException $e) {
            $this->Flash->error(__('Registro no encontrado.'));
            return $this->redirect(['action' => 'index']);
        }

        if ($this->MetodoDePagos->delete($metodoDePago)) {
            $this->Flash->success(__('El método de pago ha sido eliminado.'));
        } else {
            $this->Flash->error(__('No se pudo eliminar el método de pago. Por favor intente de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
