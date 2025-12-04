<?php
$this->assign('title', 'Mi Panel de Cliente');
?>

<section class="py-5" style="background-color: var(--bs-gray-100);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-5 fw-bold text-dark mb-2">Panel de Cliente</h1>
                <p class="lead text-muted mb-0">Bienvenido. ¿Qué quieres hacer hoy?</p>
            </div>
            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                <a href="<?= $this->Url->build(['controller' => 'Viajes', 'action' => 'add']) ?>" class="btn btn-primary btn-lg shadow-sm rounded-pill px-4">
                    <i class="fa-solid fa-play me-2"></i> Iniciar Nuevo Viaje
                </a>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container">
        <div class="row g-4">
            
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm hover-top">
                    <div class="card-body p-4 text-center">
                        <div class="mb-3">
                            <i class="fa-solid fa-map-location-dot fa-3x text-warning"></i>
                        </div>
                        <h3 class="h4 card-title fw-bold">Estaciones</h3>
                        <p class="card-text text-muted small">Ubica los puntos de carga más cercanos.</p>
                        <a href="<?= $this->Url->build(['controller' => 'Estaciones', 'action' => 'home']) ?>" class="btn btn-outline-dark rounded-pill btn-sm mt-2 stretched-link">Ver Mapa</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm hover-top">
                    <div class="card-body p-4 text-center">
                        <div class="mb-3">
                            <i class="fa-solid fa-car fa-3x text-primary"></i>
                        </div>
                        <h3 class="h4 card-title fw-bold">Vehículos</h3>
                        <p class="card-text text-muted small">Explora los autos disponibles para tu viaje.</p>
                        <a href="<?= $this->Url->build(['controller' => 'Vehiculos', 'action' => 'index']) ?>" class="btn btn-outline-dark rounded-pill btn-sm mt-2 stretched-link">Ver Disponibles</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm hover-top">
                    <div class="card-body p-4 text-center">
                        <div class="mb-3">
                            <i class="fa-solid fa-car-side fa-3x text-info"></i>
                        </div>
                        <h3 class="h4 card-title fw-bold">Modelos</h3>
                        <p class="card-text text-muted small">Conoce las especificaciones de la flota.</p>
                        <a href="<?= $this->Url->build(['controller' => 'Modelos', 'action' => 'index']) ?>" class="btn btn-outline-dark rounded-pill btn-sm mt-2 stretched-link">Ficha Técnica</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm hover-top">
                    <div class="card-body p-4 text-center">
                        <div class="mb-3">
                            <i class="fa-solid fa-tags fa-3x text-danger"></i>
                        </div>
                        <h3 class="h4 card-title fw-bold">Promociones</h3>
                        <p class="card-text text-muted small">Descuentos y cupones exclusivos.</p>
                        <a href="<?= $this->Url->build(['controller' => 'Promociones', 'action' => 'index']) ?>" class="btn btn-outline-dark rounded-pill btn-sm mt-2 stretched-link">Ver Ofertas</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm hover-top">
                    <div class="card-body p-4 text-center">
                        <div class="mb-3">
                            <i class="fa-solid fa-credit-card fa-3x text-success"></i>
                        </div>
                        <h3 class="h4 card-title fw-bold">Pagos</h3>
                        <p class="card-text text-muted small">Administra tus tarjetas y saldo.</p>
                        <a href="<?= $this->Url->build(['controller' => 'MetodoDePagos', 'action' => 'index']) ?>" class="btn btn-outline-dark rounded-pill btn-sm mt-2 stretched-link">Mi Billetera</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm hover-top">
                    <div class="card-body p-4 text-center">
                        <div class="mb-3">
                            <i class="fa-solid fa-clock-rotate-left fa-3x text-secondary"></i>
                        </div>
                        <h3 class="h4 card-title fw-bold">Historial</h3>
                        <p class="card-text text-muted small">Revisa tus viajes realizados anteriormente.</p>
                        <a href="<?= $this->Url->build(['controller' => 'Viajes', 'action' => 'index']) ?>" class="btn btn-outline-dark rounded-pill btn-sm mt-2 stretched-link">Ver Historial</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<style>
    .hover-top { transition: transform 0.3s ease, box-shadow 0.3s ease; }
    .hover-top:hover { transform: translateY(-5px); box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important; }
    /* Hace que toda la tarjeta sea cliqueable si usas stretched-link en el botón */
    .card { position: relative; overflow: hidden; } 
</style>