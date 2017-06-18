<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Clase[]|\Cake\Collection\CollectionInterface $clases
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Clase'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Profesores'), ['controller' => 'Profesores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Profesore'), ['controller' => 'Profesores', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Horarios'), ['controller' => 'Horarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Horario'), ['controller' => 'Horarios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Disciplinas'), ['controller' => 'Disciplinas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Disciplina'), ['controller' => 'Disciplinas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Alumnos'), ['controller' => 'Alumnos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Alumno'), ['controller' => 'Alumnos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="clases index large-9 medium-8 columns content">
    <h3><?= __('Clases') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('profesor_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('horario_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('disciplina_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clases as $clase): ?>
            <tr>
                <td><?= $this->Number->format($clase->id) ?></td>
                <td><?= $clase->has('profesore') ? $this->Html->link($clase->profesore->id, ['controller' => 'Profesores', 'action' => 'view', $clase->profesore->id]) : '' ?></td>
                <td><?= $clase->has('horario') ? $this->Html->link($clase->horario->id, ['controller' => 'Horarios', 'action' => 'view', $clase->horario->id]) : '' ?></td>
                <td><?= $clase->has('disciplina') ? $this->Html->link($clase->disciplina->id, ['controller' => 'Disciplinas', 'action' => 'view', $clase->disciplina->id]) : '' ?></td>
                <td><?= h($clase->created) ?></td>
                <td><?= h($clase->modified) ?></td>
                <td><?= h($clase->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $clase->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $clase->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $clase->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clase->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
