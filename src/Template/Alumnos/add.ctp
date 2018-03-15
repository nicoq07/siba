<style>
.container-clases { border:2px solid #ccc; width:100%; height: 100px; overflow-y: scroll; }

 </style>
 <script type="text/javascript"> 
//en busca los dias y horarios, pero el id es de la clase
 function getDiaHorario()
 {
 	
 	var idDisciplina = $( "#disciplinas" ).val();
 	var profesor_id = $( "#profesores" ).val();
 	 $.ajax({
//  	        url: "getDiaHorario",
        url: "<?php echo \Cake\Routing\Router::url(array('controller'=>'Alumnos','action'=>'getDiaHorario'));?>",

 	        type: "get",
 	        data: {profesor_id:profesor_id,idDisciplina:idDisciplina },
 	        success: function(data) {
 	        	var array = data.split('.');
 	        	var sel = $('#clases');
 	        	sel.empty();
//  	        	sel.on('change', function (data) {
//  						mifuncion();
//  	            })
//  	            sel.attr('id', 'clases._ids');
 	           	
  	        	sel.append($("<option>").attr('value',null).text('Seleccione horario'));
 	         	$(array).each(function() {
 	        	
 	        		d = this.split('-');
 	            	 sel.append($("<option>").attr('value',d[0]).text(d[1]));
 	           	})
//  		         	div = document.createElement('div');
//  		        	$(div).addClass('input select')
//  		     	    .html(sel);
 		        	
//  		         	$('#shorario').append(div)
 	        },
 	        error: function(){
 				alert("Error");
 	        },
 	        complete: function() {
 	        }
 	    });
 }

 function buscarDisciplinas()
 {
 	
 	var profesor_id = $( "#profesores" ).val();
     $.ajax({
         //url: "getDisciplinas",
        url: "<?php echo \Cake\Routing\Router::url(array('controller'=>'Alumnos','action'=>'getDisciplinas'));?>",
         type: "get",
         data: {profesor_id:profesor_id},
         success: function(data) {

             
         	//$("#disciplinas").remove();
         	var array = data.split('.');
         //	var sel = $('<select>');
       		var sel = $('#disciplinas');
       		sel.empty();
//          	sel.on('change', function (data) {
//          		getDiaHorario();
//              })
//              sel.attr('id', 'disciplinas');
//              ;
         	sel.append($("<option>").attr('value',null).text('Seleccione disciplina'));
          	$(array).each(function() {
         	
         		d = this.split('-');
             	 sel.append($("<option>").attr('value',d[0]).text(d[1]));
            	})
            		
//  	         	div = document.createElement('div');
//  	        	$(div).addClass('input select')
//  	     	    .html(sel);
 	        	
//  	         	$('#sdisciplina').append(div)
 	         	
         },
         error: function(){
 			alert("Error buscando las disciplinas");
         },
         complete: function() {
            // alert('Disciplinas disponibles');
         }
     });
 }
</script>
<?= $this->assign('title', 'Nuevo alumno');?>

<div class="col-lg-6 col-lg-offset-3 panel panel-info" >
   <h3 style="text-align:center;" class="panel-heading"><?= __('Nuevo alumno') ?></h3>
	   <?= $this->Form->create($alumno,['type' => 'file']) ?>
	    <fieldset class="panel-body">
	    <div >
<!-- 	        <div class="col-lg-3"> -->
	        <?php
// 	       	 	//echo $this->Form->control('legajo_numero',['label' => 'Legajo sistema anterior']);
// 	        ?>
<!-- 	        </div> -->
	        <div class="col-lg-8 col-lg-offset-2"> 
	         <?php
	         	echo $this->Form->control('nro_documento',['label' => 'DNI']);
			 ?>
	         </div>
	       
	        <div class="col-lg-8 col-lg-offset-2">
	        <?php
	        	echo $this->Form->control('nombre');
	        ?>
	        </div>
	        <div class="col-lg-8 col-lg-offset-2"> 
	         <?php
	         	echo $this->Form->control('apellido');
			 ?>
	         </div>
	         <div class="col-lg-8 col-lg-offset-2">
	        <?php
	        $this->Form->templates(
	        		['dateWidget' => '{{day}}{{month}}{{year}}']
	        		);
	        echo $this->Form->control('fecha_nacimiento', ['label' => 'Fecha de nacimiento', 'empty' => false, 'type' => 'date' ,'dateFormat' => 'DMY', 'minYear' => date('Y') - 70, 'maxYear' => date('Y') - 5 ]);
	        ?>
	        </div>
	       
	         <div class="col-lg-8 col-lg-offset-2"> 
	         <?php
	         echo $this->Form->control('telefono',['label' => 'Tel. Fijo']);
			 ?>
	         </div>
	        <div class="col-lg-8 col-lg-offset-2"> 
	         <?php
	         echo $this->Form->control('celular');
			 ?>
	         </div>
	          <div class="col-lg-8 col-lg-offset-2"> 
	         	<?php
	         	echo $this->Form->control('email');
			 	?>
			 </div>
	         <div class="col-lg-8 col-lg-offset-2">
	        <?php
	        echo $this->Form->control('direccion',['label' => 'Domicilio']);
	        ?>
	        </div>
	         <div class="col-lg-8 col-lg-offset-2">
	        <?php
	        echo $this->Form->control('ciudad');
	        ?>
	        </div>
	        <div class="col-lg-8 col-lg-offset-2"> 
	         <?php
	         echo $this->Form->control('codigo_postal',['label' => 'CP']);
			 ?>
	         </div>
	        
	       </div>
	        
<!------------------------ SECCION PADRES -->
	         <div class="col-lg-8 col-lg-offset-2"> 
	         <?php
	         echo $this->Form->control('nombre_madre',['label' => 'Nombre de madre o tutor']);
			 ?>
	         </div>
	        <div class="col-lg-8 col-lg-offset-2"> 
	         <?php
	         echo $this->Form->control('celular_madre',['label' => 'Celular de madre o tutor']);
			 ?>
	         </div>
	         <div class="col-lg-8 col-lg-offset-2"> 
	         <?php
	         echo $this->Form->control('email_madre',['label' => 'Email de madre o tutor']);
			 ?>
	         </div>
	         <div class="col-lg-8 col-lg-offset-2"> 
	         <?php
	         echo $this->Form->control('nombre_padre',['label' => 'Nombre de padre o tutor']);
			 ?>
	         </div>
	        <div class="col-lg-8 col-lg-offset-2"> 
	         <?php
	         echo $this->Form->control('celular_padre',['label' => 'Celular de padre o tutor']);
			 ?>
	         </div>
	         <div class="col-lg-8 col-lg-offset-2"> 
	         <?php
	         echo $this->Form->control('email_padre',['label' => 'Email de padre o tutor']);
			 ?>
	         </div>
 <!------------------------ FIN SECCION PADRES -->
	         <div class="col-lg-8 col-lg-offset-2"> 
	         <?php
	         echo $this->Form->control('colegio');
			 ?>
	         </div> 
	         <div class="col-lg-8 col-lg-offset-2"> 
	         <?php
	         echo $this->Form->control('monto_arancel');
			 ?>
	         </div> 
	         <div class="col-lg-8 col-lg-offset-2"> 
	         <?php
	         echo $this->Form->control('monto_materiales');
			 ?>
	         </div>  
	         <div class="col-lg-12" id="div-clases"> 
		         	<div id = 'sprofesor' class= "col-lg-4">
					<?php 
			       	 echo $this->Form->control('profesores',['id' => 'profesores', 'option' => $profesores, 'label' => 'Profesores','empty' => 'Seleccione profesor','onchange' => 'buscarDisciplinas()']);
			        ?>
		         	</div>
		         	<div id = 'sdisciplina' class= "col-lg-3">
		         	   	<?php  
		         	   	echo $this->Form->label('disciplinas',['label' => 'Disciplinas']);
		         	   	echo $this->Form->select('disciplinas',['empty' => '-'],['id' => 'disciplinas','onchange' => 'getDiaHorario();']);
		         	   	?>
		         	</div>
		         	<div id = 'shorario' class= "col-lg-3">
		         			<?php  
		         			echo $this->Form->input('clases[]',['label' => 'Fecha y hora','option' => '-','empty' => '-','id' => 'clases','type' => 'select']);
			      		  ?>
			        </div>
			        <div class="col-lg-1" id="div-add" > 	<input type="button" class="btn-sm btn-info" id="btnAdd" value="+" onclick="addClase();" /></div>
	         </div>  
	    	 <div class="col-lg-12"> 
	         <?php
	         echo $this->Form->control('observacion',['label' => 'Observación']);
			 ?>
			 </div>
			  <div class="col-lg-4"> 
			 
	         <?php
	         echo $this->Form->control('futuro_alumno');
			 ?>
	         </div>  
	         
	         <div class="col-lg-4"> 
	         <?php
	         echo $this->Form->control('programa_adolecencia',['label' => 'Adolescencia']);
			 ?>
	         </div> 
	         <div class="col-lg-4"> 
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
	    	<div class="col-lg-12"> 
	         <?=
 			 $this->Form->button('Guardar',['class' => 'btn-lg btn-success','text-align' => 'center']) 
 			 ?>
	         </div>
	          
	         </fieldset>
	    <?= $this->Form->end() ?>
</div> 
