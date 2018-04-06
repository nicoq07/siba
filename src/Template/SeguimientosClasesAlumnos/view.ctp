<?= $this->assign('title', 'Vista de Seguimiento') ?>
<div class="col-lg-6 col-lg-offset-3 panel panel-info">
	    <h3 class="panel-heading"><?= h("Seguimiento de " .$seguimientosClasesAlumno->clases_alumno->alumno->presentacion) ?></h3>
	      <h4 class="panel-heading"><?= h($seguimientosClasesAlumno->clases_alumno->clase->presentacion) ?></h4>
	    	<div class="col-lg-2 col-lg-offset-10">
	           <?= $this->Html->link(__('Edit'), ['action' => 'edit', $seguimientosClasesAlumno->id],['class' => 'btn btn-warning']) ?>
	    	</div>
	    
	    
	    <div class="col-lg-12">
	    	
		   <div class = "col-lg-4 "><strong><span title="<?php $seguimientosClasesAlumno->has('calificacione') ? print "Nota: ". $seguimientosClasesAlumno->calificacione->valor : print "Sin valor"  ?> "><?=h("Calificación: ")?> <?=    $seguimientosClasesAlumno->has('calificacione') ? $seguimientosClasesAlumno->calificacione->nombre : 'No tiene' ?></span></strong></div>
		   <div class = "col-lg-4 "><strong><?= h("Fecha: ")  . h($seguimientosClasesAlumno->fecha->format('d-m-Y')) ?></strong></div>
		   <div class = "col-lg-4 "><strong><?=h("Presente: ")?><?=  $seguimientosClasesAlumno->presente ? __('Sí') : __('No'); ?></strong></div>
	    </div>
	    
	    <div class="col-lg-12 panel-body">
	        <h4><?= __('Observación') ?></h4>
	        <?= $this->Text->autoParagraph(h($seguimientosClasesAlumno->observacion)); ?>
	    </div>
</div>