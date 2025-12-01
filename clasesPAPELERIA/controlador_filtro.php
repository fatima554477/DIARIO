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


$PAPELERIA_EQUIPO = isset($_POST["PAPELERIA_EQUIPO"])?$_POST["PAPELERIA_EQUIPO"]:""; 
$PAPELERIA_CANTIDAD = isset($_POST["PAPELERIA_CANTIDAD"])?$_POST["PAPELERIA_CANTIDAD"]:""; 
$PAPELERIA_FOTO = isset($_POST["PAPELERIA_FOTO"])?$_POST["PAPELERIA_FOTO"]:""; 
$PAPELERIA_ENTREGA = isset($_POST["PAPELERIA_ENTREGA"])?$_POST["PAPELERIA_ENTREGA"]:""; 
$PAPELERIA_LUGAR = isset($_POST["PAPELERIA_LUGAR"])?$_POST["PAPELERIA_LUGAR"]:""; 
$PAPELERIA_HORA = isset($_POST["PAPELERIA_HORA"])?$_POST["PAPELERIA_HORA"]:""; 
$PAPELERIA_DEVOLU = isset($_POST["PAPELERIA_DEVOLU"])?$_POST["PAPELERIA_DEVOLU"]:""; 
$PAPELERIA_LUDEVO = isset($_POST["PAPELERIA_LUDEVO"])?$_POST["PAPELERIA_LUDEVO"]:""; 
$PAPELERIA_HORADEVO = isset($_POST["PAPELERIA_HORADEVO"])?$_POST["PAPELERIA_HORADEVO"]:""; 
$PAPELERIA_SOLICITUD = isset($_POST["PAPELERIA_SOLICITUD"])?$_POST["PAPELERIA_SOLICITUD"]:""; 
$PAPELERIA_DIAS = isset($_POST["PAPELERIA_DIAS"])?$_POST["PAPELERIA_DIAS"]:""; 
$PAPELERIA_COSTO = isset($_POST["PAPELERIA_COSTO"])?$_POST["PAPELERIA_COSTO"]:""; 
$PAPELERIA_IVA = isset($_POST["PAPELERIA_IVA"])?$_POST["PAPELERIA_IVA"]:""; 
$PAPELERIA_SUB = isset($_POST["PAPELERIA_SUB"])?$_POST["PAPELERIA_SUB"]:""; 
$PAPELERIA_TOTAL = isset($_POST["PAPELERIA_TOTAL"])?$_POST["PAPELERIA_TOTAL"]:""; 
$PAPELERIA_OBSERVA = isset($_POST["PAPELERIA_OBSERVA"])?$_POST["PAPELERIA_OBSERVA"]:""; 
$HPAPELERIA = isset($_POST["HPAPELERIA"])?$_POST["HPAPELERIA"]:""; 

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

