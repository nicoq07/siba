<div class="seguimientosClases index large-9 medium-8 columns content">
    <h3><?= __('Seguimientos Clases') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('clase_alumno_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('presente') ?></th>
                <th scope="col"><?= $this->Paginator->sort('calificacion_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($seguimientosClases as $seguimientosClase): ?>
            <tr>
                <td><?= $this->Number->format($seguimientosClase->id) ?></td>
                <td><?= $seguimientosClase->has('clases_alumno') ? $this->Html->link($seguimientosClase->clases_alumno->id, ['controller' => 'ClasesAlumnos', 'action' => 'view', $seguimientosClase->clases_alumno->id]) : '' ?></td>
                <td><?= h($seguimientosClase->presente) ?></td>
                <td><?= $seguimientosClase->has('calificacione') ? $this->Html->link($seguimientosClase->calificacione->id, ['controller' => 'Calificaciones', 'action' => 'view', $seguimientosClase->calificacione->id]) : '' ?></td>
                <td><?= h($seguimientosClase->fecha) ?></td>
                <td><?= h($seguimientosClase->created) ?></td>
                <td><?= h($seguimientosClase->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $seguimientosClase->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $seguimientosClase->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $seguimientosClase->id], ['confirm' => __('Are you sure you want to delete # {0}?', $seguimientosClase->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
