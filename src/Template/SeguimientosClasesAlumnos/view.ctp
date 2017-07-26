<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\SeguimientosClasesAlumno $seguimientosClasesAlumno
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Seguimientos Clases Alumno'), ['action' => 'edit', $seguimientosClasesAlumno->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Seguimientos Clases Alumno'), ['action' => 'delete', $seguimientosClasesAlumno->id], ['confirm' => __('Are you sure you want to delete # {0}?', $seguimientosClasesAlumno->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Seguimientos Clases Alumnos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Seguimientos Clases Alumno'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Calificaciones'), ['controller' => 'Calificaciones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Calificacione'), ['controller' => 'Calificaciones', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="seguimientosClasesAlumnos view large-9 medium-8 columns content">
    <h3><?= h($seguimientosClasesAlumno->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Calificacione') ?></th>
            <td><?= $seguimientosClasesAlumno->has('calificacione') ? $this->Html->link($seguimientosClasesAlumno->calificacione->id, ['controller' => 'Calificaciones', 'action' => 'view', $seguimientosClasesAlumno->calificacione->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($seguimientosClasesAlumno->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Clase Alumno Id') ?></th>
            <td><?= $this->Number->format($seguimientosClasesAlumno->clase_alumno_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha') ?></th>
            <td><?= h($seguimientosClasesAlumno->fecha) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($seguimientosClasesAlumno->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($seguimientosClasesAlumno->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Presente') ?></th>
            <td><?= $seguimientosClasesAlumno->presente ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Observacion') ?></h4>
        <?= $this->Text->autoParagraph(h($seguimientosClasesAlumno->observacion)); ?>
    </div>
</div>
