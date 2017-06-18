<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\SeguimientosClase $seguimientosClase
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Seguimientos Clase'), ['action' => 'edit', $seguimientosClase->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Seguimientos Clase'), ['action' => 'delete', $seguimientosClase->id], ['confirm' => __('Are you sure you want to delete # {0}?', $seguimientosClase->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Seguimientos Clases'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Seguimientos Clase'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clases Alumnos'), ['controller' => 'ClasesAlumnos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Clases Alumno'), ['controller' => 'ClasesAlumnos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Calificaciones'), ['controller' => 'Calificaciones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Calificacione'), ['controller' => 'Calificaciones', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="seguimientosClases view large-9 medium-8 columns content">
    <h3><?= h($seguimientosClase->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Clases Alumno') ?></th>
            <td><?= $seguimientosClase->has('clases_alumno') ? $this->Html->link($seguimientosClase->clases_alumno->id, ['controller' => 'ClasesAlumnos', 'action' => 'view', $seguimientosClase->clases_alumno->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Calificacione') ?></th>
            <td><?= $seguimientosClase->has('calificacione') ? $this->Html->link($seguimientosClase->calificacione->id, ['controller' => 'Calificaciones', 'action' => 'view', $seguimientosClase->calificacione->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($seguimientosClase->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha') ?></th>
            <td><?= h($seguimientosClase->fecha) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($seguimientosClase->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($seguimientosClase->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Presente') ?></th>
            <td><?= $seguimientosClase->presente ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Observacion') ?></h4>
        <?= $this->Text->autoParagraph(h($seguimientosClase->observacion)); ?>
    </div>
</div>
