<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vehiculo $vehiculo
 */
?>
<div class="vehiculo-detail-container">
    <div class="vh-detail-nav">
        <?= $this->Html->link(__('← Volver al catálogo'), ['action' => 'index'], ['class' => 'btn-back']) ?>
    </div>
            
            <div class="vh-detail-status">
                <div class="status-item">
                    <span class="label">Estado</span>
                    <span class="badge status <?= strtolower(preg_replace('/\\s+/', '-', $vehiculo->estado)) ?>"><?= h($vehiculo->estado) ?></span>
                </div>
                <div class="status-item">
                    <span class="label">Batería</span>
                    <div class="battery-bar">
                        <div class="battery-fill" style="width: <?= $vehiculo->nivel_de_bateria ?>%;"></div>
                    </div>
                    <span class="battery-text"><?= $this->Number->format($vehiculo->nivel_de_bateria) ?>%</span>
                </div>
            </div>

            <div class="vh-detail-actions">
                <h4>Acciones</h4>
                <ul class="action-list">
                    <li><?= $this->Html->link(__('Ver Modelo'), ['controller' => 'Modelos', 'action' => 'view', $vehiculo->modelo->id ?? null], ['class' => 'action-link']) ?></li>
                    <li><?= $this->Html->link(__('Estación'), ['controller' => 'Estaciones', 'action' => 'view', $vehiculo->estacion->id ?? null], ['class' => 'action-link']) ?></li>
                </ul>
            </div>
        </div>

        <!-- Right: Details -->
        <div class="vh-detail-right">
            <h2><?= h($vehiculo->numero_de_serie) ?></h2>
            
            <div class="detail-section">
                <h3>Información General</h3>
                <div class="detail-grid">
                    <div class="detail-item">
                        <span class="detail-label">Número de Serie</span>
                        <span class="detail-value"><?= h($vehiculo->numero_de_serie) ?></span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Modelo</span>
                        <span class="detail-value">
                            <?= $vehiculo->hasValue('modelo') ? $this->Html->link($vehiculo->modelo->nombre_del_modelo, ['controller' => 'Modelos', 'action' => 'view', $vehiculo->modelo->id]) : 'N/A' ?>
                        </span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Estación</span>
                        <span class="detail-value">
                            <?= $vehiculo->hasValue('estacion') ? $this->Html->link($vehiculo->estacion->nombre, ['controller' => 'Estaciones', 'action' => 'view', $vehiculo->estacion->id]) : 'En ruta' ?>
                        </span>
                    </div>
                </div>
            </div>

            <div class="detail-section">
                <h3>Ubicación</h3>
                <div class="detail-grid">
                    <div class="detail-item">
                        <span class="detail-label">Latitud</span>
                        <span class="detail-value"><?= h(number_format($vehiculo->latitud ?? 0, 6)) ?></span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Longitud</span>
                        <span class="detail-value"><?= h(number_format($vehiculo->longitud ?? 0, 6)) ?></span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Nivel de Batería</span>
                        <span class="detail-value"><?= $this->Number->format($vehiculo->nivel_de_bateria) ?>%</span>
                    </div>
                </div>
            </div>
            <div class="detail-section">
                <h3>Viajes Relacionados</h3>
                <?php if (!empty($vehiculo->viajes)) : ?>
                    <div class="viajes-list">
                        <?php foreach ($vehiculo->viajes as $viaje) : ?>
                            <div class="viaje-item">
                                <div class="viaje-header">
                                    <span class="viaje-id">Viaje #<?= h($viaje->id) ?></span>
                                    <span class="viaje-status <?= strtolower(preg_replace('/\\s+/', '-', $viaje->estado_viaje)) ?>"><?= h($viaje->estado_viaje) ?></span>
                                </div>
                                <div class="viaje-body">
                                    <div class="viaje-row">
                                        <span class="viaje-label">Inicio:</span>
                                        <span class="viaje-value"><?= h($viaje->hora_inicio) ?></span>
                                    </div>
                                    <div class="viaje-row">
                                        <span class="viaje-label">Fin:</span>
                                        <span class="viaje-value"><?= h($viaje->hora_fin) ?></span>
                                    </div>
                                    <div class="viaje-row">
                                        <span class="viaje-label">Costo:</span>
                                        <span class="viaje-value">$<?= h($viaje->costo_total) ?></span>
                                    </div>
                                </div>
                                <div class="viaje-actions">
                                    <?= $this->Html->link(__('Ver'), ['controller' => 'Viajes', 'action' => 'view', $viaje->id], ['class' => 'link-small']) ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else : ?>
                    <p class="empty-state">No hay viajes registrados para este vehículo.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>