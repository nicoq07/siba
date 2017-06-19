<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Notificacione[]|\Cake\Collection\CollectionInterface $notificaciones
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Notificacione'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="notificaciones index large-9 medium-8 columns content">
    <h3><?= __('Notificaciones') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('emisor') ?></th>
                <th scope="col"><?= $this->Paginator->sort('receptor') ?></th>
                <th scope="col"><?= $this->Paginator->sort('leida') ?></th>
                <th scope="col"><?= $this->Paginator->sort('broadcast') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($notificaciones as $notificacione): ?>
            <tr>
                <td><?= $this->Number->format($notificacione->id) ?></td>
                <td><?= $this->Number->format($notificacione->emisor) ?></td>
                <td><?= $this->Number->format($notificacione->receptor) ?></td>
                <td><?= h($notificacione->leida) ?></td>
                <td><?= h($notificacione->broadcast) ?></td>
                <td><?= h($notificacione->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $notificacione->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $notificacione->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $notificacione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notificacione->id)]) ?>
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
