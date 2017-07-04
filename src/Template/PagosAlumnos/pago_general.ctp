<div class="col-lg-6 col-lg-offset-1">
    <?= $this->Form->create($pagosAlumnos) ?>
    <fieldset>
        <legend><?= __('Nuevo pago general') ?></legend>
        <?php
        echo $this->Form->label('tienepago', ['label' => 'Sin pagos en el mes']);
        echo $this->Form->checkbox('tienepago');
      
        ?>
        <div class="col-lg-12 separador">
           <span>
        	  	<?php echo h("Sí el alumno tiene generado un pago en el mes y no quiere volver a genera otro,   marque 'Sin pago en el mes' ")?>
           </span>
        </div>
       <?php
      		 echo $this->Form->label('mes',['label' => 'Mes']);
     		 echo $this->Form->month('mes',['type' => 'mob', 'empty' => false]);
      ?> 
        <div class="col-lg-12" id="campos_dinamicos" >
       		<div class="col-lg-10" id="div-concepto" >   <?php  echo $this->Form->control('concepto',['label' => 'Concepto']); ?> </div>
         </div>
          
        <?= $this->Form->button(__('Generar e Imprimir'),['class' => 'btn-md btn-success']) ?>
    </fieldset>
    
    <?= $this->Form->end() ?>
</div>