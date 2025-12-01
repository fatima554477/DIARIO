<?php
/**
 	--------------------------
	Autor: Sandor Matamoros
	Programer: Fatima Arellano
	Propietario: EPC
	----------------------------
 
*/

define("__ROOT1__", dirname(dirname(__FILE__)));
	include_once (__ROOT1__."/../includes/error_reporting.php");
	include_once (__ROOT1__."/../calendariodeeventos2/class.epcinnAE.php");

	
	class orders extends accesoclase {
	public $mysqli;
	public $counter;//Propiedad para almacenar el numero de registro devueltos por la consulta

	function __construct(){
		$this->mysqli = $this->db();
    }
	
	public function countAll($sql){
		$query=$this->mysqli->query($sql);
		$count=$query->num_rows;
		return $count;
	}
	//STATUS_EVENTO,NOMBRE_CORTO_EVENTO,NOMBRE_EVENTO
	public function getData($tables,$campos,$search){
		$offset=$search['offset'];
		$per_page=$search['per_page'];
		
		$sWhere=" ";
		//04VEHICULOSEVE,04altaeventos
		$tables1 = '04altaeventos';
		$tables = '04vehiculoevento'; 		
$sWhere2="";$sWhere3="";




if($search['NUMERO_EVENTO']!=""){
$sWhere2.="  $tables1.NUMERO_EVENTO LIKE   '%".$search['NUMERO_EVENTO']."%' OR ";}

if($search['NOMBRE_EVENTO']!=""){
$sWhere2.="  $tables1.NOMBRE_EVENTO LIKE   '%".$search['NOMBRE_EVENTO']."%' OR ";}

if($search['FECHA_INICIO_EVENTO']!=""){
$sWhere2.="  $tables1.FECHA_INICIO_EVENTO LIKE  '%".$search['FECHA_INICIO_EVENTO']."%' OR ";}

if($search['PAIS_DEL_EVENTO']!=""){
$sWhere2.="  $tables1.PAIS_DEL_EVENTO LIKE   '%".$search['PAIS_DEL_EVENTO']."%' OR ";}

if($search['CIUDAD_DEL_EVENTO']!=""){
$sWhere2.="  $tables1.CIUDAD_DEL_EVENTO LIKE  '%".$search['CIUDAD_DEL_EVENTO']."%' OR ";}




if($search['VEHICULOSEVE_VEHICULO']!=""){
$sWhere2.="  $tables.VEHICULOSEVE_VEHICULO LIKE '%".$search['VEHICULOSEVE_VEHICULO']."%' OR ";}

if($search['VEHICULOSEVE_CANTIDAD']!=""){
$sWhere2.="  $tables.VEHICULOSEVE_CANTIDAD LIKE '%".$search['VEHICULOSEVE_CANTIDAD']."%' OR ";}

if($search['VEHICULOSEVE_FOTO']!=""){
$sWhere2.="  $tables.VEHICULOSEVE_FOTO LIKE '%".$search['VEHICULOSEVE_FOTO']."%' OR ";}
if($search['VEHICULOSEVE_ENTREGA']!=""){
$sWhere2.="  $tables.VEHICULOSEVE_ENTREGA LIKE '%".$search['VEHICULOSEVE_ENTREGA']."%' OR ";}
if($search['VEHICULOSEVE_LUGAR']!=""){
$sWhere2.="  $tables.VEHICULOSEVE_LUGAR LIKE '%".$search['VEHICULOSEVE_LUGAR']."%' OR ";}
if($search['VEHICULOSEVE_HORA']!=""){
$sWhere2.="  $tables.VEHICULOSEVE_HORA LIKE '%".$search['VEHICULOSEVE_HORA']."%' OR ";}
if($search['VEHICULOSEVE_DEVOLU']!=""){
$sWhere2.="  $tables.VEHICULOSEVE_DEVOLU LIKE '%".$search['VEHICULOSEVE_DEVOLU']."%' OR ";}
if($search['VEHICULOSEVE_LUDEVO']!=""){
$sWhere2.="  $tables.VEHICULOSEVE_LUDEVO LIKE '%".$search['VEHICULOSEVE_LUDEVO']."%' OR ";}
if($search['VEHICULOSEVE_HORADEVO']!=""){
$sWhere2.="  $tables.VEHICULOSEVE_HORADEVO LIKE '%".$search['VEHICULOSEVE_HORADEVO']."%' OR ";}
if($search['VEHICULOSEVE_SOLICITUD']!=""){
$sWhere2.="  $tables.VEHICULOSEVE_SOLICITUD LIKE '%".$search['VEHICULOSEVE_SOLICITUD']."%' OR ";}
if($search['VEHICULOSEVE_DIAS']!=""){
$sWhere2.="  $tables.VEHICULOSEVE_DIAS LIKE '%".$search['VEHICULOSEVE_DIAS']."%' OR ";}
if($search['VEHICULOSEVE_COSTO']!=""){
$sWhere2.="  $tables.VEHICULOSEVE_COSTO LIKE '%".$search['VEHICULOSEVE_COSTO']."%' OR ";}
if($search['VEHICULOSEVE_IVA']!=""){
$sWhere2.="  $tables.VEHICULOSEVE_IVA LIKE '%".$search['VEHICULOSEVE_IVA']."%' OR ";}
if($search['VEHICULOSEVE_SUB']!=""){
$sWhere2.="  $tables.VEHICULOSEVE_SUB LIKE '%".$search['VEHICULOSEVE_SUB']."%' OR ";}
if($search['PRECIOPESOS_SOFTWARE']!=""){
$sWhere2.="  $tables.PRECIOPESOS_SOFTWARE LIKE '%".$search['PRECIOPESOS_SOFTWARE']."%' OR ";}
if($search['VEHICULOSEVE_OBSERVA']!=""){
$sWhere2.="  $tables.VEHICULOSEVE_OBSERVA LIKE '%".$search['VEHICULOSEVE_OBSERVA']."%' OR ";}
if($search['HVEHICULOSEVE']!=""){
$sWhere2.="  $tables.HVEHICULOSEVE LIKE '%".$search['HVEHICULOSEVE']."%' OR ";}

IF($sWhere2!=""){

				$sWhere22 = substr($sWhere2,0,-3);
			$sWhere3  = ' 04altaeventos left join 04vehiculoevento ON 04altaeventos.id = 04vehiculoevento.idRelacion  
			where (  (VEHICULOSEVE_VEHICULO is not null or VEHICULOSEVE_VEHICULO <> "" ) and '.$sWhere22.' ) ';
		}ELSE{
		$sWhere3  = ' 04altaeventos left join 04vehiculoevento ON 04altaeventos.id = 04vehiculoevento.idRelacion where ( VEHICULOSEVE_VEHICULO is not null or VEHICULOSEVE_VEHICULO <> "" ) ';	
		}
		
/*SELECT * FROM 04altaeventos left join 04VEHICULOSEVE ON 04altaeventos.id = 04VEHICULOSEVE.idRelacion order by 04altaeventos left join 04VEHICULOSEVE ON 04altaeventos.id = 04VEHICULOSEVE.idRelacion .id desc LIMIT 0,10 */

		
		$sWhere3.="  order by $tables.id desc ";
		$sql="SELECT $campos, 04altaeventos.id as id FROM $sWhere $sWhere3 LIMIT $offset,$per_page";
		
		$query=$this->mysqli->query($sql);
		$sql1="SELECT $campos FROM $sWhere $sWhere3 ";
		$nums_row=$this->countAll($sql1);
		//Set counter
		$this->setCounter($nums_row);
		return $query;
	}
	function setCounter($counter) {
		$this->counter = $counter;
	}
	function getCounter() {
		return $this->counter;
	}
}
?>
