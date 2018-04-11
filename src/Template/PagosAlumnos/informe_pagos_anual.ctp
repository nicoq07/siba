<?php $this->assign('title','Informe de pagos anual');?>
<div class="col-lg-4 col-lg-offset-4 panel">
	<?=  $this->Form->create();
		echo $this->Form->label('year', ['label' => 'Año']);
		echo $this->Form->year('year', [
				'minYear' => 2017,
				'maxYear' => date('Y')
		]);
	  ?>
	  <?= $this->Form->button(__('Ver')) ?>
    <?= $this->Form->end() ?>
</div>