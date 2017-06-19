<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\PagosAlumno[]|\Cake\Collection\CollectionInterface $pagosAlumnos
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pagos Alumno'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Alumnos'), ['controller' => 'Alumnos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Alumno'), ['controller' => 'Alumnos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pagosAlumnos index large-9 medium-8 columns content">
    <h3><?= __('Pagos Alumnos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('alumno_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('monto') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pagado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pagosAlumnos as $pagosAlumno): ?>
            <tr>
                <td><?= $this->Number->format($pagosAlumno->id) ?></td>
                <td><?= $pagosAlumno->has('alumno') ? $this->Html->link($pagosAlumno->alumno->id, ['controller' => 'Alumnos', 'action' => 'view', $pagosAlumno->alumno->id]) : '' ?></td>
                <td><?= h($pagosAlumno->created) ?></td>
                <td><?= h($pagosAlumno->modified) ?></td>
                <td><?= $this->Number->format($pagosAlumno->monto) ?></td>
                <td><?= h($pagosAlumno->pagado) ?></td>
                <td><?= $pagosAlumno->has('user') ? $this->Html->link($pagosAlumno->user->id, ['controller' => 'Users', 'action' => 'view', $pagosAlumno->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pagosAlumno->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pagosAlumno->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pagosAlumno->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pagosAlumno->id)]) ?>
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
