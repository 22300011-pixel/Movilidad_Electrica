<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Viaje $viaje
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $vehiculos
 * @var \Cake\Collection\CollectionInterface|string[] $metodoDePagos
 * @var \Cake\Collection\CollectionInterface|string[] $estaciones
 * @var \Cake\Collection\CollectionInterface|string[] $promociones
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Lista de Viajes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="viajes form content">
            <?= $this->Form->create($viaje) ?>
            <fieldset>
                <legend><?= __('Agregar Viaje') ?></legend>
                <?php
                    echo $this->Form->control('hora_inicio');
                    echo $this->Form->control('hora_fin');
                    echo $this->Form->control('costo_total');
                    echo $this->Form->control('estado_viaje');
                    echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
                    echo $this->Form->control('vehiculo_id', ['options' => $vehiculos, 'empty' => true]);
                    echo $this->Form->control('metodo_de_pago_id', ['options' => $metodoDePagos, 'empty' => true]);
                    echo $this->Form->control('estacion_id', ['options' => $estaciones, 'empty' => true]);
                    echo $this->Form->control('promocion_id', ['options' => $promociones, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
