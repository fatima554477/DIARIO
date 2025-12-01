<?php

/**
 	--------------------------
	Autor: Sandor Matamoros
	Programer: Fatima Arellano
	Propietario: EPC
	----------------------------
 
*/


	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
	define("__ROOT6__", dirname(__FILE__));
$action = (isset($_POST["action"])&& $_POST["action"] !=NULL)?$_POST["action"]:"";
if($action == "ajax"){

	require(__ROOT6__."/class.filtro.php");
	$database=new orders();	

	$query=isset($_POST["query"])?$_POST["query"]:"";

	$DEPARTAMENTO = !EMPTY($_POST["DEPARTAMENTO2"])?$_POST["DEPARTAMENTO2"]:"DEFAULT";	
	$nombreTabla = "SELECT * FROM `08altaeventosfiltroDes`, 08altaeventosfiltroPLA WHERE 08altaeventosfiltroDes.id = 08altaeventosfiltroPLA.idRelacion";
	$altaeventos = "altaeventos";

	
$NUMERO_EVENTO = isset($_POST["NUMERO_EVENTO"])?$_POST["NUMERO_EVENTO"]:""; 
$NOMBRE_EVENTO = isset($_POST["NOMBRE_EVENTO"])?$_POST["NOMBRE_EVENTO"]:""; 
$FECHA_INICIO_EVENTO = isset($_POST["FECHA_INICIO_EVENTO"])?$_POST["FECHA_INICIO_EVENTO"]:""; 
$PAIS_DEL_EVENTO = isset($_POST["PAIS_DEL_EVENTO"])?$_POST["PAIS_DEL_EVENTO"]:""; 
$CIUDAD_DEL_EVENTO = isset($_POST["CIUDAD_DEL_EVENTO"])?$_POST["CIUDAD_DEL_EVENTO"]:""; 


$VEHICULOSEVE_VEHICULO = isset($_POST["VEHICULOSEVE_VEHICULO"])?$_POST["VEHICULOSEVE_VEHICULO"]:""; 
$VEHICULOSEVE_CANTIDAD = isset($_POST["VEHICULOSEVE_CANTIDAD"])?$_POST["VEHICULOSEVE_CANTIDAD"]:""; 
$VEHICULOSEVE_FOTO = isset($_POST["VEHICULOSEVE_FOTO"])?$_POST["VEHICULOSEVE_FOTO"]:""; 
$VEHICULOSEVE_ENTREGA = isset($_POST["VEHICULOSEVE_ENTREGA"])?$_POST["VEHICULOSEVE_ENTREGA"]:""; 
$VEHICULOSEVE_LUGAR = isset($_POST["VEHICULOSEVE_LUGAR"])?$_POST["VEHICULOSEVE_LUGAR"]:""; 
$VEHICULOSEVE_HORA = isset($_POST["VEHICULOSEVE_HORA"])?$_POST["VEHICULOSEVE_HORA"]:""; 
$VEHICULOSEVE_DEVOLU = isset($_POST["VEHICULOSEVE_DEVOLU"])?$_POST["VEHICULOSEVE_DEVOLU"]:""; 
$VEHICULOSEVE_LUDEVO = isset($_POST["VEHICULOSEVE_LUDEVO"])?$_POST["VEHICULOSEVE_LUDEVO"]:""; 
$VEHICULOSEVE_HORADEVO = isset($_POST["VEHICULOSEVE_HORADEVO"])?$_POST["VEHICULOSEVE_HORADEVO"]:""; 
$VEHICULOSEVE_SOLICITUD = isset($_POST["VEHICULOSEVE_SOLICITUD"])?$_POST["VEHICULOSEVE_SOLICITUD"]:""; 
$VEHICULOSEVE_DIAS = isset($_POST["VEHICULOSEVE_DIAS"])?$_POST["VEHICULOSEVE_DIAS"]:""; 
$VEHICULOSEVE_COSTO = isset($_POST["VEHICULOSEVE_COSTO"])?$_POST["VEHICULOSEVE_COSTO"]:""; 
$VEHICULOSEVE_IVA = isset($_POST["VEHICULOSEVE_IVA"])?$_POST["VEHICULOSEVE_IVA"]:""; 
$VEHICULOSEVE_SUB = isset($_POST["VEHICULOSEVE_SUB"])?$_POST["VEHICULOSEVE_SUB"]:""; 
$PRECIOPESOS_SOFTWARE = isset($_POST["PRECIOPESOS_SOFTWARE"])?$_POST["PRECIOPESOS_SOFTWARE"]:""; 
$VEHICULOSEVE_OBSERVA = isset($_POST["VEHICULOSEVE_OBSERVA"])?$_POST["VEHICULOSEVE_OBSERVA"]:""; 
$HVEHICULOSEVE = isset($_POST["HVEHICULOSEVE"])?$_POST["HVEHICULOSEVE"]:""; 

$per_page=intval($_POST["per_page"]);   
	$campos="*";
	//Variables de paginación
	$page = (isset($_POST["page"]) && !empty($_POST["page"]))?$_POST["page"]:1;
	$adjacents  = 4; //espacio entre páginas después del número de adyacentes
	$offset = ($page - 1) * $per_page;
	
	$search=array(

"NUMERO_EVENTO"=>$NUMERO_EVENTO,
"NOMBRE_EVENTO"=>$NOMBRE_EVENTO,
"FECHA_INICIO_EVENTO"=>$FECHA_INICIO_EVENTO,
"PAIS_DEL_EVENTO"=>$PAIS_DEL_EVENTO,
"CIUDAD_DEL_EVENTO"=>$CIUDAD_DEL_EVENTO,

"VEHICULOSEVE_VEHICULO"=>$VEHICULOSEVE_VEHICULO,
"VEHICULOSEVE_CANTIDAD"=>$VEHICULOSEVE_CANTIDAD,
"VEHICULOSEVE_FOTO"=>$VEHICULOSEVE_FOTO,
"VEHICULOSEVE_ENTREGA"=>$VEHICULOSEVE_ENTREGA,
"VEHICULOSEVE_LUGAR"=>$VEHICULOSEVE_LUGAR,
"VEHICULOSEVE_HORA"=>$VEHICULOSEVE_HORA,
"VEHICULOSEVE_DEVOLU"=>$VEHICULOSEVE_DEVOLU,
"VEHICULOSEVE_LUDEVO"=>$VEHICULOSEVE_LUDEVO,
"VEHICULOSEVE_HORADEVO"=>$VEHICULOSEVE_HORADEVO,
"VEHICULOSEVE_SOLICITUD"=>$VEHICULOSEVE_SOLICITUD,
"VEHICULOSEVE_DIAS"=>$VEHICULOSEVE_DIAS,
"VEHICULOSEVE_COSTO"=>$VEHICULOSEVE_COSTO,
"VEHICULOSEVE_IVA"=>$VEHICULOSEVE_IVA,
"VEHICULOSEVE_SUB"=>$VEHICULOSEVE_SUB,
"PRECIOPESOS_SOFTWARE"=>$PRECIOPESOS_SOFTWARE,
"VEHICULOSEVE_OBSERVA"=>$VEHICULOSEVE_OBSERVA,
"HVEHICULOSEVE"=>$HVEHICULOSEVE,

 "per_page"=>$per_page,
	"query"=>$query,
	"offset"=>$offset);
	//consulta principal para recuperar los datos
	$datos=$database->getData($tables,$campos,$search);
	$countAll=$database->getCounter();
	$row = $countAll;
	
	if ($row>0){
		$numrows = $countAll;;
	} else {
		$numrows=0;
	}	
	$total_pages = ceil($numrows/$per_page);
	
	
	//Recorrer los datos recuperados
		?>


		<div class="clearfix">
			<?php 
				echo "<div class='hint-text'> ".$numrows." registros</div>";
				require __ROOT6__."/pagination.php"; //include pagination class
				$pagination=new Pagination($page, $total_pages, $adjacents);
				echo $pagination->paginate();
			?>
        </div>
	<div class="table-responsive">
		<style>
    thead tr:first-child th {
        position: sticky;
        top: 0;
        background: #c9e8e8;
        z-index: 10;
    }

    thead tr:nth-child(2) td {
        position: sticky;
        top: 40px; /* Altura del primer encabezado */
        background: #e2f2f2;
        z-index: 9;
    }
</style>
<div style="max-height: 600px; overflow-y: auto;">
	 <table class="table table-striped table-bordered" >	
		<thead>
            <tr>
<th style="background:#c9e8e8;text-align:center">#</th>     
<?php /*inicia copiar y pegar iniciaA3*/ ?>

<!--<hr/><H1>HTML FILTRO .PHP A3</H1><BR/>-->
<?php 
if($database->plantilla_filtro($nombreTabla,"NUMERO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">NÚMERO DE EVENTO </th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"NOMBRE_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">NOMBRE DEL EVENTO </th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"FECHA_INICIO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">FECHA DE INICIO DEL EVENTO </th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"PAIS_DEL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">PAÍS DEL EVENTO </th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"CIUDAD_DEL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">CIUDAD DEL EVENTO </th>
<?php } ?>



<?php 
if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_VEHICULO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">VEHÍCULO </th>
<?php } ?>

<?php 
if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_CANTIDAD",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">CANTIDAD</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_FOTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">FOTO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_ENTREGA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">FECHA DE ENTREGA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_LUGAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center"> LUGAR DE ENTREGA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_HORA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center"> HORA DE ENTREGA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_DEVOLU",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center"> FECHA DE DEVOLUCIÓN</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_LUDEVO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center"> LUGAR DE DEVOLUCIÓN </th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_HORADEVO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">HORA DE DEVOLUCIÓN</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_SOLICITUD",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">FECHA DE SOLICITUD</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_DIAS",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">DIAS SOLICITADOS</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_COSTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">COSTO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_IVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center"> IVA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_SUB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center"> SUB TOTAL</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"PRECIOPESOS_SOFTWARE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">TOTAL</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_OBSERVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">OBSERVACIONES</th>
<?php } ?>



