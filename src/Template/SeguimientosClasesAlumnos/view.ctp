<?= $this->assign('title', 'Vista de Seguimiento') ?>
<div class="seguimientosClasesAlumnos view col-lg-10">
    <h3><?= h("Seguimiento de " .$seguimientosClasesAlumno->clases_alumno->alumno->presentacion. " en " . $seguimientosClasesAlumno->clases_alumno->clase->presentacion) ?></h3>
    <div class="col-lg-8">
	   <div class = "col-lg-4 separador"  ><span title="<?php echo "Nota: ". $seguimientosClasesAlumno->calificacione->valor?>"><?=h("Calificación: ")?> <?=    $seguimientosClasesAlumno->has('calificacione') ? $seguimientosClasesAlumno->calificacione->nombre : 'No tiene' ?></span>  </div>
	   <div class = "col-lg-4 separador"><?= h("Fecha: ")  . h($seguimientosClasesAlumno->fecha->format('d-m-Y')) ?></div>
	   <div class = "col-lg-4 separador"><?=h("Presente: ")?><?=  $seguimientosClasesAlumno->presente ? __('Sí') : __('No'); ?></div>
    </div>
    <div class="col-lg-8">
        <h4><?= __('Observacion') ?></h4>
        <?= $this->Text->autoParagraph(h($seguimientosClasesAlumno->observacion)); ?>
    </div>
</div>
