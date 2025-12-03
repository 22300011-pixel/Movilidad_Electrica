<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vehiculo $vehiculo
 * @var \Cake\Collection\CollectionInterface|string[] $estaciones
 * @var \Cake\Collection\CollectionInterface|string[] $modelos
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Lista de Vehiculos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="vehiculos form content">
            <?= $this->Form->create($vehiculo) ?>
            <fieldset>
                <legend><?= __('Agregar Vehiculo') ?></legend>
                <?php
                    echo $this->Form->control('numero_de_serie');
                    echo $this->Form->control('estado');
                    echo $this->Form->control('nivel_de_bateria');
                    echo $this->Form->control('latitud');
                    echo $this->Form->control('longitud');
                    echo $this->Form->control('estacion_id', ['options' => $estaciones, 'empty' => true]);
                    echo $this->Form->control('modelo_id', ['options' => $modelos, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
