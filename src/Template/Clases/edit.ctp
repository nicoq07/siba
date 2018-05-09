<style>
.container-clases { border:2px solid #ccc; width:100%; height: 300px; overflow-y: scroll; }

</style>
<div class="col-lg-6 col-lg-offset-3 well">
    <?= $this->Form->create($clase) ?>
    <fieldset>
        <legend><?= __('Editar clase') ?></legend>
        <?php
            echo $this->Form->control('profesor_id', ['options' => $profesores]);
            echo $this->Form->control('horario_id', ['options' => $horarios]);
            echo $this->Form->control('disciplina_id', ['options' => $disciplinas]);
            echo $this->Form->control('active',['label' => 'Activa']);
        ?>   
        <?= $this->Form->button(__('Guardar'),['class' => 'btn-lg btn-success']) ?>
    </fieldset>
    
    <?= $this->Form->end() ?>
</div>

