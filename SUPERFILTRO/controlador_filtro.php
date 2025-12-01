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
$action = (isset($_POST["action"])&& $_POST["action"] !=NULL)?$_POST["action"]:"ajax";
PRINT($_POST);
if($action == "ajax"){

	require(__ROOT6__."/class.filtro.php");
	$database=new orders();	

	$query=isset($_POST["query"])?$_POST["query"]:"";

	$DEPARTAMENTO = !EMPTY($_POST["DEPARTAMENTO"])?$_POST["DEPARTAMENTO"]:"DEFAULT";	
	$nombreTabla = "SELECT * FROM `08altaeventosfiltroDes`, 08altaeventosfiltroPLA WHERE 08altaeventosfiltroDes.id = 08altaeventosfiltroPLA.idRelacion";
	$altaeventos = "altaeventos";
	$tables="14colaborador_diarios";
	

$idRelacionDiario = isset($_POST["idRelacionDiario"])?$_POST["idRelacionDiario"]:""; 
$nombreDiario = isset($_POST["nombreDiario"])?$_POST["nombreDiario"]:""; 
$departamentoDiario = isset($_POST["departamentoDiario"])?$_POST["departamentoDiario"]:""; 
$OBSERVACIONES_SOLICITUD = isset($_POST["OBSERVACIONES_SOLICITUD"])?$_POST["OBSERVACIONES_SOLICITUD"]:""; 
$FECHA_SOLICITUD = isset($_POST["FECHA_SOLICITUD"])?$_POST["FECHA_SOLICITUD"]:"";
$grupo = isset($_POST["grupo"])?$_POST["grupo"]:"";

//print_r($_POST);
$per_page=intval($_POST["per_page"]);
	$campos="*";
	//Variables de paginación
	$page = (isset($_POST["page"]) && !empty($_POST["page"]))?$_POST["page"]:1;
	$adjacents  = 4; //espacio entre páginas después del número de adyacentes
	$offset = ($page - 1) * $per_page;
	
	$search=array(

"idRelacionDiario"=>$idRelacionDiario,
"nombreDiario"=>$nombreDiario,
"departamentoDiario"=>$departamentoDiario,
"OBSERVACIONES_SOLICITUD"=>$OBSERVACIONES_SOLICITUD,
"FECHA_SOLICITUD"=>$FECHA_SOLICITUD,
"grupo"=>$grupo,

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
			


<?php 
if($database->plantilla_filtro($nombreTabla,"nombreDiario",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">NOMBRE</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"departamentoDiario",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">DEPARTAMENTO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"OBSERVACIONES_SOLICITUD",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">OBSERVACIONES</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"FECHA_SOLICITUD",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">FECHA DE CREACIÓN</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"grupo",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center"># GRUPO <BR>TRABAJO</th>
<?php } ?>



<?php /*termina copiar y terminaA3*/ ?>
            </tr>
            <tr>
			
			
			


<?php  
if($database->plantilla_filtro($nombreTabla,"nombreDiario",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="nombreDiario_1" value="<?php echo $nombreDiario; ?>">
</td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"departamentoDiario",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="departamentoDiario_1" value="<?php 
echo $departamentoDiario; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"OBSERVACIONES_SOLICITUD",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="OBSERVACIONES_SOLICITUD_1" value="<?php 
echo $OBSERVACIONES_SOLICITUD; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"FECHA_SOLICITUD",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="DATE" class="form-control" id="FECHA_SOLICITUD_1" value="<?php 
echo $FECHA_SOLICITUD; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"grupo",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="grupo_1" value="<?php 
echo $grupo; ?>"></td>
<?php } ?>


<?php /*termina copiar y terminaA4*/ ?>
	
		<td style="background:#c9e8e8"></td>
		<td style="background:#c9e8e8"></td>
            </tr>			
        </thead>
		<?php 	if ($numrows<0){ ?>
		</table>
		<?php }else{ ?>		
        <tbody>
		<?php
		$finales=0;
		
		foreach ($datos as $key=>$row){
			
				$num = 22;
		//Comprobamos si num es un número par o no
		if (($row['grupo'] % 2) == 0) {
			$fondos = 'f4ffdf';
		} else {
			$fondos = 'dfe8ff';
		}	
			
			?>
		<tr style="background: #<?php echo $fondos;?>" >
		
<!--<td style="text-align:center" >
<input type="checkbox" style="width:15%" class="form-check-input" name="INCIDENCIAS[]" id="INCIDENCIAS" value="<?php echo $row["id"]; ?>"/> </td>-->
		

<?php  if($database->plantilla_filtro($nombreTabla,"nombreDiario",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['nombreDiario'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"departamentoDiario",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['departamentoDiario'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"OBSERVACIONES_SOLICITUD",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['OBSERVACIONES_SOLICITUD'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"FECHA_SOLICITUD",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['FECHA_SOLICITUD'];?></td>
<?php } ?>



<?php  if($database->plantilla_filtro($nombreTabla,"grupo",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['grupo'];?></td>
<?php } ?>

<?php /*termina copiar y terminaA5*/ ?>

			<td>
<?php if($database->variablespermisos('','DIARIO_COLABORADOR','borrar')=='si'){ ?>
<input type="button" name="view2" value="BORRAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_dataSOLICITUDborrar" />
<?php } ?>
			</td>			
		</tr>
			<?php
			$finales++;
		}	
	?>
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
