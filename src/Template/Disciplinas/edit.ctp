<div class="col-lg-5 col-lg-offset-2">
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
