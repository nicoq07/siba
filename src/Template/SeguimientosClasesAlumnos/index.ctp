<div class="seguimientosClasesAlumnos index large-9 medium-8 columns content">
    <h3><?= __('Seguimientos Clases Alumnos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('clase_alumno_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('presente') ?></th>
                <th scope="col"><?= $this->Paginator->sort('calificacion_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($seguimientosClasesAlumnos as $seguimientosClasesAlumno): ?>
            <tr>
                <td><?= $this->Number->format($seguimientosClasesAlumno->clase_alumno_id) ?></td>
                <td><?= h($seguimientosClasesAlumno->presente) ?></td>
                <td><?= $seguimientosClasesAlumno->has('calificacione') ? $this->Html->link($seguimientosClasesAlumno->calificacione->id, ['controller' => 'Calificaciones', 'action' => 'view', $seguimientosClasesAlumno->calificacione->id]) : '' ?></td>
                <td><?= h($seguimientosClasesAlumno->fecha) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $seguimientosClasesAlumno->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $seguimientosClasesAlumno->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $seguimientosClasesAlumno->id], ['confirm' => __('Are you sure you want to delete # {0}?', $seguimientosClasesAlumno->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?=  $this->element('footer')?>