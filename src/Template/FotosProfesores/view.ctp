<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\FotosProfesore $fotosProfesore
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Fotos Profesore'), ['action' => 'edit', $fotosProfesore->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Fotos Profesore'), ['action' => 'delete', $fotosProfesore->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fotosProfesore->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Fotos Profesores'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fotos Profesore'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Profesores'), ['controller' => 'Profesores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Profesore'), ['controller' => 'Profesores', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="fotosProfesores view large-9 medium-8 columns content">
    <h3><?= h($fotosProfesore->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Profesore') ?></th>
            <td><?= $fotosProfesore->has('profesore') ? $this->Html->link($fotosProfesore->profesore->id, ['controller' => 'Profesores', 'action' => 'view', $fotosProfesore->profesore->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Referencia') ?></th>
            <td><?= h($fotosProfesore->referencia) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($fotosProfesore->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($fotosProfesore->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($fotosProfesore->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $fotosProfesore->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
