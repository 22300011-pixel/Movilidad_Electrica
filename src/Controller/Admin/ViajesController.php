<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController\Admin;

/**
 * Viajes Controller
 *
 * @property \App\Model\Table\ViajesTable $Viajes
 */
class ViajesController extends AppController
{

    public function home()
    {
        // Aqui no hay nada
    }

    /**
     * Mapa de monitoreo en tiempo real
     * Muestra todas las estaciones y vehículos en un mapa interactivo
     */
    public function mapa()
    {
        // Obtener todos los vehículos
        $VehiculosTable = $this->fetchTable('Vehiculos');
        $vehiculos = $VehiculosTable->find()
            ->contain(['Modelos'])
            ->toArray();

        // Obtener todas las estaciones
        $EstacionesTable = $this->fetchTable('Estaciones');
        $estaciones = $EstacionesTable->find()->toArray();

        // Transformar datos para el formato que espera la vista
        $vehiculosData = array_map(function ($vehiculo) {
            return [
                'id' => $vehiculo->id,
                'numero_de_serie' => $vehiculo->numero_de_serie,
                'latitude' => (float)$vehiculo->latitud,
                'longitude' => (float)$vehiculo->longitud,
                'status' => $vehiculo->estado,
                'battery_level' => (int)$vehiculo->nivel_de_bateria,
                'estacion_id' => $vehiculo->estacion_id,
                'model' => [
                    'name' => isset($vehiculo->modelo) ? $vehiculo->modelo->nombre_del_modelo : 'N/A'
                ]
            ];
        }, $vehiculos);

        // Transformar datos de estaciones
        $estacionesData = array_map(function ($estacion) {
            return [
                'id' => $estacion->id,
                'name' => $estacion->nombre,
                'latitude' => (float)$estacion->latitud,
                'longitude' => (float)$estacion->longitud,
                'capacidad' => $estacion->capacidad,
                'direccion' => $estacion->direccion
            ];
        }, $estaciones);

        // Enviar datos a la vista
        $this->set([
            'vehiculos' => $vehiculosData,
            'estaciones' => $estacionesData
        ]);
    }

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
