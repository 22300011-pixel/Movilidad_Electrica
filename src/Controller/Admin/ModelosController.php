<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController\Admin;

/**
 * Modelos Controller
 *
 * @property \App\Model\Table\ModelosTable $Modelos
 */
class ModelosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Modelos->find();
        $modelos = $this->paginate($query);

        $this->set(compact('modelos'));
    }

    /**
     * View method
     *
     * @param string|null $id Modelo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $modelo = $this->Modelos->get($id, contain: ['Fotos', 'Vehiculos']);
        $this->set(compact('modelo'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $modelo = $this->Modelos->newEmptyEntity();
        if ($this->request->is('post')) {
            $modelo = $this->Modelos->patchEntity($modelo, $this->request->getData());
            if ($this->Modelos->save($modelo)) {
                $this->Flash->success(__('The modelo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The modelo could not be saved. Please, try again.'));
        }
        $this->set(compact('modelo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Modelo id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $modelo = $this->Modelos->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $modelo = $this->Modelos->patchEntity($modelo, $this->request->getData());
            if ($this->Modelos->save($modelo)) {
                $this->Flash->success(__('The modelo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The modelo could not be saved. Please, try again.'));
        }
        $this->set(compact('modelo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Modelo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $modelo = $this->Modelos->get($id);
        if ($this->Modelos->delete($modelo)) {
            $this->Flash->success(__('The modelo has been deleted.'));
        } else {
            $this->Flash->error(__('The modelo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
