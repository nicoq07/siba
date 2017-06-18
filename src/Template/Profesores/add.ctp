<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Profesores'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="profesores form large-9 medium-8 columns content">
    <?= $this->Form->create($profesore) ?>
    <fieldset>
        <legend><?= __('Add Profesore') ?></legend>
        <?php
            echo $this->Form->control('legajo_numero');
            echo $this->Form->control('apellido');
            echo $this->Form->control('nombre');
            echo $this->Form->control('nro_documento');
            echo $this->Form->control('direccion');
            echo $this->Form->control('ciudad');
            echo $this->Form->control('codigo_postal');
            echo $this->Form->control('email');
            echo $this->Form->control('cuit');
            echo $this->Form->control('telefono');
            echo $this->Form->control('celular');
            echo $this->Form->control('nombre_contacto');
            echo $this->Form->control('celular_contacto');
            echo $this->Form->control('titulo');
            echo $this->Form->control('observacion');
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary' ]) ?>
    <?= $this->Form->end() ?>
</div>
