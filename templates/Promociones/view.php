<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Promocion $promocion
 */
?>
<div class="vehiculo-detail-container">
    <div class="vh-detail-nav">
        <?= $this->Html->link(__('← Volver a Promociones'), ['action' => 'index'], ['class' => 'btn-back']) ?>
    </div>

    <div class="vh-detail-content">
        <div class="vh-detail-left">
            <div class="detail-section">
                <div class="status-item">
                    <div class="label">Estado</div>
                    <span class="badge status <?= $promocion->activa ? 'disponible' : 'en-mantenimiento' ?>">
                        <?= $promocion->activa ? 'Activa' : 'Inactiva' ?>
                    </span>
                </div>
                
                <div class="status-item">
                    <div class="label">Descuento</div>
                    <div class="detail-value" style="font-size: 2rem; color: var(--tx-primary);">
                        <?= $this->Number->format($promocion->porcentaje_de_descuento) ?>%
                    </div>
                </div>
            </div>
        </div>

        <div class="vh-detail-right">
            <h2><?= h($promocion->codigo) ?></h2>
            
            <div class="detail-section">
                <h3>Información</h3>
                <div class="detail-grid">
                    <div class="detail-item">
                        <div class="detail-label">ID</div>
                        <div class="detail-value">#<?= $this->Number->format($promocion->id) ?></div>
                    </div>
                    
                    <div class="detail-item">
                        <div class="detail-label">Código</div>
                        <div class="detail-value"><?= h($promocion->codigo) ?></div>
                    </div>
                    
                    <div class="detail-item">
                        <div class="detail-label">Fecha de Expiración</div>
                        <div class="detail-value"><?= h($promocion->fecha_de_expiracion) ?></div>
                    </div>
                </div>
            </div>

            <div class="detail-section">
                <h3>Viajes Relacionados</h3>
                <?php if (!empty($promocion->viajes)) : ?>
                    <div class="viajes-list">
                        <?php foreach ($promocion->viajes as $viaje): ?>
                            <div class="viaje-item">
                                <div class="viaje-header">
                                    <div class="viaje-id">Viaje #<?= h($viaje->id) ?></div>
                                    <div class="viaje-status <?= h($viaje->estado_viaje) ?>">
                                        <?= h($viaje->estado_viaje) ?>
                                    </div>
                                </div>
                                <div class="viaje-body">
                                    <div class="viaje-row">
                                        <div class="viaje-label">Costo Total</div>
                                        <div class="viaje-value">$<?= h($viaje->costo_total) ?></div>
                                    </div>
                                    <div class="viaje-row">
                                        <div class="viaje-label">Hora Inicio</div>
                                        <div class="viaje-value"><?= h($viaje->hora_inicio) ?></div>
                                    </div>
                                </div>
                                <div class="viaje-actions">
                                    <?= $this->Html->link(__('Ver'), 
                                        ['controller' => 'Viajes', 'action' => 'view', $viaje->id], 
                                        ['class' => 'link-small']) ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="empty-state">
                        No hay viajes relacionados con esta promoción.
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>