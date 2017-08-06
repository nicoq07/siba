<div class="seguimientosClasesAlumnos index col-lg-10">
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
			echo $this->Form->control('clases',['empty' => true])
          ?>
         	
	 </div>
	 <div class="col-lg-5" style="border:1px solid; text-align:center;">
		 <div class="col-lg-4 "style="top:10px;" > 
	  		  <?php
	            echo $this->Form->month('mob',['label' => 'Mes']);
	          ?>
          </div> 	
          <div class="col-lg-4 "style="top:10px;" > 
	  		  <?php
	  		  echo $this->Form->year('year',['label' => 'Ano']);
	          ?>
          </div> 	
          
          <div class="col-lg-4" style="top:10px;">
          <?= $this->Form->button('Buscar',['class' => 'btn-sm btn-success'])  ?>
          </div>
          
	 </div>
	 <?php echo $this->Form->end(); ?>
  	 </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th width="30%" scope="col"><?= h('Clase') ?></th>
                 <th width="25%" scope="col"><?=  $this->Paginator->sort('alumno_id') ?></th>
                <th width="10%" scope="col"><?= $this->Paginator->sort('presente') ?></th>
                <th width="10%" scope="col"><?= h('Calificación') ?></th>
                <th width="10%" scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                <th width="15%" scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($seguimientosClasesAlumnos as $seguimientosClasesAlumno): ?>
            <tr>
                <td><?= $this->Html->link($seguimientosClasesAlumno->clases_alumno->clase->presentacion, ['controller' => 'Clases', 'action' => 'view', $seguimientosClasesAlumno->clases_alumno->clase->id])  ?></td>
                <td><?= $this->Html->link($seguimientosClasesAlumno->clases_alumno->alumno->presentacion, ['controller' => 'Alumnos', 'action' => 'view', $seguimientosClasesAlumno->clases_alumno->alumno->id])  ?></td>
                <td><?= $seguimientosClasesAlumno->presente ? h('Sí') : h("No") ?></td>
                <td><?= $seguimientosClasesAlumno->has('calificacione') ? $this->Html->link($seguimientosClasesAlumno->calificacione->id, ['controller' => 'Calificaciones', 'action' => 'view', $seguimientosClasesAlumno->calificacione->id]) : '' ?></td>
                <td><?= h($seguimientosClasesAlumno->fecha->format('d-m-Y')) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $seguimientosClasesAlumno->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $seguimientosClasesAlumno->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $seguimientosClasesAlumno->id], ['confirm' => __('Are you sure you want to delete # {0}?', $seguimientosClasesAlumno->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?=  $this->element('footer')?>