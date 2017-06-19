<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Horarios'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Ciclolectivo'), ['controller' => 'Ciclolectivo', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ciclolectivo'), ['controller' => 'Ciclolectivo', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clases'), ['controller' => 'Clases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Clase'), ['controller' => 'Clases', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="horarios form large-9 medium-8 columns content">
    <?= $this->Form->create($horario) ?>
    <fieldset>
        <legend><?= __('Add Horario') ?></legend>
        <?php
            echo $this->Form->control('ciclolectivo_id', ['options' => $ciclolectivo]);
            echo $this->Form->control('nombre_dia');
            echo $this->Form->control('hora');
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
