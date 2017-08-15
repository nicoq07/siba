 <style>
 	.tamano-titulo
 	{
 	font-size: 4rem;
 	}
 	
 	.tamano-encabezado
 	{
 	font-size: 2.5rem;
 	}
 	
 	.tamano-tabla
 	{
 	font-size: 2rem;
 	}
 	
 
 </style> 
<div>
	<div>
	<h3><?php h("Seguimiento del alumno")?></h3>
	</div>
	<table class = "table table-striped">
        <thead>
            <tr>
                <th class="tamano-encabezado" scope="col"><?= h("Fecha") ?></th>
                <th class="tamano-encabezado" scope="col"><?= h("Observación")?></th>
                <th class="tamano-encabezado" scope="col"><?= h("Nota")?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($seguimientos as $seguimiento): ?>
            <tr>
                <td class="tamano-tabla" ><?= h($seguimiento->fecha->format('d-m-Y')) ?></td>
                <td class="tamano-tabla"><?= h($seguimiento->observacion) ?></td>
                 <td class="tamano-tabla" ><?= $seguimiento->calificacione ? h($seguimiento->calificacione->nombre ." (".h($seguimiento->calificacione->valor)).")" : "No tiene" ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>





</div>