<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Estacion> $estaciones
 */
?>
<div class="estaciones index content">
    <?= $this->Html->link(__('Nueva Estacion'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Estaciones') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('latitud') ?></th>
                    <th><?= $this->Paginator->sort('longitud') ?></th>
                    <th><?= $this->Paginator->sort('capacidad') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($estaciones as $estacion): ?>
                <tr>
                    <td><?= h($estacion->nombre) ?></td>
                    <td><?= $this->Number->format($estacion->latitud) ?></td>
                    <td><?= $this->Number->format($estacion->longitud) ?></td>
                    <td><?= $estacion->capacidad === null ? '' : $this->Number->format($estacion->capacidad) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $estacion->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $estacion->id]) ?>
                        <?= $this->Form->postLink(
                            __('Eliminar'),
                            ['action' => 'delete', $estacion->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Estas seguro que quieres eliminar # {0}?', $estacion->id),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>