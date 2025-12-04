<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">

    </aside>
    <div class="column column-80">
        <div class="users view content">
            <div class="users-view">
                <?php
                $avatar = null;
                if (!empty($user->imagen)) {
                    $avatar = '/uploads/usuarios/' . $user->imagen;
                } elseif (!empty($user->avatar)) {
                    $avatar = '/uploads/usuarios/' . $user->avatar;
                } elseif (!empty($user->foto)) {
                    $avatar = '/uploads/usuarios/' . $user->foto;
                }
                ?>

                <div class="user-card">
                    <div class="user-avatar">
                        <?php if ($avatar): ?>
                            <?= $this->Html->image($avatar, ['alt' => $user->username]) ?>
                        <?php else: ?>
                            <span class="initials"><?=
                                strtoupper(substr(($user->nombre ?? $user->username), 0, 1)) .
                                (isset($user->apellidos) ? strtoupper(substr($user->apellidos, 0, 1)) : '')
                            ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="user-info">
                        <h4><?= h($user->username) ?></h4>
                        <div class="user-meta"><?= h($user->email) ?><br><?= h(trim((string)($user->nombre ?? '') . ' ' . (string)($user->apellidos ?? ''))) ?></div>
                    </div>

                    <div class="user-actions">
                        <?= $this->Html->link(('Editar'), ['action' => 'edit', $user->id], ['class' => 'btn-link', 'escape' => false]) ?>
                        <?= $this->Form->postLink(('Eliminar'), ['action' => 'delete', $user->id], ['confirm' => __('Seguro que quieres eliminar # {0}?', $user->id), 'class' => 'btn-link btn-danger', 'escape' => false]) ?>
                    </div>
                </div>

                <div class="user-details">
                    <table>
                        <tr>
                            <th><?= __('Username') ?></th>
                            <td><?= h($user->username) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Email') ?></th>
                            <td><?= h($user->email) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Nombre') ?></th>
                            <td><?= h($user->nombre) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Apellidos') ?></th>
                            <td><?= h($user->apellidos) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Sexo') ?></th>
                            <td><?= h($user->sexo) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Rol') ?></th>
                            <td><?= h($user->rol) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <td><?= $this->Number->format($user->id) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Created') ?></th>
                            <td><?= h($user->created) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Modified') ?></th>
                            <td><?= h($user->modified) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="related">
                <h4><?= __('Related Metodo De Pagos') ?></h4>
                <?php if (!empty($user->metodo_de_pagos)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Tipo De Tarjeta') ?></th>
                            <th><?= __('Nombre Del Titular') ?></th>
                            <th><?= __('Cvv') ?></th>
                            <th><?= __('Fecha De Vencimiento') ?></th>
                            <th><?= __('Es Predeterminado') ?></th>
                            <th><?= __('Alias') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->metodo_de_pagos as $metodoDePago) : ?>
                        <tr>
                            <td><?= h($metodoDePago->id) ?></td>
                            <td><?= h($metodoDePago->tipo_de_tarjeta) ?></td>
                            <td><?= h($metodoDePago->nombre_del_titular) ?></td>
                            <td><?= h($metodoDePago->cvv) ?></td>
                            <td><?= h($metodoDePago->fecha_de_vencimiento) ?></td>
                            <td><?= h($metodoDePago->es_predeterminado) ?></td>
                            <td><?= h($metodoDePago->alias) ?></td>
                            <td><?= h($metodoDePago->user_id) ?></td>
                            <td><?= h($metodoDePago->created) ?></td>
                            <td><?= h($metodoDePago->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(('View'), ['controller' => 'MetodoDePagos', 'action' => 'view', $metodoDePago->id], ['class' => 'btn-link', 'escape' => false]) ?>
                                <?= $this->Html->link(('Edit'), ['controller' => 'MetodoDePagos', 'action' => 'edit', $metodoDePago->id], ['class' => 'btn-link', 'escape' => false]) ?>
                                <?= $this->Form->postLink(
                                    ('Eliminar'),
                                    ['controller' => 'MetodoDePagos', 'action' => 'delete', $metodoDePago->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Seguro que quiere eliminar # {0}?', $metodoDePago->id),
                                        'class' => 'btn-link btn-danger',
                                        'escape' => false,
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Viajes Relacionados') ?></h4>    
                <?php if (!empty($user->viajes)) : ?>
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
                        <?php foreach ($user->viajes as $viaje) : ?>
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
                                <?= $this->Html->link(('View'), ['controller' => 'Viajes', 'action' => 'view', $viaje->id], ['class' => 'btn-link', 'escape' => false]) ?>
                                <?= $this->Html->link(('Edit'), ['controller' => 'Viajes', 'action' => 'edit', $viaje->id], ['class' => 'btn-link', 'escape' => false]) ?>
                                <?= $this->Form->postLink(
                                    ('Eliminar'),
                                    ['controller' => 'Viajes', 'action' => 'delete', $viaje->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Seguro que quiere eliminar # {0}?', $viaje->id),
                                        'class' => 'btn-link btn-danger',
                                        'escape' => false,
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