<div class="col-lg-9"">
    <h3><?= h($profesore->presentacion) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nro Documento') ?></th>
            <td><?= h($profesore->nro_documento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Direccion') ?></th>
            <td><?= $profesore->direccion ? h($profesore->direccion) : "-" ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ciudad') ?></th>
            <td><?= $profesore->ciudad ? h($profesore->ciudad) : "-" ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Codigo Postal') ?></th>
            <td><?= $profesore->codigo_postal ? h($profesore->codigo_postal) : "-" ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($profesore->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cuit') ?></th>
            <td><?= h($profesore->cuit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefono') ?></th>
            <td><?= h($profesore->telefono) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Celular') ?></th>
            <td><?= h($profesore->celular) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre Contacto') ?></th>
            <td><?= h($profesore->nombre_contacto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Celular Contacto') ?></th>
            <td><?= h($profesore->celular_contacto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Titulo') ?></th>
            <td><?= h($profesore->titulo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($profesore->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Legajo Numero') ?></th>
            <td><?= $this->Number->format($profesore->legajo_numero) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($profesore->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($profesore->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $profesore->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Observacion') ?></h4>
        <?= $this->Text->autoParagraph(h($profesore->observacion)); ?>
    </div>
</div>
<div class="col-lg-1">
	     <?php  echo $this->Html->link('test', ['action' => 'edit', $profesore->id],['class' => 'btn-sm btn-info']); ?>
</div>


<div class="col-lg-9">
   <div  style="margin-top:10px" class="row">
	     <div class="col-lg-5">
	     <h1 style="margin-top:10px"><?= h($profesore->presentacion) ?></h1>
	      </div>
	    <div class="col-lg-7">
	     <?php  echo $this->Html->image('alumnos/test1.jpg', ['alt' => $profesore->presentacion , 'class' => 'pull-right' , 'height' => "150" , 'width' => "150"]); ?>
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
	<div class="col-lg-2 borde view-div"><?= __('Email') ?></div>
	<div class="col-lg-4 borde"><?= $profesore->email ? h($profesore->email) : "-"?> </div>
	<div class="col-lg-2 borde view-div"><?= __('F Nac') ?></div>
	<div class="col-lg-2 borde"><?= $profesore->nombre_madre ? h($profesore->nombre_contacto) : "-" ?> </div>
	<div class="col-lg-2 borde view-div"><?= __('Celular tutor') ?></div>
	<div class="col-lg-2 borde"><?=$profesore->celular_madre ? h($profesore->celular_contacto) : "-"?> </div>

		<div class="col-lg-2 borde view-div"><?= __('Legajo') ?></div>
	<div class="col-lg-4 borde"><?= h($profesore->id) ?> </div>
	<div class="col-lg-2 borde view-div"><?= __('Legajo anterior') ?></div>
	<div class="col-lg-4 borde"><?= $profesore->legajo_numero ? h($profesore->legajo_numero) : "-"?></div>

	<div class="col-lg-4 borde"><?= h($profesore->monto_materiales) ?> </div>
			<div class="col-lg-2 borde view-div"><?= __('Colegio') ?></div>
	<div class="col-lg-10 borde"><?= $profesore->colegio ? h($profesore->colegio) : "-"?> </div>
			<div class="col-lg-2 borde view-div"><?= __('Alta en sistema') ?></div>
	<div class="col-lg-4 borde"><?= h($profesore->created->format('d/m/Y')) ?> </div>
			<div class="col-lg-2 borde view-div"><?= __('Modificado') ?></div>
	<div class="col-lg-4 borde"><?= h($profesore->modified->format('d/m/Y')) ?> </div>
	
	<div class="col-lg-2 borde view-div"><?= __('Activo') ?></div>
	<div class="col-lg-2 borde"><?=$profesore->active ? __('Sí') : __('No');?> </div>
    <div class="row">
        <h4><?= __('Observación') ?></h4>
        <?= $this->Text->autoParagraph(h($profesore->observacion)); ?>
    </div>
    
    <div class="related">
        <h4><?= __('Clases impartidas' ) ?></h4>
        <?php if (!empty($profesore->clases)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Profesor Id') ?></th>
                <th scope="col"><?= __('Horario Id') ?></th>
                <th scope="col"><?= __('Disciplina Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($profesore->clases as $clases): ?>
            <tr>
                <td><?= h($clases->id) ?></td>
                <td><?= h($clases->profesor_id) ?></td>
                <td><?= h($clases->horario_id) ?></td>
                <td><?= h($clases->disciplina_id) ?></td>
                <td><?= h($clases->created) ?></td>
                <td><?= h($clases->modified) ?></td>
                <td><?= h($clases->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Clases', 'action' => 'view', $clases->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Clases', 'action' => 'edit', $clases->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Clases', 'action' => 'delete', $clases->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clases->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
<div class="col-lg-1">
	     <?php  echo $this->Html->link('test', ['action' => 'edit', $profesore->id],['class' => 'btn-sm btn-info']); ?>
</div>
