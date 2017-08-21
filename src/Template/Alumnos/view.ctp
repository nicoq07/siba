<div class="col-lg-8" style="padding: 0;">
   <div  style="margin-top:10px" class="row">
	     <div class="col-lg-5">
	     	<span style="font-size:4rem; margin-top:10px"><?= h($alumno->presentacion) ?></span>
	      </div>
	    <div class="col-lg-7">
	    <?php 
	    if (empty($alumno->referencia_foto)) { ?>
	     <div class="col-lg-5  col-lg-offset-5"><p class="separador-ligth" style="font-size:1.20rem;"> NO TIENE FOTO </p></div>
	<?php     }
	
	else {
		$ds  = DS;
		if(strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
		{
			$ds = DS_WINDOWS_IMG;
		}
		echo $this->Html->image('alumnos'. $ds .$alumno->referencia_foto, ['escape' => true ,'title' => $alumno->presentacion ,'alt' => $alumno->presentacion, 'class' => 'pull-right' , 'height' => "250" , 'width' => "250"]); } ?>
	    </div>
	</div>
	<div class="separador"></div>
	
	<div class="col-lg-2 col-md-2 view-div borde"><?= __('DNI') ?></div>
	<div class="col-lg-4 col-md-4  borde"><?= h($alumno->nro_documento) ?></div>
	<div class="col-lg-2 col-md-2 view-div borde"><?= __('Direccion') ?></div>
	<div class="col-lg-4 col-md-4  borde"><?= $alumno->direccion ? h($alumno->direccion) : "-" ?> </div>
	<div class="col-lg-2 col-md-2 borde view-div"><?= __('Código Postal') ?></div>
	<div class="col-lg-4 col-md-4  borde "><?=$alumno->codigo_postal ?  h($alumno->codigo_postal) : "-" ?></div>
	<div class="col-lg-2 col-md-2 borde view-div"><?= __('Ciudad') ?></div>
	<div class="col-lg-4 col-md-4  borde"><?= $alumno->ciudad ? h($alumno->ciudad) : "-"?> </div>
	<div class="col-lg-2 col-md-2 borde view-div"><?= __('Celular') ?></div>
	<div class="col-lg-4 col-md-4  borde"><?= $alumno->celular ? h($alumno->celular) : "-"?></div>
	<div class="col-lg-2 col-md-2 borde view-div"><?= __('Télefono') ?></div>
	<div class="col-lg-4 col-md-4  borde"><?= $alumno->telefono ? h($alumno->telefono) : "-"?> </div>
	<div class="col-lg-2 col-md-2 borde view-div"><?= __('Email') ?></div>
	<div class="col-lg-4 col-md-4  borde"><?= $alumno->email ? h($alumno->email) : "-"?> </div>
	<div class="col-lg-2 col-md-2 borde view-div"><?= __('F Nac') ?></div>
	<div class="col-lg-4 col-md-4  borde"><?= h($alumno->fecha_nacimiento->format('d/m/Y')) ?></div>
	<div class="col-lg-2 col-md-2 borde view-div"><?= __('Tutor') ?></div>
	<div class="col-lg-2 col-md-2 borde"><?= $alumno->nombre_madre ? h($alumno->nombre_madre) : "-" ?> </div>
	<div class="col-lg-2 col-md-2 borde view-div"><?= __('Celular tutor') ?></div>
	<div class="col-lg-2 col-md-2 borde"><?=$alumno->celular_madre ? h($alumno->celular_madre) : "-"?> </div>
	<div class="col-lg-2 col-md-2 borde view-div"><?= __('Email tutor') ?></div>
	<div class="col-lg-2 col-md-2 borde"><?=$alumno->email_madre ? h($alumno->email_madre) : "-" ?> </div>
	<div class="col-lg-2 col-md-2 borde view-div"><?= __('Tutor 2') ?></div>
	<div class="col-lg-2 col-md-2 borde"><?= $alumno->nombre_padre ? h($alumno->nombre_padre) : "-" ?> </div>
	<div class="col-lg-2 col-md-2 borde view-div"><?= __('Celular tutor 2') ?></div>
	<div class="col-lg-2 col-md-2 borde"><?=$alumno->celular_padre ? h($alumno->celular_padre) : "-"?> </div>
	<div class="col-lg-2 col-md-2 borde view-div"><?= __('Email tutor 2') ?></div>
	<div class="col-lg-2 col-md-2 borde"><?=$alumno->email_padre ? h($alumno->email_padre) : "-" ?> </div>
	<div class="col-lg-2 col-md-2 borde view-div"><?= __('Legajo') ?></div>
	<div class="col-lg-4 col-md-4  borde"><?= h($alumno->id) ?> </div>
	<div class="col-lg-2 col-md-2 borde view-div"><?= __('Legajo anterior') ?></div>
	<div class="col-lg-4 col-md-4  borde"><?= $alumno->legajo_numero ? h($alumno->legajo_numero) : "-"?></div>
	<div class="col-lg-2 col-md-2 borde view-div"><?= __('Arancel') ?></div>
	<div class="col-lg-4 col-md-4  borde"><?= $alumno->monto_arancel ? $alumno->monto_arancel :"-"?> </div>
	<div class="col-lg-2 col-md-2 borde view-div"><?= __('Materiales') ?></div>
	<div class="col-lg-4 col-md-4  borde"><?= $alumno->monto_materiales ? $alumno->monto_materiales:"-"?> </div>
	<div class="col-lg-2 col-md-2 borde view-div"><?= __('Colegio') ?></div>
	<div class="col-lg-10 borde"><?= $alumno->colegio ? h($alumno->colegio) : "-"?> </div>
	<div class="col-lg-2 col-md-2 borde view-div"><?= __('Alta') ?></div>
	<div class="col-lg-4 col-md-4  borde"><?= h($alumno->created->format('d/m/Y')) ?> </div>
	<div class="col-lg-2 col-md-2 borde view-div"><?= __('Modificado') ?></div>
	<div class="col-lg-4 col-md-4  borde"><?= h($alumno->modified->format('d/m/Y')) ?> </div>
	<div class="col-lg-2 col-md-2 borde view-div"><?= __('Adolescencia') ?></div>
	<div class="col-lg-2 col-md-2 borde"><?= $alumno->programa_adolecencia ? __('Sí') : __('No'); ?> </div>
	<div class="col-lg-2 col-md-2 borde view-div"><?= __('Futuro Alumno') ?></div>
	<div class="col-lg-2 col-md-2 borde"><?=$alumno->futuro_alumno ? __('Sí') : __('No');?> </div>
	<div class="col-lg-2 col-md-2 borde view-div"><?= __('Activo') ?></div>
	<div class="col-lg-2 col-md-2 borde"><?=$alumno->active ? __('Sí') : __('No');?> </div>
    <div class="col-lg-12 col-md-12">
        <h4><?= __('Observación') ?></h4>
       <div class="separador"><?= $this->Text->autoParagraph(h($alumno->observacion)); ?></div>
    </div>
    
    <div class="related">
        <h4><?= __('Pagos correspondientes') ?></h4>
        <?php if (!empty($alumno->pagos_alumnos)): ?>
        <table class="table table-striped">
            <tr>
                <th width = "10%" scope="col"><?= __('Código') ?></th>
                <th scope="col"><?= __('Fecha generado') ?></th>
                <th scope="col"><?= __('Mes') ?></th>
                <th scope="col"><?= __('Monto') ?></th>
                <th scope="col"><?= __('Recibió el pago:') ?></th>
                <th width = "18%" scope="col"><?= __('Fecha pagado') ?></th>
                <th scope="col"><?= __('Pagado') ?></th>
                <th  width = "20%" scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
            <?php foreach ($alumno->pagos_alumnos as $pagosAlumnos): ?>
            <tr>
                <td><?= h($pagosAlumnos->id) ?></td>
                <td><?= h($pagosAlumnos->created->format('d/m/Y')) ?></td>
                 <td><?= __(date('F', strtotime(date('Y')."-".$pagosAlumnos->mes."-01"))) ?></td>
                <td title="Detalles:&#10;<?php if (!empty($pagosAlumnos->pagos_conceptos)) { foreach ($pagosAlumnos->pagos_conceptos as $pc) { echo "-". $pc->detalles . "&#10;"; } } else { echo " - "; }?>" align="center" ><?= $pagosAlumnos->monto ? h($pagosAlumnos->monto) : h("")   ?></td>
                <td><?= h($pagosAlumnos->user_id) ?></td>
                 <td><?= $pagosAlumnos->fecha_pagado ? h($pagosAlumnos->fecha_pagado->format('d/m/Y')) : h("Sin datos") ?></td>
                <td><?= $pagosAlumnos->pagado ? h("Sí") : h("No") ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['controller' => 'PagosAlumnos', 'action' => 'view', $pagosAlumnos->id],  ['class' => 'btn-sm btn-info']) ?>
                    <?= $this->Html->link(__('Editar'), ['controller' => 'PagosAlumnos', 'action' => 'edit', $pagosAlumnos->id],  ['class' => 'btn-sm btn-warning']) ?>
              		<?= $pagosAlumnos->pagado ? h("")  : $this->Form->postLink(__('Pagar'), ['controller' => 'PagosAlumnos', 'action' => 'pagar', $pagosAlumnos->id], ['class' => 'btn-sm btn-success','confirm' => __('Marcar como pago?', $pagosAlumnos->id)])?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Clases inscriptas' ) ?></h4>
        <?php if (!empty($alumno->clases)){ ?>
        <table class="table table-striped">
            <tr>
                <th width="60%" scope="col"><?= __('Detalle') ?></th>
                <th scope="col"><?= __('Activa') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($alumno->clases as $clases): ?>
            <tr>
               
                <td><?= h($clases->presentacion) ?></td>
                <td><?= $clases->active ? h("Sí") : h("No") ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['controller' => 'Clases', 'action' => 'view', $clases->id],  ['class' => 'btn-sm btn-info']) ?>
                    <?= $this->Html->link(__('Editar'), ['controller' => 'Clases', 'action' => 'edit', $clases->id],  ['class' => 'btn-sm btn-warning']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php  }  else {  echo "<strong> ". h("No tiene clases activas") ."</strong> "; }?>
    </div>
     <div class="related">
        <h4><?= __('Seguimientos de Clases' ) ?></h4>
        <?php if (!empty($seguimientos)){ ?>
        <table class="table table-striped">
            <tr>
                <th width="55%" scope="col"><?= __('Observación') ?></th>
                <th width="10%" scope="col"><?= __('Presente') ?></th>
                 <th width="20%" scope="col"><?= __('Fecha') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($seguimientos as $seguimiento): ?>
            <tr>
               
                <td><?= h($seguimiento->observacion) ?></td>
                <td><?= $seguimiento->presente ? h("Sí") : h("No") ?></td>
                <td><?= __($seguimiento->fecha->format('l')) .' '. $seguimiento->fecha->format('d-m-Y') ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['controller' => 'SeguimientosClasesAlumnos', 'action' => 'view', $seguimiento->id],  ['class' => 'btn-sm btn-info']) ?>
                    <?= $this->Html->link(__('Editar'), ['controller' => 'SeguimientosClasesAlumnos', 'action' => 'edit', $seguimiento->id],  ['class' => 'btn-sm btn-warning']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
       <?php  }  else { echo "<strong> ". h("El alumno no ha asistido a ninguna clase todavía") ."</strong> "; }?>
    </div>
</div>
<div style="margin-top: 10px;" class="col-lg-2 col-md-2">
	<?= $this->element('menuEnAlumno')?> 
</div>