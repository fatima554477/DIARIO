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

$MATERIAL_EQUIPO = isset($_POST["MATERIAL_EQUIPO"])?$_POST["MATERIAL_EQUIPO"]:""; 
$MATERIAL_CANTIDAD = isset($_POST["MATERIAL_CANTIDAD"])?$_POST["MATERIAL_CANTIDAD"]:""; 
$MATERIAL_FOTO = isset($_POST["MATERIAL_FOTO"])?$_POST["MATERIAL_FOTO"]:""; 
$MATERIAL_ENTREGA = isset($_POST["MATERIAL_ENTREGA"])?$_POST["MATERIAL_ENTREGA"]:""; 
$MATERIAL_LUGAR = isset($_POST["MATERIAL_LUGAR"])?$_POST["MATERIAL_LUGAR"]:""; 
$MATERIAL_HORA = isset($_POST["MATERIAL_HORA"])?$_POST["MATERIAL_HORA"]:""; 
$MATERIAL_DEVOLU = isset($_POST["MATERIAL_DEVOLU"])?$_POST["MATERIAL_DEVOLU"]:""; 
$MATERIAL_LUDEVO = isset($_POST["MATERIAL_LUDEVO"])?$_POST["MATERIAL_LUDEVO"]:""; 
$MATERIAL_HORADEVO = isset($_POST["MATERIAL_HORADEVO"])?$_POST["MATERIAL_HORADEVO"]:""; 
$MATERIAL_SOLICITUD = isset($_POST["MATERIAL_SOLICITUD"])?$_POST["MATERIAL_SOLICITUD"]:""; 
$MATERIAL_DIAS = isset($_POST["MATERIAL_DIAS"])?$_POST["MATERIAL_DIAS"]:""; 
$MATERIAL_COSTO = isset($_POST["MATERIAL_COSTO"])?$_POST["MATERIAL_COSTO"]:""; 
$MATERIAL_IVA = isset($_POST["MATERIAL_IVA"])?$_POST["MATERIAL_IVA"]:""; 
$MATERIAL_SUB = isset($_POST["MATERIAL_SUB"])?$_POST["MATERIAL_SUB"]:""; 
$MATERIAL_TOTAL = isset($_POST["MATERIAL_TOTAL"])?$_POST["MATERIAL_TOTAL"]:""; 
$MATERIAL_OBSERVA = isset($_POST["MATERIAL_OBSERVA"])?$_POST["MATERIAL_OBSERVA"]:""; 
$HMATERIAL = isset($_POST["HMATERIAL"])?$_POST["HMATERIAL"]:""; 

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


