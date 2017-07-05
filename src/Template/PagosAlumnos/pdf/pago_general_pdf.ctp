<?php foreach ($pagosAlumnos as $pagoalumno) : ?>
<div>
	<table style="width:2600px; height: 1630px" class="table tabla-borde-solid" border="1">
	
	  <tbody>
	    <tr>
	      <td height="1630px" rowspan="5" width="300px" >
	      	<table class="table" border="1">
	      		<tr>
	      			<td class="td-troquel" ><div class="div-troquel"> <?= h($pagoalumno->created->format('d/m/y'))?> </div></td>
	      		</tr>
	      		<tr>
	      			<td class="td-troquel" ><div class="div-troquel" ><?= h("Código : ")?></div><div class="div-troquel"><?= h($pagoalumno->id)?></div> </td>
	      		</tr>
	      		<tr>
	      			<td class="td-troquel" ><div class="div-troquel" ><?= h($pagoalumno->alumno->nombre) ;?></div><div class="div-troquel" > <?=  h($pagoalumno->alumno->apellido)?></div></td>
	      		</tr>
	      		<tr>
	      			<td class="td-troquel" ><div class="div-troquel" ><?= h("Mes :")?></div> <div class="div-troquel" ><?php echo date('F', strtotime(date('Y')."-".$pagoalumno->mes."-01"))?></div></td>
	      		</tr>
	      		<tr>
	      			<td class="td-troquel" ></td>
	      		</tr>
	      		<tr>
	      			<td class="td-troquel" ></td>
	      		</tr>
	      		<tr>
	      			<td class="td-troquel" ><div class="div-troquel" ><?= h("Total :")?></div> <div class="div-troquel" ><?php echo $this->Number->format($pagoalumno->monto,[
                                  'before' => '$',
                                  'locale' => 'es_Ar'
                                  ])?></div></td>
	      		</tr>
	      	
	      	</table>
		  </td>
	      	<td width="2300px" height="630px">
	      	<table style="width:2300px; height: 830px; padding: 0;" border="1">
			  <tbody >
				<tr>
				  <td align="center"  height="300px" width="1950">
					<p style="padding:0; margin:0; text-align:center; font-size: 7rem; font-style:bold;">  <?= h("I.B.A Lugano") ?> </p>
				 </td>
				  <td align="center"  height="500px" width="350" rowspan="2" >
					<?php  echo $this->Html->image('logoIba.png', ['height' => "350" , 'width' => "350",'fullBase' => true]); ?>
					<p style="padding:0; margin-top:50px; display:block; text-align:center; font-size: 2.5rem; font-style:bold; border-style:solid">  <?= h($pagoalumno->created->format('d/m/Y')) ?> </p>
				</td>
				</tr>
				<tr>
				  <td align="center" height="200px;" width="1950">
						<p style="padding:0; margin:0; display:block; text-align:center; font-size: 3rem; font-style:bold;">  <?= h("Instituto Buenos Aires") ?> </p>
						<p style="padding:0; margin:0; display:block; text-align:center; font-size: 3rem; font-style:bold;">  <?= h("Dir. Profesor Hugo Castro") ?> </p>
						<p style="padding:0; margin:0; display:block; text-align:center; font-size: 2rem; font-style:bold;">  <?= h("José León Suarez 5246 CP(1439) - Tel: 4638-5062") ?> </p>
				  </td>
				</tr>
				<tr>
				  <td colspan="2" height="330px;" width="2300px">
				  		<p style="padding:0; margin:0; display:block; text-align:left; font-size: 2.5rem; font-style:bold;">  <?= h("Alumno: ") ?> </p>
				 		<p style="padding:0; margin:0; display:block; text-align:left; font-size: 3rem; font-style:bold;">  <?= h($pagoalumno->alumno->nombre." ".$pagoalumno->alumno->apellido) ?> </p>
				 		<p style="padding:0; margin:0; display:block; text-align:left; font-size: 2.5rem; font-style:bold;">  <?= h("Cursos: ") ?> </p>
				 		<?php foreach ($pagoalumno->alumno->clases as $clase):
				 			$clases = $clase->descripcion . " " . $clases;
				 		 endforeach;?>
				  </td>
				</tr>
			  </tbody>
			</table>
	       </td>
	    </tr>
	    <tr>
	      <td width="2300" height="800px">
	        <table align="right" style=" height:800px;  width:350px;" border="1">
	          <tbody>
	            <tr height="50px">
	              <td width="175px" align="center" bgcolor="#E3CCCE"> </td>
	              <td width="175px" >&nbsp;</td>
	            </tr>
	            <tr>
	              <td height="600px">&nbsp;</td>
	              <td height="600px">&nbsp;</td>
	            </tr>
	            <tr height="50px">
	              <td>&nbsp;</td>
	              <td>&nbsp;</td>
	            </tr>
	          </tbody>
	        </table>
	
	      </td>
	    </tr>
	    <tr>
	      <td bgcolor="#4F224B" height="100px" width="2300">&nbsp;</td>
	    </tr>
	  </tbody>
	</table>
</div>
<?php endforeach;?>