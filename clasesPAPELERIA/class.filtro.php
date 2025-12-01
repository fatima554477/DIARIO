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
		//04PAPELERIA,04altaeventos
		$tables1 = '04altaeventos';
		$tables = '04papeleria'; 		
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




if($search['PAPELERIA_EQUIPO']!=""){
$sWhere2.="  $tables.PAPELERIA_EQUIPO LIKE '%".$search['PAPELERIA_EQUIPO']."%' OR ";}

if($search['PAPELERIA_CANTIDAD']!=""){
$sWhere2.="  $tables.PAPELERIA_CANTIDAD LIKE '%".$search['PAPELERIA_CANTIDAD']."%' OR ";}

if($search['PAPELERIA_FOTO']!=""){
$sWhere2.="  $tables.PAPELERIA_FOTO LIKE '%".$search['PAPELERIA_FOTO']."%' OR ";}
if($search['PAPELERIA_ENTREGA']!=""){
$sWhere2.="  $tables.PAPELERIA_ENTREGA LIKE '%".$search['PAPELERIA_ENTREGA']."%' OR ";}
if($search['PAPELERIA_LUGAR']!=""){
$sWhere2.="  $tables.PAPELERIA_LUGAR LIKE '%".$search['PAPELERIA_LUGAR']."%' OR ";}
if($search['PAPELERIA_HORA']!=""){
$sWhere2.="  $tables.PAPELERIA_HORA LIKE '%".$search['PAPELERIA_HORA']."%' OR ";}
if($search['PAPELERIA_DEVOLU']!=""){
$sWhere2.="  $tables.PAPELERIA_DEVOLU LIKE '%".$search['PAPELERIA_DEVOLU']."%' OR ";}
if($search['PAPELERIA_LUDEVO']!=""){
$sWhere2.="  $tables.PAPELERIA_LUDEVO LIKE '%".$search['PAPELERIA_LUDEVO']."%' OR ";}
if($search['PAPELERIA_HORADEVO']!=""){
$sWhere2.="  $tables.PAPELERIA_HORADEVO LIKE '%".$search['PAPELERIA_HORADEVO']."%' OR ";}
if($search['PAPELERIA_SOLICITUD']!=""){
$sWhere2.="  $tables.PAPELERIA_SOLICITUD LIKE '%".$search['PAPELERIA_SOLICITUD']."%' OR ";}
if($search['PAPELERIA_DIAS']!=""){
$sWhere2.="  $tables.PAPELERIA_DIAS LIKE '%".$search['PAPELERIA_DIAS']."%' OR ";}
if($search['PAPELERIA_COSTO']!=""){
$sWhere2.="  $tables.PAPELERIA_COSTO LIKE '%".$search['PAPELERIA_COSTO']."%' OR ";}
if($search['PAPELERIA_IVA']!=""){
$sWhere2.="  $tables.PAPELERIA_IVA LIKE '%".$search['PAPELERIA_IVA']."%' OR ";}
if($search['PAPELERIA_SUB']!=""){
$sWhere2.="  $tables.PAPELERIA_SUB LIKE '%".$search['PAPELERIA_SUB']."%' OR ";}
if($search['PAPELERIA_TOTAL']!=""){
$sWhere2.="  $tables.PAPELERIA_TOTAL LIKE '%".$search['PAPELERIA_TOTAL']."%' OR ";}
if($search['PAPELERIA_OBSERVA']!=""){
$sWhere2.="  $tables.PAPELERIA_OBSERVA LIKE '%".$search['PAPELERIA_OBSERVA']."%' OR ";}
if($search['HPAPELERIA']!=""){
$sWhere2.="  $tables.HPAPELERIA LIKE '%".$search['HPAPELERIA']."%' OR ";}

IF($sWhere2!=""){

				$sWhere22 = substr($sWhere2,0,-3);
			$sWhere3  = ' 04altaeventos left join 04papeleria ON 04altaeventos.id = 04papeleria.idRelacion  
			where (  (PAPELERIA_EQUIPO is not null or PAPELERIA_EQUIPO <> "" ) and '.$sWhere22.' ) ';
		}ELSE{
		$sWhere3  = ' 04altaeventos left join 04papeleria ON 04altaeventos.id = 04papeleria.idRelacion where ( PAPELERIA_EQUIPO is not null or PAPELERIA_EQUIPO <> "" ) ';	
		}
		
/*SELECT * FROM 04altaeventos left join 04PAPELERIA ON 04altaeventos.id = 04PAPELERIA.idRelacion order by 04altaeventos left join 04PAPELERIA ON 04altaeventos.id = 04PAPELERIA.idRelacion .id desc LIMIT 0,10 */

		
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
