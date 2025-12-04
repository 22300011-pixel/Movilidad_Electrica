<?php
declare(strict_types=1);

namespace App\Controller;

class PromocionesController extends AppController
{
    public function index()
    {
        $this->paginate = [
            'contain' => ['Viajes'],
        ];
        $promociones = $this->paginate($this->Promociones);
        $this->set(compact('promociones'));
    }

    public function view($id = null)
    {
        $promocion = $this->Promociones->get($id, [
            'contain' => ['Viajes'],
        ]);
        $this->set(compact('promocion'));
    }
}
