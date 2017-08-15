<div class="col-lg-10">
<div class="col-lg-3 col-lg-offset-4">
	<fieldset>
  		<legend><?= h("¿Qué planilla necesitás?") ?></legend>
   </fieldset>
 </div>

	<div class="col-lg-6 ">
	          <?= $this->Html->link('Listado de presentes',['action' => 'pagoGeneral' ],['class' => 'btn-lg btn-success pull-left']) ?>
	</div>
	<div class="col-lg-6">
	         <?= $this->Html->link('Listado de cursos',['action' => 'pagoManual' ],['class' => 'btn-lg btn-info pull-right']) ?>
	</div>
</div>