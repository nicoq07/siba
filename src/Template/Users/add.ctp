<?= $this->assign('title','Nuevo usuario')?>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Nuevo usuario') ?></legend>
        <?php
            echo $this->Form->control('profesor_id', ['options' => $profesores, 'empty' => true]);
            echo $this->Form->control('nombre_usuario');
            echo $this->Form->control('password');
            echo $this->Form->control('rol_id', ['options' => $roles, 'empty' => true]);
            echo $this->Form->control('active',['label' => 'Activo']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Crear')) ?>
    <?= $this->Form->end() ?>
</div>
