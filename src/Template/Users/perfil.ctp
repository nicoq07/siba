<div class="container col-lg-10">

<div class="col-lg-12 col-lg-offset-2">
	<h1><?= h("Bienvenido ". $user->presentacion)?> </h1>
	
</div>

<div class="col-lg-5 well">
<div class="related">
	<h2><?= h(__(date('l')))?> </h2>
	<?php foreach ($horarios as $horario){?>
	    <h3><?= h($horario->hora->format('H:i')) ?></h3>
	    
	        <h4><?= __('Clases en esta hora') ?></h4>
	        <?php if (!empty($horario->clases)): ?>
	        <table class="table">
	            <tr>
	                <th scope="col"><?= __('Detalle') ?></th>
	            </tr>
	            <?php foreach ($horario->clases as $clases): ?>
	            <tr>
	           		<td><?= h($clases->presentacion) ?></td>
	            </tr>
	            <?php endforeach; ?>
	        </table>
	        <?php endif; 
		}	?>
	    </div>
</div>
<?php if ($current_user['rol_id'] == ADMINISTRADOR){?>
<div class="col-lg-5 well">
<div class="related">
	<h3><?= h("Clases sin alumnos")?> </h3>
	
	        <table class="table">
	            <tr>
	                <th scope="col"><?= __('Disciplina') ?></th>
	                <th scope="col"><?= __('Dia y hora ') ?></th>
	                <th scope="col"><?= __('Profesor') ?></th>
	            </tr>
	     <?php foreach ($clasesD as $c){?>
	            <tr>
	           		<td><?= h($c['disci']) ?></td>
	           		<td><?= h(__($c['nom_dia']) ." " . date("H:i",strtotime($c['hora'] ))) ?></td>
	           		<td><?= h($c['profesor'] ) ?></td>
	            </tr>
	            <?php }?>
	        </table>
	        

	    </div>
</div>
<?php }?>
</div>
