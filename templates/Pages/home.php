<?php
$this->assign('title', 'Bienvenido a la Movilidad del Futuro');
?>

<section class="hero-section text-center text-md-start position-relative">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <span class="badge bg-primary bg-opacity-10 text-primary mb-3 px-3 py-2 rounded-pill fw-bold">
                    <i class="fa-solid fa-bolt me-1"></i> 100% Eléctrico
                </span>
                <h1 class="display-3 hero-title mb-4">Movilidad que te impulsa.</h1>
                <p class="lead text-muted mb-5">
                    Explora la red de vehículos más avanzada de la ciudad. 
                    Sin emisiones, sin ruidos, pura tecnología al alcance de tu mano.
                </p>
                <div class="d-flex gap-3 justify-content-center justify-content-md-start">
                    <?= $this->Html->link('Ver Catálogo <i class="fa-solid fa-arrow-right ms-2"></i>', 
                        ['controller' => 'Vehiculos', 'action' => 'index'], 
                        ['class' => 'btn btn-accent btn-pill btn-lg shadow-sm', 'escapeTitle' => false]
                    ) ?>
                    
                    <?= $this->Html->link('Regístrate', 
                        ['controller' => 'Users', 'action' => 'register'], 
                        ['class' => 'btn btn-outline-dark btn-pill btn-lg']
                    ) ?>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <i class="fa-solid fa-city" style="font-size: 12rem; color: var(--tx-primary-2); opacity: 0.15;"></i>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="row text-center mb-5">
            <div class="col-lg-8 mx-auto">
                <h2 class="fw-bold">Todo lo que necesitas saber</h2>
                <p class="text-muted">Conoce nuestra cobertura y beneficios antes de empezar.</p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <a href="<?= $this->Url->build(['controller' => 'Estaciones', 'action' => 'home']) ?>" class="cat-card p-4 h-100 text-decoration-none">
                    <div class="cat-icon" style="color: var(--tx-warn);"><i class="fa-solid fa-map-location-dot"></i></div>
                    <h3 class="h5 fw-bold text-dark mb-2">Puntos de Carga</h3>
                    <p class="text-muted small mb-0">Explora nuestro mapa de cobertura y estaciones disponibles.</p>
                </a>
            </div>

            <div class="col-md-4">
                <a href="<?= $this->Url->build(['controller' => 'Modelos', 'action' => 'index']) ?>" class="cat-card p-4 h-100 text-decoration-none">
                    <div class="cat-icon" style="color: var(--bs-info);"><i class="fa-solid fa-car-side"></i></div>
                    <h3 class="h5 fw-bold text-dark mb-2">Nuestros Modelos</h3>
                    <p class="text-muted small mb-0">Descubre la tecnología y confort de nuestra flota 2025.</p>
                </a>
            </div>

            <div class="col-md-4">
                <a href="<?= $this->Url->build(['controller' => 'Promociones', 'action' => 'index']) ?>" class="cat-card p-4 h-100 text-decoration-none">
                    <div class="cat-icon" style="color: var(--tx-accent);"><i class="fa-solid fa-tags"></i></div>
                    <h3 class="h5 fw-bold text-dark mb-2">Promociones</h3>
                    <p class="text-muted small mb-0">Aprovecha descuentos exclusivos para nuevos usuarios.</p>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light mt-5">
    <div class="container text-center">
        <h3 class="fw-bold mb-3">¿Listo para conducir?</h3>
        <p class="mb-4 text-muted">Crea tu cuenta en segundos y empieza tu viaje.</p>
        <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'add']) ?>" class="btn btn-primary px-5 py-3 rounded-pill fw-bold shadow-sm">
            Crear Cuenta Gratis
        </a>
    </div>
</section>