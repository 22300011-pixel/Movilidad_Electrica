<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Promocion $promocion
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Promociones'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="promociones form content">
            <?= $this->Form->create($promocion) ?>
            <fieldset>
                <legend><?= __('Add Promocion') ?></legend>
                <?php
                    echo $this->Form->control('codigo');
                    echo $this->Form->control('porcentaje_de_descuento');
                    echo $this->Form->control('fecha_de_expiracion', ['empty' => true]);
                    echo $this->Form->control('activa');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
