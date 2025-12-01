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
		//04OFICINA,04altaeventos
		$tables1 = '04altaeventos';
		$tables = '04oficina'; 		
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




if($search['OFICINA_EQUIPO']!=""){
$sWhere2.="  $tables.OFICINA_EQUIPO LIKE '%".$search['OFICINA_EQUIPO']."%' OR ";}

if($search['OFICINA_CANTIDAD']!=""){
$sWhere2.="  $tables.OFICINA_CANTIDAD LIKE '%".$search['OFICINA_CANTIDAD']."%' OR ";}

if($search['OFICINA_FOTO']!=""){
$sWhere2.="  $tables.OFICINA_FOTO LIKE '%".$search['OFICINA_FOTO']."%' OR ";}
if($search['OFICINA_ENTREGA']!=""){
$sWhere2.="  $tables.OFICINA_ENTREGA LIKE '%".$search['OFICINA_ENTREGA']."%' OR ";}
if($search['OFICINA_LUGAR']!=""){
$sWhere2.="  $tables.OFICINA_LUGAR LIKE '%".$search['OFICINA_LUGAR']."%' OR ";}
if($search['OFICINA_HORA']!=""){
$sWhere2.="  $tables.OFICINA_HORA LIKE '%".$search['OFICINA_HORA']."%' OR ";}
if($search['OFICINA_DEVOLU']!=""){
$sWhere2.="  $tables.OFICINA_DEVOLU LIKE '%".$search['OFICINA_DEVOLU']."%' OR ";}
if($search['OFICINA_LUDEVO']!=""){
$sWhere2.="  $tables.OFICINA_LUDEVO LIKE '%".$search['OFICINA_LUDEVO']."%' OR ";}
if($search['OFICINA_HORADEVO']!=""){
$sWhere2.="  $tables.OFICINA_HORADEVO LIKE '%".$search['OFICINA_HORADEVO']."%' OR ";}
if($search['OFICINA_SOLICITUD']!=""){
$sWhere2.="  $tables.OFICINA_SOLICITUD LIKE '%".$search['OFICINA_SOLICITUD']."%' OR ";}
if($search['OFICINA_DIAS']!=""){
$sWhere2.="  $tables.OFICINA_DIAS LIKE '%".$search['OFICINA_DIAS']."%' OR ";}
if($search['OFICINA_COSTO']!=""){
$sWhere2.="  $tables.OFICINA_COSTO LIKE '%".$search['OFICINA_COSTO']."%' OR ";}
if($search['OFICINA_IVA']!=""){
$sWhere2.="  $tables.OFICINA_IVA LIKE '%".$search['OFICINA_IVA']."%' OR ";}
if($search['OFICINA_SUB']!=""){
$sWhere2.="  $tables.OFICINA_SUB LIKE '%".$search['OFICINA_SUB']."%' OR ";}
if($search['OFICINA_TOTAL']!=""){
$sWhere2.="  $tables.OFICINA_TOTAL LIKE '%".$search['OFICINA_TOTAL']."%' OR ";}
if($search['OFICINA_OBSERVA']!=""){
$sWhere2.="  $tables.OFICINA_OBSERVA LIKE '%".$search['OFICINA_OBSERVA']."%' OR ";}
if($search['HOFICINA']!=""){
$sWhere2.="  $tables.HOFICINA LIKE '%".$search['HOFICINA']."%' OR ";}

IF($sWhere2!=""){

				$sWhere22 = substr($sWhere2,0,-3);
			$sWhere3  = ' 04altaeventos left join 04oficina ON 04altaeventos.id = 04oficina.idRelacion  
			where (  (OFICINA_EQUIPO is not null or OFICINA_EQUIPO <> "" ) and '.$sWhere22.' ) ';
		}ELSE{
		$sWhere3  = ' 04altaeventos left join 04oficina ON 04altaeventos.id = 04oficina.idRelacion where ( OFICINA_EQUIPO is not null or OFICINA_EQUIPO <> "" ) ';	
		}
		
/*SELECT * FROM 04altaeventos left join 04OFICINA ON 04altaeventos.id = 04OFICINA.idRelacion order by 04altaeventos left join 04OFICINA ON 04altaeventos.id = 04OFICINA.idRelacion .id desc LIMIT 0,10 */

		
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
