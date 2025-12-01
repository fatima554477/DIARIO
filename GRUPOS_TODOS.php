<div id="content">     
			<hr/>
		<strong>	  <p class="mb-0 text-uppercase" ><img src="includes/contraer31.png" id="mostrar8" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar8" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp;BUZON POR GRUPO </strong>


</div >
									
							
	        <div id="target8" style="display:block;" class="content2">
        <div class="card">
          <div class="card-body">
  







<div class='table-responsive'>
<div align='right'>
</div>
<br />
<div id='employee_table'>
<tbody= 'font-style:italic;'>
<table class="table table-striped table-bordered" style="width:100%" id='reset_SOLICITUD' name='reset_SOLICITUD'>
<tr style='background:#f5f9fc;text-align:center'>
<th width="10%"style="background:#c9e8e8">NOMBRE COLABORADOR</th>  
<th width="20%"style="background:#c9e8e8">OBSERVACIONES</th>
<th width="20%"style="background:#c9e8e8">DEPARTAMENTO</th>
<th width="20%"style="background:#c9e8e8">FECHA</th>
<th width="20%"style="background:#c9e8e8">GRUPO DE TRABAJO</th>

</tr>
<?php 
$respuesta1 = $SOLICITUD->diario_match_colaborador();
while($row = mysqli_fetch_array($respuesta1, MYSQLI_ASSOC)){
$respuesta2 = $SOLICITUD->diario_match_GRUPO($row['grupo']);
while($row2 = mysqli_fetch_array($respuesta2, MYSQLI_ASSOC)){
?>
<tr style='background:#f5f9fc;text-align:center; background: #<?php //echo $fondos[$num];?>' >

<td ><?php echo $row2["nombreDiario"]; ?></td>
<td ><?php echo $row2["OBSERVACIONES_SOLICITUD"]; ?></td>
<td ><?php echo $row2["departamentoDiario"]; ?></td>
<td ><?php echo $row2["FECHA_SOLICITUD"]; ?></td>
<td ><?php echo $row2["grupo"]; ?></td>
</tr>
<?php
}
}
?>

</table>


</tbody>

</form>
</div>
</div>

















</div>
</div>

</div>



