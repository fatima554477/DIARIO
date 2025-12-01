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


$OFICINA_EQUIPO = isset($_POST["OFICINA_EQUIPO"])?$_POST["OFICINA_EQUIPO"]:""; 
$OFICINA_CANTIDAD = isset($_POST["OFICINA_CANTIDAD"])?$_POST["OFICINA_CANTIDAD"]:""; 
$OFICINA_FOTO = isset($_POST["OFICINA_FOTO"])?$_POST["OFICINA_FOTO"]:""; 
$OFICINA_ENTREGA = isset($_POST["OFICINA_ENTREGA"])?$_POST["OFICINA_ENTREGA"]:""; 
$OFICINA_LUGAR = isset($_POST["OFICINA_LUGAR"])?$_POST["OFICINA_LUGAR"]:""; 
$OFICINA_HORA = isset($_POST["OFICINA_HORA"])?$_POST["OFICINA_HORA"]:""; 
$OFICINA_DEVOLU = isset($_POST["OFICINA_DEVOLU"])?$_POST["OFICINA_DEVOLU"]:""; 
$OFICINA_LUDEVO = isset($_POST["OFICINA_LUDEVO"])?$_POST["OFICINA_LUDEVO"]:""; 
$OFICINA_HORADEVO = isset($_POST["OFICINA_HORADEVO"])?$_POST["OFICINA_HORADEVO"]:""; 
$OFICINA_SOLICITUD = isset($_POST["OFICINA_SOLICITUD"])?$_POST["OFICINA_SOLICITUD"]:""; 
$OFICINA_DIAS = isset($_POST["OFICINA_DIAS"])?$_POST["OFICINA_DIAS"]:""; 
$OFICINA_COSTO = isset($_POST["OFICINA_COSTO"])?$_POST["OFICINA_COSTO"]:""; 
$OFICINA_IVA = isset($_POST["OFICINA_IVA"])?$_POST["OFICINA_IVA"]:""; 
$OFICINA_SUB = isset($_POST["OFICINA_SUB"])?$_POST["OFICINA_SUB"]:""; 
$OFICINA_TOTAL = isset($_POST["OFICINA_TOTAL"])?$_POST["OFICINA_TOTAL"]:""; 
$OFICINA_OBSERVA = isset($_POST["OFICINA_OBSERVA"])?$_POST["OFICINA_OBSERVA"]:""; 
$HOFICINA = isset($_POST["HOFICINA"])?$_POST["HOFICINA"]:""; 

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

