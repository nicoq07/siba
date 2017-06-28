<div class="A6">
	<table class="tabla-header-ficha-externa">
		<tr>
			<td class="encabezado-externa" colspan="3" ><span class="title"> <?= h("Instituto Buenos Aires") ?></span> </td>
		</tr>
		<tr>
			<td class="logo-externa" ><div>
	    	 	<?php  echo $this->Html->image('logoIba.png', ['class' => 'pull-left' , 'height' => "150" , 'width' => "180",'fullBase' => true]); ?>
	    		</div>
	    	</td>
	    	<td class="presentacion-externa" ><span class="title"> <?= h($alumno->presentacion) ?></span> </td>
			<td class="logo-externa">
				<div>
	    	 	<?php  echo $this->Html->image('logoIba.png', ['class' => 'pull-right' , 'height' => "150" , 'width' => "180",'fullBase' => true]); ?>
	    		</div>
	    	</td>
		</tr>
	</table>
	<table class="table">
		<tr>
			<td class="view-div   td-externa-general" colspan="1"><?= h("Ingreso") ?></td><td style="text-align:center; " class="td-externa-general" colspan="2"><?= h($alumno->created->format('d/m/Y')) ?></td>
			<td class="view-div td-externa-general"  colspan="1"><?= h("Arancel") ?></td><td style="border: 4px solid; text-align:center; " class="view-div td-externa-general" colspan="2"><?=$alumno->monto_arancel?  h($alumno->monto_arancel) : "-" ?></td>
		</tr>
	</table>
	 <div class="related separador">
        <span class="encabezado-externa" ><?= __('Clases: ' ) ?></span>
        <?php if (!empty($alumno->clases)): ?>
        <table class="table table-striped">
            <?php foreach ($alumno->clases as $clases): ?>
            <tr>
               
                <td  class="td-externa-general"><?= h($clases->presentacion) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related separador">
    <table>
		<tr>
			<td style="text-align:center;  font-size:2rem; font-style: bold;" colspan="3" ><span class="title"> <?=  h("José León Suarez 5246 CP(1439) - Tel: 4638-5062")?></span> </td>
		</tr>
		<tr>
			<td style="text-align:center;  font-size:2rem; font-style: bold; " >
				<div>
					<span class="title">
						 <?=  h("www.ibalugano.com.ar")?>
	    			</span>
	    		</div>
	    	</td>
	    	<td style="text-align:center; font-size:2rem; font-style: bold;"><span class="title"> <?=  h("www.facebook.com/ibalugano")?></span> </td>
			<td style="text-align:center;  font-size:2rem; font-style: bold;">
				<div>
	    	 	<span class="title"><?=  h("ibalugano@gmail.com")?></span>
	    		</div>
	    	</td>
		</tr>
	</table>
    </div>
</div>
