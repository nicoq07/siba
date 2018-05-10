
<div class="table-responsive col-lg-8 col-lg-offset-2 panel"> 
<h3><?php echo h("Cumpleaños del mes de $month")?></h3>
<div class="col-lg-2">
	<a class="btn btn-sm btn-success" onclick="selectElementContents( document.getElementById('tabla') ); aviso();">Copiar datos</a>
</div>
<div id="aviso" class="col-lg-2 alert alert-xs alert-info" style="display:none" >
<?php echo h("Datos copiados");?>
</div>
    <table id="tabla" class="table">
	<thead>
		<tr>
			
			<?php if ($vista) :?>
			<th width="20%"><?php echo ("Nombre");?></th>
			<th width="10%"><?php echo ("Día");?></th>
			<th width="23%"><?php echo ("Correo");?></th>
			<th width="23%"><?php echo ("Correo madre");?></th>
			<th width="23%"><?php echo ("Correo padre");?></th>
			<?php else : ?>
			<th width="50%"><?php echo ("Nombre");?></th>
			<th width="50%"><?php echo ("Día");?></th>
			<?php endif; ?>
		</tr>
	</thead>
<tbody>
</tbody>
<?php foreach ($alumnos as $alumno):?>
	<tr>
			<td><?php echo (h($alumno->presentacion));?></td>
			<td class="text-center"><?php echo ($alumno->fecha_nacimiento->format("j"));?></td>
			<?php if ($vista) :?>
			<td><?php echo (h($alumno->email));?></td>
			<td><?php echo (h($alumno->email_madre));?></td>
			<td><?php echo (h($alumno->email_padre));?></td>
			<?php endif;?>
		</tr>
<?php endforeach;?>
</table>
</div>
<script type="text/javascript">
function aviso()
{
	$('#aviso').css('display','block');
}
</script>