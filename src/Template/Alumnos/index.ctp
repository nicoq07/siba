<div class="col-lg-10">
	<div class = "col-lg-10">
    	<h3><?= __('Alumnos') ?></h3>
	</div>
	<?php echo $this->Form->create($alumnos, ['id' => 'frmIndex', 'type' => 'post']); ?>
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
            echo $this->Form->label('Futuros');
            echo $this->Form->checkbox('futuro', ['label' => false, 'onchange'=>'document.getElementById("frmIndex").submit()']);
          ?>
		 </div>
		<div class ="col-lg-3">
		 <?php
			echo $this->Form->label('Búsqueda :');
            echo $this->Form->control('palabra_clave', ['label' => false,'placeholder' => 'Nombre, Apellido ó DNI ', 'onchange'=>'document.getElementById("frmIndex").submit()']);
          ?>
		 </div>
	 </div>
	   <?php echo $this->Form->end(); ?>
    <table class= "table table-striped">
        <thead>
            <tr>
                <th scope="row"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="row"><?= $this->Paginator->sort('fecha_nacimiento') ?></th>
                <th scope="row"><?= $this->Paginator->sort('telefono') ?></th>
                <th scope="row"><?= $this->Paginator->sort('celular') ?></th>
                <th scope="row"><?= $this->Paginator->sort('nro_documento',['label'  => 'DNI']) ?></th>
                <th scope="row"><?= $this->Paginator->sort('email') ?></th>
                <th scope="row"><?= $this->Paginator->sort('programa_adolecencia',['label'  => 'Adolecencia']) ?></th>
                <th scope="row"><?= $this->Paginator->sort('futuro_alumno') ?></th>
                <th scope="row"><?= $this->Paginator->sort('activo') ?></th>
                <th scope="row" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alumnos as $alumno): ?>
            <tr>
                <td><?= $this->Html->link($alumno->presentacion, [ 'action' => 'view', $alumno->id]) ?></td>
                <td><?= h($alumno->fecha_nacimiento->format('d/m/Y')) ?></td>
                <td><?= h($alumno->telefono) ?></td>
                <td><?= h($alumno->celular) ?></td>
                <td><?= h($alumno->nro_documento) ?></td>
                <td><?= h($alumno->email) ?></td>
                <td><?=$alumno->programa_adolecencia? h("Sí") : h("No") ?></td>
                <td><?= $alumno->futuro_alumno ? h("Sí") : h("No")?></td>
                <td><?= $alumno->active ? h("Sí") : h("No") ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $alumno->id],['class' => 'btn-sm btn-warning']) ?>
                    <?= $this->Form->postLink(__('Baja'), ['action' => 'delete', $alumno->id],['class' => 'btn-sm btn-danger','confirm' => __('Vas a dar de baja a {0}?', $alumno->presentacion)]) ?>
               
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
 <?= $this->element('footer') ?>
