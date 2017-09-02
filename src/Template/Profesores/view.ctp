<div class="col-lg-9">
   <div  style="margin-top:10px" class="row">
	     <div class="col-lg-5">
	     <h1 style="margin-top:10px"><?= h($profesore->presentacion) ?></h1>
	      </div>
	</div>
	<div class="separador"></div>
	
	<div class="col-lg-2 view-div borde"><?= __('DNI') ?></div>
	<div class="col-lg-4 borde"><?= h($profesore->nro_documento) ?></div>
	<div class="col-lg-2 view-div borde"><?= __('Direccion') ?></div>
	<div class="col-lg-4 borde"><?= $profesore->direccion ? h($profesore->direccion) : "-" ?> </div>
	<div class="col-lg-2 borde view-div"><?= __('Código Postal') ?></div>
	<div class="col-lg-4 borde "><?=$profesore->codigo_postal ?  h($profesore->codigo_postal) : "-" ?></div>
	<div class="col-lg-2 borde view-div"><?= __('Ciudad') ?></div>
	<div class="col-lg-4 borde"><?= $profesore->ciudad ? h($profesore->ciudad) : "-"?> </div>
	<div class="col-lg-2 borde view-div"><?= __('Celular') ?></div>
	<div class="col-lg-4 borde"><?= $profesore->celular ? h($profesore->celular) : "-"?></div>
	<div class="col-lg-2 borde view-div"><?= __('Télefono') ?></div>
	<div class="col-lg-4 borde"><?= $profesore->telefono ? h($profesore->telefono) : "-"?> </div>
	
	<div class="col-lg-2 borde view-div"><?= __('Contacto') ?></div>
	<div class="col-lg-2 borde"><?= $profesore->nombre_contacto ? h($profesore->nombre_contacto) : "-" ?> </div>
	<div class="col-lg-2 borde view-div"><?= __('Celular cont.') ?></div>
	<div class="col-lg-2 borde"><?=$profesore->celular_contacto ? h($profesore->celular_contacto) : "-"?> </div>
	<div class="col-lg-2 borde view-div"><?= __('Email') ?></div>
	<div class="col-lg-2 borde"><?= $profesore->email ? h($profesore->email) : "-"?> </div>
		<div class="col-lg-2 borde view-div"><?= __('Legajo') ?></div>
	<div class="col-lg-4 borde"><?= h($profesore->id) ?> </div>
	<div class="col-lg-2 borde view-div"><?= __('Legajo anterior') ?></div>
	<div class="col-lg-4 borde"><?= $profesore->legajo_numero ? h($profesore->legajo_numero) : "-"?></div>

			<div class="col-lg-2 borde view-div"><?= __('Alta en sistema') ?></div>
	<div class="col-lg-4 borde"><?= h($profesore->created->format('d/m/Y')) ?> </div>
			<div class="col-lg-2 borde view-div"><?= __('Modificado') ?></div>
	<div class="col-lg-4 borde"><?= h($profesore->modified->format('d/m/Y')) ?> </div>
	
	<div class="col-lg-2 borde view-div"><?= __('Activo') ?></div>
	<div class="col-lg-2 borde"><?=$profesore->active ? __('Sí') : __('No');?> </div>
    
    <div class="col-lg-12 separador-ligth">
        <h4><?= __('Observación') ?></h4>
        <?= $this->Text->autoParagraph(h($profesore->observacion)); ?>
    </div>
    <div class="col-lg-12 related">
        <h4><?= __('Clases impartidas' ) ?></h4>
        <?php if (!empty($profesore->clases)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
            	 <th scope="col"><?= __('Disciplina') ?></th>
                <th scope="col"><?= __('Horario') ?></th>
                <th width="10%" scope="col"><?= __('Cant. A') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($profesore->clases as $clases): ?>
            <tr>
             <td><?= h($clases->disciplina->descripcion) ?></td>
                <td><?= h($clases->horario->presentacion) ?></td>
                <td><?= h($clases->alumno_count) ?></td>
                <td><?= $clases->active ? h("Sí") : h("No") ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Clases', 'action' => 'view', $clases->id],['class' => 'btn-sm btn-info']) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Clases', 'action' => 'edit', $clases->id],['class' => 'btn-sm btn-warning']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Clases', 'action' => 'delete', $clases->id], ['class' => 'btn-sm btn-danger', 'confirm' => __('Borrar clase?', $clases->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
<div class="col-lg-1 separador">
	     <?php  echo $this->Html->link('Editar', ['action' => 'edit', $profesore->id],['class' => 'btn btn-warning']); ?>
</div>
