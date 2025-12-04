<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MetodoDePago $metodoDePago
 */
?>
<div class="metodoDePagos view content">
    
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
        <h3><?= h($metodoDePago->alias) ?> <small style="color: #94a3b8; font-size: 0.6em; font-weight: 400;">(<?= h($metodoDePago->tipo_de_tarjeta) ?>)</small></h3>
        <div class="actions-group">
            <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'btn-ghost']) ?>
            <?= $this->Html->link(__('Editar'), ['action' => 'edit', $metodoDePago->id], ['class' => 'btn-ghost', 'style' => 'color: var(--tx-accent); border-color: var(--tx-accent);']) ?>
            <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $metodoDePago->id], ['confirm' => __('¿Estás seguro de eliminar # {0}?', $metodoDePago->id), 'class' => 'btn-ghost', 'style' => 'color: #ef4444; border-color: #ef4444;']) ?>
            <?= $this->Html->link(__('Nuevo'), ['action' => 'add'], ['class' => 'btn-accent']) ?>
        </div>
    </div>

    <div class="view-card">
        <table>
            <tr>
                <th><?= __('Alias') ?></th>
                <td><?= h($metodoDePago->alias) ?></td>
            </tr>
            <tr>
                <th><?= __('Tipo De Tarjeta') ?></th>
                <td><?= h($metodoDePago->tipo_de_tarjeta) ?></td>
            </tr>
            <tr>
                <th><?= __('Nombre Del Titular') ?></th>
                <td><?= h($metodoDePago->nombre_del_titular) ?></td>
            </tr>
            <tr>
                <th><?= __('CVV') ?></th>
                <td>***</td> </tr>
            <tr>
                <th><?= __('Fecha De Vencimiento') ?></th>
                <td><?= h($metodoDePago->fecha_de_vencimiento) ?></td>
            </tr>
            <tr>
                <th><?= __('Usuario Propietario') ?></th>
                <td><?= $metodoDePago->hasValue('user') ? $this->Html->link($metodoDePago->user->username, ['controller' => 'Users', 'action' => 'view', $metodoDePago->user->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Es Predeterminado') ?></th>
                <td>
                    <?php if($metodoDePago->es_predeterminado): ?>
                        <span style="color: #10b981; font-weight: bold;">Sí</span>
                    <?php else: ?>
                        No
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th><?= __('ID del Registro') ?></th>
                <td><?= $this->Number->format($metodoDePago->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Creado') ?></th>
                <td><?= h($metodoDePago->created) ?></td>
            </tr>
            <tr>
                <th><?= __('Modificado') ?></th>
                <td><?= h($metodoDePago->modified) ?></td>
            </tr>
        </table>
    </div>

    <div class="related">
        <?php if (!empty($metodoDePago->viajes)) : ?>
            <h4><?= __('Viajes pagados con este método') ?></h4>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Hora Inicio') ?></th>
                            <th><?= __('Hora Fin') ?></th>
                            <th><?= __('Costo Total') ?></th>
                            <th><?= __('Estado') ?></th>
                            <th class="actions"><?= __('Acciones') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($metodoDePago->viajes as $viaje) : ?>
                        <tr>
                            <td><?= h($viaje->id) ?></td>
                            <td><?= h($viaje->hora_inicio) ?></td>
                            <td><?= h($viaje->hora_fin) ?></td>
                            <td><?= h($viaje->costo_total) ?></td>
                            <td><?= h($viaje->estado_viaje) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Ver'), ['controller' => 'Viajes', 'action' => 'view', $viaje->id]) ?>
                                <?= $this->Html->link(__('Editar'), ['controller' => 'Viajes', 'action' => 'edit', $viaje->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Borrar'),
                                    ['controller' => 'Viajes', 'action' => 'delete', $viaje->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('¿Borrar viaje # {0}?', $viaje->id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="empty-state">
                <p>No hay viajes registrados con este método de pago.</p>
            </div>
        <?php endif; ?>
    </div>
</div>