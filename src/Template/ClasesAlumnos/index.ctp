<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\ClasesAlumno[]|\Cake\Collection\CollectionInterface $clasesAlumnos
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Clases Alumno'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Alumnos'), ['controller' => 'Alumnos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Alumno'), ['controller' => 'Alumnos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clases'), ['controller' => 'Clases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Clase'), ['controller' => 'Clases', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="clasesAlumnos index large-9 medium-8 columns content">
    <h3><?= __('Clases Alumnos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('alumno_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('clase_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clasesAlumnos as $clasesAlumno): ?>
            <tr>
                <td><?= $this->Number->format($clasesAlumno->id) ?></td>
                <td><?= $this->Number->format($clasesAlumno->alumno_id) ?></td>
                <td><?= $clasesAlumno->has('clase') ? $this->Html->link($clasesAlumno->clase->id, ['controller' => 'Clases', 'action' => 'view', $clasesAlumno->clase->id]) : '' ?></td>
                <td><?= h($clasesAlumno->created) ?></td>
                <td><?= h($clasesAlumno->modified) ?></td>
                <td><?= h($clasesAlumno->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $clasesAlumno->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $clasesAlumno->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $clasesAlumno->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clasesAlumno->id)]) ?>
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
