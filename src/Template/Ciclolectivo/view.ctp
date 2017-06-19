<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Ciclolectivo $ciclolectivo
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ciclolectivo'), ['action' => 'edit', $ciclolectivo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ciclolectivo'), ['action' => 'delete', $ciclolectivo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ciclolectivo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ciclolectivo'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ciclolectivo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Horarios'), ['controller' => 'Horarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Horario'), ['controller' => 'Horarios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ciclolectivo view large-9 medium-8 columns content">
    <h3><?= h($ciclolectivo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($ciclolectivo->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($ciclolectivo->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Inicio') ?></th>
            <td><?= h($ciclolectivo->fecha_inicio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Fin') ?></th>
            <td><?= h($ciclolectivo->fecha_fin) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($ciclolectivo->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($ciclolectivo->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $ciclolectivo->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Horarios') ?></h4>
        <?php if (!empty($ciclolectivo->horarios)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Ciclolectivo Id') ?></th>
                <th scope="col"><?= __('Nombre Dia') ?></th>
                <th scope="col"><?= __('Hora') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($ciclolectivo->horarios as $horarios): ?>
            <tr>
                <td><?= h($horarios->id) ?></td>
                <td><?= h($horarios->ciclolectivo_id) ?></td>
                <td><?= h($horarios->nombre_dia) ?></td>
                <td><?= h($horarios->hora) ?></td>
                <td><?= h($horarios->created) ?></td>
                <td><?= h($horarios->modified) ?></td>
                <td><?= h($horarios->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Horarios', 'action' => 'view', $horarios->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Horarios', 'action' => 'edit', $horarios->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Horarios', 'action' => 'delete', $horarios->id], ['confirm' => __('Are you sure you want to delete # {0}?', $horarios->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
