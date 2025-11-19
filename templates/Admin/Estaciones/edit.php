<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Estacion $estacion
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $estacion->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $estacion->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Estaciones'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="estaciones form content">
            <?= $this->Form->create($estacion) ?>
            <fieldset>
                <legend><?= __('Edit Estacion') ?></legend>
                <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('direccion');
                    echo $this->Form->control('latitud');
                    echo $this->Form->control('longitud');
                    echo $this->Form->control('capacidad');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
