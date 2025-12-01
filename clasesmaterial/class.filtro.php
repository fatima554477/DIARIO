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

		$tables1 = '04altaeventos';
		$tables = '04materialyequipo'; 		
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


		
if($search['MATERIAL_EQUIPO']!=""){
$sWhere2.="  $tables.MATERIAL_EQUIPO LIKE '%".$search['MATERIAL_EQUIPO']."%' OR ";}
if($search['MATERIAL_CANTIDAD']!=""){
$sWhere2.="  $tables.MATERIAL_CANTIDAD LIKE '%".$search['MATERIAL_CANTIDAD']."%' OR ";}
if($search['MATERIAL_FOTO']!=""){
$sWhere2.="  $tables.MATERIAL_FOTO LIKE '%".$search['MATERIAL_FOTO']."%' OR ";}
if($search['MATERIAL_ENTREGA']!=""){
$sWhere2.="  $tables.MATERIAL_ENTREGA LIKE '%".$search['MATERIAL_ENTREGA']."%' OR ";}
if($search['MATERIAL_LUGAR']!=""){
$sWhere2.="  $tables.MATERIAL_LUGAR LIKE '%".$search['MATERIAL_LUGAR']."%' OR ";}
if($search['MATERIAL_HORA']!=""){
$sWhere2.="  $tables.MATERIAL_HORA LIKE '%".$search['MATERIAL_HORA']."%' OR ";}
if($search['MATERIAL_DEVOLU']!=""){
$sWhere2.="  $tables.MATERIAL_DEVOLU LIKE '%".$search['MATERIAL_DEVOLU']."%' OR ";}
if($search['MATERIAL_LUDEVO']!=""){
$sWhere2.="  $tables.MATERIAL_LUDEVO LIKE '%".$search['MATERIAL_LUDEVO']."%' OR ";}
if($search['MATERIAL_HORADEVO']!=""){
$sWhere2.="  $tables.MATERIAL_HORADEVO LIKE '%".$search['MATERIAL_HORADEVO']."%' OR ";}
if($search['MATERIAL_SOLICITUD']!=""){
$sWhere2.="  $tables.MATERIAL_SOLICITUD LIKE '%".$search['MATERIAL_SOLICITUD']."%' OR ";}
if($search['MATERIAL_DIAS']!=""){
$sWhere2.="  $tables.MATERIAL_DIAS LIKE '%".$search['MATERIAL_DIAS']."%' OR ";}
if($search['MATERIAL_COSTO']!=""){
$sWhere2.="  $tables.MATERIAL_COSTO LIKE '%".$search['MATERIAL_COSTO']."%' OR ";}
if($search['MATERIAL_IVA']!=""){
$sWhere2.="  $tables.MATERIAL_IVA LIKE '%".$search['MATERIAL_IVA']."%' OR ";}
if($search['MATERIAL_SUB']!=""){
$sWhere2.="  $tables.MATERIAL_SUB LIKE '%".$search['MATERIAL_SUB']."%' OR ";}
if($search['MATERIAL_TOTAL']!=""){
$sWhere2.="  $tables.MATERIAL_TOTAL LIKE '%".$search['MATERIAL_TOTAL']."%' OR ";}
if($search['MATERIAL_OBSERVA']!=""){
$sWhere2.="  $tables.MATERIAL_OBSERVA LIKE '%".$search['MATERIAL_OBSERVA']."%' OR ";}
if($search['HMATERIAL']!=""){
$sWhere2.="  $tables.HMATERIAL LIKE '%".$search['HMATERIAL']."%' OR ";}
IF($sWhere2!=""){

				$sWhere22 = substr($sWhere2,0,-3);
			$sWhere3  = ' 04altaeventos left join 04materialyequipo ON 04altaeventos.id = 04materialyequipo.idRelacion  
			where (  (MATERIAL_EQUIPO is not null or MATERIAL_EQUIPO <> "" ) and '.$sWhere22.' ) ';
		}ELSE{
		$sWhere3  = ' 04altaeventos left join 04materialyequipo ON 04altaeventos.id = 04materialyequipo.idRelacion where ( MATERIAL_EQUIPO is not null or MATERIAL_EQUIPO <> "" ) ';	
		}
		$sWhere3.="  order by $tables.id desc ";
		$sql="SELECT $campos, 04altaeventos.id as id FROM $sWhere $sWhere3 LIMIT $offset,$per_page";
		
		$query=$this->mysqli->query($sql);
		$sql1="SELECT $campos FROM  $tables $sWhere $sWhere3 ";
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
