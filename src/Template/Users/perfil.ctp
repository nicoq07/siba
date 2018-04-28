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
	<h3 class="panel panel-heading"><?= h("Pagos del día")?> </h3>
	<div id="PD"  style='display: none;'class='col-lg-12 panel-body'>
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