<?php /*termina copiar y terminaA3*/ ?>
            </tr>
            <tr>
<td style="background:#c9e8e8;text-align:center"></td>
<?php /*inicia copiar y pegar iniciaA4*/ ?>

<!--<hr/><H1>HTML FILTRO E INPUT .PHP A4</H1><BR/>-->
<?php  
if($database->plantilla_filtro($nombreTabla,"NUMERO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="NUMERO_EVENTO_1" value="<?php 
echo $NUMERO_EVENTO; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"NOMBRE_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="NOMBRE_EVENTO_1" value="<?php 
echo $NOMBRE_EVENTO; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"FECHA_INICIO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="FECHA_INICIO_EVENTO_1" value="<?php 
echo $FECHA_INICIO_EVENTO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"PAIS_DEL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="PAIS_DEL_EVENTO_1" value="<?php 
echo $PAIS_DEL_EVENTO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"CIUDAD_DEL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="CIUDAD_DEL_EVENTO_1" value="<?php 
echo $CIUDAD_DEL_EVENTO; ?>"></td>
<?php } ?>


<?php  
if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_VEHICULO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="VEHICULOSEVE_VEHICULO_1" value="<?php 
echo $VEHICULOSEVE_VEHICULO; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_CANTIDAD",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="VEHICULOSEVE_CANTIDAD_1" value="<?php 
echo $VEHICULOSEVE_CANTIDAD; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_FOTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="VEHICULOSEVE_FOTO_1" value="<?php 
echo $VEHICULOSEVE_FOTO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_ENTREGA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="VEHICULOSEVE_ENTREGA_1" value="<?php 
echo $VEHICULOSEVE_ENTREGA; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_LUGAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="VEHICULOSEVE_LUGAR_1" value="<?php 
echo $VEHICULOSEVE_LUGAR; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_HORA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="VEHICULOSEVE_HORA_1" value="<?php 
echo $VEHICULOSEVE_HORA; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_DEVOLU",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="VEHICULOSEVE_DEVOLU_1" value="<?php 
echo $VEHICULOSEVE_DEVOLU; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_LUDEVO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="VEHICULOSEVE_LUDEVO_1" value="<?php 
echo $VEHICULOSEVE_LUDEVO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_HORADEVO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="VEHICULOSEVE_HORADEVO_1" value="<?php 
echo $VEHICULOSEVE_HORADEVO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_SOLICITUD",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="VEHICULOSEVE_SOLICITUD_1" value="<?php 
echo $VEHICULOSEVE_SOLICITUD; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_DIAS",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="VEHICULOSEVE_DIAS_1" value="<?php 
echo $VEHICULOSEVE_DIAS; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_COSTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="VEHICULOSEVE_COSTO_1" value="<?php 
echo $VEHICULOSEVE_COSTO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_IVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="VEHICULOSEVE_IVA_1" value="<?php 
echo $VEHICULOSEVE_IVA; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_SUB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="VEHICULOSEVE_SUB_1" value="<?php 
echo $VEHICULOSEVE_SUB; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"PRECIOPESOS_SOFTWARE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="PRECIOPESOS_SOFTWARE_1" value="<?php 
echo $PRECIOPESOS_SOFTWARE; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_OBSERVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="VEHICULOSEVE_OBSERVA_1" value="<?php 
echo $VEHICULOSEVE_OBSERVA; ?>"></td>
<?php } ?>


