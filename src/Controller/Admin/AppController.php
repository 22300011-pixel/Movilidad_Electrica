<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use Cake\Controller\Controller as BaseAppController;

class AppController extends BaseAppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Flash');
        $this->loadComponent('Authentication.Authentication');
        $this->viewBuilder()->setLayout('admin');
    }
}
