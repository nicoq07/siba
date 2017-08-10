<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Dni') ?></th>
            <td><?= h($user->dni) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($user->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apellido') ?></th>
            <td><?= h($user->apellido) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre Usuario') ?></th>
            <td><?= h($user->nombre_usuario) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= $user->has('role') ? $this->Html->link($user->role->id, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Profesor Id') ?></th>
            <td><?= $this->Number->format($user->profesor_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $user->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Pagos Alumnos') ?></h4>
        <?php if (!empty($user->pagos_alumnos)): ?>
        <table class="table">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Alumno Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Monto') ?></th>
                <th scope="col"><?= __('Pagado') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->pagos_alumnos as $pagosAlumnos): ?>
            <tr>
                <td><?= h($pagosAlumnos->id) ?></td>
                <td><?= h($pagosAlumnos->alumno_id) ?></td>
                <td><?= h($pagosAlumnos->created) ?></td>
                <td><?= h($pagosAlumnos->modified) ?></td>
                <td><?= h($pagosAlumnos->monto) ?></td>
                <td><?= h($pagosAlumnos->pagado) ?></td>
                <td><?= h($pagosAlumnos->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PagosAlumnos', 'action' => 'view', $pagosAlumnos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PagosAlumnos', 'action' => 'edit', $pagosAlumnos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PagosAlumnos', 'action' => 'delete', $pagosAlumnos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pagosAlumnos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