<?php /*termina copiar y terminaA4*/ ?>
	
		<td ></td>
		<td ></td>
            </tr>			
        </thead>
		<?php 	if ($numrows<0){ ?>
		</table>
		<?php }else{ ?>		
        <tbody>
		<?php
		$finales=0;
		
		foreach ($datos as $key=>$row){


	if($row['VEHICULOSEVE_FOTO']==true){
	$urlVEHICULOSEVE_FOTO ='<a href="includes/archivos/'.$row['VEHICULOSEVE_FOTO'].'" target="_blank">VER IMAGEN</a>';
	}else{
		$urlVEHICULOSEVE_FOTO ='';
	}
?>
		<tr>
<td ><?php echo $row["id"];?></td>
<?php /*inicia copiar y pegar iniciaA5*/ ?>
<!--<hr/><H1>FOREACH FILTRO .PHP A5</H1><BR/>-->
<?php  if($database->plantilla_filtro($nombreTabla,"NUMERO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center">

<?php //echo $row['NUMERO_EVENTO'];?>

<a href="calendarioDEeventos2.php?idevento=<?php echo $row['id']; ?>"><?php echo $row['NUMERO_EVENTO'];?></a>

</td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"NOMBRE_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['NOMBRE_EVENTO'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"FECHA_INICIO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['FECHA_INICIO_EVENTO'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"PAIS_DEL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['PAIS_DEL_EVENTO'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"CIUDAD_DEL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['CIUDAD_DEL_EVENTO'];?></td>
<?php } ?>



<?php  if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_VEHICULO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $database->nombre_vehiculo($row["VEHICULOSEVE_VEHICULO"]);?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_CANTIDAD",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['VEHICULOSEVE_CANTIDAD'];?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_FOTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $urlVEHICULOSEVE_FOTO; ?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_ENTREGA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['VEHICULOSEVE_ENTREGA'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_LUGAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['VEHICULOSEVE_LUGAR'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_HORA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['VEHICULOSEVE_HORA'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_DEVOLU",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['VEHICULOSEVE_DEVOLU'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_LUDEVO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['VEHICULOSEVE_LUDEVO'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_HORADEVO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['VEHICULOSEVE_HORADEVO'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_SOLICITUD",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['VEHICULOSEVE_SOLICITUD'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_DIAS",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['VEHICULOSEVE_DIAS'];?></td>
<?php } ?>



<?php  if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_COSTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php
		$totales = 'si';
echo number_format($row['VEHICULOSEVE_COSTO'],2,'.',',');
$VEHICULOSEVE_COSTO12 += $row['VEHICULOSEVE_COSTO']; 
 ?></td>
<?php } ?>


<?php  if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_IVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php
		$totales = 'si';
echo number_format($row['VEHICULOSEVE_IVA'],2,'.',',');
$VEHICULOSEVE_IVA12 += $row['VEHICULOSEVE_IVA']; 
 ?></td>
<?php } ?>


<?php  if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_SUB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php
		$totales = 'si';
echo number_format($row['VEHICULOSEVE_SUB'],2,'.',',');
$VEHICULOSEVE_SUB12 += $row['VEHICULOSEVE_SUB']; 
 ?></td>
<?php } ?>



<?php  if($database->plantilla_filtro($nombreTabla,"PRECIOPESOS_SOFTWARE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php
		$totales = 'si';
echo number_format($row['PRECIOPESOS_SOFTWARE'],2,'.',',');
$PRECIOPESOS_SOFTWARE12 += $row['PRECIOPESOS_SOFTWARE']; 
 ?></td>
<?php } ?>




<?php  if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_OBSERVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['VEHICULOSEVE_OBSERVA'];?></td>
<?php } ?>


<?php /*termina copiar y terminaA5*/ ?>

		
		</tr>
			<?php
			$finales++;
		}	
	?>
		<?php if($database->variablespermisos('','TOTAL_DVEHICULO','ver')=='si'){ ?> 	
	<tr>
	<?php if($totales == 'si'){ ?>
<td style="text-align:right; padding-right:45px;" colspan='17'<?php echo $colspan; ?>" ><strong style="font-size:16px">TOTALES</strong></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_COSTO",$altaeventos,$DEPARTAMENTO)=="si"){  ?>
<td style="text-align:center"><strong style="font-size:16px">$<?php echo number_format($VEHICULOSEVE_COSTO12,2,'.',','); ?></strong></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_IVA",$altaeventos,$DEPARTAMENTO)=="si"){  ?>
<td style="text-align:center"><strong style="font-size:16px">$<?php echo number_format($VEHICULOSEVE_IVA12,2,'.',','); ?></strong></td>
<?php } ?>
<?php if($database->plantilla_filtro($nombreTabla,"VEHICULOSEVE_SUB",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="text-align:center"><strong style="font-size:16px">$<?php  echo number_format($VEHICULOSEVE_SUB12,2,'.',','); ?></strong></td>
<?php } ?>

<?php if($database->plantilla_filtro($nombreTabla,"PRECIOPESOS_SOFTWARE",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="text-align:center"><strong style="font-size:16px">$<?php  echo number_format($PRECIOPESOS_SOFTWARE12,2,'.',','); ?></strong></td>
<?php } ?>


</tr>
<?php } ?>	
		</tbody>
		</table>
		</div>
		<div class="clearfix">
			<?php 
				$inicios=$offset+1;
				$finales+=$inicios -1;
				echo '<div class="hint-text">Mostrando '.$inicios.' al '.$finales.' de '.$numrows.' registros</div>';
			        // Actualizar el contador con un SPAN especial para el círculo
echo '<script>
    document.getElementById("VEHICULO-registros").innerHTML = "<span class=\'circulo-contador\'>' . $numrows . '</span>";
</script>';
			?>
        </div>
	<?php
	}
}
?>
