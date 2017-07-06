<?php foreach ($pagosAlumnos as $pagoalumno) : ?>
<div>
	<table style="width:990px; height: 670px; border:3px solid black;">
	  <tbody>
	    <tr>
	      <td height="100%" rowspan="5" width="15%" style="padding: 0; margin:0; border:0.5px solid black;">
	      	<table height="100%">
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
	      			<td class="td-troquel" >
                        <div class="div-troquel" ><?= h("Total :")?></div> <div class="div-troquel" ><?php echo $this->Number->format($pagoalumno->monto,[
                                  'before' => '$',
                                  'locale' => 'es_Ar'
                                  ])?></div>
                    </td>
	      		</tr>
	      	</table>
		  </td>
	      <td height="45%" width="85%" style="padding: 0;">
	      	<table height="100%" width="100%" style="padding: 0; margin:0; border:1px solid black;">
			  <tbody >   
				<tr>
				  <td align="center"  height="30%" width="80%" style="border: 1px solid;"> 
					<p style="padding:0; margin:0; text-align:center; font-size: 2rem; font-style:bold;">  <?= h("I.B.A Lugano") ?> </p>
				 </td>
				  <td style="border: 1px solid;" align="center"  height="55%" width="20%" rowspan="2" >
					<?php  echo $this->Html->image('logoIba.png', ['height' => '120px', 'width' => '120px', 'fullBase' => true]); ?>
					<p style="padding:0; margin-top:5px; display:block; text-align:center; font-size: 1rem; font-style:bold; border-style:solid">  <?= h($pagoalumno->created->format('d/m/Y')) ?> </p>
				</td>
				</tr>
				<tr>
				  <td style="border: 1px solid;" align="center" height="25%" width="80%">
						<p style="padding:0; margin:0; display:block; text-align:center; font-size: 1rem; font-style:bold;">  <?= h("Instituto Buenos Aires") ?> </p>
						<p style="padding:0; margin:0; display:block; text-align:center; font-size: 1rem; font-style:bold;">  <?= h("Dir. Profesor Hugo Castro") ?> </p>
						<p style="padding:0; margin:0; display:block; text-align:center; font-size: 1rem; font-style:bold;">  <?= h("José León Suarez 5246 CP(1439) - Tel: 4638-5062") ?> </p>
				  </td>
				</tr>
				<tr>
				  <td style="border: 1px solid;" colspan="2" height="45%;" width="100%">
				  		<p style="padding:0; margin:0; display:block; text-align:left; font-size: 1rem;  font-style:bold;">  <?= h("Alumno: ") ?> </p>
				 		<p style="padding:0; margin:0; display:block; text-align:left; font-size: 1.2rem; font-style:bold;">  <?= h($pagoalumno->alumno->nombre." ".$pagoalumno->alumno->apellido) ?> </p>
				 		<?php
				 		$clases = "Cursos: ";
				 			foreach ($pagoalumno->alumno->clases as $clase):
				 			$clases .= $clase->disciplina->descripcion. " ";
				 		 endforeach;?>
				 		 <p style="padding:0; margin:0; display:block; text-align:left; font-size: 1rem; font-style:bold;">  <?= h($clases) ?> </p>
				</td>
				</tr>
			  </tbody>
			</table>
	       </td>
	    </tr>
	    <tr>
	       <td height="45%" width="85%" style="padding: 0;">
                <table  style="height:100%; width:75%; border:1px solid black;" align="left">
                  <tbody>
                    <tr  height="15%">
                      <td style="border: 1px solid;" bgcolor="" width="75%" ></td>
                    </tr>
                    <tr  height="85%">
                      <td style="border: 1px solid;" bgcolor="" width="75%"></td>
                    </tr>
                  </tbody>
                </table>
                <table style="height:100%; width:25%; border:1px solid black;" align="right">
                  <tbody>
                    <tr height="15%">
                      <td style="border: 1px solid;" bgcolor="" width="25%"> </td>
                      <td style="border: 1px solid;" bgcolor="" width="25%" ></td>
                    </tr>
                    <tr height="70%">
                      <td style="border: 1px solid;" bgcolor="" width="25%"></td>
                      <td style="border: 1px solid;" bgcolor="" width="25%"></td>
                    </tr>
                    <tr height="15%">
                      <td style="border: 1px solid;"  bgcolor="" width="25%"></td>
                      <td style="border: 1px solid;" bgcolor="" width="25%"></td>
                    </tr>
                  </tbody>
                </table>
            </td>
	    </tr>
	    <tr>
	      <td style="border: 1px solid;" height="10% " width="90%">
            
          </td>
	    </tr>
	  </tbody>
	</table>
</div>
<?php endforeach;?>