<?php
$this->assign('title', 'Bienvenido');
?>

<section class="hero-section text-center text-md-start">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <span class="badge bg-primary bg-opacity-10 text-primary mb-3 px-3 py-2 rounded-pill fw-bold">
                    <i class="fa-solid fa-star me-1"></i> Nueva Flota 2025
                </span>
                <h1 class="display-3 hero-title mb-4">Movilidad que te impulsa.</h1>
                <p class="lead text-muted mb-5">
                    Explora la red de vehículos eléctricos más avanzada de la ciudad. 
                    Sin emisiones, sin ruidos, pura tecnología.
                </p>
                <div class="d-flex gap-3 justify-content-center justify-content-md-start">
                    <?= $this->Html->link('Ver Catálogo <i class="fa-solid fa-arrow-right ms-2"></i>', 
                        ['controller' => 'Vehiculos', 'action' => 'index'], 
                        ['class' => 'btn btn-accent btn-pill btn-lg shadow-sm', 'escapeTitle' => false]
                    ) ?>
                    <?= $this->Html->link('Saber más', 
                        ['controller' => 'Pages', 'action' => 'display', 'about'], 
                        ['class' => 'btn btn-ghost btn-pill btn-lg']
                    ) ?>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <i class="fa-solid fa-car-side" style="font-size: 12rem; color: var(--tx-primary-2); opacity: 0.2;"></i>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="row g-4">
            <div class="col-md-4">
                <a href="<?= $this->Url->build(['controller' => 'Vehiculos', 'action' => 'index', '?' => ['tipo' => 'Auto']]) ?>" class="cat-card p-4">
                    <div class="cat-icon"><i class="fa-solid fa-car"></i></div>
                    <h3 class="h5 fw-bold text-dark mb-2">Automóviles</h3>
                    <p class="text-muted small mb-0">Sedanes y compactos ideales para la ciudad.</p>
                </a>
            </div>
            <div class="col-md-4">
                <a href="<?= $this->Url->build(['controller' => 'Vehiculos', 'action' => 'index', '?' => ['tipo' => 'SUV']]) ?>" class="cat-card p-4">
                    <div class="cat-icon" style="color: var(--tx-warn);"><i class="fa-solid fa-truck-monster"></i></div>
                    <h3 class="h5 fw-bold text-dark mb-2">SUVs</h3>
                    <p class="text-muted small mb-0">Espacio y potencia eléctrica para toda la familia.</p>
                </a>
            </div>
            <div class="col-md-4">
                <a href="<?= $this->Url->build(['controller' => 'Lotes', 'action' => 'index']) ?>" class="cat-card p-4">
                    <div class="cat-icon" style="color: var(--tx-accent);"><i class="fa-solid fa-map-location-dot"></i></div>
                    <h3 class="h5 fw-bold text-dark mb-2">Sucursales</h3>
                    <p class="text-muted small mb-0">Encuentra la estación de carga más cercana.</p>
                </a>
            </div>
        </div>
    </div>
</section>