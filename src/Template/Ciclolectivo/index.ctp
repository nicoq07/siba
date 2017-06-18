<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Ciclolectivo[]|\Cake\Collection\CollectionInterface $ciclolectivo
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ciclolectivo'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Horarios'), ['controller' => 'Horarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Horario'), ['controller' => 'Horarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ciclolectivo index large-9 medium-8 columns content">
    <h3><?= __('Ciclolectivo') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_inicio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_fin') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descripcion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ciclolectivo as $ciclolectivo): ?>
            <tr>
                <td><?= $this->Number->format($ciclolectivo->id) ?></td>
                <td><?= h($ciclolectivo->fecha_inicio) ?></td>
                <td><?= h($ciclolectivo->fecha_fin) ?></td>
                <td><?= h($ciclolectivo->descripcion) ?></td>
                <td><?= h($ciclolectivo->created) ?></td>
                <td><?= h($ciclolectivo->modified) ?></td>
                <td><?= h($ciclolectivo->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ciclolectivo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ciclolectivo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ciclolectivo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ciclolectivo->id)]) ?>
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
