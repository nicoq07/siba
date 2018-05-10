<div class="col-lg-4 col-lg-offset-4	 well">
	<?=  $this->Form->create($alumno);
	echo $this->Form->label('mob', ['label' => 'Mes']);
	echo $this->Form->month('mob', ['empty' => 'Selecciones el mes'],['required' => true]);
		?>
		<div class="col-lg-12">
			<div class="col-lg-6"><?php echo $this->Form->radio('activos', [false => 'Todos', true => 'Sólo activos'],['required' => true]); ?> </div>
			<div class="col-lg-6"><?php echo $this->Form->radio('campos', [false => 'Sin correos', true => 'Con correos'],['required' => true]); ?> </div>
		</div>
	  <?= $this->Form->button(__('Ver')) ?>
    <?= $this->Form->end();  ?>
   
</div>