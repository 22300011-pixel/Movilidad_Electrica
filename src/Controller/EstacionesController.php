<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Estaciones Controller
 *
 * @property \App\Model\Table\EstacionesTable $Estaciones
 */
class EstacionesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Estaciones->find();
        $estaciones = $this->paginate($query);

        $this->set(compact('estaciones'));
    }

    /**
     * View method
     *
     * @param string|null $id Estacion id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $estacion = $this->Estaciones->get($id, contain: ['Vehiculos', 'Viajes']);
        $this->set(compact('estacion'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $estacion = $this->Estaciones->newEmptyEntity();
        if ($this->request->is('post')) {
            $estacion = $this->Estaciones->patchEntity($estacion, $this->request->getData());
            if ($this->Estaciones->save($estacion)) {
                $this->Flash->success(__('The estacion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The estacion could not be saved. Please, try again.'));
        }
        $this->set(compact('estacion'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Estacion id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $estacion = $this->Estaciones->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $estacion = $this->Estaciones->patchEntity($estacion, $this->request->getData());
            if ($this->Estaciones->save($estacion)) {
                $this->Flash->success(__('The estacion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The estacion could not be saved. Please, try again.'));
        }
        $this->set(compact('estacion'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Estacion id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $estacion = $this->Estaciones->get($id);
        if ($this->Estaciones->delete($estacion)) {
            $this->Flash->success(__('The estacion has been deleted.'));
        } else {
            $this->Flash->error(__('The estacion could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
