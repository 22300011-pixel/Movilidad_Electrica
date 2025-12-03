<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\MetodoDePago> $metodoDePagos
 */
?>
<div class="metodoDePagos index content">
    <?= $this->Html->link(__('Nuevo Metodo De Pago'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Metodo De Pagos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('tipo_de_tarjeta') ?></th>
                    <th><?= $this->Paginator->sort('nombre_del_titular') ?></th>
                    <th><?= $this->Paginator->sort('fecha_de_vencimiento') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($metodoDePagos as $metodoDePago): ?>
                <tr>
                    <td><?= h($metodoDePago->tipo_de_tarjeta) ?></td>
                    <td><?= h($metodoDePago->nombre_del_titular) ?></td>
                    <td><?= h($metodoDePago->fecha_de_vencimiento) ?></td>
                    <td><?= $metodoDePago->hasValue('user') ? $this->Html->link($metodoDePago->user->username, ['controller' => 'Users', 'action' => 'view', $metodoDePago->user->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $metodoDePago->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $metodoDePago->id]) ?>
                        <?= $this->Form->postLink(
                            __('Eliminar'),
                            ['action' => 'delete', $metodoDePago->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Seguro que quiere eliminar # {0}?', $metodoDePago->id),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>