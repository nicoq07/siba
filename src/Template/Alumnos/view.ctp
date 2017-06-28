<div class="col-lg-8" style="padding: 0;">
   <div  style="margin-top:10px" class="row">
	     <div class="col-lg-5">
	     	<span style="font-size:5.50rem; margin-top:10px"><?= h($alumno->presentacion) ?></span>
	      </div>
	    <div class="col-lg-7">
	     <?php  echo $this->Html->image('alumnos'.DS.$alumno->referencia_foto, ['alt' => $alumno->presentacion , 'class' => 'pull-right' , 'height' => "250" , 'width' => "250"]); ?>
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
	<div class="col-lg-4 col-md-4  borde"><?= h($alumno->monto_arancel) ?> </div>
	<div class="col-lg-2 col-md-2 borde view-div"><?= __('Materiales') ?></div>
	<div class="col-lg-4 col-md-4  borde"><?= h($alumno->monto_materiales) ?> </div>
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
                <th scope="col"><?= __('Código') ?></th>
                <th scope="col"><?= __('Fecha registro') ?></th>
                <th scope="col"><?= __('Monto') ?></th>
                <th scope="col"><?= __('Recibió el pago:') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
            <?php foreach ($alumno->pagos_alumnos as $pagosAlumnos): ?>
            <tr>
                <td><?= h($pagosAlumnos->id) ?></td>
                <td><?= h($pagosAlumnos->created) ?></td>
                <td><?= h($pagosAlumnos->monto) ?></td>
                <td><?= h($pagosAlumnos->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['controller' => 'PagosAlumnos', 'action' => 'view', $pagosAlumnos->id],  ['class' => 'btn-sm btn-info']) ?>
                    <?= $this->Html->link(__('Editar'), ['controller' => 'PagosAlumnos', 'action' => 'edit', $pagosAlumnos->id],  ['class' => 'btn-sm btn-warning']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Clases inscriptas' ) ?></h4>
        <?php if (!empty($alumno->clases)): ?>
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
        <?php endif; ?>
    </div>
</div>
<div style="margin-top: 10px;" class="col-lg-2 col-md-2">
	<?= $this->element('menuEnAlumno')?> 
</div>