<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Aviso de pago</title>
</head>
<body>
<!--div general  --> 
<div class = "general">
	<div class= "troquel">
		<div class= "fila-troquel-chica">
			<p class="texto-troquel-fecha"> <?= h($pagoalumno->created->format('d/m/y'))?> </p>
		</div>
		<div class= "fila-troquel-chica">
			<p class="texto-troquel-nomyape"><?= h("Código : ")?> </p>
			<p class="texto-troquel-nomyape"><?= h($pagoalumno->id)?> </p> 
		</div>
		<div class= "fila-troquel">
			<p class="texto-troquel-nomyape"><?= h($pagoalumno->alumno->apellido) ;?></p>
			<p class="texto-troquel-nomyape"> <?= h($pagoalumno->alumno->nombre) ;?> </p>
		</div>
		<div class= "fila-troquel-chica">
			<p class="texto-troquel-fecha"><?php echo __(date('F', strtotime(date('Y')."-".$pagoalumno->mes."-01")))?> </p>
		</div>
		<div class= "fila-troquel-ultima">
			<p class="texto-troquel-nomyape">Total: </p>
			<p class="texto-troquel-nomyape"> <?php echo $this->Number->currency($pagoalumno->monto,'ARS')?> </p>
		</div>
	
	</div>
	<!-- FIN DE DIV DE TROQUEL  -->
	<!-- DIV FACTURA -->
	<div class = "factura">
		<div class="container-titulo">
			<div class="titulo">
				<p class="texto-titulo"><?php echo h(NOMBRE_CORTO_EMPRESA);?> </p>
			</div>
			
			<div class="descripcionIba">
				<p class="texto-descripcionIba"> <?php echo h(NOMBRE_LARGO_EMPRESA);?></p>
				<p class="texto-descripcionIba"> <?php echo h(ENCARGADO_EMPRESA);?></p>
				<p class="texto-descripcionIba"><?php echo h(DIRECCION_EMPRESA);?></p>
			</div>
			
		</div>
		
		<div class="logo" style="margin: auto; text-align:center">
			<?php  echo $this->Html->image(LOGO, ['height' => '200px', 'width' => '200px', 'fullBase' => true]); ?>
			<p style="padding:0; margin-top:5px; display:block; text-align:center; font-size: 2rem; font-style:bold;">  <?= h($pagoalumno->created->format('d/m/Y')) ?> </p>
		</div>
		
		<div class="descripcion-alumno-curso">
		
			<div class="alumno">
				<p class="texto-alumno"> Alumno:  <?= h($pagoalumno->alumno->presentacion) ?></p>
		    </div>
				<?php
				 		$clases = " - ";
				 			foreach ($pagoalumno->alumno->clases as $clase):
				 			$clases .= $clase->disciplina->descripcion. " - ";
				 		 endforeach;?>
			<div class="curso">
				<p class="texto-alumno"> Cursos: <?= h($clases); ?></p>
			</div>
			
		
		</div>
		
		<div class="container-conceptos">
		
			
		  <div class="conceptos"> 
		    <div class="titulo-conceptos">
				<p class="texto-descripcionIba"> Detalles</p>
		    </div>
		     <?php foreach ($pagoalumno->pagos_conceptos as $concepto): ?>
				<div class = "concepto"> <p class="texto-concepto"><?= h($concepto->detalle) ?></p> </div>
			 <?php endforeach;    ?>
		
			<div class="informacion">
			<p class="texto-informacion"><strong> NOTA : Pasado el vencimiento, el arancel sufrirá un ajuste. A todo efecto el mes es
				considerado 4 (cuatro) semanas.  <br> Recibo a su disposición una vez abonado.  <br>
				 AVISO DE PAGO | DOCUMENTACIÓN INTERNA | IBA LUGANO </strong> </p> 
			</div>	
				
		  </div>
				
			<div class= "montos">
				<div class="descripcion-total"><p class="texto-descripcionIba">TOTAL </p>  </div>
				<?php foreach ($pagoalumno->pagos_conceptos as $concepto): ?>
					<div class="concepto" ><div class="texto-concepto" style="text-align: center"><?= $this->Number->format($concepto->monto,[
	                                  'before' => '$',
	                                  'locale' => 'es_Ar'
	                                  ])?> </div> 
	               </div>
	           <?php endforeach;   ?>
	         <div class="informacion">
				<p class="texto-descripcionIba"> <?= h($this->Number->format($pagoalumno->monto,[
	                                  'before' => '$',
	                                  'locale' => 'es_Ar'
	                                  ]))?>  </p>
			</div>  
	           
			</div>
				
		
		</div>
		
		
	</div>

	<!-- FIN DIV FACTURA -->
</div>
</body>
</html>
