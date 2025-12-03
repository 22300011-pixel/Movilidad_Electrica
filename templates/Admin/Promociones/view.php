<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Promocion $promocion
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Editar Promocion'), ['action' => 'edit', $promocion->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Eliminar Promocion'), ['action' => 'delete', $promocion->id], ['confirm' => __('Seguro que quiere eliminar # {0}?', $promocion->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Lista de Promociones'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nueva Promocion'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="promociones view content">
            <h3><?= h($promocion->codigo) ?></h3>
            <table>
                <tr>
                    <th><?= __('Codigo') ?></th>
                    <td><?= h($promocion->codigo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($promocion->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Porcentaje De Descuento') ?></th>
                    <td><?= $this->Number->format($promocion->porcentaje_de_descuento) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha De Expiracion') ?></th>
                    <td><?= h($promocion->fecha_de_expiracion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($promocion->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($promocion->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Activa') ?></th>
                    <td><?= $promocion->activa ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Viajes') ?></h4>
                <?php if (!empty($promocion->viajes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Hora Inicio') ?></th>
                            <th><?= __('Hora Fin') ?></th>
                            <th><?= __('Costo Total') ?></th>
                            <th><?= __('Estado Viaje') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Vehiculo Id') ?></th>
                            <th><?= __('Metodo De Pago Id') ?></th>
                            <th><?= __('Estacion Id') ?></th>
                            <th><?= __('Promocion Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Acciones') ?></th>
                        </tr>
                        <?php foreach ($promocion->viajes as $viaje) : ?>
                        <tr>
                            <td><?= h($viaje->id) ?></td>
                            <td><?= h($viaje->hora_inicio) ?></td>
                            <td><?= h($viaje->hora_fin) ?></td>
                            <td><?= h($viaje->costo_total) ?></td>
                            <td><?= h($viaje->estado_viaje) ?></td>
                            <td><?= h($viaje->user_id) ?></td>
                            <td><?= h($viaje->vehiculo_id) ?></td>
                            <td><?= h($viaje->metodo_de_pago_id) ?></td>
                            <td><?= h($viaje->estacion_id) ?></td>
                            <td><?= h($viaje->promocion_id) ?></td>
                            <td><?= h($viaje->created) ?></td>
                            <td><?= h($viaje->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Ver'), ['controller' => 'Viajes', 'action' => 'view', $viaje->id]) ?>
                                <?= $this->Html->link(__('Editar'), ['controller' => 'Viajes', 'action' => 'edit', $viaje->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Eliminar'),
                                    ['controller' => 'Viajes', 'action' => 'delete', $viaje->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Seguro que quiere eliminar # {0}?', $viaje->id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>