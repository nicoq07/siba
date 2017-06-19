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
                ['action' => 'delete', $calificacione->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $calificacione->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Calificaciones'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="calificaciones form large-9 medium-8 columns content">
    <?= $this->Form->create($calificacione) ?>
    <fieldset>
        <legend><?= __('Edit Calificacione') ?></legend>
        <?php
            echo $this->Form->control('nombre');
            echo $this->Form->control('valor');
            echo $this->Form->control('aprobado');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
