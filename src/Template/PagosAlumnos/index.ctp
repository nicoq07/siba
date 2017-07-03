<div class="pagosAlumnos index large-9 medium-8 columns content">
    <h3><?= __('Pagos Alumnos') ?></h3>
    <div class = "col-lg-3 separador">
    <?php echo $this->Form->create($pagosAlumnos, ['id' => 'frmIndex', 'type' => 'post']); ?>
		<div class ="col-lg-12">
		 <?php
            echo $this->Form->label('Período');
            echo $this->Form->month('mes', ['type' => 'mob', 'label' => false,'onchange'=>'document.getElementById("frmIndex").submit()']);
          ?>
		 </div>
	<?php echo $this->Form->end(); ?>
	</div>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th width="18%" scope="col"><?= $this->Paginator->sort('alumno_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created',['label' => 'Generado']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_pagado',['label' => 'Fecha pagado']) ?></th>
                <th  width="10%" scope="col"><?= $this->Paginator->sort('monto') ?></th>
                <th width="10%" scope="col"><?= $this->Paginator->sort('pagado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th width="20%" scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pagosAlumnos as $pagosAlumno): ?>
            <tr >
                <td><?= $pagosAlumno->has('alumno') ? $this->Html->link($pagosAlumno->alumno->presentacion, ['controller' => 'Alumnos', 'action' => 'view', $pagosAlumno->alumno->id]) : '' ?></td>
                <td><?= h($pagosAlumno->created->format('d-m-Y')) ?></td>
                <td><?= $pagosAlumno->fecha_pagado ? h($pagosAlumno->fecha_pagado->format('d-m-Y')) : h("Sin datos")?></td>
                <td title="Detalles:&#10;<?php foreach ($pagosAlumno->pagos_conceptos as $pc) { echo "-". $pc->detalles . "&#10;"; }?>" align="center" ><?= $this->Number->format($pagosAlumno->monto) ?></td>
                <td><?= $pagosAlumno->pagado ? h("Sí") : h("No") ?></td>
                <td><?= $pagosAlumno->has('user') ? $this->Html->link($pagosAlumno->user->id, ['controller' => 'Users', 'action' => 'view', $pagosAlumno->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $pagosAlumno->id],['class' => 'btn-sm btn-info']) ?>
                    <?= $pagosAlumno->pagado ? h("")  : $this->Form->postLink(__('Pagar'), ['action' => 'pagar', $pagosAlumno->id], ['class' => 'btn-sm btn-success','confirm' => __('Marcar como pago?', $pagosAlumno->id)])?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $pagosAlumno->id], ['class' => 'btn-sm btn-danger','confirm' => __('Eliminar el pago?', $pagosAlumno->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
   <?= $this->element('footer'); ?>
</div>
