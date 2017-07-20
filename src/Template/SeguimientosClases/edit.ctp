<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $seguimientosClase->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $seguimientosClase->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Seguimientos Clases'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Clases'), ['controller' => 'Clases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Clase'), ['controller' => 'Clases', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Alumnos'), ['controller' => 'Alumnos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Alumno'), ['controller' => 'Alumnos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Calificaciones'), ['controller' => 'Calificaciones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Calificacione'), ['controller' => 'Calificaciones', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="seguimientosClases form large-9 medium-8 columns content">
    <?= $this->Form->create($seguimientosClase) ?>
    <fieldset>
        <legend><?= __('Edit Seguimientos Clase') ?></legend>
        <?php
            echo $this->Form->control('clase_id', ['options' => $clases, 'empty' => true]);
            echo $this->Form->control('alumno_id', ['options' => $alumnos]);
            echo $this->Form->control('observacion');
            echo $this->Form->control('presente');
            echo $this->Form->control('calificacion_id', ['options' => $calificaciones, 'empty' => true]);
            echo $this->Form->control('fecha', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
