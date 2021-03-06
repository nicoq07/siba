<?= $this->assign('title','Vista de pago');?>
<div class="col-lg-6 col-lg-offset-3 panel panel-info">
		<div class="col-lg-12 panel-heading">
		    <h3><?= h("Pago de ". __(h(date('F', strtotime(date('Y')."-".$pagosAlumno->mes."-01")))) ." de : " . $pagosAlumno->alumno->presentacion) ?></h3>
		</div>
	<div class = "col-lg-12 separador">
		<div class="panel-body">
		<div class="col-lg-10">
			<?= __('Recibido por:') ?>
			<?= $pagosAlumno->has('user') ? $this->Html->link($pagosAlumno->user->presentacion, ['controller' => 'Users', 'action' => 'view', $pagosAlumno->user->id]) : '' ?>
		</div>
		<div class="col-lg-10">
			<?= __('Código:') ?>
			<?= $this->Number->format($pagosAlumno->id) ?>
		</div>
		<div class="col-lg-10">
			<?= __('Fecha generado:') ?>
			<?= h($pagosAlumno->created->format('d/m/Y')) ?>
		</div>
		<div class="col-lg-10">
			<?= __('Fecha pagado: ') ?>
			<?= $pagosAlumno->fecha_pagado ? h($pagosAlumno->fecha_pagado->format('d/m/Y')) : h("Sin datos") ?>
		</div>
		<div class="col-lg-10">
			<?= __('Monto:') ?>
			<?= $pagosAlumno->monto ? $this->Number->currency($pagosAlumno->monto,'ARS'): __('No'); ?>
		</div>
		<div class="col-lg-10">
			<?= __('Pagado:') ?>
			<?= $pagosAlumno->pagado ? __('Sí') : __('No'); ?>
		</div>
		<div class="col-lg-10">
			<?= __('Conceptos:') ?>
			<?php foreach ($pagosAlumno->pagos_conceptos as $concepto)?>
			<div class="col-lg-12">
				<?= $concepto->detalle;?>
			</div>
		</div>
		</div>
	</div>
</div>
