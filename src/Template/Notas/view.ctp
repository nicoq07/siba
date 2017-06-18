<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Nota $nota
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Nota'), ['action' => 'edit', $nota->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Nota'), ['action' => 'delete', $nota->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nota->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Notas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nota'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="notas view large-9 medium-8 columns content">
    <h3><?= h($nota->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($nota->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($nota->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($nota->created) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descripcion') ?></h4>
        <?= $this->Text->autoParagraph(h($nota->descripcion)); ?>
    </div>
</div>
