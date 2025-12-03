<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>
<div class="users index content">
    <?= $this->Html->link(__('Nuevo User'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Users') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('username') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('apellidos') ?></th>
                    <th><?= $this->Paginator->sort('sexo') ?></th>
                    <th><?= $this->Paginator->sort('rol') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= h($user->username) ?></td>
                    <td><?= h($user->email) ?></td>
                    <td><?= h($user->nombre) ?></td>
                    <td><?= h($user->apellidos) ?></td>
                    <td><?= h($user->sexo) ?></td>
                    <td><?= h($user->rol) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $user->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id]) ?>
                        <?= $this->Form->postLink(
                            __('Eliminar'),
                            ['action' => 'delete', $user->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Seguro que quiere eliminar # {0}?', $user->id),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>