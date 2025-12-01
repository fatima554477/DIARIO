<?php
/*
clase EPC INNOVA
CREADO : 10/mayo/2023
TESTER: FATIMA ARELLANO
PROGRAMER: SANDOR ACTUALIZACION: 1 MAY 2023

*/
	define('__ROOT3__', dirname(dirname(__FILE__)));
	require __ROOT3__."/includes/class.epcinn.php";	
	

	
	class accesoclase extends colaboradores{



	
	/////////////////////////////////////////////////

    public function SOLICITUD ($DEPARTAMENTO ,$COLABORADOR_DIARIO,$COLABORADOR1,$COLABORADOR2,$COLABORADOR3,$COLABORADOR4,$COLABORADOR5,$COLABORADOR6,$COLABORADOR7,$COLABORADOR8,$COLABORADOR9,$COLABORADOR10,$COLABORADOR11,$OBSERVACIONES_SOLICITUD, $FECHA_SOLICITUD , $hSOLICITUD,$IpSOLICITUD,$enviarSOLICITUD ){

	
	$conn = $this->db();
	$session = isset($_SESSION['id'])?$_SESSION['id']:'';  
	if($session != ''){                            
		
	 $var1 = "update 14SOLICITUD  set
	 
	 
	 DEPARTAMENTO= '".$DEPARTAMENTO."' , 
	 COLABORADOR_DIARIO= '".$COLABORADOR_DIARIO."' , 
	 COLABORADOR1 '".$COLABORADOR1."' , 
	 COLABORADOR2 '".$COLABORADOR2."' , 
	 COLABORADOR3 '".$COLABORADOR3."' , 
	 COLABORADOR4 '".$COLABORADOR4."' , 
	 COLABORADOR5 '".$COLABORADOR5."' , 
	 COLABORADOR6 '".$COLABORADOR6."' , 
	 COLABORADOR7 '".$COLABORADOR7."' , 
	 COLABORADOR8 '".$COLABORADOR8."' , 
	 COLABORADOR9 '".$COLABORADOR9."' , 
	 COLABORADOR10 '".$COLABORADOR10."' , 
	 COLABORADOR11 '".$COLABORADOR11."' , 

	 OBSERVACIONES_SOLICITUD= '".$OBSERVACIONES_SOLICITUD."' , 	 
	 FECHA_SOLICITUD= '".$FECHA_SOLICITUD."' , 	 
	 hSOLICITUD = '".$hSOLICITUD."'
	 where id = '".$IpSOLICITUD."' ;  ";

	 $var2 = "insert into 14SOLICITUD 
	 ( DEPARTAMENTO,
	 COLABORADOR_DIARIO,
	 COLABORADOR1,
	 COLABORADOR2,
	 COLABORADOR3,
	 COLABORADOR4,
	 COLABORADOR5,
	 COLABORADOR6,
	 COLABORADOR7,
	 COLABORADOR8,
	 COLABORADOR9,
	 COLABORADOR10,
	 COLABORADOR11,

	 OBSERVACIONES_SOLICITUD, 
	 FECHA_SOLICITUD, hSOLICITUD,
	 idRelacion)
	 values 
	 ( '".$DEPARTAMENTO."' , '".
	 $COLABORADOR_DIARIO."' , '".
	 $COLABORADOR1."' , '".
	 $COLABORADOR2."' , '".
	 $COLABORADOR3."' , '".
	 $COLABORADOR4."' , '".
	 $COLABORADOR5."' , '".
	 $COLABORADOR6."' , '".
	 $COLABORADOR7."' , '".
	 $COLABORADOR8."' , '".
	 $COLABORADOR9."' , '".
	 $COLABORADOR10."' , '".
	 $COLABORADOR11."' , '".

	 $OBSERVACIONES_SOLICITUD."' , '".
	 $FECHA_SOLICITUD."' , '".
	 $hSOLICITUD."' , '".$session."' ); ";		
		
		if($enviarSOLICITUD=='enviarSOLICITUD'){
	mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
	return "Actualizado";
				
	}else{
	mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
	return "Ingresado";
	}
		
	}else{
	echo "TU SESIÓN HA TERMINADO";	
	}
	
}

	
    public function Listado_SOLICITUD(){
	$session = isset($_SESSION['id'])?$_SESSION['id']:'';
	
	$conn = $this->db();
	$variablequery = "select * from 14SOLICITUD order by id desc ";
	return $arrayquery = mysqli_query($conn,$variablequery);
}	

    public function Listado_SOLICITUD2_diario($id){	
	$conn = $this->db();
	$variablequery = "select * from 14colaborador_diarios where grupo = '".$id."' order by grupo,id desc ";
	return $arrayquery = mysqli_query($conn,$variablequery);
}	

	public function gruposDiario(){
		$conn = $this->db();
		//esta fun
	$query2 = 'SELECT * FROM `14gruposdiario` order by id desc';
	return $results2 = mysqli_query($conn,$query2);
	}

	public function informacionpersonal_diario1a($id){
		$conn = $this->db();
		//esta fun
	$query2 = 'SELECT * FROM `01informacionpersonal` where idRelacion = "'.$id.'" ';
	$results2 = mysqli_query($conn,$query2) or die( mysqli_error($conn));
	$row2 = mysqli_fetch_array($results2);
	return $row2['NOMBRE_1'].' '.$row2['APELLIDO_PATERNO'];
	}



	/*public function colaborador_generico22(){
	$conn = $this->db();                                           
	$variablequery = "select * from 01informacionpersonal inner join 01adjuntoscolaboradores on 01informacionpersonal.idRelacion = 01adjuntoscolaboradores.idRelacion where ESTATUS_CRM_ACTIVOBAJA = 'ACTIVO' order by 01informacionpersonal.`NOMBRE_1` asc; ";
	
	return $arrayquery = mysqli_query($conn,$variablequery);	
		
	}*/
	
	
	public function lista_plantillausuariocontrasenas22($id){
		//esta funcion manda listado con solo activos, tomamos el idem
	$conn = $this->db();                                           
	$variablequery = 'select *,01empresa.id as idem from 01empresa JOIN 01adjuntoscolaboradores ON 01empresa.id = 01adjuntoscolaboradores.idRelacion where ESTATUS_CRM_ACTIVOBAJA = "ACTIVO" ';
	return $arrayquery = mysqli_query($conn,$variablequery);		
	}

	public function Listado_SOLICITUD2($id){
	$conn = $this->db();
	$variablequery = "select * from 14colaborador_diarios  where id = '".$id."' ";
	return $arrayquery = mysqli_query($conn,$variablequery);
}


    public function borra_SOLICITUD($id){
	$conn = $this->db();
	$variablequery = "delete from 14colaborador_diarios where id = '".$id."' ";
	$arrayquery = mysqli_query($conn,$variablequery);
	RETURN 
	
	"<P style='color:green; font-size:28px;'>ELEMENTO BORRADO</P>";
}
	



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function NUEVODE($NUEVODE , $hNUEVODE,$enviarNUEVODE,$IPNUEVODE){
		
    $conn = $this->db();
    //$existe = $this->revisar_guardar_NUEVODE();
    $session = isset($_SESSION['id'])?$_SESSION['id']:'';  
    if($session != ''){
        
     $var1 = "update 14NUEVODE set 
     NUEVODE = '".$NUEVODE."' , hNUEVODE = '".$hNUEVODE."'  where id = '".$IPNUEVODE."' ; ";

     $var2 = " insert into 14NUEVODE (NUEVODE, hNUEVODE, idRelacion) values ( '".TRIM($NUEVODE)."' , '".$hNUEVODE."' , '".$session."' ); ";		
        
    if($enviarNUEVODE=='enviarNUEVODE'){
    mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
    return "Actualizado";
                
    }else{
    mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
    return "Ingresado";
    }
        
    }else{
    echo "TU SESIÓN HA TERMINADO";	
    }
    
}


public function Listado_NUEVODE2($id){
    $conn = $this->db();
    $variablequery = "select * from 14NUEVODE  where id = '".$id."' ";
    return $arrayquery = mysqli_query($conn,$variablequery);
}

public function Listado_NUEVODE(){
    $conn = $this->db();
    $variablequery = "select * from 14NUEVODE ";
    return $arrayquery = mysqli_query($conn,$variablequery);
}	

public function revisar_guardar_nuevo($id){
    $conn = $this->db();
    $var1 = 'select id from 14NUEVODE where id = "'.$id.'" ';
    
    $query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
    $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
    return $row['id'];
}
public function BORRAREGISTRO_NUEVODE($id){
    $conn = $this->db();
    $var1 = 'DELETE from 14NUEVODE where id = "'.$id.'" ';

    $query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
    mysqli_fetch_array($query, MYSQLI_ASSOC);
            RETURN 
    
    "<P style='color:green;font-size:25px;'>ELEMENTO BORRADO</P>";
}


	
/**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**/

	function diario_match_colaborador(){
    $conn = $this->db();		
		$query = "select * from `14colaborador_diarios` WHERE `idRelacionDiario` = '".$_SESSION['idem']."' ORDER BY grupo desc;";
		return$query = mysqli_query($conn,$query);
		 
	}

	function diario_match_GRUPO($GRUPO){
    $conn = $this->db();		
		$query = "select * from `14colaborador_diarios` WHERE `grupo` = '".$GRUPO."' ORDER BY grupo desc;";
		return $query = mysqli_query($conn,$query);
		 
	}

/**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//*Listado_VEHICULOSEVE2*/

	public function departamentoDiarioPapeleria2(){
	//$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
	
	$conn = $this->db();
	$variablequery = "SELECT * FROM `14colaborador_diarios` WHERE `departamentoDiario` = 'PAPELERIA' and idRelacionDiario ='".$_SESSION['idem']."' limit 1 ";
	$arrayquery = mysqli_query($conn,$variablequery);
	$row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
	return $row['id'];
	}	

	public function departamentoDiarioVEHICULOS2(){
	//$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
	
	$conn = $this->db();
	$variablequery = "SELECT * FROM `14colaborador_diarios` WHERE `departamentoDiario` = 'VEHÍCULOS' and idRelacionDiario ='".$_SESSION['idem']."' limit 1 ";
	$arrayquery = mysqli_query($conn,$variablequery);
	$row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
	return $row['id'];
	}	
	
	
	// EQUIPO DE OFICINA
	
	public function departamentoDiarioMENSAJERIA2(){
	//$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
	
	$conn = $this->db();
	$variablequery = "SELECT * FROM `14colaborador_diarios` WHERE `departamentoDiario` = 'MENSAJERIA' and idRelacionDiario ='".$_SESSION['idem']."' limit 1 ";
	$arrayquery = mysqli_query($conn,$variablequery);
	$row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
	return $row['id'];
	}
	public function departamentoDiarioEQUIPODEOFICINA2(){
	//$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
	
	$conn = $this->db();
	$variablequery = "SELECT * FROM `14colaborador_diarios` WHERE `departamentoDiario` = 'EQUIPO DE OFICINA' and idRelacionDiario ='".$_SESSION['idem']."' limit 1 ";
	$arrayquery = mysqli_query($conn,$variablequery);
	$row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
	return $row['id'];
	}
	
	public function departamentoDiarioMATERIAL2(){
	//$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
	
	$conn = $this->db();
	$variablequery = "SELECT * FROM `14colaborador_diarios` WHERE `departamentoDiario` = 'MATERIAL Y EQUIPO ASIGNADO A ESTE EVENTO' and idRelacionDiario ='".$_SESSION['idem']."' limit 1 ";
	$arrayquery = mysqli_query($conn,$variablequery);
	$row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
	return $row['id'];
	}// BOTIQUÍN DE PRIMEROS AUXILIOS
	
	public function departamentoDiarioBOTIQUIN2(){
	//$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
	
	$conn = $this->db();
	$variablequery = "SELECT * FROM `14colaborador_diarios` WHERE `departamentoDiario` = 'BOTIQUÍN DE PRIMEROS AUXILIOS' and idRelacionDiario ='".$_SESSION['idem']."' limit 1 ";
	$arrayquery = mysqli_query($conn,$variablequery);
	$row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
	return $row['id'];
	}		
	
/**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//*Listado_VEHICULOSEVE2*/

	public function Listado_VEHICULOSEVE2(){
	//$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
	
	$conn = $this->db();
	$variablequery = "select * from 04vehiculoevento order by id desc ";
	return $arrayquery = mysqli_query($conn,$variablequery);
	}	

    public function Listado_PAPELERIA2(){
	//$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
	
	$conn = $this->db();
	$variablequery = "select * from 04papeleria order by id desc ";
	return $arrayquery = mysqli_query($conn,$variablequery);
}	

    public function Listado_MATERIAL2(){
	//$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
	
	$conn = $this->db();
	$variablequery = "select * from 04materialyequipo order by id desc ";
	return $arrayquery = mysqli_query($conn,$variablequery);
}

    public function Listado_OFICINA2(){
	//$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
	
	$conn = $this->db();
	$variablequery = "select * from 04oficina order by id desc ";
	return $arrayquery = mysqli_query($conn,$variablequery);
}

    public function Listado_BOTIQUIN2(){
	//$session = isset($_SESSION['idevento'])?$_SESSION['idevento']:'';
	
	$conn = $this->db();
	$variablequery = "select * from 04botiquin order by id desc ";
	return $arrayquery = mysqli_query($conn,$variablequery);
}	


	public function listadonumeroE($idevento){
		$conn = $this->db();
		$variablequery = "select * from 04altaeventos where id = '".$idevento."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		return $arrayquery_row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
	}

 	public function nombre_materiales($id){
	$conn = $this->db();
	$variablequery = "select I_ARTICULO from 01inventario  where id = '".$id."' ";
	$arrayquery = mysqli_query($conn,$variablequery);
	$arrayquery_ARRAY = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
	return $arrayquery_ARRAY['I_ARTICULO'];
}

	public function nombre_papeleria ($id){
	$conn = $this->db();
	$variablequery = "select I_ARTICULO from 01inventario  where id = '".$id."' ";
	$arrayquery = mysqli_query($conn,$variablequery);
	$arrayquery_ARRAY = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
	return $arrayquery_ARRAY['I_ARTICULO'];
}

	public function nombre_vehiculo($id){
	$conn = $this->db();
	$variablequery = "select SUBMARCAV from 09vehiculos  where id = '".$id."' ";
	$arrayquery = mysqli_query($conn,$variablequery);
	$arrayquery_ARRAY = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
	return $arrayquery_ARRAY['SUBMARCAV'];
}


	public function nombre_oficina ($id){
	$conn = $this->db();
	$variablequery = "select I_ARTICULO from 01inventario  where id = '".$id."' ";
	$arrayquery = mysqli_query($conn,$variablequery);
	$arrayquery_ARRAY = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
	return $arrayquery_ARRAY['I_ARTICULO'];
}

	public function nombre_botiquin ($id){
	$conn = $this->db();
	$variablequery = "select I_ARTICULO from 01inventario  where id = '".$id."' ";
	$arrayquery = mysqli_query($conn,$variablequery);
	$arrayquery_ARRAY = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
	return $arrayquery_ARRAY['I_ARTICULO'];
}


	public function fotos_materiales($id){
	$conn = $this->db();
	$variablequery = "select * from 01inventario  where id = '".$id."' ";
	$arrayquery = mysqli_query($conn,$variablequery);
	$arrayquery_ARRAY = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
	return $arrayquery_ARRAY['I_FOTOS'];
}

	public function fotos_vehiculos($id){
	$conn = $this->db();
	$variablequery = "select * from 09fotosv  where idRelacion = '".$id."' ";
	$arrayquery = mysqli_query($conn,$variablequery);
	$arrayquery_ARRAY = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
	return $arrayquery_ARRAY['ADJUNTO_FOTOSV'];
}



}




	

?>