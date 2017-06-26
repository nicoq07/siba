<div class="col-lg-10">
    <h3><?= h($clase->presentacion) ?></h3>
    <div class="related">
    	<div class="row">
       		<div class="col-lg-6"> <h4><?= __('Alumnos en esta clase') ?></h4> </div>
       		<div class="col-lg-3 pull-right">  <?= $this->Html->link(__('Editar clase'), ['action' => 'edit', $clase->id],['class' => 'btn btn-warning']) ?></div>
        </div>
        <?php if (!empty($clase->alumnos)): ?>
        <table class = "table table-striped">
            <tr>
                <th scope="col"><?= __('Nombre') ?></th>
                <th scope="col"><?= __('Programa Adolecencia') ?></th>
                <th scope="col"><?= __('Futuro Alumno') ?></th>
                <th scope="col"><?= __('Activo') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
            <?php foreach ($clase->alumnos as $alumnos): ?>
            <tr>
                <td><?= h($alumnos->presentacion) ?></td>
                <td><?= $alumnos->programa_adolecencia ? h("Sí") : h("No") ?></td>
                <td><?= $alumnos->futuro_alumno ? h("Sí") : h("No")?></td>
                <td><?= $alumnos->active ? h("Sí") : h("No")?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['controller' => 'Alumnos', 'action' => 'view', $alumnos->id],['class' => 'btn-sm btn-info']) ?>
                    <?= $this->Html->link(__('Editar'), ['controller' => 'Alumnos', 'action' => 'edit', $alumnos->id],['class' => 'btn-sm btn-warning']) ?>
                    <?= $this->Form->postLink(__('Borrar'),['controller' => 'Alumnos', 'action' => 'delete', $alumnos->id],['class' => 'btn-sm btn-danger','confirm' => __('Dar de baja a {0}?', $alumnos->presentacion)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
