<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Alumno $alumno
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Alumno'), ['action' => 'edit', $alumno->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Alumno'), ['action' => 'delete', $alumno->id], ['confirm' => __('Are you sure you want to delete # {0}?', $alumno->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Alumnos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Alumno'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fotos Alumnos'), ['controller' => 'FotosAlumnos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fotos Alumno'), ['controller' => 'FotosAlumnos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pagos Alumnos'), ['controller' => 'PagosAlumnos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pagos Alumno'), ['controller' => 'PagosAlumnos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clases'), ['controller' => 'Clases', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Clase'), ['controller' => 'Clases', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="alumnos view large-9 medium-8 columns content">
    <h3><?= h($alumno->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($alumno->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apellido') ?></th>
            <td><?= h($alumno->apellido) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Direccion') ?></th>
            <td><?= h($alumno->direccion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ciudad') ?></th>
            <td><?= h($alumno->ciudad) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Codigo Postal') ?></th>
            <td><?= h($alumno->codigo_postal) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefono') ?></th>
            <td><?= h($alumno->telefono) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Celular') ?></th>
            <td><?= h($alumno->celular) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nro Documento') ?></th>
            <td><?= h($alumno->nro_documento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($alumno->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Colegio') ?></th>
            <td><?= h($alumno->colegio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre Madre') ?></th>
            <td><?= h($alumno->nombre_madre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre Padre') ?></th>
            <td><?= h($alumno->nombre_padre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email Padre') ?></th>
            <td><?= h($alumno->email_padre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email Madre') ?></th>
            <td><?= h($alumno->email_madre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Celular Padre') ?></th>
            <td><?= h($alumno->celular_padre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Celular Madre') ?></th>
            <td><?= h($alumno->celular_madre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($alumno->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Legajo Numero') ?></th>
            <td><?= $this->Number->format($alumno->legajo_numero) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Monto Arancel') ?></th>
            <td><?= $this->Number->format($alumno->monto_arancel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Monto Materiales') ?></th>
            <td><?= $this->Number->format($alumno->monto_materiales) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Nacimiento') ?></th>
            <td><?= h($alumno->fecha_nacimiento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($alumno->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($alumno->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Programa Adolecencia') ?></th>
            <td><?= $alumno->programa_adolecencia ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Futuro Alumno') ?></th>
            <td><?= $alumno->futuro_alumno ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $alumno->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Observacion') ?></h4>
        <?= $this->Text->autoParagraph(h($alumno->observacion)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Fotos Alumnos') ?></h4>
        <?php if (!empty($alumno->fotos_alumnos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Alumno Id') ?></th>
                <th scope="col"><?= __('Referencia') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($alumno->fotos_alumnos as $fotosAlumnos): ?>
            <tr>
                <td><?= h($fotosAlumnos->id) ?></td>
                <td><?= h($fotosAlumnos->alumno_id) ?></td>
                <td><?= h($fotosAlumnos->referencia) ?></td>
                <td><?= h($fotosAlumnos->created) ?></td>
                <td><?= h($fotosAlumnos->modified) ?></td>
                <td><?= h($fotosAlumnos->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'FotosAlumnos', 'action' => 'view', $fotosAlumnos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'FotosAlumnos', 'action' => 'edit', $fotosAlumnos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'FotosAlumnos', 'action' => 'delete', $fotosAlumnos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fotosAlumnos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pagos Alumnos') ?></h4>
        <?php if (!empty($alumno->pagos_alumnos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Alumno Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Monto') ?></th>
                <th scope="col"><?= __('Pagado') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($alumno->pagos_alumnos as $pagosAlumnos): ?>
            <tr>
                <td><?= h($pagosAlumnos->id) ?></td>
                <td><?= h($pagosAlumnos->alumno_id) ?></td>
                <td><?= h($pagosAlumnos->created) ?></td>
                <td><?= h($pagosAlumnos->modified) ?></td>
                <td><?= h($pagosAlumnos->monto) ?></td>
                <td><?= h($pagosAlumnos->pagado) ?></td>
                <td><?= h($pagosAlumnos->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PagosAlumnos', 'action' => 'view', $pagosAlumnos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PagosAlumnos', 'action' => 'edit', $pagosAlumnos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PagosAlumnos', 'action' => 'delete', $pagosAlumnos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pagosAlumnos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Clases') ?></h4>
        <?php if (!empty($alumno->clases)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Profesor Id') ?></th>
                <th scope="col"><?= __('Horario Id') ?></th>
                <th scope="col"><?= __('Disciplina Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($alumno->clases as $clases): ?>
            <tr>
                <td><?= h($clases->id) ?></td>
                <td><?= h($clases->profesor_id) ?></td>
                <td><?= h($clases->horario_id) ?></td>
                <td><?= h($clases->disciplina_id) ?></td>
                <td><?= h($clases->created) ?></td>
                <td><?= h($clases->modified) ?></td>
                <td><?= h($clases->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Clases', 'action' => 'view', $clases->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Clases', 'action' => 'edit', $clases->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Clases', 'action' => 'delete', $clases->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clases->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
