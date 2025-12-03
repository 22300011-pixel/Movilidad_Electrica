<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Foto> $fotos
 */
?>
<div class="fotos index content">
    <?= $this->Html->link(__('Nueva Foto'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Fotos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                  
                    <th><?= $this->Paginator->sort('url_foto') ?></th>
                    <th><?= $this->Paginator->sort('descripcion') ?></th>
                    <th><?= $this->Paginator->sort('modelo_id') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($fotos as $foto): ?>
                <tr>
                    <td><?= h($foto->url_foto) ?></td>
                    <td><?= h($foto->descripcion) ?></td>
                    <td><?= $foto->hasValue('modelo') ? $this->Html->link($foto->modelo->nombre_del_modelo, ['controller' => 'Modelos', 'action' => 'view', $foto->modelo->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $foto->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $foto->id]) ?>
                        <?= $this->Form->postLink(
                            __('Eliminar'),
                            ['action' => 'delete', $foto->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Seguro que quiere eliminar # {0}?', $foto->id),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>