<div class="col-lg-5 col-lg-offset-3 panel panel-info">
  		<div class="panel-heading"><?= h("¿Qué pago vas a generar?") ?></div>
   <div class="col-lg-12">
    <div class="panel-body">
          <?= $this->Html->link('A todos',['action' => 'pagoGeneral' ],['class' => 'btn-lg btn-success pull-left','target' => '_blank']) ?>
         <?= $this->Html->link('Particular',['action' => 'pagoManual' ],['class' => 'btn-lg btn-info pull-right','target' => '_blank']) ?>
    </div>
	</div>
</div>

