<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Profesore[]|\Cake\Collection\CollectionInterface $profesores
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Profesore'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="profesores index large-9 medium-8 columns content">
    <h3><?= __('Profesores') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('legajo_numero') ?></th>
                <th scope="col"><?= $this->Paginator->sort('apellido') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nro_documento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('direccion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ciudad') ?></th>
                <th scope="col"><?= $this->Paginator->sort('codigo_postal') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cuit') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telefono') ?></th>
                <th scope="col"><?= $this->Paginator->sort('celular') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre_contacto') ?></th>
                <th scope="col"><?= $this->Paginator->sort('celular_contacto') ?></th>
                <th scope="col"><?= $this->Paginator->sort('titulo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($profesores as $profesore): ?>
            <tr>
                <td><?= $this->Number->format($profesore->id) ?></td>
                <td><?= $this->Number->format($profesore->legajo_numero) ?></td>
                <td><?= h($profesore->apellido) ?></td>
                <td><?= h($profesore->nombre) ?></td>
                <td><?= h($profesore->nro_documento) ?></td>
                <td><?= h($profesore->direccion) ?></td>
                <td><?= h($profesore->ciudad) ?></td>
                <td><?= h($profesore->codigo_postal) ?></td>
                <td><?= h($profesore->email) ?></td>
                <td><?= h($profesore->cuit) ?></td>
                <td><?= h($profesore->telefono) ?></td>
                <td><?= h($profesore->celular) ?></td>
                <td><?= h($profesore->nombre_contacto) ?></td>
                <td><?= h($profesore->celular_contacto) ?></td>
                <td><?= h($profesore->titulo) ?></td>
                <td><?= h($profesore->created) ?></td>
                <td><?= h($profesore->modified) ?></td>
                <td><?= h($profesore->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $profesore->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $profesore->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $profesore->id], ['confirm' => __('Are you sure you want to delete # {0}?', $profesore->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
