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
   <div class= "col-lg-12"><p class ="tamano-titulo"><?= h("Cumpleaños del mes de $month")?></p> </div>
    <table class= "table table-striped">
        <thead>
            <tr>
                <th scope="row" class = "tamano-encabezado"><?= h("Nombre") ?></th>
                <th scope="row"  class = "tamano-encabezado" ><?= h("Dia") ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alumnos as $alumno): ?>
            <tr>
                <td  class = "tamano-tabla"><?= h($alumno->presentacion)?></td>
                <td  class = "tamano-tabla"><?= h($alumno->fecha_nacimiento->format('j')) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>