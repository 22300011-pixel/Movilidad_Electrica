<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Promocion> $promociones
 */
?>
<div class="promociones index content">
    <?= $this->Html->link(__('Nueva Promocion'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Promociones') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('codigo') ?></th>
                    <th><?= $this->Paginator->sort('porcentaje_de_descuento') ?></th>
                    <th><?= $this->Paginator->sort('fecha_de_expiracion') ?></th>
                    <th><?= $this->Paginator->sort('activa') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($promociones as $promocion): ?>
                <tr>
                    <td><?= h($promocion->codigo) ?></td>
                    <td><?= $this->Number->format($promocion->porcentaje_de_descuento) ?></td>
                    <td><?= h($promocion->fecha_de_expiracion) ?></td>
                    <td><?= h($promocion->activa) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $promocion->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $promocion->id]) ?>
                        <?= $this->Form->postLink(
                            __('Eliminar'),
                            ['action' => 'delete', $promocion->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Seguro que quiere eliminar # {0}?', $promocion->id),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>