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
                ['action' => 'delete', $fotosAlumno->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $fotosAlumno->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Fotos Alumnos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Alumnos'), ['controller' => 'Alumnos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Alumno'), ['controller' => 'Alumnos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fotosAlumnos form large-9 medium-8 columns content">
    <?= $this->Form->create($fotosAlumno) ?>
    <fieldset>
        <legend><?= __('Edit Fotos Alumno') ?></legend>
        <?php
            echo $this->Form->control('alumno_id', ['options' => $alumnos]);
            echo $this->Form->control('referencia');
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
