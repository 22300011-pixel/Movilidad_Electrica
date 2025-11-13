<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\MetodoDePago> $metodoDePagos
 */
?>
<div class="metodoDePagos index content">
    <?= $this->Html->link(__('New Metodo De Pago'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Metodo De Pagos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('tipo_de_tarjeta') ?></th>
                    <th><?= $this->Paginator->sort('nombre_del_titular') ?></th>
                    <th><?= $this->Paginator->sort('cvv') ?></th>
                    <th><?= $this->Paginator->sort('fecha_de_vencimiento') ?></th>
                    <th><?= $this->Paginator->sort('es_predeterminado') ?></th>
                    <th><?= $this->Paginator->sort('alias') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($metodoDePagos as $metodoDePago): ?>
                <tr>
                    <td><?= $this->Number->format($metodoDePago->id) ?></td>
                    <td><?= h($metodoDePago->tipo_de_tarjeta) ?></td>
                    <td><?= h($metodoDePago->nombre_del_titular) ?></td>
                    <td><?= h($metodoDePago->cvv) ?></td>
                    <td><?= h($metodoDePago->fecha_de_vencimiento) ?></td>
                    <td><?= h($metodoDePago->es_predeterminado) ?></td>
                    <td><?= h($metodoDePago->alias) ?></td>
                    <td><?= $metodoDePago->hasValue('user') ? $this->Html->link($metodoDePago->user->username, ['controller' => 'Users', 'action' => 'view', $metodoDePago->user->id]) : '' ?></td>
                    <td><?= h($metodoDePago->created) ?></td>
                    <td><?= h($metodoDePago->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $metodoDePago->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $metodoDePago->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $metodoDePago->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $metodoDePago->id),
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