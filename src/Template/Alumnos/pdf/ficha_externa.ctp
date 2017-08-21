<div class="col-lg-12 div-iba-ext">
	<div class="col-lg-12  header-ficha-externa">
		<div>
			<div class="div-iba-externa"><span class="texto-titulo"> <?= h("Instituto Buenos Aires") ?></span> </div>
		</div>
			<div class="div-logo-externa" >
				<div>
	    	 		<?php  echo $this->Html->image('logoIba.png', ['class' => 'pull-left' , 'height' => "150px" , 'width' => "150px",'fullBase' => true]); ?>
	    		</div>
	    	</div>
	    	<div class="div-alumno-externa"><p style="margin:0; width:100% ;font-size: 2.5rem; font-size-adjust: none; " > <?= h($alumno->presentacion) ?></p> </div>
			<div  class="div-logo-externa">
				<div>
	    	 	<?php  echo $this->Html->image('logoIba.png', ['class' => 'pull-right' , 'height' => "150" , 'width' => "150",'fullBase' => true]); ?>
	    		</div>
	    	</div>
	</div>
	<div>
		<table class="table">
			<tr>
				<td class="  text-dia-horaio" colspan="1"><?= h("Ingreso") ?></td><td style="text-align:center; " class="text-dia-horaio" colspan="2"><?= h($alumno->created->format('d/m/Y')) ?></td>
				<td class=" text-dia-horaio"  colspan="1"><?= h("Arancel") ?></td><td style="border: 4px solid; text-align:center; " class="view-div text-dia-horaio" colspan="2"><?=$alumno->monto_arancel?  h($this->Number->format($alumno->monto_arancel,[
	                                  'before' => '$',
	                                  'locale' => 'es_Ar'
	                                  ])) : "-" ?></td>
			</tr>
		</table>
	</div>
	 <div class="related separador">
        <span style="text-align:center;  font-size:1.5rem; font-style: bold; " ><?= __('Clases: ' ) ?></span>
        <?php if (!empty($alumno->clases)): ?>
        <table class="table table-striped">
            <?php foreach ($alumno->clases as $clases): ?>
            <tr>
                <td style="text-align:center;  font-size:1.5rem; font-style: bold; "><?= h($clases->presentacion) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="footer separador">
    <table>
		<tr>
			<td style="text-align:center;  font-size:2rem; font-style: bold;" colspan="3" ><span> <?=  h("José León Suarez 5246 CP(1439) - Tel: 4638-5062")?></span> </td>
		</tr>
		<tr>
			<td style="text-align:center;  font-size:1.5rem; font-style: bold; " >
				<div>
					<span>
						 <?=  h("www.ibalugano.com.ar")?>
	    			</span>
	    		</div>
	    	</td>
	    	<td style="text-align:center; font-size:1.5rem; font-style: bold;"><span > <?=  h("www.facebook.com/ibalugano")?></span> </td>
			<td style="text-align:center;  font-size:1.5rem; font-style: bold;">
				<div>
	    	 	<span ><?=  h("ibalugano@gmail.com")?></span>
	    		</div>
	    	</td>
		</tr>
	</table>
    </div>
</div>
