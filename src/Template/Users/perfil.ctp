<div class="container col-lg-10">

<div class="col-lg-12 col-lg-offset-2">
	<h1><?= h("Bienvenido ". $user->presentacion)?> </h1>
	
</div>
<?php if ($current_user['rol_id'] == ADMINISTRADOR){?>
<div class="col-lg-5 well">
	<h2><?= h(__(date('l')))?> </h2>
	<?php foreach ($horarios as $horario){?>
	    <h3><?= h($horario->hora->format('H:i')) ?></h3>
	    <div class="related">
	        <h4><?= __('Clases en esta hora') ?></h4>
	        <?php if (!empty($horario->clases)): ?>
	        <table class="table table-inversed">
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
<?php }?>
</div>
<div class="col-lg-4 well">
		<?php echo h("Módulo Notificaciones proximamente... ")?>
</div>