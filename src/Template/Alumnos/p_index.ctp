<div class="col-lg-10">
	<div class = "col-lg-8">
    	<h3><?= __('Alumnos en mis clases') ?></h3>
	</div>
	<div class=" col-lg-8" >
	    <table class= "table table-striped">
	        <thead>
	            <tr>
	                <th><?= h('Nombre') ?></th>
	                <th ><?= h('Programa Adolecencia') ?></th>
	            </tr>
	        </thead>
	        <tbody>
	            <?php foreach ($alumnos as $alumno): ?>
	            <tr>
	                <td><?= $this->Html->link($alumno->presentacion, ['action' => 'pView', $alumno->id]) ?></td>
	                <td><?=$alumno->programa_adolecencia? h("Sí") : h("No") ?></td>
	            </tr>
	            <?php endforeach; ?>
	        </tbody>
	    </table>
	   </div>
</div>
