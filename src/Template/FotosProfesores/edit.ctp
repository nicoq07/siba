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
                ['action' => 'delete', $fotosProfesore->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $fotosProfesore->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Fotos Profesores'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Profesores'), ['controller' => 'Profesores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Profesore'), ['controller' => 'Profesores', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fotosProfesores form large-9 medium-8 columns content">
    <?= $this->Form->create($fotosProfesore) ?>
    <fieldset>
        <legend><?= __('Edit Fotos Profesore') ?></legend>
        <?php
            echo $this->Form->control('profesor_id', ['options' => $profesores]);
            echo $this->Form->control('referencia');
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
