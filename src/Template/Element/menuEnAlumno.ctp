<div class="row separador">
<div style="margin: 5px 0px 5px 5px;"><?php  echo $this->Html->link('Editar', ['action' => 'edit', $alumno->id],['class' => 'btn btn-warning']); ?></div>
<div style="margin: 5px 0px 5px 5px;"><?php  echo $this->Html->link('Ficha externa', ['action' => 'fichaExterna', $alumno->id ,'_ext' => 'pdf'],['class' => 'btn btn-default', 'margin-top' => '10px']); ?></div>
<div style="margin: 5px 0px 5px 5px;"><?php  echo $this->Html->link('Ficha interna', ['action' => 'fichaInterna', $alumno->id ,'_ext' => 'pdf'],['class' => 'btn btn-default', 'margin-top' => '10px']); ?></div>
<div style="margin: 5px 0px 5px 5px;"><?php  echo $this->Html->link('Nuevo pago', ['controller' => 'PagosAlumnos', 'action' => 'pagoManual', $alumno->id],['class' => 'btn btn-default', 'margin-top' => '10px']); ?></div>

</div>     
	     
	     
