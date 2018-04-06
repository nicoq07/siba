<?= $this->assign('title','Tipo de pago');?>

<div class="col-lg-6 col-lg-offset-3 panel panel-info">
  		<div class="panel-heading text-center"><?= h("¿Qué pago vas a generar?") ?></div>
   <div class="col-lg-6 panel-body">
          <?= $this->Html->link('A todos',['action' => 'pagoGeneral' ],['class' => 'btn-lg btn-success btn-block text-center','target' => '_blank']) ?>
	</div>
	<div class="col-lg-6 panel-body">
	         <?= $this->Html->link('Particular',['action' => 'pagoManual' ],['class' => 'btn-lg btn-info btn-block text-center','target' => '_blank']) ?>
	</div>
	
</div>

