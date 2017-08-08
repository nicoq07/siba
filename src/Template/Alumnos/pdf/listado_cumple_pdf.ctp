   
   <div class= "col-lg-12"><h2><?= h("Cumpleaños del mes $month")?></h2> </div>
    <table class= "table">
        <thead>
            <tr>
                <th scope="row"><?= h("Nombre") ?></th>
                <th scope="row"><?= h("Dia") ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alumnos as $alumno): ?>
            <tr>
                <td><?= h($alumno->presentacion)?></td>
                <td><?= h($alumno->fecha_nacimiento->format('j')) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>