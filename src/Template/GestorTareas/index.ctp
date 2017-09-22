<!-- <div class="container"> -->
<!--     <div class="notices notice-success"> -->
<!--         <strong>Notice</strong> notice-success -->
<!--     </div> -->
<!--     <div class="notices notice-danger"> -->
<!--         <strong>Notice</strong> notice-danger -->
<!--     </div> -->
<!--     <div class="notices notice-info"> -->
<!--         <strong>Notice</strong> notice-info -->
<!--     </div> -->
<!--     <div class="notices notice-warning"> -->
<!--         <strong>Notice</strong> notice-warning -->
<!--     </div> -->
<!--     <div class="notices notice-lg"> -->
<!--         <strong>Big notice</strong> notice-lg -->
<!--     </div> -->
<!--     <div class="notices notice-sm"> -->
<!--         <strong>Small notice</strong> notice-sm -->
<!--     </div> -->
<!-- </div> -->
<div class="col-lg-8">
<div class='col-lg-10'><h2>Lista de Tareas</h2></div>
<div class="col-lg-2 pull-rigth"><?php echo $this->Html->Link('Nueva',['action' => 'add'],['top' => '15px','class' => 'btn btn-success'] ) ?></div>
<div class="container">
            <?php foreach ($gestorTareas as $gestorTarea){?>
            	<?php if ($gestorTarea->gestor_tareas_prioridad->valor === URGENTE) { ?>
            	<div title="<?= h('Prioridad '.$gestorTarea->gestor_tareas_prioridad->nombre)?>" class="notices notice-danger">
				        <strong><?= h($gestorTarea->titulo)?></strong> <?= h($gestorTarea->descripcion)?>
				</div>
            	
            	 <?php  } ?>
            	<?php if ($gestorTarea->gestor_tareas_prioridad->valor === NORMAL) { ?>
            	 <div title="<?= h('Prioridad '.$gestorTarea->gestor_tareas_prioridad->nombre)?>" class="notices notice-warning">
        			    <strong><?= h($gestorTarea->titulo)?></strong> <?= h($gestorTarea->descripcion)?>
				    </div>
            	
            	 <?php   } ?>
            	<?php if ($gestorTarea->gestor_tareas_prioridad->valor === BAJA) { ?>
            	<div title="<?= h('Prioridad '.$gestorTarea->gestor_tareas_prioridad->nombre)?>" class="notices notice-success">
			        	<strong><?= h($gestorTarea->titulo)?></strong> <?= h($gestorTarea->descripcion)?>
			    </div>
            	<?php } ?>
            	
            <?php } ?>
 </div>     
 </div>