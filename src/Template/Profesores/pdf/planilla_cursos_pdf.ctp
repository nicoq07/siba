<div class="div-fragmento-dia">
	<div class="div-dia-horario">
		<h4 class="text-dia-horaio">
			<?= h($profesor->presentacion ." - ". $mes . " de ". date('Y') )?>
		 </h4>
	</div>
	<?php $tamanio =  (20 / (count($dias)));
	$i = 0;
	$cnombre = null;
	$numDia = null;
	$ulimo = count($clases);
	$flag = false;
	foreach ($clases as $clase) {
		$i++;
		$tamanio = 0;
		$cant=0;
		if (($ulimo==$i) && ($clase->horario->nombre_dia == $cnombre))
		{
			$flag = true;
		}
		if (($clase->horario->nombre_dia != $cnombre) || ($i == 1) || $flag)	{
			$numDia = array();
			foreach ($dias as $dia)
			{
					if (key($dia) == $clase->id) 
					{
						array_push($numDia, current($dia));
						$cant++;
				    }
			}
			$tamanio = (30/$cant);
			?>
			<?php if (!($flag)){?>
			<!-- DIV ENCABEZADO -->
			<div  style="margin-top: 10px"  class="div-fila">
				<div class="div-texto-cabeza-alumno" style="">
					 <p class="p-nom-dia">	<?= "<strong>".  h( __($clase->horario->nombre_dia)) . "</strong>"; ?> </p>
				</div>
				<?php foreach ($numDia as $nd) {?>
					<div  style=" width: <?php print "$tamanio%"?>" class="div-dia-cabeza">
					   <p class="p-num-dia">	<?= "<strong>". h($nd) ."</strong>"?>  </p>
					</div>
					<?php }?>
			</div>
		<?php } }?>
	<!-- DIV ENCABEZADO -->
	
	<!-- DIV ALUMNO -->
	<?php foreach ($clase->alumnos as $alumno) {?>
	<div  class="div-fila">
		<div class= "div-alumno" style="width: 70%;float: left;">
			<p class="p-alumno"> <?= h($alumno->presentacion. ' '. $clase->disciplina->descripcion. " " .$clase->horario->hora->format("H:i"))?>  </p>
		</div>
		
		<?php foreach ($numDia as $nd) {?>
		<div style="width: <?php print "$tamanio%"?>" class="div-dia">
			 <p class="p-num-dia">	&nbsp; </p>
		</div>
		<?php }?>
	</div >
	<!-- DIV ALUMNO -->
	<?php }?>
	<?php $cnombre = $clase->horario->nombre_dia; ?>
	<?php   }?> <!-- FOR ITEM-->
</div>
