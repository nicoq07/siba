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
		?>
		
		
		 <?php 
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
			
			<div class="dia">
			
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
		//foreach ($clases as $clase)
		//$primerHora = date("H:i",strtotime($clases[0]['hora']));
		for ($j =0; $j <count($clases); $j++)
		{
			
			if ($j == 0)
			{
				$hora = date("H:i",strtotime($clases[$j]['hora']));
				?>
				<div  class="div-fila">
					<div class= "div-alumno" style="width: 100%;float: left;">
						<p class="p-nom-dia"> <?= "<strong>".h($hora)."</strong>"?>  </p>
					</div>
				</div >
				<?php 
			}
			elseif (($j != 0) && ($hora != date("H:i",strtotime($clases[$j-1]['hora']))))			
			{
				?>
				<div  class="div-fila">
					<div class= "div-alumno" style="width: 100%;float: left;">
						<p class="p-nom-dia"> <?= "<strong>".h($hora)."</strong>"?>  </p>
					</div>
				</div >
				<?php 
			}
		?>
			<!-- DIV ALUMNO -->
			<div  class="div-fila">
				<div class= "div-alumno" style="width: 70%;float: left;">
					<p class="p-alumno"> <?= h($clases[$j]['alumno']. ' ')."<strong>".h($clases[$j]['disci']) ."</strong>"?>  </p>
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
			$sig =next($clases);
			//debug($sig);
			$hora = date("H:i",strtotime($sig['hora']));
		}
	next($arrayClases);
	$diaActual != key($arrayClases);
	?>
	</div> <?php
	}
	?> <!-- WHILE ITEM-->
</div>
