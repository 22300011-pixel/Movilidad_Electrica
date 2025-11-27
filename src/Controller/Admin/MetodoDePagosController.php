<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController\Admin;

/**
 * MetodoDePagos Controller
 *
 * @property \App\Model\Table\MetodoDePagosTable $MetodoDePagos
 */
class MetodoDePagosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->MetodoDePagos->find()
            ->contain(['Users']);
        $metodoDePagos = $this->paginate($query);

        $this->set(compact('metodoDePagos'));
    }

    /**
     * View method
     *
     * @param string|null $id Metodo De Pago id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $metodoDePago = $this->MetodoDePagos->get($id, contain: ['Users', 'Viajes']);
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
                $this->Flash->success(__('The metodo de pago has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The metodo de pago could not be saved. Please, try again.'));
        }
        $users = $this->MetodoDePagos->Users->find('list', limit: 200)->all();
        $this->set(compact('metodoDePago', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Metodo De Pago id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $metodoDePago = $this->MetodoDePagos->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $metodoDePago = $this->MetodoDePagos->patchEntity($metodoDePago, $this->request->getData());
            if ($this->MetodoDePagos->save($metodoDePago)) {
                $this->Flash->success(__('The metodo de pago has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The metodo de pago could not be saved. Please, try again.'));
        }
        $users = $this->MetodoDePagos->Users->find('list', limit: 200)->all();
        $this->set(compact('metodoDePago', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Metodo De Pago id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $metodoDePago = $this->MetodoDePagos->get($id);
        if ($this->MetodoDePagos->delete($metodoDePago)) {
            $this->Flash->success(__('The metodo de pago has been deleted.'));
        } else {
            $this->Flash->error(__('The metodo de pago could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
