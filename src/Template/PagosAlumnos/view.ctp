<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\PagosAlumno $pagosAlumno
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pagos Alumno'), ['action' => 'edit', $pagosAlumno->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pagos Alumno'), ['action' => 'delete', $pagosAlumno->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pagosAlumno->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pagos Alumnos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pagos Alumno'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Alumnos'), ['controller' => 'Alumnos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Alumno'), ['controller' => 'Alumnos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pagosAlumnos view large-9 medium-8 columns content">
    <h3><?= h($pagosAlumno->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Alumno') ?></th>
            <td><?= $pagosAlumno->has('alumno') ? $this->Html->link($pagosAlumno->alumno->id, ['controller' => 'Alumnos', 'action' => 'view', $pagosAlumno->alumno->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $pagosAlumno->has('user') ? $this->Html->link($pagosAlumno->user->id, ['controller' => 'Users', 'action' => 'view', $pagosAlumno->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pagosAlumno->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Monto') ?></th>
            <td><?= $this->Number->format($pagosAlumno->monto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($pagosAlumno->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($pagosAlumno->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pagado') ?></th>
            <td><?= $pagosAlumno->pagado ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
