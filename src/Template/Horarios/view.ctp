<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Horario $horario
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Horario'), ['action' => 'edit', $horario->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Horario'), ['action' => 'delete', $horario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $horario->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Horarios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Horario'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ciclolectivo'), ['controller' => 'Ciclolectivo', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ciclolectivo'), ['controller' => 'Ciclolectivo', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clases'), ['controller' => 'Clases', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Clase'), ['controller' => 'Clases', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="horarios view large-9 medium-8 columns content">
    <h3><?= h($horario->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Ciclolectivo') ?></th>
            <td><?= $horario->has('ciclolectivo') ? $this->Html->link($horario->ciclolectivo->id, ['controller' => 'Ciclolectivo', 'action' => 'view', $horario->ciclolectivo->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre Dia') ?></th>
            <td><?= h($horario->nombre_dia) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($horario->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hora') ?></th>
            <td><?= h($horario->hora) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($horario->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($horario->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $horario->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Clases') ?></h4>
        <?php if (!empty($horario->clases)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Profesor Id') ?></th>
                <th scope="col"><?= __('Horario Id') ?></th>
                <th scope="col"><?= __('Disciplina Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($horario->clases as $clases): ?>
            <tr>
                <td><?= h($clases->id) ?></td>
                <td><?= h($clases->profesor_id) ?></td>
                <td><?= h($clases->horario_id) ?></td>
                <td><?= h($clases->disciplina_id) ?></td>
                <td><?= h($clases->created) ?></td>
                <td><?= h($clases->modified) ?></td>
                <td><?= h($clases->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Clases', 'action' => 'view', $clases->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Clases', 'action' => 'edit', $clases->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Clases', 'action' => 'delete', $clases->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clases->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
