<div class="col-lg-8">
    <h3><?= h("Pago de ". h(date('F', strtotime(date('Y')."-".$pagosAlumno->mes."-01"))) ." de : " . $pagosAlumno->alumno->presentacion) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Recibido por :') ?></th>
            <td><?= $pagosAlumno->has('user') ? $this->Html->link($pagosAlumno->user->id, ['controller' => 'Users', 'action' => 'view', $pagosAlumno->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Código') ?></th>
            <td><?= $this->Number->format($pagosAlumno->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Monto') ?></th>
            <td><?= $this->Number->format($pagosAlumno->monto) ?></td>
        </tr>
       
        <tr>
            <th scope="row"><?= __('Generado') ?></th>
            <td><?= h($pagosAlumno->created->format('d/m/Y')) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Última vez modificado') ?></th>
            <td><?= h($pagosAlumno->modified->format('d/m/Y')) ?></td>
        </tr>
         <tr>
            <th scope="row"><?= __('Fecha pagado') ?></th>
            <td><?= $pagosAlumno->fecha_pagado ? h($pagosAlumno->fecha_pagado->format('d/m/Y')) : h("Sin datos") ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pagado') ?></th>
            <td><?= $pagosAlumno->pagado ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