"OFICINA_EQUIPO"=>$OFICINA_EQUIPO,
"OFICINA_CANTIDAD"=>$OFICINA_CANTIDAD,
"OFICINA_FOTO"=>$OFICINA_FOTO,
"OFICINA_ENTREGA"=>$OFICINA_ENTREGA,
"OFICINA_LUGAR"=>$OFICINA_LUGAR,
"OFICINA_HORA"=>$OFICINA_HORA,
"OFICINA_DEVOLU"=>$OFICINA_DEVOLU,
"OFICINA_LUDEVO"=>$OFICINA_LUDEVO,
"OFICINA_HORADEVO"=>$OFICINA_HORADEVO,
"OFICINA_SOLICITUD"=>$OFICINA_SOLICITUD,
"OFICINA_DIAS"=>$OFICINA_DIAS,
"OFICINA_COSTO"=>$OFICINA_COSTO,
"OFICINA_IVA"=>$OFICINA_IVA,
"OFICINA_SUB"=>$OFICINA_SUB,
"OFICINA_TOTAL"=>$OFICINA_TOTAL,
"OFICINA_OBSERVA"=>$OFICINA_OBSERVA,
"HOFICINA"=>$HOFICINA,

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
if($database->plantilla_filtro($nombreTabla,"OFICINA_EQUIPO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">OFICINA </th>
<?php } ?>

<?php 
if($database->plantilla_filtro($nombreTabla,"OFICINA_CANTIDAD",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">CANTIDAD</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"OFICINA_FOTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">FOTO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"OFICINA_ENTREGA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">FECHA DE ENTREGA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"OFICINA_LUGAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center"> LUGAR DE ENTREGA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"OFICINA_HORA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center"> HORA DE ENTREGA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"OFICINA_DEVOLU",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center"> FECHA DE DEVOLUCIÓN</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"OFICINA_LUDEVO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center"> LUGAR DE DEVOLUCIÓN </th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"OFICINA_HORADEVO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">HORA DE DEVOLUCIÓN</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"OFICINA_SOLICITUD",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">FECHA DE SOLICITUD</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"OFICINA_DIAS",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">DIAS SOLICITADOS</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"OFICINA_COSTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">COSTO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"OFICINA_IVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center"> IVA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"OFICINA_SUB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center"> SUB TOTAL</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"OFICINA_TOTAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">TOTAL</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"OFICINA_OBSERVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">OBSERVACIONES</th>
<?php } ?>



<?php /*termina copiar y terminaA3*/ ?>
            </tr>
            <tr>
<td style="background:#c9e8e8;text-align:center"></td>
<?php /*inicia copiar y pegar iniciaA4*/ ?>

<!--<hr/><H1>HTML FILTRO E INPUT .PHP A4</H1><BR/>-->
<?php  
if($database->plantilla_filtro($nombreTabla,"NUMERO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="NUMERO_EVENTO_5" value="<?php 
echo $NUMERO_EVENTO; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"NOMBRE_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="NOMBRE_EVENTO_5" value="<?php 
echo $NOMBRE_EVENTO; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"FECHA_INICIO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="FECHA_INICIO_EVENTO_5" value="<?php 
echo $FECHA_INICIO_EVENTO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"PAIS_DEL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="PAIS_DEL_EVENTO_5" value="<?php 
echo $PAIS_DEL_EVENTO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"CIUDAD_DEL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="CIUDAD_DEL_EVENTO_5" value="<?php 
echo $CIUDAD_DEL_EVENTO; ?>"></td>
<?php } ?>


<?php  
if($database->plantilla_filtro($nombreTabla,"OFICINA_EQUIPO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="OFICINA_EQUIPO_5" value="<?php 
echo $OFICINA_EQUIPO; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"OFICINA_CANTIDAD",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="OFICINA_CANTIDAD_5" value="<?php 
echo $OFICINA_CANTIDAD; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"OFICINA_FOTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="OFICINA_FOTO_5" value="<?php 
echo $OFICINA_FOTO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"OFICINA_ENTREGA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="OFICINA_ENTREGA_5" value="<?php 
echo $OFICINA_ENTREGA; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"OFICINA_LUGAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="OFICINA_LUGAR_5" value="<?php 
echo $OFICINA_LUGAR; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"OFICINA_HORA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="OFICINA_HORA_5" value="<?php 
echo $OFICINA_HORA; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"OFICINA_DEVOLU",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="OFICINA_DEVOLU_5" value="<?php 
echo $OFICINA_DEVOLU; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"OFICINA_LUDEVO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="OFICINA_LUDEVO_5" value="<?php 
echo $OFICINA_LUDEVO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"OFICINA_HORADEVO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="OFICINA_HORADEVO_5" value="<?php 
echo $OFICINA_HORADEVO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"OFICINA_SOLICITUD",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="OFICINA_SOLICITUD_5" value="<?php 
echo $OFICINA_SOLICITUD; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"OFICINA_DIAS",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="OFICINA_DIAS_5" value="<?php 
echo $OFICINA_DIAS; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"OFICINA_COSTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="OFICINA_COSTO_5" value="<?php 
echo $OFICINA_COSTO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"OFICINA_IVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="OFICINA_IVA_5" value="<?php 
echo $OFICINA_IVA; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"OFICINA_SUB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="OFICINA_SUB_5" value="<?php 
echo $OFICINA_SUB; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"OFICINA_TOTAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="OFICINA_TOTAL_5" value="<?php 
echo $OFICINA_TOTAL; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"OFICINA_OBSERVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="OFICINA_OBSERVA_5" value="<?php 
echo $OFICINA_OBSERVA; ?>"></td>
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


	if($row['OFICINA_FOTO']==true){
	$urlOFICINA_FOTO ='<a href="includes/archivos/'.$row['OFICINA_FOTO'].'" target="_blank">VER IMAGEN</a>';
	}else{
		$urlOFICINA_FOTO ='';
	}
?>
		<tr>
<td ><?php echo $row["id"];?></td>
<?php /*inicia copiar y pegar iniciaA5*/ ?>

<?php  if($database->plantilla_filtro($nombreTabla,"NUMERO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center">
<a href="calendarioDEeventos2.php?idevento=<?php echo $row['id']; ?>"><?php echo $row['NUMERO_EVENTO'];?></a>
</td>
<?php } ?>


<?php  if($database->plantilla_filtro($nombreTabla,"NOMBRE_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['NOMBRE_EVENTO'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"FECHA_INICIO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['FECHA_INICIO_EVENTO'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"PAIS_DEL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['PAIS_DEL_EVENTO'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"CIUDAD_DEL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['CIUDAD_DEL_EVENTO'];?></td>
<?php } ?>



<?php  if($database->plantilla_filtro($nombreTabla,"OFICINA_EQUIPO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $database->nombre_OFICINA($row["OFICINA_EQUIPO"]);?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"OFICINA_CANTIDAD",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['OFICINA_CANTIDAD'];?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"OFICINA_FOTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $urlOFICINA_FOTO; ?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"OFICINA_ENTREGA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['OFICINA_ENTREGA'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"OFICINA_LUGAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['OFICINA_LUGAR'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"OFICINA_HORA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['OFICINA_HORA'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"OFICINA_DEVOLU",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['OFICINA_DEVOLU'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"OFICINA_LUDEVO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['OFICINA_LUDEVO'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"OFICINA_HORADEVO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['OFICINA_HORADEVO'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"OFICINA_SOLICITUD",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['OFICINA_SOLICITUD'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"OFICINA_DIAS",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['OFICINA_DIAS'];?></td>
<?php } ?>


<?php  if($database->plantilla_filtro($nombreTabla,"OFICINA_COSTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php
		$totales = 'si';
echo number_format($row['OFICINA_COSTO'],2,'.',',');
$OFICINA_COSTO12 += $row['OFICINA_COSTO']; 
 ?></td>
<?php } ?>


<?php  if($database->plantilla_filtro($nombreTabla,"OFICINA_IVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php
		$totales = 'si';
echo number_format($row['OFICINA_IVA'],2,'.',',');
$OFICINA_IVA12 += $row['OFICINA_IVA']; 
 ?></td>
<?php } ?>


<?php  if($database->plantilla_filtro($nombreTabla,"OFICINA_SUB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php
		$totales = 'si';
echo number_format($row['OFICINA_SUB'],2,'.',',');
$OFICINA_SUB12 += $row['OFICINA_SUB']; 
 ?></td>
<?php } ?>



<?php  if($database->plantilla_filtro($nombreTabla,"OFICINA_TOTAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php
		$totales = 'si';
echo number_format($row['OFICINA_TOTAL'],2,'.',',');
$OFICINA_TOTAL12 += $row['OFICINA_TOTAL']; 
 ?></td>
<?php } ?>




<?php  if($database->plantilla_filtro($nombreTabla,"OFICINA_OBSERVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['OFICINA_OBSERVA'];?></td>
<?php } ?>


<?php /*termina copiar y terminaA5*/ ?>

		
		</tr>
			<?php
			$finales++;
		}	
	?>
	
	
	<?php if($database->variablespermisos('','TOTAL_DEQUIPO','ver')=='si'){ ?> 
				<tr>
	<?php if($totales == 'si'){ ?>
<td style="text-align:right; padding-right:45px;" colspan='17'<?php echo $colspan; ?>" ><strong style="font-size:16px">TOTALES</strong></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"OFICINA_COSTO",$altaeventos,$DEPARTAMENTO)=="si"){  ?>
<td style="text-align:center"><strong style="font-size:16px">$<?php echo number_format($OFICINA_COSTO12,2,'.',','); ?></strong></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"OFICINA_IVA",$altaeventos,$DEPARTAMENTO)=="si"){  ?>
<td style="text-align:center"><strong style="font-size:16px">$<?php echo number_format($OFICINA_IVA12,2,'.',','); ?></strong></td>
<?php } ?>
<?php if($database->plantilla_filtro($nombreTabla,"OFICINA_SUB",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="text-align:center"><strong style="font-size:16px">$<?php  echo number_format($OFICINA_SUB12,2,'.',','); ?></strong></td>
<?php } ?>

<?php if($database->plantilla_filtro($nombreTabla,"OFICINA_TOTAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="text-align:center"><strong style="font-size:16px">$<?php  echo number_format($OFICINA_TOTAL12,2,'.',','); ?></strong></td>
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
