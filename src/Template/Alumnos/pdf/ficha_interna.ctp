<div class="A6">
	<table class="tabla-header-ficha-interna">
		<tr>
			<td height = "180px" width="300px"><div>
	    	 	<?php  echo $this->Html->image('logoIba.png', ['class' => 'pull-left' , 'height' => "150" , 'width' => "180",'fullBase' => true]); ?>
	    		</div>
	    	</td>
	    	<td class="td-interna-title"><span class="title"> <?= h($alumno->presentacion) ?></span> </td>
			<td height = "180px" width="300px"><div>
	    	 	<?php  echo $this->Html->image('alumnos'.DS.$alumno->referencia_foto, ['class' => 'pull-right' , 'height' => "180" , 'width' => "200",'fullBase' => true]); ?>
	    		</div>
	    	</td>
		</tr>
	</table>
	<table class="table tabla-cuerpo-ficha-interna">
		<tr>
			<td class="view-div   td-interna-general"  colspan="1">DNI</td><td class="td-interna-general" colspan="2"><?= h($alumno->nro_documento) ?></td>
			<td class="view-div   td-interna-general" colspan="1"><?= h("Dirección") ?></td><td class="td-interna-general" colspan="2"><?= $alumno->direccion ? h($alumno->direccion) : "-" ?> </td>
		</tr>
		<tr>
			<td class="view-div   td-interna-general" colspan="1"><?= h("Celular") ?></td><td class="td-interna-general" colspan="2"><?= $alumno->celular ?  h($alumno->celular) : "-" ?></td>
			<td class="view-div   td-interna-general" colspan="1"><?= h("Télefono") ?></td><td class="td-interna-general" colspan="2"><?= $alumno->telefono? h($alumno->telefono) : "-"?> </td>
		</tr>
		<tr>
			<td class="view-div   td-interna-general" colspan="1"><?= h("Email") ?></td><td class="td-interna-general" colspan="2"><?=$alumno->email?  h($alumno->email) : "-" ?></td>
			<td class="view-div   td-interna-general" colspan="1"><?= h("Fecha Nac.") ?></td><td class="td-interna-general" colspan="2"><?= $alumno->fecha_nacimiento ? h($alumno->fecha_nacimiento->format('d/m/Y')) : "-"?> </td>
		</tr>
		<tr>
			<td class="view-div   td-interna-general" colspan="1"><?= h("Ref") ?></td><td class="td-interna-general" colspan="1"><?=$alumno->nombre_madre?  h($alumno->nombre_madre) : "-" ?></td>
			<td class="view-div   td-interna-general" colspan="1"><?= h("Celular") ?></td><td class="td-interna-general" colspan="1"><?= $alumno->celular_madre ? h($alumno->celular_madre) : "-"?> </td>
			<td class="view-div   td-interna-general" colspan="1"><?= h("Email") ?></td><td class="td-interna-general" colspan="1"><?= $alumno->email_madre ? h($alumno->email_madre) : "-"?> </td>
		</tr>
		<tr>
			<td class="view-div   td-interna-general" colspan="1"><?= h("Ref 2") ?></td><td class="td-interna-general" colspan="1"><?=$alumno->nombre_padre?  h($alumno->nombre_padre) : "-" ?></td>
			<td class="view-div   td-interna-general" colspan="1"><?= h("Celular") ?></td><td class="td-interna-general" colspan="1"><?= $alumno->celular_padre ? h($alumno->celular_padre) : "-"?> </td>
			<td class="view-div   td-interna-general" colspan="1"><?= h("Email") ?></td><td class="td-interna-general" colspan="1"><?= $alumno->email_padre ? h($alumno->email_padre) : "-"?> </td>
		</tr>
		<tr>
			<td class="view-div   td-interna-general" colspan="1"><?= h("Colegio/Turno") ?></td><td class="td-interna-general" colspan="5"><?=$alumno->colegio?  h($alumno->colegio) : "-" ?></td>
		</tr>
		<tr>
			<td class="view-div   td-interna-general" colspan="1"><?= h("Activo") ?></td><td class="td-interna-general" colspan="1"><?= $alumno->active ? __('Sí') : __('No');?></td>
			<td class="view-div   td-interna-general" colspan="1"><?= h("Adolescencia") ?></td><td class="td-interna-general" colspan="1"><?= $alumno->programa_adolecencia ? __('Sí') : __('No');?> </td>
		
		</tr>
		<tr>
			<td class="view-div   td-interna-general" colspan="1"><?= h("Fecha Alta") ?></td><td class="td-interna-general" colspan="2"><?= h($alumno->created->format('d/m/Y')) ?></td>
			<td class="view-div   td-interna-general" colspan="1"><?= h("Fecha Baja") ?></td><td class="td-interna-general" colspan="2"><?= $alumno->fecha_baja ? h($alumno->fecha_baja->format('d/m/Y')) : "-"?> </td>

		</tr>
		<tr>
					<td class="view-div   td-interna-general" colspan="1"><?= h("Arancel") ?></td><td class="td-interna-general" colspan="2"><?=$alumno->monto_arancel?  h($alumno->monto_arancel) : "-" ?></td>
		</tr>
		<tr>
			<td class="view-div   td-interna-general" colspan="1"><?= h("Observaciones") ?></td>
			<td class=" "  colspan="5"><p class="parrafo"><?= h($alumno->observacion); ?></p></td>
			
		</tr>
	</table>
</div>	
