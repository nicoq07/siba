<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Seguimientos Clases Alumnos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Calificaciones'), ['controller' => 'Calificaciones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Calificacione'), ['controller' => 'Calificaciones', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="seguimientosClasesAlumnos form large-9 medium-8 columns content">
    <?= $this->Form->create($seguimientosClasesAlumno) ?>
    <fieldset>
        <legend><?= __('Add Seguimientos Clases Alumno') ?></legend>
        <?php
            echo $this->Form->control('clase_alumno_id');
            echo $this->Form->control('observacion');
            echo $this->Form->control('presente');
            echo $this->Form->control('calificacion_id', ['options' => $calificaciones, 'empty' => true]);
            echo $this->Form->control('fecha', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
