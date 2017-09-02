<style>
.container-clases { border:2px solid #ccc; width:100%; height: 100px; overflow-y: scroll; }

</style>

<?= $this->assign('title', 'Nuevo alumno');?>
<div class="col-log-10">
	   <?= $this->Form->create($alumno,['type' => 'file']) ?>
	    <fieldset>
	        <legend><?= __('Nuevo alumno') ?></legend>
	      
	        <div class="col-lg-5">
	        <?php
	       	 	echo $this->Form->control('legajo_numero',['label' => 'Legajo sistema anterior']);
	        ?>
	        </div>
	        <div class="col-lg-5"> 
	         <?php
	         	echo $this->Form->control('nro_documento',['label' => 'DNI']);
			 ?>
	         </div>
	       
	        <div class="col-lg-5">
	        <?php
	        	echo $this->Form->control('nombre');
	        ?>
	        </div>
	        <div class="col-lg-5"> 
	         <?php
	         	echo $this->Form->control('apellido');
			 ?>
	         </div>
	         <div class="col-lg-10">
	        <?php
	        echo $this->Form->control('fecha_nacimiento', ['label' => 'Fecha de nacimiento', 'empty' => false, 'dateFormat' => 'DMY', 'minYear' => date('Y') - 70, 'maxYear' => date('Y') - 5 ]);
	        ?>
	        </div>
	       
	         <div class="col-lg-3"> 
	         <?php
	         echo $this->Form->control('telefono',['label' => 'Tel. Fijo']);
			 ?>
	         </div>
	        <div class="col-lg-3"> 
	         <?php
	         echo $this->Form->control('celular');
			 ?>
	         </div>
	          <div class="col-lg-4"> 
	         	<?php
	         	echo $this->Form->control('email');
			 	?>
			 </div>
	         <div class="col-lg-10">
	        <?php
	        echo $this->Form->control('direccion',['label' => 'Domicilio']);
	        ?>
	        </div>
	         <div class="col-lg-7">
	        <?php
	        echo $this->Form->control('ciudad');
	        ?>
	        </div>
	        <div class="col-lg-3"> 
	         <?php
	         echo $this->Form->control('codigo_postal',['label' => 'CP']);
			 ?>
	         </div>
	        
	        
	        
<!------------------------ SECCION PADRES -->
	         <div class="col-lg-3"> 
	         <?php
	         echo $this->Form->control('nombre_madre',['label' => 'Nombre de madre o tutor']);
			 ?>
	         </div>
	        <div class="col-lg-3"> 
	         <?php
	         echo $this->Form->control('celular_madre',['label' => 'Celular de madre o tutor']);
			 ?>
	         </div>
	         <div class="col-lg-4"> 
	         <?php
	         echo $this->Form->control('email_madre',['label' => 'Email de madre o tutor']);
			 ?>
	         </div>
	         <div class="col-lg-3"> 
	         <?php
	         echo $this->Form->control('nombre_padre',['label' => 'Nombre de padre o tutor']);
			 ?>
	         </div>
	        <div class="col-lg-3"> 
	         <?php
	         echo $this->Form->control('celular_padre',['label' => 'Celular de padre o tutor']);
			 ?>
	         </div>
	         <div class="col-lg-4"> 
	         <?php
	         echo $this->Form->control('email_padre',['label' => 'Email de padre o tutor']);
			 ?>
	         </div>
 <!------------------------ FIN SECCION PADRES -->
	         <div class="col-lg-8"> 
	         <?php
	         echo $this->Form->control('colegio');
			 ?>
	         </div> 
	         <div class="col-lg-5"> 
	         <?php
	         echo $this->Form->control('monto_arancel');
			 ?>
	         </div> 
	         <div class="col-lg-5"> 
	         <?php
	         echo $this->Form->control('monto_materiales');
			 ?>
	         </div>  
	         <div class="col-lg-10"> 
	         <div class="container-clases">
	        <?php  echo $this->Form->select('clases._ids', $clases, [
	         		'multiple' => 'checkbox'
	         ]); ?>
	         </div>
	         </div>  
	    	 <div class="col-lg-10"> 
	         <?php
	         echo $this->Form->control('observacion',['label' => 'Observación']);
			 ?>
			 </div>
			  <div class="col-lg-5"> 
			 
	         <?php
	         echo $this->Form->control('futuro_alumno');
			 ?>
	         </div>  
	         
	         <div class="col-lg-5"> 
	         <?php
	         echo $this->Form->control('programa_adolecencia',['label' => 'Adolescencia']);
			 ?>
	         </div> 
	         <div class="col-lg-5"> 
	         <?php
	         echo $this->Form->control('active',['label' => 'Activo']);
			 ?>
	         </div> 
	         <div class="col-lg-8"> 
	          <label for="foto"> Foto</label>
	         <?=
 			 $this->Form->file('foto',['label' => 'Foto']) 
 			 ?>
	         </div>
	    	<div class="col-lg-10"> 
	         <?=
 			 $this->Form->button('Guardar',['class' => 'btn-lg btn-success']) 
 			 ?>
	         </div>
	          
	         </fieldset>
	    <?= $this->Form->end() ?>
</div> 
