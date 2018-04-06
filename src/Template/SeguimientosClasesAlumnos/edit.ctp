<?= $this->assign('title', 'Cargar seguimiento'); ?>
<div class="col-lg-4 col-lg-offset-4 panel">
	<div class="panel-info">
		<div class="panel-heading">
			<h3><?= __('Editar seguimiento') ?></h3>
		</div>
	    <?= $this->Form->create($seguimientosClasesAlumno) ?>
	    <fieldset>
	       
	        <?php
	           // echo $this->Form->control('clase_alumno_id');
	        echo $this->Form->control('observacion',['label' => 'Observación', 'onfocus' => "this.select()"]);
	            echo $this->Form->control('presente');
	            echo $this->Form->control('calificacion_id', ['label' => 'Calificación', 'options' => $calificaciones, 'empty' => true]);
	          //  echo $this->Form->control('fecha', ['empty' => true]);
	        ?>
	    </fieldset>
	    <?= $this->Form->button('Guardar', ['class' => 'btn-lg btn-success']) ?>
	    <?= $this->Form->end() ?>
	</div>
</div>
