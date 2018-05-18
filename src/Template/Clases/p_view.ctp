<div class="col-lg-7 col-lg-offset-2 panel panel-info">
	&nbsp;
    <h3 class="panel panel-heading" ><?= h($clase->presentacion) ?></h3>
    &nbsp;
    	<div class="row">
       		<div class="col-lg-6"> <h4><?= __('Alumnos en esta clase:') ?></h4> </div>
        </div>
        <?php if (!empty($clase->alumnos)): ?>
        <table class = "table table-striped">
            <tr>
                <th width="60%" scope="col"><?= __('Nombre') ?></th>
                <th width="20%" scope="col"><?= __('Programa Adolecencia') ?></th>
                <th width="20%" scope="col"><?= __('Acción') ?></th>
            </tr>
            <?php foreach ($clase->alumnos as $alumnos): ?>
            <tr>
                <td><?= h($alumnos->presentacion) ?></td>
                <td><?= $alumnos->programa_adolecencia ? h("Sí") : h("No") ?></td>
                <?php foreach ($clasesAlumnos as $ca): ?>
                <?php if ($alumnos->_joinData->id == $ca->id) :?>
                	<?php if  ($ca->seguimientos_clases_alumnos[0]->created == $ca->seguimientos_clases_alumnos[0]->modified) :?>
               			 <td> <?= $this->Html->link(__('Cargar'), ['controller' => 'SeguimientosClasesAlumnos', 'action' => 'addProfesor',$alumnos->_joinData->id],['class' => 'btn-sm btn-info']) ?></td>
                	 <?php else: ?>
              	    	 <td class='success text-center'><?php echo h('Ya cargado');?></td>
                	<?php endif; ?>
                <?php endif;?>
                <?php endforeach; ?>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
</div>
