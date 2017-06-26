	<table>
		<tr>
			<td colspan="2"><div>
	    	 	<?php  echo $this->Html->image('logoIba.png', ['class' => 'pull-left' , 'height' => "150" , 'width' => "180",'fullBase' => true]); ?>
	    		</div>
	    	</td>
	    	<td class="td-interna-title" colspan="2"><?= h($alumno->presentacion) ?></td>
			<td colspan="2"><div>
	    	 	<?php  echo $this->Html->image('alumnos'.DS.$alumno->referencia_foto, ['class' => 'pull-right' , 'height' => "180" , 'width' => "200",'fullBase' => true]); ?>
	    		</div>
	    	</td>
		</tr>
	</table>
	<table >
		<tr>
			<td class="view-div borde td-interna-general"  colspan="1">DNI</td><td class="td-interna-general" colspan="2"><?= h($alumno->nro_documento) ?></td>
			<td class="view-div borde td-interna-general" colspan="1"><?= h("Dirección") ?></td><td class="td-interna-general" colspan="2"><?= $alumno->direccion ? h($alumno->direccion) : "-" ?> </td>
			
		</tr>
		<tr>
			<td class="view-div borde td-interna-general" colspan="1"><?= h("Celular") ?></td><td class="td-interna-general" colspan="2"><?=$alumno->celular ?  h($alumno->celular) : "-" ?></td>
			<td class="view-div borde td-interna-general" colspan="1"><?= h("Télefono") ?></td><td class="td-interna-general" colspan="2"><?= $alumno->telefono? h($alumno->telefono) : "-"?> </td>
		</tr>
		<tr>
			<td class="view-div borde td-interna-general" colspan="1"><?= h("Email") ?></td><td class="td-interna-general" colspan="2"><?=$alumno->email?  h($alumno->email) : "-" ?></td>
			<td class="view-div borde td-interna-general" colspan="1"><?= h("Fecha Nac.") ?></td><td class="td-interna-general" colspan="2"><?= $alumno->fecha_nacimiento ? h($alumno->fecha_nacimiento->format('d/m/Y')) : "-"?> </td>
		</tr>
		<tr>
			<td class="view-div borde td-interna-general" colspan="1"><?= h("Tutor 1") ?></td><td class="td-interna-general" colspan="1"><?=$alumno->nombre_madre?  h($alumno->nombre_madre) : "-" ?></td>
			<td class="view-div borde td-interna-general" colspan="1"><?= h("Celular tutor 1") ?></td><td class="td-interna-general" colspan="1"><?= $alumno->celular_madre ? h($alumno->celular_madre) : "-"?> </td>
			<td class="view-div borde td-interna-general" colspan="1"><?= h("Email tutor 1") ?></td><td class="td-interna-general" colspan="1"><?= $alumno->email_madre ? h($alumno->email_madre) : "-"?> </td>
		</tr>
		<tr>
			<td class="view-div borde td-interna-general" colspan="1"><?= h("Tutor 2") ?></td><td class="td-interna-general" colspan="1"><?=$alumno->nombre_padre?  h($alumno->nombre_padre) : "-" ?></td>
			<td class="view-div borde td-interna-general" colspan="1"><?= h("Celular tutor 2") ?></td><td class="td-interna-general" colspan="1"><?= $alumno->celular_padre ? h($alumno->nombre_padre) : "-"?> </td>
			<td class="view-div borde td-interna-general" colspan="1"><?= h("Email tutor 2") ?></td><td class="td-interna-general" colspan="1"><?= $alumno->email_padre ? h($alumno->email_padre) : "-"?> </td>
		</tr>
		<tr>
			<td class="view-div borde td-interna-general" colspan="1"><?= h("Arancel") ?></td><td class="td-interna-general" colspan="2"><?=$alumno->monto_arancel?  h($alumno->monto_arancel) : "-" ?></td>
			<td class="view-div borde td-interna-general" colspan="1"><?= h("Colegio") ?></td><td class="td-interna-general" colspan="2"><?=$alumno->colegio?  h($alumno->colegio) : "-" ?></td>
		</tr>
		<tr>
			<td class="view-div borde td-interna-general" colspan="1"><?= h("Activo") ?></td><td class="td-interna-general" colspan="1"><?= $alumno->active ? __('Sí') : __('No');?></td>
			<td class="view-div borde td-interna-general" colspan="1"><?= h("Adolescencia") ?></td><td class="td-interna-general" colspan="1"><?= $alumno->programa_adolecencia ? __('Sí') : __('No');?> </td>
			<td class="view-div borde td-interna-general" colspan="1"><?= h("Fecha baja") ?></td><td class="td-interna-general" colspan="1"><?= $alumno->fecha_baja ? h($alumno->fecha_baja) : "-"?> </td>
		
		
		</tr>
		<tr>
			
			<td class="view-div borde td-interna-general" colspan="1"><?= h("Observación") ?></td>
			<td class="borde"  colspan="5"><p class="parrafo"><?= h($alumno->observacion); ?></p></td>
			
		</tr>
	</table>
    <div style="width:1800px">
        <label class="td-interna-general"><?= __('Pagos correspondientes') ?></label>
        <?php if (!empty($alumno->pagos_alumnos)): ?>
        <table class="table">
            <tr>
                <th scope="col"><?= __('Código') ?></th>
                <th scope="col"><?= __('Fecha registro') ?></th>
                <th scope="col"><?= __('Monto') ?></th>
                <th scope="col"><?= __('Recibió el pago:') ?></th>
            </tr>
            <?php foreach ($alumno->pagos_alumnos as $pagosAlumnos): ?>
            <tr>
                <td class="td-interna-general"><?= h($pagosAlumnos->id) ?></td>
                <td class="td-interna-general"><?= h($pagosAlumnos->created) ?></td>
                <td class="td-interna-general"><?= h($pagosAlumnos->monto) ?></td>
                <td class="td-interna-general"><?= h($pagosAlumnos->user_id) ?></td>
            </tr>
            <?php break;?>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div style="width:1800px">
        <label class="td-interna-general"><?= __('Clases inscriptas' ) ?></label>
        <?php if (!empty($alumno->clases)): ?>
        <table class="table">
            <?php foreach ($alumno->clases as $clases): ?>
            <tr>
                <td class="td-interna-general"><?= h($clases->presentacion) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
