<div class="col-lg-10">
    <h3><?= __('Clases') ?></h3>
    <table>
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('profesor_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('horario_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('disciplina_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clases as $clase): ?>
            <tr>
                <td><?= $this->Number->format($clase->id) ?></td>
                <td><?= $clase->has('profesore') ? $this->Html->link($clase->profesore->id, ['controller' => 'Profesores', 'action' => 'view', $clase->profesore->id]) : '' ?></td>
                <td><?= $clase->has('horario') ? $this->Html->link($clase->horario->id, ['controller' => 'Horarios', 'action' => 'view', $clase->horario->id]) : '' ?></td>
                <td><?= $clase->has('disciplina') ? $this->Html->link($clase->disciplina->id, ['controller' => 'Disciplinas', 'action' => 'view', $clase->disciplina->id]) : '' ?></td>
                <td><?= h($clase->created) ?></td>
                <td><?= h($clase->modified) ?></td>
                <td><?= h($clase->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $clase->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $clase->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $clase->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clase->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
 <?= $this->element('footer') ?>
