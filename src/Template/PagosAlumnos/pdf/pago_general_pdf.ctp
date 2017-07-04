<?php foreach ($pagosAlumnos as $pagoalumno)
{?>
<div class = "A6" style="padding:0px; margin:0px">
	<table class="table table-striped">
		<tr> <!-- 1 -->
			<td width="100px" height="1370px"  rowspan="6">
				<?= h("Aca arranca")?>
			</td>
		</tr>
		
		<tr>  <!-- 2 -->
			<td >
			<?= h($pagoalumno->alumno->presentacion)?>
			</td>
		</tr>
		
		<tr>  <!-- 3 -->
				<td>
				<?= h($pagoalumno->alumno->presentacion)?>
			</td>
		</tr>
		
		<tr> <!-- 4 -->
				<td>
				<?= h($pagoalumno->alumno->presentacion)?>
			</td>
		</tr>
		
		<tr>  <!-- 5 -->
				<td >
				<?= h($pagoalumno->alumno->presentacion)?>
			</td>
		</tr>
		
		<tr>  <!-- 6 -->
			<td >
				<?= h($pagoalumno->alumno->presentacion)?>
			</td>
		</tr>
	</table>
</div>
<?php }	?>