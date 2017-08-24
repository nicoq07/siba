<?= $this->assign('title', 'Seguimientos');?>
<div class="seguimientosClasesAlumnos index col-lg-10 nopadding">
	<h3><?= __('Seguimientos') ?></h3> 
  	<div class="col-lg-12" style="margin-top: 10px; ">
  		<?php echo $this->Form->create($seguimientosClasesAlumnos, ['id' => 'frmIndex', 'type' => 'post']); ?>
  	  
  	  <div class="col-lg-3 "> 
		 <?php
			echo $this->Form->label('Búsqueda :');
            echo $this->Form->control('palabra_clave', ['label' => false,'placeholder' => 'Alumno o Profesor ', 'onchange'=>'document.getElementById("frmIndex").submit()']);
          ?>
	 </div>
  	 
	  <div class="col-lg-4" >
  		 <?php
  		 echo $this->Form->control('clases',['empty' => true ,  'onchange'=>'document.getElementById("frmIndex").submit()'])
          ?>
         	
	 </div>

	 <div class="col-lg-5 separador-ligth" style="top:10px ;text-align:center;">
		 <div class="col-lg-4 "style="top:10px;" > 
	  		  <?php
	            echo $this->Form->month('mob',['empty' => 'Mes']);
	          ?>
          </div> 	
          <div class="col-lg-4 "style="top:10px;" > 
	  		  <?php
	  		  echo $this->Form->year('year',['empty' => 'Año']);
	          ?>
          </div> 	
          
          <div class="col-lg-4" style="top:15px;">
          <?= $this->Form->button('Buscar',['class' => 'btn-sm btn-success'])  ?>
          </div>
          
	 </div>
	 <?php echo $this->Form->end(); ?>
  	 </div>
    <table class="table table-striped nopadding">
        <thead>
            <tr>
                <th width="30%" scope="col"><?= h('Clase') ?></th>
                 <th width="20%" scope="col"><?=  $this->Paginator->sort('alumno_id') ?></th>
                <th width="10%" scope="col"><?= $this->Paginator->sort('presente') ?></th>
                <th width="10%" scope="col"><?= h('Calificación') ?></th>
                <th width="10%" scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                <th width="20%" scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($seguimientosClasesAlumnos as $seguimientosClasesAlumno): ?>
            <tr>
                <td><?= $this->Html->link($seguimientosClasesAlumno->clases_alumno->clase->presentacion, ['controller' => 'Clases', 'action' => 'view', $seguimientosClasesAlumno->clases_alumno->clase->id])  ?></td>
                <td><?= $this->Html->link($seguimientosClasesAlumno->clases_alumno->alumno->presentacion, ['controller' => 'Alumnos', 'action' => 'view', $seguimientosClasesAlumno->clases_alumno->alumno->id])  ?></td>
                <td><?= $seguimientosClasesAlumno->presente ? h('Sí') : h("No") ?></td>
                <td><?= $seguimientosClasesAlumno->has('calificacione') ? $seguimientosClasesAlumno->calificacione->presentacion : '' ?></td>
                <td><?= h($seguimientosClasesAlumno->fecha->format('d-m-Y')) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $seguimientosClasesAlumno->id], ['class' => 'btn-sm btn-info']) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $seguimientosClasesAlumno->id], ['class' => 'btn-sm btn-warning']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $seguimientosClasesAlumno->id], ['class' => 'btn-sm btn-danger','confirm' => __('Are you sure you want to delete # {0}?', $seguimientosClasesAlumno->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?=  $this->element('footer')?>
</div>
