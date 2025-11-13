<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Modelo $modelo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Modelo'), ['action' => 'edit', $modelo->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Modelo'), ['action' => 'delete', $modelo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $modelo->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Modelos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Modelo'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="modelos view content">
            <h3><?= h($modelo->nombre_del_modelo) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre Del Modelo') ?></th>
                    <td><?= h($modelo->nombre_del_modelo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Marca') ?></th>
                    <td><?= h($modelo->marca) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tipo De Vehiculo') ?></th>
                    <td><?= h($modelo->tipo_de_vehiculo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($modelo->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tarifa Por Minuto') ?></th>
                    <td><?= $this->Number->format($modelo->tarifa_por_minuto) ?></td>
                </tr>
                <tr>
                    <th><?= __('Capacidad Maxima Kg') ?></th>
                    <td><?= $modelo->capacidad_maxima_kg === null ? '' : $this->Number->format($modelo->capacidad_maxima_kg) ?></td>
                </tr>
                <tr>
                    <th><?= __('Capacidad De Bateria') ?></th>
                    <td><?= $modelo->capacidad_de_bateria === null ? '' : $this->Number->format($modelo->capacidad_de_bateria) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($modelo->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($modelo->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Fotos') ?></h4>
                <?php if (!empty($modelo->fotos)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Url Foto') ?></th>
                            <th><?= __('Descripcion') ?></th>
                            <th><?= __('Modelo Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($modelo->fotos as $foto) : ?>
                        <tr>
                            <td><?= h($foto->id) ?></td>
                            <td><?= h($foto->url_foto) ?></td>
                            <td><?= h($foto->descripcion) ?></td>
                            <td><?= h($foto->modelo_id) ?></td>
                            <td><?= h($foto->created) ?></td>
                            <td><?= h($foto->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Fotos', 'action' => 'view', $foto->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Fotos', 'action' => 'edit', $foto->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Fotos', 'action' => 'delete', $foto->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $foto->id),
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
                <h4><?= __('Related Vehiculos') ?></h4>
                <?php if (!empty($modelo->vehiculos)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Numero De Serie') ?></th>
                            <th><?= __('Estado') ?></th>
                            <th><?= __('Nivel De Bateria') ?></th>
                            <th><?= __('Latitud') ?></th>
                            <th><?= __('Longitud') ?></th>
                            <th><?= __('Estacion Id') ?></th>
                            <th><?= __('Modelo Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($modelo->vehiculos as $vehiculo) : ?>
                        <tr>
                            <td><?= h($vehiculo->id) ?></td>
                            <td><?= h($vehiculo->numero_de_serie) ?></td>
                            <td><?= h($vehiculo->estado) ?></td>
                            <td><?= h($vehiculo->nivel_de_bateria) ?></td>
                            <td><?= h($vehiculo->latitud) ?></td>
                            <td><?= h($vehiculo->longitud) ?></td>
                            <td><?= h($vehiculo->estacion_id) ?></td>
                            <td><?= h($vehiculo->modelo_id) ?></td>
                            <td><?= h($vehiculo->created) ?></td>
                            <td><?= h($vehiculo->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Vehiculos', 'action' => 'view', $vehiculo->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Vehiculos', 'action' => 'edit', $vehiculo->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Vehiculos', 'action' => 'delete', $vehiculo->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $vehiculo->id),
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