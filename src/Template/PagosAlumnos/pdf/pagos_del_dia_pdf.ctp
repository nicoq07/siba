<div > <?= h('Generado: '. date('d/m/Y'))?> </div>
<div width='100%' >
	<h1 ><?= h("Pagos por día :")?> </h1>
	<h2 ><?= h("Monto : ". $this->Number->currency($suma->montoTotal,'ARS'))?> </h2>
	<h3 ><?= h("Cantidad de pagos : ".$suma->cant)?> </h3>

                    <table class="table">
                		<thead >
                			<tr >
        		                <td width = "20%" scope="col"><?= __('Alumno') ?></td>
        		                <td width = "20%" scope="col"><?= __('Fecha pagado') ?></td>
        		                <td width = "15%" scope="col"><?= __('Mes') ?></td>
        		                <td width = "20%" scope="col"><?= __('Monto') ?></td>
        		                <td width = "25%" scope="col"><?= __('Recibió el pago:') ?></td>
        		              </tr>
        	            </thead>
        	            <?php foreach ($pagos as $pagosAlumnos): ?>
        	            <tr>
        	                <td data-title="alu"><?= h($pagosAlumnos->alumno->presentacion) ?></td>
        	                <td data-title="Feche pagado"><?= $pagosAlumnos->fecha_pagado ? h($pagosAlumnos->fecha_pagado->format('d/m/Y')) : h("Sin datos") ?></td>
        	                <td data-title="Mes"><?= __(date('F', strtotime(date('Y')."-".$pagosAlumnos->mes."-01"))) ?></td>
        	                <td data-title="Pago"  align="center" ><?= $pagosAlumnos->monto ? h($this->Number->currency($pagosAlumnos->monto,'ARS')) : h("")   ?></td>
        	                <td data-title="Recibido"><?= $pagosAlumnos->user ? h($pagosAlumnos->user->nombre): h("-") ?></td>
        	                
        	            </tr>
						<tr>
							<td colspan="5">
								<table>
									<?php foreach ($pagosAlumnos->pagos_conceptos as $pagosCoceptos): ?>
									<tr>
										<td  width = "100%" ><strong>DETALLE: </strong><?= h($pagosCoceptos->detalles) ?></td>
									</tr>
									<?php endforeach; ?>
								</table>
							<td>
						</tr>
        	            <?php endforeach; ?>
        	        </table>
    	        

	 
</div>
<script>
new Chart(document.getElementById("line-chart"), {
	  type: 'line',
	  data: {
	    labels: <?php echo $fechas;?>,
	    datasets: [ { 
	        data: <?php echo $montos;?>,
	        label: 'Cobros' ,
	        borderColor: "#92abb7",
	        fill: false
	      }
	    ]
	  },
	  options: {
	    title: {
	      display: true,
	    }
	  }
	});

</script>