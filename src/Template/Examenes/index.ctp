<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Examene[]|\Cake\Collection\CollectionInterface $examenes
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Examene'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clases Alumnos'), ['controller' => 'ClasesAlumnos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Clases Alumno'), ['controller' => 'ClasesAlumnos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="examenes index large-9 medium-8 columns content">
    <h3><?= __('Examenes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('clase_alumno_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('periodo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('aprobado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($examenes as $examene): ?>
            <tr>
                <td><?= $this->Number->format($examene->id) ?></td>
                <td><?= $examene->has('clases_alumno') ? $this->Html->link($examene->clases_alumno->id, ['controller' => 'ClasesAlumnos', 'action' => 'view', $examene->clases_alumno->id]) : '' ?></td>
                <td><?= h($examene->periodo) ?></td>
                <td><?= $this->Number->format($examene->aprobado) ?></td>
                <td><?= h($examene->created) ?></td>
                <td><?= h($examene->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $examene->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $examene->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $examene->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examene->id)]) ?>
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
