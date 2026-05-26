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


<!-- ... código anterior ... -->
<div id="content">
    <hr/> 
    <strong>
        <p class="mb-0 text-uppercase">
            <img src="includes/contraer31.png" id="mostrar30" onclick="loadAUT(1);" style="cursor:pointer;"/>
            <img src="includes/contraer41.png" id="ocultar30" style="cursor:pointer;"/>
            &nbsp;&nbsp;&nbsp; AUTORIZACIONES Y CONSULTA DE MIS MOVIMIENTOS DE PAGO A PROVEEDORES
          
            <span id="contador-registros" class="text-muted small" ></span>
        </p>
    </strong>
</div>
<!-- ... resto del código ... -->
<div id="mensajefiltro"></div>
<div id="pasarpagado2"></div>
</div>
<div id="target30" style="display:block;" class="content2">
	<div class="card">
		<div class="card-body">
			<!--aqui inicia filtro-->
			<div class="row text-center" id="loaderAUT" style="position: absolute;top: 140px;left: 50%"></div>
			<table width="100%" border="0">
				<tr>
<td width="30%" align="center"> 
    <span>MOSTRAR</span>
    <select class="form-select mb-3" id="per_pageAUT" onchange="loadAUT(1);">
        <option value="8" <?php if($_REQUEST['per_pageAUT']=='8') echo 'selected'; ?>>8</option>
        <option value="20" <?php if($_REQUEST['per_pageAUT']=='20') echo 'selected'; ?>>20</option>
        <option value="50" <?php if($_REQUEST['per_pageAUT']=='50') echo 'selected'; ?>>50</option>
        <option value="100"<?php if($_REQUEST['per_pageAUT']=='100')echo 'selected'; ?>>100</option>
        <option value="1000"<?php if($_REQUEST['per_pageAUT']=='1000')echo 'selected'; ?>>TODOS</option>
    </select>
</td>

						<td width="30%" align="center">
    <button class="btn btn-sm btn-outline-success px-5" type="button" onclick="loadAUT(1);">BUSCAR</button>
    &nbsp;
    <button class="btn btn-sm btn-outline-danger px-4" type="button" onclick="LIMPIAR();">🧹 LIMPIAR FILTRO</button>
</td>
					<td width="30%" align="center"> <span>PLANTILLA</span> 
					
					
						<?php
$encabezado = '<select class="form-select mb-3" id="DEPARTAMENTO2WE" required onchange="loadAUT(1);">
                <option value="">SELECCIONA UNA OPCIÓN</option>';
$options = '';

// Colores de fondo (asegurar que hay suficientes)
$fondos = array("fff0df", "f4ffdf", "dfffed", "dffeff", "dfe8ff", "efdfff", "ffdffd", "ffdfe9", "e6dfff");
$num = 0;

$queryper = $conexion->desplegablesfiltro('pagoProveedores', '');

while($row1 = mysqli_fetch_array($queryper)) {
    // Rotación de colores
    $bgColor = $fondos[$num];
    $num = ($num === count($fondos) - 1) ? 0 : $num + 1;
    
    // Verificar selección
    $selected = ($_SESSION['DEPARTAMENTO'] === $row1['nombreplantilla']) ? 'selected' : '';
    
    // Convertir a mayúsculas
    $nombre = mb_strtoupper($row1['nombreplantilla'], 'UTF-8');
    
    $options .= '<option style="background: #' . $bgColor . '" ' . $selected . 
                ' value="' . htmlspecialchars($row1['nombreplantilla']) . '">' . 
                htmlspecialchars($nombre) . '</option>';
}

echo $encabezado . $options . '</select>';
?>
					</td>
					<p><strong style="background:#ffb6c1"> ROSA:</strong> FORMAS DE PAGO DIFERENTES A (03 TRANSFERENCIA ELECTRONICA DE FONDOS)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong style="background:#fdfe87"> AMARILLO:</strong> PAGO A PROVEEDOR SIN XML </p>
				</tr>
			</table>
			<div class="datos_ajaxAUT"> </div>
		
			<!--aqui termina filtro-->

</div>
</div>
</div>

<div class="modal fade" id="modalRechazoPago" tabindex="-1" role="dialog" aria-labelledby="modalRechazoPagoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#ebf9e9;">
                <h5 class="modal-title" id="modalRechazoPagoLabel">Motivo del rechazo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrarModalRechazoPago();">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="modal_rechazo_id" value="">
                <textarea id="modal_rechazo_texto" class="form-control" rows="5" placeholder="Describe el motivo del rechazo"></textarea>
                <div id="modal_rechazo_mensaje" style="margin-top:10px;font-size:12px;color:#666;"></div>
            </div>
            <div class="modal-footer" id="modal_rechazo_footer_editar">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cerrarModalRechazoPago();">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn_guardar_rechazo_modal">Guardar</button>
            </div>
            <div class="modal-footer" id="modal_rechazo_footer_ver" style="display:none;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cerrarModalRechazoPago();">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<?php


require "clases3/script.filtro.php";
?>
