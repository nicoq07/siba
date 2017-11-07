<div class="col-lg-8 col-lg-offset-1">
	&nbsp;
    <h3><?= h($clase->presentacion) ?></h3>
    &nbsp;
    <div class="related">
    	<div class="row">
       		<div class="col-lg-6"> <h4><?= __('Alumnos en esta clase:') ?></h4> </div>
        </div>
        <?php if (!empty($clase->alumnos)): ?>
        <table class = "table table-striped">
            <tr>
                <th scope="col"><?= __('Nombre') ?></th>
                <th scope="col"><?= __('Programa Adolecencia') ?></th>
                <th scope="col"><?= __('Acción') ?></th>
            </tr>
            <?php foreach ($clase->alumnos as $alumnos): ?>
            <tr>
                <td><?= h($alumnos->presentacion) ?></td>
                <td><?= $alumnos->programa_adolecencia ? h("Sí") : h("No") ?></td>
                <td> <?= $this->Html->link(__('Cargar'), ['controller' => 'SeguimientosClasesAlumnos', 'action' => 'addProfesor',$alumnos->_joinData->id],['class' => 'btn-sm btn-info']) ?></td>
                
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
