<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Viajes Controller
 *
 * @property \App\Model\Table\ViajesTable $Viajes
 */
class ViajesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Viajes->find()
            ->contain(['Users', 'Vehiculos', 'MetodoDePagos', 'Estaciones', 'Promociones']);
        $viajes = $this->paginate($query);

        $this->set(compact('viajes'));
    }

    /**
     * View method
     *
     * @param string|null $id Viaje id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $viaje = $this->Viajes->get($id, contain: ['Users', 'Vehiculos', 'MetodoDePagos', 'Estaciones', 'Promociones']);
        $this->set(compact('viaje'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $viaje = $this->Viajes->newEmptyEntity();
        if ($this->request->is('post')) {
            $viaje = $this->Viajes->patchEntity($viaje, $this->request->getData());
            if ($this->Viajes->save($viaje)) {
                $this->Flash->success(__('The viaje has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The viaje could not be saved. Please, try again.'));
        }
        $users = $this->Viajes->Users->find('list', limit: 200)->all();
        $vehiculos = $this->Viajes->Vehiculos->find('list', limit: 200)->all();
        $metodoDePagos = $this->Viajes->MetodoDePagos->find('list', limit: 200)->all();
        $estaciones = $this->Viajes->Estaciones->find('list', limit: 200)->all();
        $promociones = $this->Viajes->Promociones->find('list', limit: 200)->all();
        $this->set(compact('viaje', 'users', 'vehiculos', 'metodoDePagos', 'estaciones', 'promociones'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Viaje id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $viaje = $this->Viajes->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $viaje = $this->Viajes->patchEntity($viaje, $this->request->getData());
            if ($this->Viajes->save($viaje)) {
                $this->Flash->success(__('The viaje has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The viaje could not be saved. Please, try again.'));
        }
        $users = $this->Viajes->Users->find('list', limit: 200)->all();
        $vehiculos = $this->Viajes->Vehiculos->find('list', limit: 200)->all();
        $metodoDePagos = $this->Viajes->MetodoDePagos->find('list', limit: 200)->all();
        $estaciones = $this->Viajes->Estaciones->find('list', limit: 200)->all();
        $promociones = $this->Viajes->Promociones->find('list', limit: 200)->all();
        $this->set(compact('viaje', 'users', 'vehiculos', 'metodoDePagos', 'estaciones', 'promociones'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Viaje id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $viaje = $this->Viajes->get($id);
        if ($this->Viajes->delete($viaje)) {
            $this->Flash->success(__('The viaje has been deleted.'));
        } else {
            $this->Flash->error(__('The viaje could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
