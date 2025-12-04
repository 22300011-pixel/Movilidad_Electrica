<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\MetodoDePago> $metodoDePagos
 */
?>
<div class="metodoDePagos index content">
    
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h3><?= __('Métodos de Pago') ?></h3>
        <?= $this->Html->link(__('Nuevo Método'), ['action' => 'add'], ['class' => 'btn-accent']) ?>
    </div>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', '#') ?></th>
                    <th><?= $this->Paginator->sort('alias', 'Alias') ?></th>
                    <th><?= $this->Paginator->sort('tipo_de_tarjeta', 'Tipo') ?></th>
                    <th><?= $this->Paginator->sort('nombre_del_titular', 'Titular') ?></th>
                    <th><?= $this->Paginator->sort('fecha_de_vencimiento', 'Vencimiento') ?></th>
                    <th><?= $this->Paginator->sort('es_predeterminado', 'Predeterminado') ?></th>
                    <th><?= $this->Paginator->sort('user_id', 'Usuario') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($metodoDePagos as $metodoDePago): ?>
                <tr>
                    <td><?= $this->Number->format($metodoDePago->id) ?></td>
                    <td><strong><?= h($metodoDePago->alias) ?></strong></td>
                    <td><?= h($metodoDePago->tipo_de_tarjeta) ?></td>
                    <td><?= h($metodoDePago->nombre_del_titular) ?></td>
                    <td><?= h($metodoDePago->fecha_de_vencimiento) ?></td>
                    <td>
                        <?php if($metodoDePago->es_predeterminado): ?>
                            <span class="badge status disponible" style="background:var(--tx-primary);">Sí</span>
                        <?php else: ?>
                            <span style="color: #94a3b8;">No</span>
                        <?php endif; ?>
                    </td>
                    <td><?= $metodoDePago->hasValue('user') ? $this->Html->link($metodoDePago->user->username, ['controller' => 'Users', 'action' => 'view', $metodoDePago->user->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $metodoDePago->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $metodoDePago->id]) ?>
                        <?= $this->Form->postLink(
                            __('Borrar'),
                            ['action' => 'delete', $metodoDePago->id],
                            [
                                'confirm' => __('¿Estás seguro de eliminar {0}?', $metodoDePago->alias),
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
            <?= $this->Paginator->prev('< ' . __('Ant.')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Sig.') . ' >') ?>
        </ul>
    </div>
</div>