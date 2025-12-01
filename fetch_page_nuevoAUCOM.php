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
	<strong>
		<p class="mb-0 text-uppercase">
			<img src="includes/contraer31.png" id="mostrar3" onclick="loadCOM(1);" style="cursor:pointer;"/>
			<img src="includes/contraer41.png" id="ocultar3" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp;AUTORIZACIONES COMPROBACIÓN DE GASTOS             <span id="COM-registros" class="text-muted small" ></span>
		</p>
	</strong>
</div>

<div id="mensajefiltro">

</div>
							
<div id="target3" style="display:block;" class="content2">
	<div class="card">
		<div class="card-body">
			<!--aqui inicia filtro-->
			<div class="row text-center" id="loaderCOM" style="position: absolute;top: 140px;left: 50%"></div>
			<table width="100%" border="0">
				<tr>

<td width="30%" align="center"> 
    <span>MOSTRAR</span>
    <select class="form-select mb-3" id="per_pageCOM" onchange="loadCOM(1);">
        <option value="6"  <?php if($_REQUEST['per_pageCOM']=='6')  echo 'selected'; ?>>6</option>
        <option value="7"  <?php if($_REQUEST['per_pageCOM']=='7')  echo 'selected'; ?>>7</option>
        <option value="10" <?php if($_REQUEST['per_pageCOM']=='10') echo 'selected'; ?>>10</option>
        <option value="15" <?php if($_REQUEST['per_pageCOM']=='15') echo 'selected'; ?>>15</option>
        <option value="20" <?php if($_REQUEST['per_pageCOM']=='20') echo 'selected'; ?>>20</option>
        <option value="50" <?php if($_REQUEST['per_pageCOM']=='50') echo 'selected'; ?>>50</option>
        <option value="100"<?php if($_REQUEST['per_pageCOM']=='100')echo 'selected'; ?>>100</option>
        <option value="20000"<?php if($_REQUEST['per_pageCOM']=='20000')echo 'selected'; ?>>TODOS</option>
    </select>
</td>
					<td width="30%" align="center">					
						<button class="btn btn-sm btn-outline-success px-5" type="button" onclick="loadCOM(1);">BUSCAR</button>
					</td>
<td width="30%" align="center">
    <span>PLANTILLA</span>
    <?php
    $encabezado = '';
    $option = '';
    $queryper = $conexion->desplegablesfiltro('comprobaciones','');
    $encabezado = '<select class="form-select mb-3" id="DEPARTAMENTO2WE" required="" onchange="loadCOM(1);">
        <option value="">SELECCIONA UNA OPCIÓN</option>';
    /*linea para multiples colores*/
    $fondos = array("fff0df","f4ffdf","dfffed","dffeff","dfe8ff","efdfff","ffdffd","efdfff","ffdfe9");
    $num = 0;
    /*linea para multiples colores*/	
    while($row1 = mysqli_fetch_array($queryper)) {
        /*linea para multiples colores*/
        if($num==8) {
            $num=0;
        } else {
            $num++;
        }
        /*linea para multiples colores*/		
        $select = '';
        if($_SESSION['DEPARTAMENTO'] == $row1['nombreplantilla']) {
            $select = "selected";
        }

        // Cambio aplicado aquí: strtoupper() al texto mostrado
        $option .= '<option style="background: #'.$fondos[$num].'" '.$select.' value="'.$row1['nombreplantilla'].'">'.strtoupper($row1['nombreplantilla']).'</option>';
    }
    echo $encabezado.$option.'</select>';			
    ?>	
</td>
					<p>
						<strong style="background:#ffb6c1"> ROSA:</strong> 
						FORMAS DE PAGO DIFERENTES A (04 TARJETA)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<strong style="background:#fdfe87"> AMARILLO:</strong> 
						COMPROBACIÓN SIN XML
					</p>
				</tr>
			</table>
			<div class="datos_ajaxCOM"></div>
			<!--aqui termina filtro-->
		</div>
	</div>
</div>

<?php

require "clases/script.filtro.php";
?>