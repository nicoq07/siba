<div class="examenes col-lg-5 col-lg-offset-2">
    <?= $this->Form->create($examene) ?>
    <fieldset>
        <legend><?= __('Nuevo Examen') ?></legend>
        <?php
        echo $this->Form->control('clase_alumno_id', ['options' => $clasesAlumnos, 'empty' => true,'label' => 'Clase y alumno']);
            echo $this->Form->control('periodo',['label' => 'Período']);
            echo $this->Form->control('calificacion',['options' => $calificaciones,'label' => 'Instrumento/Canto','empty' => 'No aplica']);
            echo $this->Form->control('audioperceptiva',['options' => $calificaciones,'label' => 'Lenguaje Musical','empty' => 'No aplica']);
            echo $this->Form->control('practica_ensamble',['options' => $calificaciones,'label' => 'Práctica de Conjunto','empty' => 'No aplica']);
            echo $this->Form->control('trabajos_practicos',['options' => $calificaciones,'label' => 'Trabajos Prácticos','empty' => 'No aplica']);
            echo $this->Form->control('aprobado',['label' => 'Aprueba']);
        ?>
         <?= $this->Form->button(__('Guardar e Imprimir')) ?>
    </fieldset>
   
    <?= $this->Form->end() ?>
</div>
