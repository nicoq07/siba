<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Profesore $profesore
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Profesore'), ['action' => 'edit', $profesore->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Profesore'), ['action' => 'delete', $profesore->id], ['confirm' => __('Are you sure you want to delete # {0}?', $profesore->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Profesores'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Profesore'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="profesores view large-9 medium-8 columns content">
    <h3><?= h($profesore->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Apellido') ?></th>
            <td><?= h($profesore->apellido) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($profesore->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nro Documento') ?></th>
            <td><?= h($profesore->nro_documento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Direccion') ?></th>
            <td><?= h($profesore->direccion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ciudad') ?></th>
            <td><?= h($profesore->ciudad) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Codigo Postal') ?></th>
            <td><?= h($profesore->codigo_postal) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($profesore->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cuit') ?></th>
            <td><?= h($profesore->cuit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefono') ?></th>
            <td><?= h($profesore->telefono) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Celular') ?></th>
            <td><?= h($profesore->celular) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre Contacto') ?></th>
            <td><?= h($profesore->nombre_contacto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Celular Contacto') ?></th>
            <td><?= h($profesore->celular_contacto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Titulo') ?></th>
            <td><?= h($profesore->titulo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($profesore->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Legajo Numero') ?></th>
            <td><?= $this->Number->format($profesore->legajo_numero) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($profesore->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($profesore->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $profesore->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Observacion') ?></h4>
        <?= $this->Text->autoParagraph(h($profesore->observacion)); ?>
    </div>
</div>
