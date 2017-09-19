<script type="text/javascript">
$(document).ready(parpadear);
function parpadear(){ $('#campana').fadeIn(500).delay(250).fadeOut(500, parpadear) }
</script>
<div class="container col-lg-10">
	<div class="col-lg-7 col-lg-offset-2">
		<h1><?= h("Bienvenido ". $user->presentacion)?> </h1>
	</div>
	&nbsp;
	<div class="well col-lg-4 col-lg-offset-3">
		<div style="text-align: center;">
		   <?php if ($current_user['rol_id'] !== ADMINISTRADOR) {
			echo $this->Html->link(__('Ir a clases del día'), ['action' => 'p_perfil'], ['class' => 'btn-lg btn-success']);
			}
			else {
				echo $this->Html->link(__('Ir a clases del día'), ['action' => 'perfil'], ['class' => 'btn-lg btn-success']);
			}
			?>
		</div>

	</div>
	 <?php if (count($notificaciones) > 0) {?>
	<div class="well col-lg-4 col-lg-offset-3">
		<div style="text-align: center;">
		 <div class="col-lg-12"><span id="campana" style="color: #c80009" class="fa fa-lg fa-bell"></span></div>
		 <?php echo $this->Html->link(__('Tenés notificaciones nuevas'), ['controller' => 'Notificaciones' , 'action' => 'index'], ['class' => 'fa']);?>
			
		</div>
	</div>
	<?php }?>
</div>