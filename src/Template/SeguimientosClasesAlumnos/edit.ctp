<?= $this->assign('title', 'Cargar seguimiento'); ?>
<div class="seguimientosClasesAlumnos form large-9 medium-8 columns content">
    <?= $this->Form->create($seguimientosClasesAlumno) ?>
    <fieldset>
        <legend><?= __('Editar seguimiento') ?></legend>
        <?php
           // echo $this->Form->control('clase_alumno_id');
        echo $this->Form->control('observacion',['label' => 'Observación', 'onfocus' => "this.select()"]);
            echo $this->Form->control('presente');
            echo $this->Form->control('calificacion_id', ['label' => 'Calificación', 'options' => $calificaciones, 'empty' => true]);
          //  echo $this->Form->control('fecha', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button('Guardar', ['class' => 'btn-lg btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
