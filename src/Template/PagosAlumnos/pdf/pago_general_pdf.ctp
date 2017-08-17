<?php foreach ($pagosAlumnos as $pagoalumno) : ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Aviso de pago</title>

<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
</head>
<body>
<!--div general  --> 
<div class = "general">
	<div class= "troquel">
		<div class= "fila-troquel">
			<p class="texto-troquel-fecha"> <?= h($pagoalumno->created->format('d/m/y'))?> </p>
		</div>
		<div class= "fila-troquel">
			<p class="texto-troquel-codigo"><?= h("Código : ")?> </p>
			<p class="texto-troquel-codigo"><?= h($pagoalumno->id)?> </p> 
		</div>
		<div class= "fila-troquel">
			<p class="texto-troquel-nomyape"> <?= h($pagoalumno->alumno->nombre) ;?></p>
			<p class="texto-troquel-nomyape"><?= h($pagoalumno->alumno->apellido) ;?> </p>
		</div>
		<div class= "fila-troquel">
			<p class="texto-troquel-fecha"><?php echo __(date('F', strtotime(date('Y')."-".$pagoalumno->mes."-01")))?> </p>
		</div>
		<div class= "fila-troquel-ultima">
			<p class="texto-troquel-nomyape">Total: </p>
			<p class="texto-troquel-nomyape"> <?php echo $this->Number->format($pagoalumno->monto,[
                                  'before' => '$',
                                  'locale' => 'es_Ar'
                                  ])?> </p>
		</div>
	
	</div>
	<!-- FIN DE DIV DE TROQUEL  -->
	<!-- DIV FACTURA -->
	<div class = "factura">
		<div class="container-titulo">
			<div class="titulo">
				<p class="texto-titulo"> I.B.A Lugano</p>
			</div>
			
			<div class="descripcionIba">
				<p class="texto-descripcionIba"> Instituto Buenos Aires</p>
				<p class="texto-descripcionIba"> Dir. Profesor Hugo Castro</p>
				<p class="texto-descripcionIba"> José León Suarez 5246 CP(1439) - Tel: 4638-5062</p>
			</div>
			
		</div>
		
		<div class="logo">
			<?php  echo $this->Html->image('logoIba.png', ['height' => '120px', 'width' => '120px', 'fullBase' => true]); ?>
			<p style="padding:0; margin-top:5px; display:block; text-align:center; font-size: 1rem; font-style:bold; border-style:solid">  <?= h($pagoalumno->created->format('d/m/Y')) ?> </p>
		</div>
		
		<div class="descripcion-alumno-curso">
		
			<div class="alumno">
				<p class="texto-alumno"> Alumno:</p>
				<p class="texto-alumno"> <?= h($pagoalumno->alumno->nombre." ".$pagoalumno->alumno->apellido) ?></p>
		    </div>
				<?php
				 		$clases = " ";
				 			foreach ($pagoalumno->alumno->clases as $clase):
				 			$clases .= $clase->disciplina->descripcion. " ";
				 		 endforeach;?>
			<div class="curso">
				<p class="texto-alumno"> Cursos:</p>
				<p class="texto-alumno"> <?= h($clases); ?> </p>
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
		
			<div class="inforamcion">
				<p class="texto-alumno"> NOTA :  </p>
			</div>	
				
		  </div>
				
			<div class= "montos">
				<div class="descripcion-total"><p class="texto-descripcionIba">TOTAL </p>  </div>
				<?php foreach ($pagoalumno->pagos_conceptos as $concepto): ?>
					<div class="concepto"><p class="texto-concepto"><?= $this->Number->format($concepto->monto,[
	                                  'before' => '$',
	                                  'locale' => 'es_Ar'
	                                  ])?> </p> 
	               </div>
	           <?php endforeach;   ?>
			</div>
				
		
		</div>
		
		
	</div>

	<!-- FIN DIV FACTURA -->
</div>



</body>
</html>
<?php endforeach; ?>