<div class="col-lg-5 col-lg-offset-2">
		<div class="col-lg-10">
		<?=  $this->Form->create($seg, ['id' => 'frmIndex', 'type' => 'post']);
			echo $this->Form->control('clases', ['options' => $clases, 'empty' => 'Seleccionar clase...','onchange'=>'document.getElementById("frmIndex").submit()']);
			echo $this->Form->control('alumnos', ['options' => $alumnos, 'empty' => 'Seleccionar alumno...']);
		  ?>
		  <?= $this->Form->button(__('Descargar')) ?>
	    <?= $this->Form->end() ?>
	    </div>
</div>