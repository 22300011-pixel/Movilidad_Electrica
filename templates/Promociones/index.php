<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Promocion> $promociones
 */
?>
<div class="promociones index content vehiculos index content">
    <div class="promociones-header">
        <h3><?= __('Promociones') ?></h3>
    </div>

    <div class="vehiculos-grid">
        <?php foreach ($promociones as $promocion): ?>
        <div class="cat-card">
            <div class="vh-image">
                <div class="promocion-icon cat-icon">
                    <i class="fas fa-tag"></i>
                </div>
            </div>
            
            <div class="vh-body">
                <h4 class="vh-title"><?= h($promocion->codigo) ?></h4>
                <p class="vh-sub">
                    <span class="badge status <?= $promocion->activa ? 'disponible' : 'en-mantenimiento' ?>">
                        <?= $promocion->activa ? __('Activa') : __('Inactiva') ?>
                    </span>
                </p>
                
                <div class="promocion-info vh-info">
                    <div>
                        <strong><?= $this->Number->format($promocion->porcentaje_de_descuento) ?>%</strong><br>
                        <small>Descuento</small>
                    </div>
                    <div>
                        <strong><?= h($promocion->fecha_de_expiracion->format('d/m/Y')) ?></strong><br>
                        <small>Expira</small>
                    </div>
                </div>
                
                <div class="promocion-dates">
                    <small>Creada: <?= h($promocion->created->format('d/m/Y')) ?></small>
                </div>
            </div>
            
            <div class="vh-actions">
                <?= $this->Html->link(__('Ver'), ['action' => 'view', $promocion->id], ['class' => 'btn-link']) ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

</div>