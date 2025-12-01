<?php 


?>

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<div id="content">     
			<hr/>
		<strong>	  <p class="mb-0 text-uppercase" ><img src="includes/contraer31.png" id="mostrar19" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar19" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp; FILTRO BOTIQUÍN</p></strong></div>


<div  id="mensajefiltrobotiquin"></div>


							
	        <div id="target19" style="display:block;" class="content2">
        <div class="card">
          <div class="card-body">
      
<!--aqui inicia filtro-->

            <div class="row text-center" id="loader7" style="position: absolute;top: 140px;left: 50%"></div>
<table width="100%" border="0">
<tr>
<td width="20%" align="center">
	<span>Mostrar</span>
	<select  class="form-select mb-3" id="per_pageb" onchange="loadboti(1);">
		<option value="10" <?php if(!empty($_REQUEST['per_pageb'])){echo 'selected';} ?>>10</option>
		<option value="5" <?php if($_REQUEST['per_pageb']=='5'){echo 'selected';} ?>>5</option>
		<option value="10" <?php if($_REQUEST['per_pageb']=='10'){echo 'selected';} ?>>10</option>
		<option value="15" <?php if($_REQUEST['per_pageb']=='15'){echo 'selected';} ?>>15</option>
		<option value="20" <?php if($_REQUEST['per_pageb']=='20'){echo 'selected';} ?>>20</option>
		<option value="50" <?php if($_REQUEST['per_pageb']=='50'){echo 'selected';} ?>>50</option>
		<option value="100" <?php if($_REQUEST['per_pageb']=='100'){echo 'selected';} ?>>100</option>		
	</select>
</td>


<td width="20%" align="center">					
	<button  class="btn btn-sm btn-outline-success px-5" type="button" onclick="loadboti(1);"  href="javascript:void(0);" >BUSCAR/RESET</button>
</td>


<td width="20%" align="center">					
<span class="btn btn-sm btn-outline-success px-5" type="button" onclick="LIMPIAR6();">LIMPIAR FILTRO</span> 
</td>

	<!--onclick="location.href='pagoproveedores/clases/excel.php'"
onclick="window.open('https://www.w3.org/', '_blank');"-->


<td width="20%" align="center">
	<span>PLANTILLA</span>


	<?php

	
	?>	




</td>

</tr>
</table>
<!--<div id="mensajeINCIDctualiza2"></div> 
                  <form name="form_emil_INCIDENCIAS" id="form_emil_INCIDENCIAS">
				  
             <td ><textarea  placeholder="ESCRIBE AQUÍ TUS CORREOS SEPARADOS POR PUNTO Y COMA EJEMPLO: NOMBRE@CORREO.ES;NOMBRE@CORREO.ES" style="width: 500px;" name="EMAIL_INCIDENCIAS" id="EMAIL_INCIDENCIAS" class="form-control" aria-label="With textarea"><?php echo $EMAIL_INCIDENCIAS; ?></textarea>
            <button class="btn btn-sm btn-outline-success px-5"  type="button" id="BUTTON_INCIDENCIAS">ENVIAR POR EMAIL</button></td> -->

		<!--</form>-->
<!--aqui termina filtro-->

		<div class="datos_ajaxBO">
		</div>

</div>
</div>
</div>

<?php 
require "clasesbotiquin/script.filtro.php";
?>
