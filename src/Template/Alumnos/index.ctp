<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Alumno[]|\Cake\Collection\CollectionInterface $alumnos
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Alumno'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fotos Alumnos'), ['controller' => 'FotosAlumnos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fotos Alumno'), ['controller' => 'FotosAlumnos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pagos Alumnos'), ['controller' => 'PagosAlumnos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pagos Alumno'), ['controller' => 'PagosAlumnos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clases'), ['controller' => 'Clases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Clase'), ['controller' => 'Clases', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="alumnos index large-9 medium-8 columns content">
    <h3><?= __('Alumnos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('legajo_numero') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('apellido') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_nacimiento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('direccion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ciudad') ?></th>
                <th scope="col"><?= $this->Paginator->sort('codigo_postal') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telefono') ?></th>
                <th scope="col"><?= $this->Paginator->sort('celular') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nro_documento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('programa_adolecencia') ?></th>
                <th scope="col"><?= $this->Paginator->sort('colegio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre_madre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre_padre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email_padre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email_madre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('celular_padre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('celular_madre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('monto_arancel') ?></th>
                <th scope="col"><?= $this->Paginator->sort('monto_materiales') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('futuro_alumno') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alumnos as $alumno): ?>
            <tr>
                <td><?= $this->Number->format($alumno->id) ?></td>
                <td><?= $this->Number->format($alumno->legajo_numero) ?></td>
                <td><?= h($alumno->nombre) ?></td>
                <td><?= h($alumno->apellido) ?></td>
                <td><?= h($alumno->fecha_nacimiento) ?></td>
                <td><?= h($alumno->direccion) ?></td>
                <td><?= h($alumno->ciudad) ?></td>
                <td><?= h($alumno->codigo_postal) ?></td>
                <td><?= h($alumno->telefono) ?></td>
                <td><?= h($alumno->celular) ?></td>
                <td><?= h($alumno->nro_documento) ?></td>
                <td><?= h($alumno->email) ?></td>
                <td><?= h($alumno->programa_adolecencia) ?></td>
                <td><?= h($alumno->colegio) ?></td>
                <td><?= h($alumno->nombre_madre) ?></td>
                <td><?= h($alumno->nombre_padre) ?></td>
                <td><?= h($alumno->email_padre) ?></td>
                <td><?= h($alumno->email_madre) ?></td>
                <td><?= h($alumno->celular_padre) ?></td>
                <td><?= h($alumno->celular_madre) ?></td>
                <td><?= $this->Number->format($alumno->monto_arancel) ?></td>
                <td><?= $this->Number->format($alumno->monto_materiales) ?></td>
                <td><?= h($alumno->created) ?></td>
                <td><?= h($alumno->modified) ?></td>
                <td><?= h($alumno->futuro_alumno) ?></td>
                <td><?= h($alumno->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $alumno->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $alumno->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $alumno->id], ['confirm' => __('Are you sure you want to delete # {0}?', $alumno->id)]) ?>
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
