<div class="seguimientosClasesAlumnos form large-9 medium-8 columns content">
    <?= $this->Form->create($seguimientosClasesAlumno) ?>
    <fieldset>
        <legend><?= __('Editar seguimiento') ?></legend>
        <?php
           // echo $this->Form->control('clase_alumno_id');
        echo $this->Form->control('observacion',[ 'onfocus' => "this.select()"]);
            echo $this->Form->control('presente');
            echo $this->Form->control('calificacion_id', ['options' => $calificaciones, 'empty' => true]);
          //  echo $this->Form->control('fecha', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
