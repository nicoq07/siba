<?= $this->assign('title', 'Seguimientos');?>
<div class="col-lg-8 col-lg-offset-1 panel">
<div class="row">
	<h3><?= __('Seguimientos') ?></h3> 
  	<div class="col-lg-12" style="margin-top: 10px; ">
  	<?php 
	if($this->request->session()->read('search_key') != "")
	{
		$search_key = $this->request->session()->read('search_key');
	}
	else
	{
		$search_key = "";
	}
	
	 echo $this->Form->create('search', ['id' => 'frmIndex', 'url' => ['action' => 'search']]); ?>
	
  	  <div class="col-lg-2 "> 
		 <?php
			echo $this->Form->label('Búsqueda :');
            echo $this->Form->control('palabra_clave', ['label' => false,'placeholder' => 'Alumno o Profesor ', 'onchange'=>'document.getElementById("frmIndex").submit()']);
          ?>
	 </div>
  	 
	  <div class="col-lg-3" >
  		 <?php
  		 echo $this->Form->control('clases',['empty' => true ,  'onchange'=>'document.getElementById("frmIndex").submit()'])
          ?>
         	
	 </div>
	  <div class="col-lg-2" >
  		 <?php
  		 echo $this->Form->label('modificados','Ver sólo cargados');
  		 echo $this->Form->checkbox('modificados', ['label' => false,'onchange'=>'document.getElementById("frmIndex").submit()']);
  		 ?>
         	
	 </div>

	 <div class="col-lg-5" style="top:10px ;text-align:center;">
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
  	 &nbsp;
   <div id="no-more-tables">
            <table class="col-lg-12 table-striped table-condensed cf">
        		<thead class="cf">
            <tr>
                <th width="30%" scope="col"><?= h('Clase') ?></th>
                 <th width="20%" scope="col"><?=  $this->Paginator->sort('alumno_id') ?></th>
                <th width="10%" scope="col"><?= $this->Paginator->sort('presente') ?></th>
                <th width="10%" scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                <th width="20%" scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($seguimientosClasesAlumnos as $seguimientosClasesAlumno): ?>
            <tr>
                <td data-title="Clase"><?= $this->Html->link($seguimientosClasesAlumno->clases_alumno->clase->presentacion, ['controller' => 'Clases', 'action' => 'view', $seguimientosClasesAlumno->clases_alumno->clase->id])  ?></td>
                <td data-title="Alumno"><?= $this->Html->link($seguimientosClasesAlumno->clases_alumno->alumno->presentacion, ['controller' => 'Alumnos', 'action' => 'view', $seguimientosClasesAlumno->clases_alumno->alumno->id])  ?></td>
                <td data-title="Presente"><?= $seguimientosClasesAlumno->presente ? h('Sí') : h("No") ?></td>
                <td data-title="Fecha"><?= h($seguimientosClasesAlumno->fecha->format('d-m-Y')) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $seguimientosClasesAlumno->id], ['class' => 'btn-sm btn-info']) ?>
                    <?= $this->Html->link(__('Cargar'), ['action' => 'edit', $seguimientosClasesAlumno->id], ['class' => 'btn-sm btn-warning']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $seguimientosClasesAlumno->id], ['class' => 'btn-sm btn-danger','confirm' => __('Borrar el seguimiento # {0}?', $seguimientosClasesAlumno->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
     </div>
    <?=  $this->element('footer')?>
   </div>
</div>
