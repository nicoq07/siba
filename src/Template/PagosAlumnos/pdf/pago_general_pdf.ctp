<?php foreach ($pagosAlumnos as $pagoalumno) : ?>

<table style="width:2600px; height: 1750px" border="1">
  <tbody>
    <tr>
      <td rowspan="5" width="300px">
      	<table border = "0">
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
      			<td class="td-troquel" ><div class="div-troquel" ><?= h("Total :")?></div> <div class="div-troquel" ><?php echo $pagoalumno->monto?></div></td>
      		</tr>
      	
      	</table>
	  		
	  		
	  		
	  		
	  		
	  		
	  		
	  		
	  		
	  		
	  </td>
      	<td width="2300px" height="400px">
      	<table style="width:2300px; height: 400px; padding: 0" border="0">
		  <tbody >
			<tr>
			  <td bgcolor="#FF2626" height="200px;" width="1950">A</td>
			  <td align="center"  width="350" rowspan="3" >
				<?php  echo $this->Html->image('logoIba.png', ['height' => "350" , 'width' => "350",'fullBase' => true]); ?>
			</td>
			</tr>
			<tr>
			  <td bgcolor="#D80000" height="100px;" width="1950">B</td>
			</tr>
			<tr>
			  <td bgcolor="#B10000" height="100px;" width="1950">C</td>
			</tr>
		  </tbody>
		</table>
       </td>
    </tr>
    <tr>
      <td height="100px" width="2300">
      	
      </td>
    </tr>
    <tr>
      <td height="100px"  width="2300" >
    </td>
    </tr>
    <tr>
      <td width="2300" height="1000px">
        <table align="right" style=" height:1000px;  width:350px;" border="1">
          <tbody>
            <tr height="50px">
              <td width="175px" align="center" bgcolor="#E3CCCE"> </td>
              <td width="175px" >&nbsp;</td>
            </tr>
            <tr>
              <td height="800px">&nbsp;</td>
              <td height="800px">&nbsp;</td>
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
<?php endforeach;?>