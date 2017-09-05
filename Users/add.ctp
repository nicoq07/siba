<?= $this->assign('title','Nuevo usuario')?>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Nuevo usuario') ?></legend>
        <?php
     	   echo $this->Text->autoParagraph("Sí va a crear un usuario para un profesor, los campos nombre y apellido no son necesarios.");
            echo $this->Form->control('profesor_id', ['options' => $profesores, 'empty' => true]);
            echo $this->Form->control('nombre');
            echo $this->Form->control('apellido');
            echo $this->Form->control('nombre_usuario');
            echo $this->Form->control('password');
            echo $this->Form->control('rol_id', ['options' => $roles, 'empty' => true]);
            echo $this->Form->control('active',['label' => 'Activo']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Crear')) ?>
    <?= $this->Form->end() ?>
</div>
