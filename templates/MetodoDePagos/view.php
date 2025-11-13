<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MetodoDePago $metodoDePago
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Metodo De Pago'), ['action' => 'edit', $metodoDePago->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Metodo De Pago'), ['action' => 'delete', $metodoDePago->id], ['confirm' => __('Are you sure you want to delete # {0}?', $metodoDePago->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Metodo De Pagos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Metodo De Pago'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="metodoDePagos view content">
            <h3><?= h($metodoDePago->tipo_de_tarjeta) ?></h3>
            <table>
                <tr>
                    <th><?= __('Tipo De Tarjeta') ?></th>
                    <td><?= h($metodoDePago->tipo_de_tarjeta) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nombre Del Titular') ?></th>
                    <td><?= h($metodoDePago->nombre_del_titular) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cvv') ?></th>
                    <td><?= h($metodoDePago->cvv) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha De Vencimiento') ?></th>
                    <td><?= h($metodoDePago->fecha_de_vencimiento) ?></td>
                </tr>
                <tr>
                    <th><?= __('Alias') ?></th>
                    <td><?= h($metodoDePago->alias) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $metodoDePago->hasValue('user') ? $this->Html->link($metodoDePago->user->username, ['controller' => 'Users', 'action' => 'view', $metodoDePago->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($metodoDePago->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($metodoDePago->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($metodoDePago->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Es Predeterminado') ?></th>
                    <td><?= $metodoDePago->es_predeterminado ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Viajes') ?></h4>
                <?php if (!empty($metodoDePago->viajes)) : ?>
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
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($metodoDePago->viajes as $viaje) : ?>
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
                                <?= $this->Html->link(__('View'), ['controller' => 'Viajes', 'action' => 'view', $viaje->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Viajes', 'action' => 'edit', $viaje->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Viajes', 'action' => 'delete', $viaje->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $viaje->id),
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