<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Modelo> $modelos
 */
?>
<div class="modelos index content">
    <?= $this->Html->link(__('New Modelo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Modelos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nombre_del_modelo') ?></th>
                    <th><?= $this->Paginator->sort('marca') ?></th>
                    <th><?= $this->Paginator->sort('tipo_de_vehiculo') ?></th>
                    <th><?= $this->Paginator->sort('tarifa_por_minuto') ?></th>
                    <th><?= $this->Paginator->sort('capacidad_maxima_kg') ?></th>
                    <th><?= $this->Paginator->sort('capacidad_de_bateria') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($modelos as $modelo): ?>
                <tr>
                    <td><?= $this->Number->format($modelo->id) ?></td>
                    <td><?= h($modelo->nombre_del_modelo) ?></td>
                    <td><?= h($modelo->marca) ?></td>
                    <td><?= h($modelo->tipo_de_vehiculo) ?></td>
                    <td><?= $this->Number->format($modelo->tarifa_por_minuto) ?></td>
                    <td><?= $modelo->capacidad_maxima_kg === null ? '' : $this->Number->format($modelo->capacidad_maxima_kg) ?></td>
                    <td><?= $modelo->capacidad_de_bateria === null ? '' : $this->Number->format($modelo->capacidad_de_bateria) ?></td>
                    <td><?= h($modelo->created) ?></td>
                    <td><?= h($modelo->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $modelo->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $modelo->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $modelo->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $modelo->id),
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