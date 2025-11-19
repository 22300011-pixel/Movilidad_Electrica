<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Promocion> $promociones
 */
?>
<div class="promociones index content">
    <?= $this->Html->link(__('New Promocion'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Promociones') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('codigo') ?></th>
                    <th><?= $this->Paginator->sort('porcentaje_de_descuento') ?></th>
                    <th><?= $this->Paginator->sort('fecha_de_expiracion') ?></th>
                    <th><?= $this->Paginator->sort('activa') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($promociones as $promocion): ?>
                <tr>
                    <td><?= $this->Number->format($promocion->id) ?></td>
                    <td><?= h($promocion->codigo) ?></td>
                    <td><?= $this->Number->format($promocion->porcentaje_de_descuento) ?></td>
                    <td><?= h($promocion->fecha_de_expiracion) ?></td>
                    <td><?= h($promocion->activa) ?></td>
                    <td><?= h($promocion->created) ?></td>
                    <td><?= h($promocion->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $promocion->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $promocion->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $promocion->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $promocion->id),
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