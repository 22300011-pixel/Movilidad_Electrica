<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Foto $foto
 * @var \Cake\Collection\CollectionInterface|string[] $modelos
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Lista de Fotos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="fotos form content">
            <?= $this->Form->create($foto) ?>
            <fieldset>
                <legend><?= __('Agregar Foto') ?></legend>
                <?php
                    echo $this->Form->control('url_foto');
                    echo $this->Form->control('descripcion');
                    echo $this->Form->control('modelo_id', ['options' => $modelos, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
