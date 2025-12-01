<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

define('__ROOT1__', dirname(dirname(__FILE__)));
include_once (__ROOT1__."/includes/error_reporting.php");
include_once (__ROOT1__."/DIARIO/class.epcinnDC.php");

$SOLICITUD = NEW accesoclase();
$conexion = NEW colaboradores();

$hSOLICITUD = isset($_POST["hSOLICITUD"])?$_POST["hSOLICITUD"]:"";
$enviarSOLICITUD = isset($_POST["enviarSOLICITUD"])?$_POST["enviarSOLICITUD"]:"";
$IpSOLICITUD = isset($_POST["IpSOLICITUD"])?$_POST["IpSOLICITUD"]:"";
$borra_SOLICITUD = isset($_POST["borra_SOLICITUD"])?$_POST["borra_SOLICITUD"]:"";
$EMAIL_SOLICITUD = isset($_POST["EMAIL_SOLICITUD"])?$_POST["EMAIL_SOLICITUD"]:"";
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$hNUEVODE = isset($_POST["hNUEVODE"])?$_POST["hNUEVODE"]:"";	
$enviarNUEVODE = isset($_POST["enviarNUEVODE"])?$_POST["enviarNUEVODE"]:"";	
$BORRAREGISTRO_NUEVODE = isset($_POST["BORRAREGISTRO_NUEVODE"])?$_POST["BORRAREGISTRO_NUEVODE"]:"";


$OBTENER_fotoMATE1= isset($_POST["OBTENER_fotoMATE1"])?$_POST["OBTENER_fotoMATE1"]:"";
if($OBTENER_fotoMATE1=='OBTENER_fotoMATE1'){
	 $MATERIAL_EQUIPO= isset($_POST["MATERIAL_EQUIPO"])?$_POST["MATERIAL_EQUIPO"]:"";
    echo $_SESSION['I_FOTOS']= $SOLICITUD->fotos_materiales($MATERIAL_EQUIPO);
	 
}

$OBTENER_foto1= isset($_POST["OBTENER_foto1"])?$_POST["OBTENER_foto1"]:"";
if($OBTENER_foto1=='OBTENER_foto1'){
	$VEHICULOSEVE_VEHICULO= isset($_POST["VEHICULOSEVE_VEHICULO"])?$_POST["VEHICULOSEVE_VEHICULO"]:"";
    $_SESSION['fotos_vehiculos']= $SOLICITUD->fotos_vehiculos($VEHICULOSEVE_VEHICULO);
	 
}

if($hNUEVODE == 'hNUEVODE' ){
	//enviarNUEVODE
	
$NUEVODE = isset($_POST["NUEVODE"])?$_POST["NUEVODE"]:"";
$hNUEVODE = isset($_POST["hNUEVODE"])?$_POST["hNUEVODE"]:""; 	
$IPNUEVODE = isset($_POST["IPNUEVODE"])?$_POST["IPNUEVODE"]:""; 	
   echo $SOLICITUD->NUEVODE ($NUEVODE , $hNUEVODE,$enviarNUEVODE,$IPNUEVODE);
   
     //include_once (__ROOT1__."/includes/crea_funciones.php");  
//echo "asdfasdf";

 }	 
   elseif($BORRAREGISTRO_NUEVODE == 'BORRAREGISTRO_NUEVODE'){
	$borra_NUEVOD = isset($_POST["borra_NUEVOD"])?$_POST["borra_NUEVOD"]:"";
		
	echo $SOLICITUD->BORRAREGISTRO_NUEVODE($borra_NUEVOD);
	 
	
  //include_once (__ROOT1__."/includes/crea_funciones.php");  
}