"MATERIAL_EQUIPO"=>$MATERIAL_EQUIPO,
"MATERIAL_CANTIDAD"=>$MATERIAL_CANTIDAD,
"MATERIAL_FOTO"=>$MATERIAL_FOTO,
"MATERIAL_ENTREGA"=>$MATERIAL_ENTREGA,
"MATERIAL_LUGAR"=>$MATERIAL_LUGAR,
"MATERIAL_HORA"=>$MATERIAL_HORA,
"MATERIAL_DEVOLU"=>$MATERIAL_DEVOLU,
"MATERIAL_LUDEVO"=>$MATERIAL_LUDEVO,
"MATERIAL_HORADEVO"=>$MATERIAL_HORADEVO,
"MATERIAL_SOLICITUD"=>$MATERIAL_SOLICITUD,
"MATERIAL_DIAS"=>$MATERIAL_DIAS,
"MATERIAL_COSTO"=>$MATERIAL_COSTO,
"MATERIAL_IVA"=>$MATERIAL_IVA,
"MATERIAL_SUB"=>$MATERIAL_SUB,
"MATERIAL_TOTAL"=>$MATERIAL_TOTAL,
"MATERIAL_OBSERVA"=>$MATERIAL_OBSERVA,
"HMATERIAL"=>$HMATERIAL,

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
if($database->plantilla_filtro($nombreTabla,"MATERIAL_EQUIPO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">MATERIAL </th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MATERIAL_CANTIDAD",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">CANTIDAD</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MATERIAL_FOTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">FOTO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MATERIAL_ENTREGA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">FECHA DE ENTREGA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MATERIAL_LUGAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center"> LUGAR DE ENTREGA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MATERIAL_HORA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center"> HORA DE ENTREGA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MATERIAL_DEVOLU",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center"> FECHA DE DEVOLUCIÓN</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MATERIAL_LUDEVO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center"> LUGAR DE DEVOLUCIÓN </th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MATERIAL_HORADEVO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">HORA DE DEVOLUCIÓN</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MATERIAL_SOLICITUD",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">FECHA DE SOLICITUD</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MATERIAL_DIAS",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">DIAS SOLICITADOS</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MATERIAL_COSTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">COSTO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MATERIAL_IVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center"> IVA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MATERIAL_SUB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center"> SUB TOTAL</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MATERIAL_TOTAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">TOTAL</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MATERIAL_OBSERVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">OBSERVACIONES</th>
<?php } ?>



<?php /*termina copiar y terminaA3*/ ?>
            </tr>
            <tr>
<td style="background:#c9e8e8;text-align:center"></td>
<?php /*inicia copiar y pegar iniciaA4*/ ?>

<!--<hr/><H1>HTML FILTRO E INPUT .PHP A4</H1><BR/>-->
<?php  
if($database->plantilla_filtro($nombreTabla,"NUMERO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="NUMERO_EVENTO_3" value="<?php 
echo $NUMERO_EVENTO; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"NOMBRE_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="NOMBRE_EVENTO_3" value="<?php 
echo $NOMBRE_EVENTO; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"FECHA_INICIO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="FECHA_INICIO_EVENTO_3" value="<?php 
echo $FECHA_INICIO_EVENTO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"PAIS_DEL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="PAIS_DEL_EVENTO_3" value="<?php 
echo $PAIS_DEL_EVENTO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"CIUDAD_DEL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="CIUDAD_DEL_EVENTO_3" value="<?php 
echo $CIUDAD_DEL_EVENTO; ?>"></td>
<?php } ?>

<?php  
if($database->plantilla_filtro($nombreTabla,"MATERIAL_EQUIPO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MATERIAL_EQUIPO_3" value="<?php 
echo $MATERIAL_EQUIPO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MATERIAL_CANTIDAD",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MATERIAL_CANTIDAD_3" value="<?php 
echo $MATERIAL_CANTIDAD; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MATERIAL_FOTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MATERIAL_FOTO_3" value="<?php 
echo $MATERIAL_FOTO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MATERIAL_ENTREGA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MATERIAL_ENTREGA_3" value="<?php 
echo $MATERIAL_ENTREGA; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MATERIAL_LUGAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MATERIAL_LUGAR_3" value="<?php 
echo $MATERIAL_LUGAR; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MATERIAL_HORA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MATERIAL_HORA_3" value="<?php 
echo $MATERIAL_HORA; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MATERIAL_DEVOLU",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MATERIAL_DEVOLU_3" value="<?php 
echo $MATERIAL_DEVOLU; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MATERIAL_LUDEVO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MATERIAL_LUDEVO_3" value="<?php 
echo $MATERIAL_LUDEVO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MATERIAL_HORADEVO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MATERIAL_HORADEVO_3" value="<?php 
echo $MATERIAL_HORADEVO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MATERIAL_SOLICITUD",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MATERIAL_SOLICITUD_3" value="<?php 
echo $MATERIAL_SOLICITUD; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MATERIAL_DIAS",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MATERIAL_DIAS_3" value="<?php 
echo $MATERIAL_DIAS; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MATERIAL_COSTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MATERIAL_COSTO_3" value="<?php 
echo $MATERIAL_COSTO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MATERIAL_IVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MATERIAL_IVA_3" value="<?php 
echo $MATERIAL_IVA; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MATERIAL_SUB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MATERIAL_SUB_3" value="<?php 
echo $MATERIAL_SUB; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MATERIAL_TOTAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MATERIAL_TOTAL_3" value="<?php 
echo $MATERIAL_TOTAL; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MATERIAL_OBSERVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MATERIAL_OBSERVA_3" value="<?php 
echo $MATERIAL_OBSERVA; ?>"></td>
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

	
	if($row['MATERIAL_FOTO']==true){
	$urlMATERIAL_FOTO ='<a href="includes/archivos/'.$row['MATERIAL_FOTO'].'" target="_blank">VER IMAGEN</a>';
	}else{
		$urlMATERIAL_FOTO ='';
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



<?php  if($database->plantilla_filtro($nombreTabla,"MATERIAL_EQUIPO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $database->nombre_materiales($row["MATERIAL_EQUIPO"]);?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"MATERIAL_CANTIDAD",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MATERIAL_CANTIDAD'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"MATERIAL_FOTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $urlMATERIAL_FOTO; ?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"MATERIAL_ENTREGA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MATERIAL_ENTREGA'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"MATERIAL_LUGAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MATERIAL_LUGAR'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"MATERIAL_HORA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MATERIAL_HORA'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"MATERIAL_DEVOLU",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MATERIAL_DEVOLU'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"MATERIAL_LUDEVO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MATERIAL_LUDEVO'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"MATERIAL_HORADEVO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MATERIAL_HORADEVO'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"MATERIAL_SOLICITUD",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MATERIAL_SOLICITUD'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"MATERIAL_DIAS",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MATERIAL_DIAS'];?></td>
<?php } ?>


<?php  if($database->plantilla_filtro($nombreTabla,"MATERIAL_COSTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php
		$totales = 'si';
echo number_format($row['MATERIAL_COSTO'],2,'.',',');
$MATERIAL_COSTO12 += $row['MATERIAL_COSTO']; 
 ?></td>
<?php } ?>


<?php  if($database->plantilla_filtro($nombreTabla,"MATERIAL_IVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php
		$totales = 'si';
echo number_format($row['MATERIAL_IVA'],2,'.',',');
$MATERIAL_IVA12 += $row['MATERIAL_IVA']; 
 ?></td>
<?php } ?>


<?php  if($database->plantilla_filtro($nombreTabla,"MATERIAL_SUB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php
		$totales = 'si';
echo number_format($row['MATERIAL_SUB'],2,'.',',');
$MATERIAL_SUB12 += $row['MATERIAL_SUB']; 
 ?></td>
<?php } ?>



<?php  if($database->plantilla_filtro($nombreTabla,"PRECIOPESOS_SOFTWARE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php
		$totales = 'si';
echo number_format($row['MATERIAL_TOTAL'],2,'.',',');
$MATERIAL_TOTAL12 += $row['MATERIAL_TOTAL']; 
 ?></td>
<?php } ?>



<?php  if($database->plantilla_filtro($nombreTabla,"MATERIAL_OBSERVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MATERIAL_OBSERVA'];?></td>
<?php } ?>


<?php /*termina copiar y terminaA5*/ ?>

		
		</tr>
			<?php
			$finales++;
		}	
	?>
	
	
	 <?php if($database->variablespermisos('','TOTAL_DMATERIAL','ver')=='si'){ ?> 
		<tr>
	<?php if($totales == 'si'){ ?>
<td style="text-align:right; padding-right:45px;" colspan='17'<?php echo $colspan; ?>" ><strong style="font-size:16px">TOTALES</strong></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MATERIAL_COSTO",$altaeventos,$DEPARTAMENTO)=="si"){  ?>
<td style="text-align:center"><strong style="font-size:16px">$<?php echo number_format($MATERIAL_COSTO12,2,'.',','); ?></strong></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"MATERIAL_IVA",$altaeventos,$DEPARTAMENTO)=="si"){  ?>
<td style="text-align:center"><strong style="font-size:16px">$<?php echo number_format($MATERIAL_IVA12,2,'.',','); ?></strong></td>
<?php } ?>
<?php if($database->plantilla_filtro($nombreTabla,"MATERIAL_SUB",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="text-align:center"><strong style="font-size:16px">$<?php  echo number_format($MATERIAL_SUB12,2,'.',','); ?></strong></td>
<?php } ?>

<?php if($database->plantilla_filtro($nombreTabla,"MATERIAL_TOTAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="text-align:center"><strong style="font-size:16px">$<?php  echo number_format($MATERIAL_TOTAL12,2,'.',','); ?></strong></td>
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
				echo $pagination->paginate();
			?>
        </div>
	<?php
	}
}
?>
