<div class="col-lg-6 col-lg-offset-3 panel panel-info">
	<div class = "col-lg-12 panel-heading">
    	<h3><?= __('Alumnos en mis clases') ?></h3>
	</div>
	<div class="col-lg-12 panel-body" >
	    <table class= "table table-responsive">
	        <thead>
	            <tr>
	                <th  width="70%"><?= h('Nombre') ?></th>
	                <th width="30%" ><?= h('Programa Adolecencia') ?></th>
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
