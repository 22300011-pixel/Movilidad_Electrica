<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Promociones Controller
 *
 * @property \App\Model\Table\PromocionesTable $Promociones
 */
class PromocionesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Promociones->find();
        $promociones = $this->paginate($query);

        $this->set(compact('promociones'));
    }

    /**
     * View method
     *
     * @param string|null $id Promocion id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $promocion = $this->Promociones->get($id, contain: ['Viajes']);
        $this->set(compact('promocion'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $promocion = $this->Promociones->newEmptyEntity();
        if ($this->request->is('post')) {
            $promocion = $this->Promociones->patchEntity($promocion, $this->request->getData());
            if ($this->Promociones->save($promocion)) {
                $this->Flash->success(__('The promocion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The promocion could not be saved. Please, try again.'));
        }
        $this->set(compact('promocion'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Promocion id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $promocion = $this->Promociones->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $promocion = $this->Promociones->patchEntity($promocion, $this->request->getData());
            if ($this->Promociones->save($promocion)) {
                $this->Flash->success(__('The promocion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The promocion could not be saved. Please, try again.'));
        }
        $this->set(compact('promocion'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Promocion id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $promocion = $this->Promociones->get($id);
        if ($this->Promociones->delete($promocion)) {
            $this->Flash->success(__('The promocion has been deleted.'));
        } else {
            $this->Flash->error(__('The promocion could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
