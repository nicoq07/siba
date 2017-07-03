<div class="col-lg-3 col-lg-offset-3">
	<fieldset>
  		<legend><?= h("¿Qué pago vas a generar?") ?></legend>
   </fieldset>
 </div>
<div class="col-lg-3 col-lg-offset-3">
    <fieldset>
          <?= $this->Html->link('General',['action' => 'pagoGeneral' ],['class' => 'btn-lg btn-success pull-left']) ?>
         <?= $this->Html->link('Manual',['action' => 'pagoManual' ],['class' => 'btn-lg btn-info pull-right']) ?>
     </fieldset>
</div>
