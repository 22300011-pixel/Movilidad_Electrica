<?php
/**
 * Routes configuration.
 */

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return function (RouteBuilder $routes): void {
    $routes->setRouteClass(DashedRoute::class);

    // Rutas de administración (/admin)
    $routes->prefix('Admin', function (RouteBuilder $routes): void {

        // /admin -> Admin/Viajes::dashboard
        $routes->connect('/', [
            'controller' => 'Viajes',
            'action'     => 'home',
        ]);


        $routes->fallbacks(DashedRoute::class);
    });

    // Rutas públicas (/)
    $routes->scope('/', function (RouteBuilder $builder): void {
        // Página principal pública
        $builder->connect('/', [
            'controller' => 'Pages',
            'action'     => 'display',
            'dashboard',
        ]);

        // Rutas públicas de páginas
        $builder->connect('/pages/*', 'Pages::display');

        // Rutas públicas explícitas para users (login/register/forgot)
        $builder->connect('/users/login', ['controller' => 'Users', 'action' => 'login']);
        $builder->connect('/users/register', ['controller' => 'Users', 'action' => 'register']);
        $builder->connect('/users/forgot-password', ['controller' => 'Users', 'action' => 'forgotPassword']);

        $builder->fallbacks(DashedRoute::class);
    });
};
