<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Alumnos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Fotos Alumnos'), ['controller' => 'FotosAlumnos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fotos Alumno'), ['controller' => 'FotosAlumnos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pagos Alumnos'), ['controller' => 'PagosAlumnos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pagos Alumno'), ['controller' => 'PagosAlumnos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clases'), ['controller' => 'Clases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Clase'), ['controller' => 'Clases', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="alumnos form large-9 medium-8 columns content">
    <?= $this->Form->create($alumno) ?>
    <fieldset>
        <legend><?= __('Add Alumno') ?></legend>
        <?php
            echo $this->Form->control('legajo_numero');
            echo $this->Form->control('nombre');
            echo $this->Form->control('apellido');
            echo $this->Form->control('fecha_nacimiento', ['empty' => true]);
            echo $this->Form->control('direccion');
            echo $this->Form->control('ciudad');
            echo $this->Form->control('codigo_postal');
            echo $this->Form->control('telefono');
            echo $this->Form->control('celular');
            echo $this->Form->control('nro_documento');
            echo $this->Form->control('email');
            echo $this->Form->control('observacion');
            echo $this->Form->control('programa_adolecencia');
            echo $this->Form->control('colegio');
            echo $this->Form->control('nombre_madre');
            echo $this->Form->control('nombre_padre');
            echo $this->Form->control('email_padre');
            echo $this->Form->control('email_madre');
            echo $this->Form->control('celular_padre');
            echo $this->Form->control('celular_madre');
            echo $this->Form->control('monto_arancel');
            echo $this->Form->control('monto_materiales');
            echo $this->Form->control('futuro_alumno');
            echo $this->Form->control('active');
            echo $this->Form->control('clases._ids', ['options' => $clases]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
