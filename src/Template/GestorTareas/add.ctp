	&nbsp;
<div class="col-lg-5 col-lg-offset-2 well">
    <?= $this->Form->create($gestorTarea) ?>
    <fieldset>
        <legend><?= __('Nueva tarea') ?></legend>
        <?php
            echo $this->Form->control('titulo',['label' => 'Título']);
            echo $this->Form->control('descripcion',['label' => 'Descripción']);
            echo $this->Form->control('prioridad_id', ['label' => 'Prioridad' ,  'options' => $gestorTareasPrioridad, 'empty' => true]);
            echo $this->Form->control('fecha_vencimiento', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Guardar'),['class' => 'btn-xl btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
