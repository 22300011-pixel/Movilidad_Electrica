<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Estacion $estacion
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Form->postLink(
                __('Borrar Estacion'),
                ['action' => 'delete', $estacion->id],
                ['confirm' => __('Seguro que quieres eliminar # {0}?', $estacion->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Lista de Estaciones'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="estaciones form content">
            <?= $this->Form->create($estacion) ?>
            <fieldset>
                <legend><?= __('Editar Estacion') ?></legend>
                <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('direccion');
                    echo $this->Form->control('latitud');
                    echo $this->Form->control('longitud');
                    echo $this->Form->control('capacidad');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
