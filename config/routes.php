<?php
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return function (RouteBuilder $routes): void {
    $routes->setRouteClass(DashedRoute::class);

    // ---------------------------------------------------------
    // 1. RUTAS DE ADMINISTRACIÓN (/admin)
    // ---------------------------------------------------------
    $routes->prefix('Admin', function (RouteBuilder $routes): void {
        // Al entrar a /admin se va al home del admin
        $routes->connect('/', ['controller' => 'Viajes', 'action' => 'home']);
        $routes->fallbacks(DashedRoute::class);
    });

    // ---------------------------------------------------------
    // 2. RUTAS PÚBLICAS Y DE CLIENTE (/)
    // ---------------------------------------------------------
    $routes->scope('/', function (RouteBuilder $builder): void {
        
        // A) PÚBLICO GENERAL (Sin Loguear)
        // Esta es la clave: La raíz '/' ahora carga Pages -> home.php
        $builder->connect('/', [
            'controller' => 'Pages', 
            'action' => 'display', 
            'home'
        ]);

        // B) CLIENTE LOGUEADO (Panel de Control)
        // Movemos el dashboard a una ruta específica para no chocar con el home
        $builder->connect('/dashboard', [
            'controller' => 'Viajes', 
            'action' => 'dashboard'
        ]);

        // C) RUTAS DE ACCESO (Login/Registro)
        $builder->connect('/users/login', ['controller' => 'Users', 'action' => 'login']);
        $builder->connect('/users/register', ['controller' => 'Users', 'action' => 'register']);
        $builder->connect('/users/forgot-password', ['controller' => 'Users', 'action' => 'forgotPassword']);

        // D) OTRAS PÁGINAS ESTÁTICAS (Ej: /pages/about)
        $builder->connect('/pages/*', 'Pages::display');

        $builder->fallbacks(DashedRoute::class);
    });
};
