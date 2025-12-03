<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Vehiculo> $vehiculos
 */
?>
<div class="vehiculos index content">
    <?= $this->Html->link(__('Nuevo Vehiculo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Vehiculos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('numero_de_serie') ?></th>
                    <th><?= $this->Paginator->sort('estado') ?></th>
                    <th><?= $this->Paginator->sort('nivel_de_bateria') ?></th>
                    <th><?= $this->Paginator->sort('estacion_id') ?></th>
                    <th><?= $this->Paginator->sort('modelo_id') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vehiculos as $vehiculo): ?>
                <tr>
                    <td><?= h($vehiculo->numero_de_serie) ?></td>
                    <td><?= h($vehiculo->estado) ?></td>
                    <td><?= $this->Number->format($vehiculo->nivel_de_bateria) ?></td>
                    <td><?= $vehiculo->hasValue('estacion') ? $this->Html->link($vehiculo->estacion->nombre, ['controller' => 'Estaciones', 'action' => 'view', $vehiculo->estacion->id]) : '' ?></td>
                    <td><?= $vehiculo->hasValue('modelo') ? $this->Html->link($vehiculo->modelo->nombre_del_modelo, ['controller' => 'Modelos', 'action' => 'view', $vehiculo->modelo->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $vehiculo->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $vehiculo->id]) ?>
                        <?= $this->Form->postLink(
                            __('Eliminar'),
                            ['action' => 'delete', $vehiculo->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Seguro que quiere eliminar # {0}?', $vehiculo->id),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>