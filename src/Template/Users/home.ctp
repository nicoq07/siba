<div class="container col-lg-10">
	<div class="col-lg-8 col-lg-offset-2">
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
</div>