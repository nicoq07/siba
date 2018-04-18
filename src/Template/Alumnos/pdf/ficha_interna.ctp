<div>
	<table class="tabla-header-ficha-interna">
		<tr>
			<td height = "150px" width="150px"><div>
	    	 	<?php  echo $this->Html->image(LOGO, ['class' => 'pull-left' , 'height' => "150px" , 'width' => "150px",'fullBase' => true]); ?>
	    		</div>
	    	</td>
	    	<td class="td-interna-title"><span class="title"> <?= h($alumno->apellido) ?> <?php echo "</br> </br>" ?> <?= h($alumno->nombre) ?> </span> </td>
			<td height="150px" width="150px"><div>
	    	 	<?php
$ds  = DS;
			if(strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
			{
				$ds = DS_WINDOWS_IMG;
			}
			echo $this->Html->image('alumnos'.$ds.$alumno->referencia_foto, ['class' => 'pull-right', 'height' => "100%" , 'width' => "150px",'fullBase' => true]); ?>
	    		</div>
	    	</td>
		</tr>
	</table>
	<table style="width:100%; border-spacing: 2px;
    border-collapse: separate;" class="table">
		<tr>
			<td class="view-div   td-interna-general"  colspan="1">DNI</td><td class="td-interna-general" colspan="2"><?= h($alumno->nro_documento) ?></td>
						<td class="view-div   td-interna-general" colspan="1"><?= h("Fecha Nac.") ?></td><td class="td-interna-general" colspan="2"><?= $alumno->fecha_nacimiento ? h($alumno->fecha_nacimiento->format('d/m/Y')) : "-"?> </td>
			
		</tr>
		<tr>
			<td class="view-div   td-interna-general" colspan="1"><?= h("Celular") ?></td><td class="td-interna-general" colspan="2"><?= $alumno->celular ?  h($alumno->celular) : "-" ?></td>
			<td class="view-div   td-interna-general" colspan="1"><?= h("Télefono") ?></td><td class="td-interna-general" colspan="2"><?= $alumno->telefono? h($alumno->telefono) : "-"?> </td>
		</tr>
		<tr>
					<td class="view-div   td-interna-general" colspan="1"><?= h("Dirección") ?></td><td class="td-interna-general" colspan="2"><?= $alumno->direccion ? h($alumno->direccion) : "-" ?> </td>
		
			<td class="view-div   td-interna-general" colspan="1"><?= h("Email") ?></td><td class="td-interna-general" colspan="2"><?=$alumno->email ?  $alumno->email : "-" ?></td>
		</tr>
		<tr>
			<td class="view-div   td-interna-general" colspan="1"><?= h("Ref") ?></td><td class="td-interna-general" colspan="2"><?=$alumno->nombre_madre?  h($alumno->nombre_madre) : "-" ?></td>
			<td class="view-div   td-interna-general" colspan="1"><?= h("Celular") ?></td><td class="td-interna-general" colspan="2"><?= $alumno->celular_madre ? h($alumno->celular_madre) : "-"?> </td>
		</tr>
		<tr>
			<td class="view-div   td-interna-general" colspan="1"><?= h("Email Ref") ?></td><td class="td-interna-general" colspan="5"><?= $alumno->email_madre ? h($alumno->email_madre) : "-"?> </td>
		</tr>
		<tr>
			<td class="view-div   td-interna-general" colspan="1"><?= h("Fecha Alta") ?></td><td class="td-interna-general" colspan="2"><?= h($alumno->created->format('d/m/Y')) ?></td>
			<td class="view-div   td-interna-general" colspan="1"><?= h("Fecha Baja") ?></td><td class="td-interna-general" colspan="2"><?= $alumno->fecha_baja ? h($alumno->fecha_baja->format('d/m/Y')) : "-"?> </td>

		</tr>
		<tr>
			<td class="view-div   td-interna-general" colspan="1"><?= h("Arancel") ?></td><td class="td-interna-general" colspan="5"><?=$alumno->monto_arancel?  h($alumno->monto_arancel) : "-" ?></td>
		</tr>
		<tr>
			<td colspan="1">
    			<span class="view-div   td-interna-general" ><?= __('Clases: ' ) ?></span>
			</td>
			<td colspan="5">
                <?php if (!empty($alumno->clases)): ?>
                    <table class="table table-striped">
                        <?php foreach ($alumno->clases as $clases): ?>
                        <tr>
                            <td style="text-align:center;  font-size:1.5rem; font-style: bold; "><?= h($clases->presentacion) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>	
            	<?php endif; ?>
            </td>
		</tr>
	</table>
</div>	
