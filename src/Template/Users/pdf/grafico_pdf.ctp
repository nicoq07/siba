<div class="col-lg-8 col-lg-offset-2 panel panel-info">
	<h3 class="panel panel-heading"><?= h("Pagos por día")?> </h3>
	<div id="PD"  class='col-lg-12 panel-body'>
    	    <canvas id="line-chart" width="800" height="450"></canvas>
		<div class="col-lg-12 ">
			<div id="masDatos"  class='col-lg-12 '>
			<div  id="no-more-tables" >
                    <table class="col-lg-12 table-striped table-condensed table-bordered cf">
                		<thead class="cf" style="background-color:#8ab9b5">
                			<tr >
        		                <td width = "10%" scope="col"><?= __('Código') ?></td>
        		                <td width = "20%" scope="col"><?= __('Fecha generado') ?></td>
        		                <td width = "10%" scope="col"><?= __('Mes') ?></td>
        		                <td width = "25%" scope="col"><?= __('Monto') ?></td>
        		                <td width = "10%" scope="col"><?= __('Recibió el pago:') ?></td>
        		                <td width = "15%" scope="col"><?= __('Fecha pagado') ?></td>
        		                <td width = "10%" scope="col"><?= __('Pagado') ?></td>
        		              </tr>
        	            </thead>
        	            <?php foreach ($pagos as $pagosAlumnos): ?>
        	            <tr style="background-color:#9fc5c2" >
        	                <td data-title="Código"><?= h($pagosAlumnos->id) ?></td>
        	                <td data-title="Fecha generado"><?= h($pagosAlumnos->created->format('d/m/Y')) ?></td>
        	                <td data-title="Mes"><?= __(date('F', strtotime(date('Y')."-".$pagosAlumnos->mes."-01"))) ?></td>
        	                <td data-title="Pago"  align="center" ><?= $pagosAlumnos->monto ? h($this->Number->currency($pagosAlumnos->monto,'ARS')) : h("")   ?></td>
        	                <td data-title="Recibido"><?= $pagosAlumnos->user ? h($pagosAlumnos->user->nombre): h("-") ?></td>
        	                <td data-title="Feche pagado"><?= $pagosAlumnos->fecha_pagado ? h($pagosAlumnos->fecha_pagado->format('d/m/Y')) : h("Sin datos") ?></td>
        	                <td data-title="Pagado"><?= $pagosAlumnos->pagado ? h("Sí") : h("No") ?></td>
        	                
        	            </tr>
						<tr>
							<td colspan="7">
								<table class="table cf">
									<?php foreach ($pagosAlumnos->pagos_conceptos as $pagosCoceptos): ?>
									<tr class="success">
										<td  width = "100%" ><strong>DETALLE: </strong><?= h($pagosCoceptos->detalles) ?></td>
									</tr>
									<?php endforeach; ?>
								</table>
							<td>
						</tr>
        	            <?php endforeach; ?>
        	        </table>
    	        
    	    	</div>
			</div>
		</div>
	 </div>
	 
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