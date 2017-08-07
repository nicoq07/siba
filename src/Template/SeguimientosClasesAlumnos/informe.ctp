<div class="col-lg-5 col-lg-offset-2">
	<?=  $this->Form->create($seg);
		echo $this->Form->control('clases', ['options' => $clases, 'empty' => true]);
		echo $this->Form->control('alumnos', ['options' => $alumnos, 'empty' => true]);
	  ?>
	  <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>