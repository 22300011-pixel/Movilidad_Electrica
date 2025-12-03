<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Modelo $modelo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Form->postLink(
                __('Eliminar Modelo'),
                ['action' => 'delete', $modelo->id],
                ['confirm' => __('Seguro que quiere eliminar # {0}?', $modelo->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Lista de Modelos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="modelos form content">
            <?= $this->Form->create($modelo) ?>
            <fieldset>
                <legend><?= __('Editar Modelo') ?></legend>
                <?php
                    echo $this->Form->control('nombre_del_modelo');
                    echo $this->Form->control('marca');
                    echo $this->Form->control('tipo_de_vehiculo');
                    echo $this->Form->control('tarifa_por_minuto');
                    echo $this->Form->control('capacidad_maxima_kg');
                    echo $this->Form->control('capacidad_de_bateria');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
