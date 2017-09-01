<div class="div-fragmento-dia">
	<div class="div-dia-horario">
		<h4 class="text-dia-horaio">
			<?= h($profesor->presentacion ." - ". $mes . " de ". date('Y') )?>
		 </h4>
	</div>
	<?php $tamanio =  null;
	$diaActual = null;
	$flag = true;
	$numDia = 0;
// 	debug(count($dias)); exit;
// 	foreach ($arrayClases as $clases) {
	while ($clases = current($arrayClases)) {
		if ($flag || ($diaActual != key($arrayClases)) ) {
			$numDia = 0;
			foreach ($dias as $dia)
			{
				
				if (key($arrayClases) == key($dia))
				{
					$numDia++;
				}
			}
			$tamanio = (30/$numDia);
			$flag = false;
			?>
			<div  style="margin-top: 10px"  class="div-fila">
				<div class="div-texto-cabeza-alumno" style="">
					<p class="p-nom-dia">	<?= "<strong>".  h( __(key($arrayClases))) . "</strong>"; ?> </p>
				</div>
					<?php foreach ($dias as $dia) {
						if (key($arrayClases) == key($dia)) {
						?>
						<div  style=" width: <?php print "$tamanio%"?>" class="div-dia-cabeza">
								   <p class="p-num-dia">	<?= "<strong>". h($dia[key($arrayClases)]) ."</strong>"?>  </p>
						</div>
					<?php } ?>
				<?php 	}?>
			</div>
		<?php 	}?>
		
				<?php 
		foreach ($clases as $clase)
		{
		?>
			<!-- DIV ALUMNO -->
			<div  class="div-fila">
				<div class= "div-alumno" style="width: 70%;float: left;">
					<p class="p-alumno"> <?= h($clase['alumno']. ' ')."<strong>".h($clase['disci']) ."</strong>". " " .h(date("H:i",strtotime($clase['hora'])))?>  </p>
				</div>
				<?php for($i = 1; $i <= $numDia; $i++ )
				{?>
				<div style="width: <?php print "$tamanio%"?>"  class="div-dia">
					 <p class="p-num-dia">	&nbsp;  </p>
				</div>
				<?php }?>
			</div >
			<!-- DIV ALUMNO -->
			<?php   
		}
	next($arrayClases);
	$diaActual != key($arrayClases);
	}
	;?> <!-- WHILE ITEM-->
</div>
