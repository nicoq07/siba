<div class="col-lg-8">
   <div  style="margin-top:10px" class="row">
	     <div class="col-lg-5">
	     <h1 style="margin-top:10px"><?= h($alumno->presentacion) ?></h1>
	      </div>
	    <div class="col-lg-7">
	     <?php  echo $this->Html->image('alumnos/test1.jpg', ['alt' => $alumno->presentacion , 'class' => 'pull-right' , 'height' => "150" , 'width' => "150"]); ?>
	    </div>
	</div>
	<div class="separador"></div>
	
	<div class="col-lg-2 view-div borde"><?= __('DNI') ?></div>
	<div class="col-lg-4 borde"><?= h($alumno->nro_documento) ?></div>
	<div class="col-lg-2 view-div borde"><?= __('Direccion') ?></div>
	<div class="col-lg-4 borde"><?= h($alumno->direccion) ?> </div>
	<div class="col-lg-2 borde view-div"><?= __('Código Postal') ?></div>
	<div class="col-lg-4 borde "><?= h($alumno->codigo_postal) ?></div>
	<div class="col-lg-2 borde view-div"><?= __('Ciudad') ?></div>
	<div class="col-lg-4 borde"><?= h($alumno->ciudad) ?> </div>
	<div class="col-lg-2 borde view-div"><?= __('Celular') ?></div>
	<div class="col-lg-4 borde"><?= h($alumno->celular) ?></div>
	<div class="col-lg-2 borde view-div"><?= __('Télefono') ?></div>
	<div class="col-lg-4 borde"><?= h($alumno->telefono) ?> </div>
	<div class="col-lg-2 borde view-div"><?= __('Email') ?></div>
	<div class="col-lg-4 borde"><?= h($alumno->email) ?> </div>
	<div class="col-lg-2 borde view-div"><?= __('F Nac') ?></div>
	<div class="col-lg-4 borde"><?= h($alumno->fecha_nacimiento->format('d/m/Y')) ?></div>
	<div class="col-lg-2 borde view-div"><?= __('Tutor') ?></div>
	<div class="col-lg-2 borde"><?= $alumno->nombre_madre ? h($alumno->nombre_madre) : "-" ?> </div>
	<div class="col-lg-2 borde view-div"><?= __('Celular tutor') ?></div>
	<div class="col-lg-2 borde"><?=$alumno->celular_madre ? h($alumno->celular_madre) : "-"?> </div>
	<div class="col-lg-2 borde view-div"><?= __('Email tutor') ?></div>
	<div class="col-lg-2 borde"><?=$alumno->email_madre ? h($alumno->email_madre) : "-" ?> </div>
	<div class="col-lg-2 borde view-div"><?= __('Tutor 2') ?></div>
	<div class="col-lg-2 borde"><?= $alumno->nombre_padre ? h($alumno->nombre_padre) : "-" ?> </div>
	<div class="col-lg-2 borde view-div"><?= __('Celular tutor 2') ?></div>
	<div class="col-lg-2 borde"><?=$alumno->celular_padre ? h($alumno->celular_padre) : "-"?> </div>
	<div class="col-lg-2 borde view-div"><?= __('Email tutor 2') ?></div>
	<div class="col-lg-2 borde"><?=$alumno->email_padre ? h($alumno->email_padre) : "-" ?> </div>
		<div class="col-lg-2 borde view-div"><?= __('Legajo') ?></div>
	<div class="col-lg-4 borde"><?= h($alumno->id) ?> </div>
	<div class="col-lg-2 borde view-div"><?= __('Legajo anterior') ?></div>
	<div class="col-lg-4 borde"><?= h($alumno->legajo_numero) ?></div>
	<div class="col-lg-2 borde view-div"><?= __('Arancel') ?></div>
	<div class="col-lg-4 borde"><?= h($alumno->monto_arancel) ?> </div>
	<div class="col-lg-2 borde view-div"><?= __('Materiales') ?></div>
	<div class="col-lg-4 borde"><?= h($alumno->monto_materiales) ?> </div>
			<div class="col-lg-2 borde view-div"><?= __('Colegio') ?></div>
	<div class="col-lg-10 borde"><?= h($alumno->colegio) ?> </div>
			<div class="col-lg-2 borde view-div"><?= __('Alta en sistema') ?></div>
	<div class="col-lg-4 borde"><?= h($alumno->created->format('d/m/Y')) ?> </div>
			<div class="col-lg-2 borde view-div"><?= __('Modificado') ?></div>
	<div class="col-lg-4 borde"><?= h($alumno->modified->format('d/m/Y')) ?> </div>
		<div class="col-lg-2 borde view-div"><?= __('Adolecencia') ?></div>
	<div class="col-lg-2 borde"><?= $alumno->programa_adolecencia ? __('Sí') : __('No'); ?> </div>
	<div class="col-lg-2 borde view-div"><?= __('Futuro Alumno') ?></div>
	<div class="col-lg-2 borde"><?=$alumno->futuro_alumno ? __('Sí') : __('No');?> </div>
	<div class="col-lg-2 borde view-div"><?= __('Activo') ?></div>
	<div class="col-lg-2 borde"><?=$alumno->active ? __('Sí') : __('No');?> </div>
    <div class="row">
        <h4><?= __('Observación') ?></h4>
        <?= $this->Text->autoParagraph(h($alumno->observacion)); ?>
    </div>
    
    <div class="related">
        <h4><?= __('Pagos correspondientes') ?></h4>
        <?php if (!empty($alumno->pagos_alumnos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Alumno Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Monto') ?></th>
                <th scope="col"><?= __('Pagado') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($alumno->pagos_alumnos as $pagosAlumnos): ?>
            <tr>
                <td><?= h($pagosAlumnos->id) ?></td>
                <td><?= h($pagosAlumnos->alumno_id) ?></td>
                <td><?= h($pagosAlumnos->created) ?></td>
                <td><?= h($pagosAlumnos->modified) ?></td>
                <td><?= h($pagosAlumnos->monto) ?></td>
                <td><?= h($pagosAlumnos->pagado) ?></td>
                <td><?= h($pagosAlumnos->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PagosAlumnos', 'action' => 'view', $pagosAlumnos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PagosAlumnos', 'action' => 'edit', $pagosAlumnos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PagosAlumnos', 'action' => 'delete', $pagosAlumnos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pagosAlumnos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Clases inscriptas' ) ?></h4>
        <?php if (!empty($alumno->clases)): ?>
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
            <?php foreach ($alumno->clases as $clases): ?>
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
