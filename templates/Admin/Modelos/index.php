<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Modelo> $modelos
 */
?>
<div class="modelos index content">
    <?= $this->Html->link(__('Nuevo Modelo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Modelos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('nombre_del_modelo') ?></th>
                    <th><?= $this->Paginator->sort('marca') ?></th>
                    <th><?= $this->Paginator->sort('tipo_de_vehiculo') ?></th>
                    <th><?= $this->Paginator->sort('tarifa_por_minuto') ?></th>
                    <th><?= $this->Paginator->sort('capacidad_maxima_kg') ?></th>
                    <th><?= $this->Paginator->sort('capacidad_de_bateria') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($modelos as $modelo): ?>
                <tr>
                    <td><?= h($modelo->nombre_del_modelo) ?></td>
                    <td><?= h($modelo->marca) ?></td>
                    <td><?= h($modelo->tipo_de_vehiculo) ?></td>
                    <td><?= $this->Number->format($modelo->tarifa_por_minuto) ?></td>
                    <td><?= $modelo->capacidad_maxima_kg === null ? '' : $this->Number->format($modelo->capacidad_maxima_kg) ?></td>
                    <td><?= $modelo->capacidad_de_bateria === null ? '' : $this->Number->format($modelo->capacidad_de_bateria) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $modelo->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $modelo->id]) ?>
                        <?= $this->Form->postLink(
                            __('Eliminar'),
                            ['action' => 'delete', $modelo->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Seguro que quiere eliminar # {0}?', $modelo->id),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>