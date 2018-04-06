<?= $this->assign('title','Inicio');?>
<div class="col-lg-4 col-lg-offset-1 panel panel-info">
	<h2 class="panel panel-heading"><?= h(__(date('l')))?> </h2>
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
<div class="col-lg-5 col-lg-offset-1 panel panel-info">
	<h3 class="panel panel-heading"><?= h("Clases sin alumnos")?> </h3>
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
