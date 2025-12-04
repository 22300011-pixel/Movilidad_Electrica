<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Vehiculo> $vehiculos
 */
?>
<div class="vehiculos index content">
    <div class="page-header">
        <h3><?=('Vehículos eléctricos') ?></h3>
    </div>

    <div class="vehiculos-grid">
        <?php foreach ($vehiculos as $vehiculo): ?>
            <article class="vehiculo-card">
                <div class="vh-image">
                    <?php
                    $fotoUrl = null;
                    if ($vehiculo->hasValue('modelo') && !empty($vehiculo->modelo->fotos)) {
                        $firstFoto = $vehiculo->modelo->fotos[0];
                        $raw = $firstFoto->url_foto ?? '';
                        if (preg_match('/^https?:\/\//', $raw) || strpos($raw, '/') === 0) {
                            $fotoUrl = $raw;
                        } elseif (!empty($raw)) {
                            $fotoUrl = '/uploads/fotos/' . $raw;
                        }
                    }
                    ?>

                    <?php if ($fotoUrl): ?>
                        <img src="<?= h($fotoUrl) ?>" alt="<?= h($vehiculo->hasValue('modelo') ? $vehiculo->modelo->nombre_del_modelo : 'Vehículo') ?>" loading="lazy" />
                    <?php endif; ?>
                </div>
                <div class="vh-body">
                    <h4 class="vh-title"><?= h($vehiculo->hasValue('modelo') ? $vehiculo->modelo->nombre_del_modelo : $vehiculo->numero_de_serie) ?></h4>
                    <p class="vh-sub">Serie: <strong><?= h($vehiculo->numero_de_serie) ?></strong></p>

                    <div class="vh-meta">
                        <span class="badge status <?= strtolower(preg_replace('/\\s+/', '-', $vehiculo->estado)) ?>"><?= h($vehiculo->estado) ?></span>
                        <span class="battery"><?= $this->Number->format($vehiculo->nivel_de_bateria) ?>%</span>
                    </div>

                    <div class="vh-info">
                        <div class="vh-location"><?= $vehiculo->hasValue('estacion') ? h($vehiculo->estacion->nombre) : 'En ruta' ?></div>
                        <div class="vh-coords">Lat: <?= h(number_format($vehiculo->latitud ?? 0, 6)) ?>, Lon: <?= h(number_format($vehiculo->longitud ?? 0, 6)) ?></div>
                    </div>
                </div>
                <div class="vh-actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $vehiculo->id], ['class' => 'btn-link']) ?>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</div>