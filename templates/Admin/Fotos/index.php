<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Foto> $fotos
 */
?>
<div class="fotos index content">
    <?= $this->Html->link(__('New Foto'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Fotos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('url_foto') ?></th>
                    <th><?= $this->Paginator->sort('descripcion') ?></th>
                    <th><?= $this->Paginator->sort('modelo_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($fotos as $foto): ?>
                <tr>
                    <td><?= $this->Number->format($foto->id) ?></td>
                    <td><?= h($foto->url_foto) ?></td>
                    <td><?= h($foto->descripcion) ?></td>
                    <td><?= $foto->hasValue('modelo') ? $this->Html->link($foto->modelo->nombre_del_modelo, ['controller' => 'Modelos', 'action' => 'view', $foto->modelo->id]) : '' ?></td>
                    <td><?= h($foto->created) ?></td>
                    <td><?= h($foto->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $foto->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $foto->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $foto->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $foto->id),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>