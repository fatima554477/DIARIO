   <link href="minimal-table.css" rel="stylesheet" type="text/css">
   
       <style>
        .loader {
            display: inline-block;
            width: 16px;
            height: 16px;
            border: 3px solid rgba(255,255,255,.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
            margin-right: 8px;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        #ajax-notification {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px 25px;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            display: none;
            z-index: 10000;
        }
		
.circulo-contador {
    /* ... otros estilos ... */
    font-size: calc(10px + 0.5vw);
    width: calc(20px + 1vw);
    height: calc(20px + 1vw);
	    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background: #2ecc71;
    color: white;
    font-weight: 900;
    font-size: 17px;
    margin: 0 5px;
}

/* Estilo para el texto de paginación */
div.hint-text {
    font-size: 14px;
    color: #7f8c8d;
    padding: 8px 0;
    font-style: italic;
}
    </style>

<div id="content">     
			<hr/>
		<strong>	  <p class="mb-0 text-uppercase" ><img src="includes/contraer31.png" id="mostrar11" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar11" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp; FILTRO VEHÍCULOS</p></strong></div>





							
	        <div id="target11" style="display:block;" class="content2">
        <div class="card">
          <div class="card-body">
      
<!--aqui inicia filtro-->

            <div class="row text-center" id="loader74" style="position: absolute;top: 140px;left: 50%"></div>
<table width="100%" border="0">
<tr>
<td width="20%" align="center">
	<span>Mostrar</span>
	<select  class="form-select mb-3" id="per_pageVE" onchange="loadVEHI(1);">
		<option value="10" <?php if(!empty($_REQUEST['per_pageVE'])){echo 'selected';} ?>>10</option>
		<option value="5" <?php if($_REQUEST['per_pageVE']=='5'){echo 'selected';} ?>>5</option>
		<option value="10" <?php if($_REQUEST['per_pageVE']=='10'){echo 'selected';} ?>>10</option>
		<option value="15" <?php if($_REQUEST['per_pageVE']=='15'){echo 'selected';} ?>>15</option>
		<option value="20" <?php if($_REQUEST['per_pageVE']=='20'){echo 'selected';} ?>>20</option>
		<option value="50" <?php if($_REQUEST['per_pageVE']=='50'){echo 'selected';} ?>>50</option>
		<option value="100" <?php if($_REQUEST['per_pageVE']=='100'){echo 'selected';} ?>>100</option>		
	</select>
</td>


<td width="20%" align="center">					
	<button  class="btn btn-sm btn-outline-success px-5" type="button" onclick="loadVEHI(1);"  href="javascript:void(0);" >BUSCAR/RESET</button>
</td>


<td width="20%" align="center">					
<span class="btn btn-sm btn-outline-success px-5" type="button" onclick="LIMPIAR60();">LIMPIAR FILTRO</span> 
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

		<div class="datos_ajaxVEHI">
		</div>

</div>
</div>
</div>

<?php 
require "clasesVEHICULOS/script.filtro.php";
?>
