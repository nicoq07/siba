<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\FotosAlumno $fotosAlumno
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Fotos Alumno'), ['action' => 'edit', $fotosAlumno->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Fotos Alumno'), ['action' => 'delete', $fotosAlumno->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fotosAlumno->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Fotos Alumnos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fotos Alumno'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Alumnos'), ['controller' => 'Alumnos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Alumno'), ['controller' => 'Alumnos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="fotosAlumnos view large-9 medium-8 columns content">
    <h3><?= h($fotosAlumno->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Alumno') ?></th>
            <td><?= $fotosAlumno->has('alumno') ? $this->Html->link($fotosAlumno->alumno->id, ['controller' => 'Alumnos', 'action' => 'view', $fotosAlumno->alumno->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Referencia') ?></th>
            <td><?= h($fotosAlumno->referencia) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($fotosAlumno->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($fotosAlumno->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($fotosAlumno->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $fotosAlumno->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
