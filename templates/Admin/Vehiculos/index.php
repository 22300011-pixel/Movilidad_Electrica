<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Vehiculo> $vehiculos
 */
?>
<div class="vehiculos index content">
    <?= $this->Html->link(__('New Vehiculo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Vehiculos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('numero_de_serie') ?></th>
                    <th><?= $this->Paginator->sort('estado') ?></th>
                    <th><?= $this->Paginator->sort('nivel_de_bateria') ?></th>
                    <th><?= $this->Paginator->sort('latitud') ?></th>
                    <th><?= $this->Paginator->sort('longitud') ?></th>
                    <th><?= $this->Paginator->sort('estacion_id') ?></th>
                    <th><?= $this->Paginator->sort('modelo_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vehiculos as $vehiculo): ?>
                <tr>
                    <td><?= $this->Number->format($vehiculo->id) ?></td>
                    <td><?= h($vehiculo->numero_de_serie) ?></td>
                    <td><?= h($vehiculo->estado) ?></td>
                    <td><?= $this->Number->format($vehiculo->nivel_de_bateria) ?></td>
                    <td><?= $this->Number->format($vehiculo->latitud) ?></td>
                    <td><?= $this->Number->format($vehiculo->longitud) ?></td>
                    <td><?= $vehiculo->hasValue('estacion') ? $this->Html->link($vehiculo->estacion->nombre, ['controller' => 'Estaciones', 'action' => 'view', $vehiculo->estacion->id]) : '' ?></td>
                    <td><?= $vehiculo->hasValue('modelo') ? $this->Html->link($vehiculo->modelo->nombre_del_modelo, ['controller' => 'Modelos', 'action' => 'view', $vehiculo->modelo->id]) : '' ?></td>
                    <td><?= h($vehiculo->created) ?></td>
                    <td><?= h($vehiculo->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $vehiculo->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vehiculo->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $vehiculo->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $vehiculo->id),
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