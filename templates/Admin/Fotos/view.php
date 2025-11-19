<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Foto $foto
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Foto'), ['action' => 'edit', $foto->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Foto'), ['action' => 'delete', $foto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $foto->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Fotos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Foto'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="fotos view content">
            <h3><?= h($foto->url_foto) ?></h3>
            <table>
                <tr>
                    <th><?= __('Url Foto') ?></th>
                    <td><?= h($foto->url_foto) ?></td>
                </tr>
                <tr>
                    <th><?= __('Descripcion') ?></th>
                    <td><?= h($foto->descripcion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modelo') ?></th>
                    <td><?= $foto->hasValue('modelo') ? $this->Html->link($foto->modelo->nombre_del_modelo, ['controller' => 'Modelos', 'action' => 'view', $foto->modelo->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($foto->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($foto->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($foto->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>