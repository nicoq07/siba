<div class="col-lg-6 col-lg-offset-1">
    <?= $this->Form->create($disciplina) ?>
    <fieldset>
        <legend><?= __('Nueva disciplina') ?></legend>
        <?php
            echo $this->Form->control('descripcion');
            echo $this->Form->control('active',['label' => 'Activa']);
        ?>
        <?= $this->Form->button(__('Guardar'),['class' => 'btn-lg btn-success']) ?>
    </fieldset>
    
    <?= $this->Form->end() ?>
</div>
