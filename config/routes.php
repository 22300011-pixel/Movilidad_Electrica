<?php
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return function (RouteBuilder $routes): void {
    $routes->setRouteClass(DashedRoute::class);

    $routes->prefix('Admin', function (RouteBuilder $routes): void {
       
        $routes->connect('/', ['controller' => 'Viajes', 'action' => 'home']);
        $routes->fallbacks(DashedRoute::class);
    });

 
    $routes->scope('/', function (RouteBuilder $builder): void {
        
        
        $builder->connect('/', [
            'controller' => 'Pages', 
            'action' => 'display', 
            'home'
        ]);

      
        $builder->connect('/dashboard', [
            'controller' => 'Viajes', 
            'action' => 'dashboard'
        ]);


        $builder->connect('/users/login', ['controller' => 'Users', 'action' => 'login']);
        $builder->connect('/users/add', ['controller' => 'Users', 'action' => 'add']);
        $builder->connect('/users/forgot-password', ['controller' => 'Users', 'action' => 'forgotPassword']);

     
        $builder->connect('/pages/*', 'Pages::display');

        $builder->fallbacks(DashedRoute::class);
    });
};
