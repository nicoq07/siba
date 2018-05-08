<?= $this->assign('title','Inicio');?>
<div class="col-lg-8 col-lg-offset-2 panel panel-info">
	<div class="col-lg-2 col-lg-offset-9"><button class='btn btn-sm btn-default'  onclick='mostrarOcultar("dia",this);'><?php echo h('Ver'); ?></button> </div>
	<h2 class="panel panel-heading"><?= h(__(date('l')))?> </h2>
		<div id="dia"  style='display: none;'class='col-lg-12 panel-body'>
        	<?php foreach ($horarios as $horario){?>
        	    <h3><?= h($horario->hora->format('H:i')) ?></h3>
        	    
        	        <h4><?= __('Clases en esta hora') ?></h4>
        	        <?php if (!empty($horario->clases)): ?>
        	        <table class="table table-striped">
        	            <tr>
        	                <th scope="col"><?= __('Detalle') ?></th>
        	            </tr>
        	            <?php foreach ($horario->clases as $clases): ?>
        	            <tr>
        	           			<td><?= $this->Html->link($clases->presentacion, [ 'controller' => 'Clases', 'action' => 'view', $clases->id])?></td>
        
        	            </tr>
        	            <?php endforeach; ?>
        	        </table>
        	        <?php endif; 
        		}	?>
        	</div>
</div>
<div class="col-lg-8 col-lg-offset-2 panel panel-info">
	<div class="col-lg-2 col-lg-offset-9"><button class='btn btn-sm btn-default' onclick='mostrarOcultar("CSA",this);'><?php echo h('Ver'); ?></button> </div>
	<h3 class="panel panel-heading"><?= h("Clases sin alumnos")?> </h3>
		<div id="CSA"  style='display: none;'class='col-lg-12 panel-body'>
    	        <table class="table table-striped">
    	            <tr>
    	                <th scope="col"><?= __('Disciplina') ?></th>
    	                <th scope="col"><?= __('Dia y hora ') ?></th>
    	                <th scope="col"><?= __('Profesor') ?></th>
    	                <th scope="col"><?= __('Acceder') ?></th>
    	            </tr>
    	     <?php foreach ($clasesD as $c){?>
    	            <tr>
    	           		<td><?= h($c['disci']) ?></td>
    	           		<td><?= h(__($c['nom_dia']) ." " . date("H:i",strtotime($c['hora'] ))) ?></td>
    	           		<td><?= h($c['profesor'] ) ?></td>
    	           		<td><?php echo $this->Html->link("Ver", [ 'controller' => 'Clases', 'action' => 'view', $c['clase_id']])?></td>
    	            </tr>
    	            <?php }?>
    	        </table>
   	     </div>
	        

</div>
<div class="col-lg-8 col-lg-offset-2 panel panel-info">
	<div class="col-lg-2 col-lg-offset-9"><button class='btn btn-sm btn-default'  onclick='mostrarOcultar("PD",this);'><?php echo h('Ver'); ?></button> </div>
	<h3 class="panel panel-heading"><?= h("Pagos por día")?> </h3>
	<div id="PD"  style='display: none;'class='col-lg-12 panel-body'>
    	    <canvas id="line-chart" width="800" height="450"></canvas>
		<div class="col-lg-12 ">
		<div class="col-lg-12">&nbsp;</div>
			<div class="col-lg-6 col-lg-offset-3"><button class='btn btn-sm btn-primary btn-block'  onclick='mostrarOcultar("masDatos",this);'><?php echo h('Desplegar listado de últimos 20 pagos'); ?></button> </div>
			<div id="masDatos"  style='display: none;'class='col-lg-12 panel-body'>
			<div  id="no-more-tables" >
                    <table class="col-lg-12 table-striped table-condensed table-bordered cf">
                		<thead class="cf" style="background-color:#8ab9b5">
                			<tr >
        		                <td width = "20%" scope="col"><?= __('Alumno') ?></td>
        		                <td width = "20%" scope="col"><?= __('Fecha generado') ?></td>
        		                <td width = "10%" scope="col"><?= __('Mes') ?></td>
        		                <td width = "20%" scope="col"><?= __('Monto') ?></td>
        		                <td width = "10%" scope="col"><?= __('Recibió el pago:') ?></td>
        		                <td width = "15%" scope="col"><?= __('Fecha pagado') ?></td>
        		                <td width = "5%" scope="col"><?= __('Pagado') ?></td>
        		              </tr>
        	            </thead>
        	            <?php foreach ($pagos as $pagosAlumnos): ?>
        	            <tr style="background-color:#9fc5c2" >
        	                <td data-title="Código"><?= h($pagosAlumnos->alumno->presentacion) ?></td>
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
