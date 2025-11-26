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
        $routes->connect('/', [
            'controller' => 'viajes',
            'action'     => 'dashboard',
        ]);

        $routes->fallbacks(DashedRoute::class);
    });

    // Rutas públicas (/)
    $routes->scope('/', function (RouteBuilder $builder): void {
        $builder->connect('/', [
            'controller' => 'Pages',
            'action'     => 'display',
            'home',
        ]);

        $builder->connect('/pages/*', 'Pages::display');

        $builder->fallbacks(DashedRoute::class);
    });
};
