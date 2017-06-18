<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\FotosAlumno[]|\Cake\Collection\CollectionInterface $fotosAlumnos
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Fotos Alumno'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Alumnos'), ['controller' => 'Alumnos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Alumno'), ['controller' => 'Alumnos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fotosAlumnos index large-9 medium-8 columns content">
    <h3><?= __('Fotos Alumnos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('alumno_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('referencia') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fotosAlumnos as $fotosAlumno): ?>
            <tr>
                <td><?= $this->Number->format($fotosAlumno->id) ?></td>
                <td><?= $fotosAlumno->has('alumno') ? $this->Html->link($fotosAlumno->alumno->id, ['controller' => 'Alumnos', 'action' => 'view', $fotosAlumno->alumno->id]) : '' ?></td>
                <td><?= h($fotosAlumno->referencia) ?></td>
                <td><?= h($fotosAlumno->created) ?></td>
                <td><?= h($fotosAlumno->modified) ?></td>
                <td><?= h($fotosAlumno->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $fotosAlumno->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fotosAlumno->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fotosAlumno->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fotosAlumno->id)]) ?>
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
