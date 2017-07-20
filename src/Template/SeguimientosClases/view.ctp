<div class="seguimientosClases view large-9 medium-8 columns content">
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Clase') ?></th>
            <td><?= $seguimientosClase->has('clase') ? $this->Html->link($seguimientosClase->clase->presentacion, ['controller' => 'Clases', 'action' => 'view', $seguimientosClase->clase->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Alumno') ?></th>
            <td><?= $seguimientosClase->has('alumno') ? $this->Html->link($seguimientosClase->alumno->presentacion, ['controller' => 'Alumnos', 'action' => 'view', $seguimientosClase->alumno->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Calificación') ?></th>
            <td><?= $seguimientosClase->has('calificacione') ? $this->Html->link($seguimientosClase->calificacione->id, ['controller' => 'Calificaciones', 'action' => 'view', $seguimientosClase->calificacione->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha de clase') ?></th>
            <td><?= __(date("l",strtotime($seguimientosClase->fecha->format('d-m-Y')))) . " " .h($seguimientosClase->fecha->format('d-m-Y')) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha de creación de seguimiento') ?></th>
            <td><?= h($seguimientosClase->created->format('d-m-Y')) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha de modificación de seguimiento') ?></th>
            <td><?= h($seguimientosClase->modified->format('d-m-Y')) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Presente') ?></th>
            <td><?= $seguimientosClase->presente ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Observacion') ?></h4>
        <?= $this->Text->autoParagraph(h($seguimientosClase->observacion)); ?>
    </div>
</div>
