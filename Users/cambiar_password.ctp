<div class="users form large-5 medium-5 col-lg-offset-4">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Cambiar contraseña') ?></legend>
        <?php
            echo $this->Form->control('password',['value' => '','label' => 'Contraseña nueva']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Cambiar')) ?>
    <?= $this->Form->end() ?>
</div>
