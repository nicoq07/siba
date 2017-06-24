<div class="col-lg-10">
    <h3><?= __('Profesores') ?></h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id',['label'=>'Leg. Nuevo']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('legajo_numero',['label'=>'Leg. Anterior']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('apellido') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nro_documento',['label'=>'DNI']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cuit',['label'=>'CUIT']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('telefono',['label'=>'Tel. Fijo']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('celular') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active',['label'=>'Activo']) ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
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
                <td><?= h($profesore->email) ?></td>
                <td><?= h($profesore->cuit) ?></td>
                <td><?= h($profesore->telefono) ?></td>
                <td><?= h($profesore->celular) ?></td>
               
                <td><?= h($profesore->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $profesore->id ],[ 'class' => 'btn-sm btn-info']) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $profesore->id],[ 'class' => 'btn-sm btn-warning']) ?>
                    <?= $this->Form->postLink(__('Baja'), ['action' => 'delete', $profesore->id], ['class' => 'btn-sm btn-danger', 'confirm' => __('Vas a dar de baja a {0}?', $profesore->nombre)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
 </div>
 <?= $this->element('footer') ?>
   