"PAPELERIA_EQUIPO"=>$PAPELERIA_EQUIPO,
"PAPELERIA_CANTIDAD"=>$PAPELERIA_CANTIDAD,
"PAPELERIA_FOTO"=>$PAPELERIA_FOTO,
"PAPELERIA_ENTREGA"=>$PAPELERIA_ENTREGA,
"PAPELERIA_LUGAR"=>$PAPELERIA_LUGAR,
"PAPELERIA_HORA"=>$PAPELERIA_HORA,
"PAPELERIA_DEVOLU"=>$PAPELERIA_DEVOLU,
"PAPELERIA_LUDEVO"=>$PAPELERIA_LUDEVO,
"PAPELERIA_HORADEVO"=>$PAPELERIA_HORADEVO,
"PAPELERIA_SOLICITUD"=>$PAPELERIA_SOLICITUD,
"PAPELERIA_DIAS"=>$PAPELERIA_DIAS,
"PAPELERIA_COSTO"=>$PAPELERIA_COSTO,
"PAPELERIA_IVA"=>$PAPELERIA_IVA,
"PAPELERIA_SUB"=>$PAPELERIA_SUB,
"PAPELERIA_TOTAL"=>$PAPELERIA_TOTAL,
"PAPELERIA_OBSERVA"=>$PAPELERIA_OBSERVA,
"HPAPELERIA"=>$HPAPELERIA,

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
if($database->plantilla_filtro($nombreTabla,"PAPELERIA_EQUIPO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">PAPELERIA </th>
<?php } ?>

<?php 
if($database->plantilla_filtro($nombreTabla,"PAPELERIA_CANTIDAD",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">CANTIDAD</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"PAPELERIA_FOTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">FOTO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"PAPELERIA_ENTREGA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">FECHA DE ENTREGA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"PAPELERIA_LUGAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center"> LUGAR DE ENTREGA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"PAPELERIA_HORA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center"> HORA DE ENTREGA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"PAPELERIA_DEVOLU",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center"> FECHA DE DEVOLUCIÓN</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"PAPELERIA_LUDEVO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center"> LUGAR DE DEVOLUCIÓN </th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"PAPELERIA_HORADEVO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">HORA DE DEVOLUCIÓN</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"PAPELERIA_SOLICITUD",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">FECHA DE SOLICITUD</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"PAPELERIA_DIAS",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">DIAS SOLICITADOS</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"PAPELERIA_COSTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">COSTO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"PAPELERIA_IVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center"> IVA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"PAPELERIA_SUB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center"> SUB TOTAL</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"PAPELERIA_TOTAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">TOTAL</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"PAPELERIA_OBSERVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">OBSERVACIONES</th>
<?php } ?>



<?php /*termina copiar y terminaA3*/ ?>
            </tr>
            <tr>
<td style="background:#c9e8e8;text-align:center"></td>
<?php /*inicia copiar y pegar iniciaA4*/ ?>

<!--<hr/><H1>HTML FILTRO E INPUT .PHP A4</H1><BR/>-->
<?php  
if($database->plantilla_filtro($nombreTabla,"NUMERO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="NUMERO_EVENTO_4" value="<?php 
echo $NUMERO_EVENTO; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"NOMBRE_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="NOMBRE_EVENTO_4" value="<?php 
echo $NOMBRE_EVENTO; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"FECHA_INICIO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="FECHA_INICIO_EVENTO_4" value="<?php 
echo $FECHA_INICIO_EVENTO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"PAIS_DEL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="PAIS_DEL_EVENTO_4" value="<?php 
echo $PAIS_DEL_EVENTO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"CIUDAD_DEL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="CIUDAD_DEL_EVENTO_4" value="<?php 
echo $CIUDAD_DEL_EVENTO; ?>"></td>
<?php } ?>


<?php  
if($database->plantilla_filtro($nombreTabla,"PAPELERIA_EQUIPO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="PAPELERIA_EQUIPO_4" value="<?php 
echo $PAPELERIA_EQUIPO; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"PAPELERIA_CANTIDAD",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="PAPELERIA_CANTIDAD_4" value="<?php 
echo $PAPELERIA_CANTIDAD; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"PAPELERIA_FOTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="PAPELERIA_FOTO_4" value="<?php 
echo $PAPELERIA_FOTO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"PAPELERIA_ENTREGA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="PAPELERIA_ENTREGA_4" value="<?php 
echo $PAPELERIA_ENTREGA; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"PAPELERIA_LUGAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="PAPELERIA_LUGAR_4" value="<?php 
echo $PAPELERIA_LUGAR; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"PAPELERIA_HORA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="PAPELERIA_HORA_4" value="<?php 
echo $PAPELERIA_HORA; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"PAPELERIA_DEVOLU",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="PAPELERIA_DEVOLU_4" value="<?php 
echo $PAPELERIA_DEVOLU; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"PAPELERIA_LUDEVO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="PAPELERIA_LUDEVO_4" value="<?php 
echo $PAPELERIA_LUDEVO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"PAPELERIA_HORADEVO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="PAPELERIA_HORADEVO_4" value="<?php 
echo $PAPELERIA_HORADEVO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"PAPELERIA_SOLICITUD",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="PAPELERIA_SOLICITUD_4" value="<?php 
echo $PAPELERIA_SOLICITUD; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"PAPELERIA_DIAS",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="PAPELERIA_DIAS_4" value="<?php 
echo $PAPELERIA_DIAS; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"PAPELERIA_COSTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="PAPELERIA_COSTO_4" value="<?php 
echo $PAPELERIA_COSTO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"PAPELERIA_IVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="PAPELERIA_IVA_4" value="<?php 
echo $PAPELERIA_IVA; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"PAPELERIA_SUB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="PAPELERIA_SUB_4" value="<?php 
echo $PAPELERIA_SUB; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"PAPELERIA_TOTAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="PAPELERIA_TOTAL_4" value="<?php 
echo $PAPELERIA_TOTAL; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"PAPELERIA_OBSERVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="PAPELERIA_OBSERVA_4" value="<?php 
echo $PAPELERIA_OBSERVA; ?>"></td>
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


	if($row['PAPELERIA_FOTO']==true){
	$urlPAPELERIA_FOTO ='<a href="includes/archivos/'.$row['PAPELERIA_FOTO'].'" target="_blank">VER IMAGEN</a>';
	}else{
		$urlPAPELERIA_FOTO ='';
	}
?>
		<tr>
<td ><?php echo $row["id"];?></td>
<?php /*inicia copiar y pegar iniciaA5*/ ?>
<!--<hr/><H1>FOREACH FILTRO .PHP A5</H1><BR/>-->
<?php  if($database->plantilla_filtro($nombreTabla,"NUMERO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center">

<?php //echo $row['NUMERO_EVENTO'];?>

<a href="calendarioDEeventos2.php?idevento=<?php echo $row['id']; ?>"><?php echo $row['NUMERO_EVENTO'];?>  </a>

</td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"NOMBRE_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['NOMBRE_EVENTO'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"FECHA_INICIO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['FECHA_INICIO_EVENTO'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"PAIS_DEL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['PAIS_DEL_EVENTO'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"CIUDAD_DEL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['CIUDAD_DEL_EVENTO'];?></td>
<?php } ?>



<?php  if($database->plantilla_filtro($nombreTabla,"PAPELERIA_EQUIPO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $database->nombre_papeleria($row["PAPELERIA_EQUIPO"]);?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"PAPELERIA_CANTIDAD",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['PAPELERIA_CANTIDAD'];?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"PAPELERIA_FOTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $urlPAPELERIA_FOTO; ?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"PAPELERIA_ENTREGA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['PAPELERIA_ENTREGA'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"PAPELERIA_LUGAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['PAPELERIA_LUGAR'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"PAPELERIA_HORA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['PAPELERIA_HORA'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"PAPELERIA_DEVOLU",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['PAPELERIA_DEVOLU'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"PAPELERIA_LUDEVO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['PAPELERIA_LUDEVO'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"PAPELERIA_HORADEVO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['PAPELERIA_HORADEVO'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"PAPELERIA_SOLICITUD",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['PAPELERIA_SOLICITUD'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"PAPELERIA_DIAS",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['PAPELERIA_DIAS'];?></td>
<?php } ?>


<?php  if($database->plantilla_filtro($nombreTabla,"PAPELERIA_COSTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php
		$totales = 'si';
echo number_format($row['PAPELERIA_COSTO'],2,'.',',');
$PAPELERIA_COSTO12 += $row['PAPELERIA_COSTO']; 
 ?></td>
<?php } ?>


<?php  if($database->plantilla_filtro($nombreTabla,"PAPELERIA_IVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php
		$totales = 'si';
echo number_format($row['PAPELERIA_IVA'],2,'.',',');
$PAPELERIA_IVA12 += $row['PAPELERIA_IVA']; 
 ?></td>
<?php } ?>


<?php  if($database->plantilla_filtro($nombreTabla,"PAPELERIA_SUB",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php
		$totales = 'si';
echo number_format($row['PAPELERIA_SUB'],2,'.',',');
$PAPELERIA_SUB12 += $row['PAPELERIA_SUB']; 
 ?></td>
<?php } ?>



<?php  if($database->plantilla_filtro($nombreTabla,"PAPELERIA_TOTAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php
		$totales = 'si';
echo number_format($row['PAPELERIA_TOTAL'],2,'.',',');
$PAPELERIA_TOTAL12 += $row['PAPELERIA_TOTAL']; 
 ?></td>
<?php } ?>




<?php  if($database->plantilla_filtro($nombreTabla,"PAPELERIA_OBSERVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['PAPELERIA_OBSERVA'];?></td>
<?php } ?>


<?php /*termina copiar y terminaA5*/ ?>

		
		</tr>
			<?php
			$finales++;
		}	
	?>
		<?php if($database->variablespermisos('','TOTAL_DPAPELERIA','ver')=='si'){ ?> 
			<tr>
	<?php if($totales == 'si'){ ?>
<td style="text-align:right; padding-right:45px;" colspan='17'<?php echo $colspan; ?>" ><strong style="font-size:16px">TOTALES</strong></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"PAPELERIA_COSTO",$altaeventos,$DEPARTAMENTO)=="si"){  ?>
<td style="text-align:center"><strong style="font-size:16px">$<?php echo number_format($PAPELERIA_COSTO12,2,'.',','); ?></strong></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"PAPELERIA_IVA",$altaeventos,$DEPARTAMENTO)=="si"){  ?>
<td style="text-align:center"><strong style="font-size:16px">$<?php echo number_format($PAPELERIA_IVA12,2,'.',','); ?></strong></td>
<?php } ?>
<?php if($database->plantilla_filtro($nombreTabla,"PAPELERIA_SUB",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="text-align:center"><strong style="font-size:16px">$<?php  echo number_format($PAPELERIA_SUB12,2,'.',','); ?></strong></td>
<?php } ?>

<?php if($database->plantilla_filtro($nombreTabla,"PAPELERIA_TOTAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="text-align:center"><strong style="font-size:16px">$<?php  echo number_format($PAPELERIA_TOTAL12,2,'.',','); ?></strong></td>
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
