<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Modelo> $modelos
 */
?>
<div class="modelos index content">
    <div class="page-header">
        <h3><?= __('Catálogo de Modelos') ?></h3>
    </div>

    <div class="modelos-grid">
        <?php foreach ($modelos as $modelo): ?>
            <article class="modelo-card">
                <div class="md-image">
                    <?php
                    $fotoUrl = null;
                    if (!empty($modelo->fotos)) {
                        $firstFoto = $modelo->fotos[0];
                        $raw = $firstFoto->url_foto ?? '';
                        if (preg_match('#^https?://#', $raw) || strpos($raw, '/') === 0) {
                            $fotoUrl = $raw;
                        } elseif (!empty($raw)) {
                            $fotoUrl = '/uploads/fotos/' . $raw;
                        }
                    }
                    ?>

                    <?php if ($fotoUrl): ?>
                        <img src="<?= h($fotoUrl) ?>" alt="<?= h($modelo->nombre_del_modelo) ?>" loading="lazy" />
                    <?php else: ?>
                        <svg width="160" height="120" viewBox="0 0 160 120" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="modelo">
                            <rect width="160" height="120" rx="8" fill="#f3f7fb" />
                            <g fill="#cfeafe" transform="translate(20,30)">
                                <rect x="0" y="10" width="120" height="35" rx="6" />
                                <circle cx="25" cy="60" r="8" />
                                <circle cx="95" cy="60" r="8" />
                            </g>
                        </svg>
                    <?php endif; ?>
                </div>
                <div class="md-body">
                    <h4 class="md-title"><?= h($modelo->nombre_del_modelo) ?></h4>
                    <p class="md-brand">📋 <?= h($modelo->marca) ?></p>
                    <p class="md-type">Tipo: <?= h($modelo->tipo_de_vehiculo) ?></p>

                    <div class="md-specs">
                        <div class="spec-item">
                            <span class="spec-label">Tarifa</span>
                            <span class="spec-value">$<?= $this->Number->format($modelo->tarifa_por_minuto) ?>/min</span>
                        </div>
                        <div class="spec-item">
                            <span class="spec-label">Capacidad</span>
                            <span class="spec-value"><?= $modelo->capacidad_maxima_kg ?? 'N/A' ?> kg</span>
                        </div>
                        <div class="spec-item">
                            <span class="spec-label">Batería</span>
                            <span class="spec-value"><?= $modelo->capacidad_de_bateria ?? 'N/A' ?> kWh</span>
                        </div>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</div>