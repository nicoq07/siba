<div class="seguimientosClases index large-10 medium-8 columns content">
    <h3><?= __('Seguimientos Clases') ?></h3>
    	<?php echo $this->Form->create($seguimientosClases, ['id' => 'frmIndex', 'type' => 'post']); ?>
	<div class = "col-lg-10 separador">
		<div class ="col-lg-3">
		 <?php
            echo $this->Form->label('Activos');
            echo $this->Form->checkbox('activos', ['label' => false,'onchange'=>'document.getElementById("frmIndex").submit()']);
          ?>
		 </div>
		<div class ="col-lg-3">
		  <?php
            echo $this->Form->label('Adolescencia');
            echo $this->Form->checkbox('adolecencia', ['label' => false,'onchange'=>'document.getElementById("frmIndex").submit()']);
          ?>
        </div>
        <div class ="col-lg-3">
		 <?php
			echo $this->Form->label('Búsqueda de Clase :');
            echo $this->Form->control('clase', ['label' => false,'options' => $clases,'empty' => true ,'onchange'=>'document.getElementById("frmIndex").submit()']);
          ?>
		 </div>
		 <?php //if ($comboClases) { ?>
<!-- 		<div class ="col-lg-3"> -->
		 <?php
// 			echo $this->Form->label('Búsqueda de Alumno :');
// 			echo $this->Form->control('palabra_clave_alumno', ['label' => false,'options' => $alumnos,'empty' => true, 'onchange'=>'document.getElementById("frmIndex").submit()']);
//           ?>
<!-- 		 </div> -->
		 <?php// } else { ?>
		 <div class ="col-lg-3">
		 <?php
			echo $this->Form->label('Búsqueda de Alumno :');
            echo $this->Form->control('palabra_clave_alumno', ['label' => false,'placeholder' => 'Nombre, Apellido ó DNI ', 'onchange'=>'document.getElementById("frmIndex").submit()']);
          ?>
		 </div>
		 <?php// } ?>
	 </div>
	   <?php echo $this->Form->end(); ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('clase_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('alumno_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('presente') ?></th>
                <th scope="col"><?= $this->Paginator->sort('observacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('calificacion_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($seguimientosClases as $seguimientosClase): ?>
            <tr>
                <td><?= $seguimientosClase->has('clase') ? $this->Html->link($seguimientosClase->clase->presentacion, ['controller' => 'Clases', 'action' => 'view', $seguimientosClase->clase->id]) : '' ?></td>
                <td><?= $seguimientosClase->has('alumno') ? $this->Html->link($seguimientosClase->alumno->presentacion, ['controller' => 'Alumnos', 'action' => 'view', $seguimientosClase->alumno->id]) : '' ?></td>
                <td><?= $seguimientosClase->presente ? h("Sí") : h("No") ?></td>
                 <td><?= h($seguimientosClase->observacion) ?></td>
                <td><?= $seguimientosClase->has('calificacione') ? $this->Html->link($seguimientosClase->calificacione->id, ['controller' => 'Calificaciones', 'action' => 'view', $seguimientosClase->calificacione->id]) : '' ?></td>
                <td><?= h($seguimientosClase->fecha->format("d-m-Y")) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $seguimientosClase->id],  ['class' => 'btn-sm btn-info']) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $seguimientosClase->id],  ['class' => 'btn-sm btn-warning']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $seguimientosClase->id], ['class' => 'btn-sm btn-danger','confirm' => __('Are you sure you want to delete # {0}?', $seguimientosClase->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
     <?= $this->element('footer') ?>
</div>
