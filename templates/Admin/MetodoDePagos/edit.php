<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MetodoDePago $metodoDePago
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Form->postLink(
                __('Borrar Metodo De Pago'),
                ['action' => 'delete', $metodoDePago->id],
                ['confirm' => __('Seguro que quiere eliminar # {0}?', $metodoDePago->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Lista de Metodo De Pagos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="metodoDePagos form content">
            <?= $this->Form->create($metodoDePago) ?>
            <fieldset>
                <legend><?= __('Editar Metodo De Pago') ?></legend>
                <?php
                    echo $this->Form->control('tipo_de_tarjeta');
                    echo $this->Form->control('nombre_del_titular');
                    echo $this->Form->control('cvv');
                    echo $this->Form->control('fecha_de_vencimiento');
                    echo $this->Form->control('es_predeterminado');
                    echo $this->Form->control('alias');
                    echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