if($hSOLICITUD == 'hSOLICITUD' or $enviarSOLICITUD=='enviarSOLICITUD'){
	
					 
   $DEPARTAMENTO = isset($_POST["DEPARTAMENTO"])?$_POST["DEPARTAMENTO"]:"";
   $colaborador_diario = isset($_POST["colaborador_diario"])?$_POST["colaborador_diario"]:"";
   $OBSERVACIONES_SOLICITUD = isset($_POST["OBSERVACIONES_SOLICITUD"])?$_POST["OBSERVACIONES_SOLICITUD"]:"";
   $FECHA_SOLICITUD = isset($_POST["FECHA_SOLICITUD"])?$_POST["FECHA_SOLICITUD"]:"";
   $hSOLICITUD = isset($_POST["hSOLICITUD"])?$_POST["hSOLICITUD"]:""; 
				 
		//print_r($_POST['colaborador_diario']);
		//ECHO "<BR>";
		$conn = $conexion->db(); 
		$CUENTA = COUNT($_POST['colaborador_diario']) - 1;
		$grupo = date('YmdHis');
		
		$querydiario = 'insert into 14gruposdiario
		(departamento, idRelacion ) value ("'.trim($DEPARTAMENTO).'","'.$grupo.'")';
		mysqli_query($conn,$querydiario);
		$diresultado = mysqli_insert_id($conn);
		FOR($RRR=0;$RRR<=$CUENTA;$RRR++){
			$row2NOMBRE = $SOLICITUD->informacionpersonal_diario1a($_POST['colaborador_diario'][$RRR]);
			$querydiario = 'insert into 14colaborador_diarios 
			(
			idRelacionGuardo,idRelacionDepartamento,
			idRelacionDiario,departamentoDiario,
			nombreDiario,
			OBSERVACIONES_SOLICITUD,FECHA_SOLICITUD,
			grupo) 
			values
			("","",
			"'.$_POST['colaborador_diario'][$RRR].'","'.trim($DEPARTAMENTO).'",
			"'.$row2NOMBRE.'", 
			"'.$OBSERVACIONES_SOLICITUD.'","'.$FECHA_SOLICITUD.'",
			"'.$diresultado.'")';
			mysqli_query($conn,$querydiario);
		}
		if($diresultado>=1){
			echo "ACTUALIZADO";
		}else{
			echo "NO FUE INGRESADO";
		}
				   
   }
      elseif($EMAIL_SOLICITUD ==true){
   $conexion2 = new herramientas();
   $NOMBRE_1 = 'Peticion';
   $EMAILnombre = array($EMAIL_SOLICITUD=>$NOMBRE_1);
   $adjuntos = array(''=>'');
   $Subject = 'DATOS SOLICITADOS';
	/*nuevo*/
   $array = isset($_POST['SOLICITUD'])?$_POST['SOLICITUD']:'';
   if($array != ''){
   $loopcuenta = count($array) - 1;$loopcuenta2 = count($array) - 2;
   $or1='';
   for($rrr=0;$rrr<=$loopcuenta;$rrr++){
   if($rrr<=$loopcuenta2){$or1 = ' or ';}else{$or1 = '';}
   $query1 .= ' id= '.$array[$rrr].$or1;
   }
   $query2 = str_replace('[object Object]','',$query1);
   $query2 = "and (".$query2.") ";
   }else{
   echo "SELECCIONA UNA CASILLA DEL LISTADO DE ABAJO."; exit;
   } 
																				   
   $MANDA_INFORMACION = $SOLICITUD->MANDA_INFORMACION('SOLICITUD, TIPO_CAMBIO, FECHA_SOLICITUD ',
				 
   'NOMBRE ,OBSERVACIONES,FECHA', '14SOLICITUD',  " where idRelacion = '".$_SESSION['id'] ."' ".$query2/*nuevo*/ );
   $variables = 'ADJUNTO_SOLICITUD, ';
   //SOLICITUD trim($variables, ',');
				 
   $cadenacompleta =substr($variables, 0, -2);
				  
   $adjuntos = $SOLICITUD->ADJUNTA_IMAGENES_EMAIL($cadenacompleta,'14SOLICITUD', " where idRelacion = '".$_SESSION['id'] ."' ".$query2 );
				 
   $html = $conexion->html2('SOLICITUD',$MANDA_INFORMACION );
				 
   $logo = 'ADJUNTAR_LOGO_INFORMACION_2023_05_31_07_45_49.jpg';
//$idlogo = $SOLICITUD->variable_comborelacion1a();
//$logo = $SOLICITUD->variables_informacionfiscal_logo($idlogo);
				 
   $embebida = array('../includes/archivos/'.$logo => 'ver');
   echo $conexion2->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject,$smtp);
   } 
    
					 
	if($borra_SOLICITUD == 'borra_SOLICITUD' ){
				 
   $borra_soli = isset($_POST["borra_soli"])?$_POST["borra_soli"]:"";
   echo $SOLICITUD->borra_SOLICITUD( $borra_soli );
   }	
   	   //include_once (__ROOT1__."/includes/crea_funciones.php");


 
	




?>