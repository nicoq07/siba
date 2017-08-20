<div class="col-lg-10">
    <h3><?= __('Clases') ?></h3>
    <div class="col-lg-3 col-lg-offset-9">
    	  <?= $this->Html->link(__('Nueva'), ['action' => 'add'],['class' => 'btn btn-success']) ?>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Detalle') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active',['label' => 'Activa']) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clases as $clase): ?>
            <tr>
                <td  ><?= h($clase->presentacion) ?></td>
                <td ><?= $clase->active ? h("Sí") : h("No") ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $clase->id],['class' => 'btn-sm btn-info']) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $clase->id],['class' => 'btn-sm btn-warning']) ?>
                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $clase->id],['class' => 'btn-sm btn-danger','confirm' => __('Are you sure you want to delete # {0}?', $clase->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
 <?= $this->element('footer') ?>
