<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Viaje $viaje
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Editar Viaje'), ['action' => 'edit', $viaje->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Eliminar Viaje'), ['action' => 'delete', $viaje->id], ['confirm' => __('Seguro que quiere eliminar # {0}?', $viaje->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Lista de Viajes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nuevo Viaje'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="viajes view content">
            <h3><?= h($viaje->estado_viaje) ?></h3>
            <table>
                <tr>
                    <th><?= __('Estado Viaje') ?></th>
                    <td><?= h($viaje->estado_viaje) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $viaje->hasValue('user') ? $this->Html->link($viaje->user->username, ['controller' => 'Users', 'action' => 'view', $viaje->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Vehiculo') ?></th>
                    <td><?= $viaje->hasValue('vehiculo') ? $this->Html->link($viaje->vehiculo->numero_de_serie, ['controller' => 'Vehiculos', 'action' => 'view', $viaje->vehiculo->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Metodo De Pago') ?></th>
                    <td><?= $viaje->hasValue('metodo_de_pago') ? $this->Html->link($viaje->metodo_de_pago->tipo_de_tarjeta, ['controller' => 'MetodoDePagos', 'action' => 'view', $viaje->metodo_de_pago->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Estacion') ?></th>
                    <td><?= $viaje->hasValue('estacion') ? $this->Html->link($viaje->estacion->nombre, ['controller' => 'Estaciones', 'action' => 'view', $viaje->estacion->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Promocion') ?></th>
                    <td><?= $viaje->hasValue('promocion') ? $this->Html->link($viaje->promocion->codigo, ['controller' => 'Promociones', 'action' => 'view', $viaje->promocion->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($viaje->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Costo Total') ?></th>
                    <td><?= $viaje->costo_total === null ? '' : $this->Number->format($viaje->costo_total) ?></td>
                </tr>
                <tr>
                    <th><?= __('Hora Inicio') ?></th>
                    <td><?= h($viaje->hora_inicio) ?></td>
                </tr>
                <tr>
                    <th><?= __('Hora Fin') ?></th>
                    <td><?= h($viaje->hora_fin) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($viaje->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($viaje->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>