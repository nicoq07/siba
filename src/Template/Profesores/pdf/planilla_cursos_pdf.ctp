 <style>
 	.tamano-titulo
 	{
 	font-size: 3rem;
 	}
 	
 	.tamano-encabezado
 	{
 	font-size: 1.8rem;
 	text-algin:center;
 	}
 	
 	.tamano-tabla
 	{
 	font-size: 1.5rem;
 	}
 	
 .container-titulo
 {
 	width:100%;
 	height: 70px;
 }
  .div-titulo
 {
 	float:left;
 	width:50%;
 	border: 1px;
 	
 }
 
 .container-tabla
 {
 	width:100%;
 }
 
</style>
<div class="container-titulo">
	<div class="div-titulo">
		<p class="tamano-encabezado"> <?= h($profesor->presentacion) ?> </p>
		
	</div>
	<div class="div-titulo">
		<p class="tamano-encabezado">  <?= h("$mes de ".date('Y')) ?> </p>
	</div>
</div>
<div class="container-tabla">
	<table>
	<?php foreach ($lista as $l) ?>
	
	 <tr>
     	<?= h(__($l['nombre_dia']) . " " . $l['hora']) ?>
     </tr>
      <tr>
      
		<td>
		</td>
     	<?= h(__($l['nombre_dia']) . " " . $l['hora']) ?>
     </tr>
	 <?php debug($l)?>
	</table>





</div>

