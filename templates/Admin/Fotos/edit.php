<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Foto $foto
 * @var string[]|\Cake\Collection\CollectionInterface $modelos
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Form->postLink(
                __('Borrar Foto'),
                ['action' => 'delete', $foto->id],
                ['confirm' => __('Seguro que quiere eliminar # {0}?', $foto->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Lista de Fotos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="fotos form content">
            <?= $this->Form->create($foto) ?>
            <fieldset>
                <legend><?= __('Editar Foto') ?></legend>
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
