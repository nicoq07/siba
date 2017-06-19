<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Clase $clase
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Clase'), ['action' => 'edit', $clase->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Clase'), ['action' => 'delete', $clase->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clase->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Clases'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Clase'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Profesores'), ['controller' => 'Profesores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Profesore'), ['controller' => 'Profesores', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Horarios'), ['controller' => 'Horarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Horario'), ['controller' => 'Horarios', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Disciplinas'), ['controller' => 'Disciplinas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Disciplina'), ['controller' => 'Disciplinas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Alumnos'), ['controller' => 'Alumnos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Alumno'), ['controller' => 'Alumnos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="clases view large-9 medium-8 columns content">
    <h3><?= h($clase->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Profesore') ?></th>
            <td><?= $clase->has('profesore') ? $this->Html->link($clase->profesore->id, ['controller' => 'Profesores', 'action' => 'view', $clase->profesore->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Horario') ?></th>
            <td><?= $clase->has('horario') ? $this->Html->link($clase->horario->id, ['controller' => 'Horarios', 'action' => 'view', $clase->horario->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Disciplina') ?></th>
            <td><?= $clase->has('disciplina') ? $this->Html->link($clase->disciplina->id, ['controller' => 'Disciplinas', 'action' => 'view', $clase->disciplina->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($clase->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($clase->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($clase->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $clase->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Alumnos') ?></h4>
        <?php if (!empty($clase->alumnos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Legajo Numero') ?></th>
                <th scope="col"><?= __('Nombre') ?></th>
                <th scope="col"><?= __('Apellido') ?></th>
                <th scope="col"><?= __('Fecha Nacimiento') ?></th>
                <th scope="col"><?= __('Direccion') ?></th>
                <th scope="col"><?= __('Ciudad') ?></th>
                <th scope="col"><?= __('Codigo Postal') ?></th>
                <th scope="col"><?= __('Telefono') ?></th>
                <th scope="col"><?= __('Celular') ?></th>
                <th scope="col"><?= __('Nro Documento') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Observacion') ?></th>
                <th scope="col"><?= __('Programa Adolecencia') ?></th>
                <th scope="col"><?= __('Colegio') ?></th>
                <th scope="col"><?= __('Nombre Madre') ?></th>
                <th scope="col"><?= __('Nombre Padre') ?></th>
                <th scope="col"><?= __('Email Padre') ?></th>
                <th scope="col"><?= __('Email Madre') ?></th>
                <th scope="col"><?= __('Celular Padre') ?></th>
                <th scope="col"><?= __('Celular Madre') ?></th>
                <th scope="col"><?= __('Monto Arancel') ?></th>
                <th scope="col"><?= __('Monto Materiales') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Futuro Alumno') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($clase->alumnos as $alumnos): ?>
            <tr>
                <td><?= h($alumnos->id) ?></td>
                <td><?= h($alumnos->legajo_numero) ?></td>
                <td><?= h($alumnos->nombre) ?></td>
                <td><?= h($alumnos->apellido) ?></td>
                <td><?= h($alumnos->fecha_nacimiento) ?></td>
                <td><?= h($alumnos->direccion) ?></td>
                <td><?= h($alumnos->ciudad) ?></td>
                <td><?= h($alumnos->codigo_postal) ?></td>
                <td><?= h($alumnos->telefono) ?></td>
                <td><?= h($alumnos->celular) ?></td>
                <td><?= h($alumnos->nro_documento) ?></td>
                <td><?= h($alumnos->email) ?></td>
                <td><?= h($alumnos->observacion) ?></td>
                <td><?= h($alumnos->programa_adolecencia) ?></td>
                <td><?= h($alumnos->colegio) ?></td>
                <td><?= h($alumnos->nombre_madre) ?></td>
                <td><?= h($alumnos->nombre_padre) ?></td>
                <td><?= h($alumnos->email_padre) ?></td>
                <td><?= h($alumnos->email_madre) ?></td>
                <td><?= h($alumnos->celular_padre) ?></td>
                <td><?= h($alumnos->celular_madre) ?></td>
                <td><?= h($alumnos->monto_arancel) ?></td>
                <td><?= h($alumnos->monto_materiales) ?></td>
                <td><?= h($alumnos->created) ?></td>
                <td><?= h($alumnos->modified) ?></td>
                <td><?= h($alumnos->futuro_alumno) ?></td>
                <td><?= h($alumnos->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Alumnos', 'action' => 'view', $alumnos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Alumnos', 'action' => 'edit', $alumnos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Alumnos', 'action' => 'delete', $alumnos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $alumnos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
