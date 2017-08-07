<div>
	<div>
	<h3><?php h("Seguimiento del alumno")?></h3>
	</div>
	<table class="table">
        <thead>
            <tr>
                <th scope="col"><?= h("Fecha") ?></th>
                <th scope="col"><?= h("Observación")?></th>
                <th scope="col"><?= h("Nota")?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($seguimientos as $seguimiento): ?>
            <tr>
                <td style="font-size: 1.5rem" ><?= h($seguimiento->fecha->format('d-m-Y')) ?></td>
                <td ><?= h($seguimiento->observacion) ?></td>
                 <td ><?= $seguimiento->calificacione ? h($seguimiento->calificacione->nombre ." ".h($seguimiento->calificacione->nombre)) : "No tiene" ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>





</div>