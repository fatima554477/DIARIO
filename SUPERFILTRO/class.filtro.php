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
	include_once (__ROOT1__."/../DIARIO/class.epcinnDC.php");

	
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
		$sWhere2="";
$sWhere3="";if($search['idRelacionDiario']!=""){
$sWhere2.="  $tables.idRelacionDiario LIKE '%".$search['idRelacionDiario']."%' OR ";}

if($search['id']!=""){
$sWhere2.="  $tables.id = '".$search['id']."' OR ";}

if($search['nombreDiario']!=""){
$sWhere2.="  $tables.nombreDiario LIKE '%".$search['nombreDiario']."%' OR ";}

if($search['departamentoDiario']!=""){
$sWhere2.="  $tables.departamentoDiario LIKE '%".$search['departamentoDiario']."%' OR ";}

if($search['OBSERVACIONES_SOLICITUD']!=""){
$sWhere2.="  $tables.OBSERVACIONES_SOLICITUD LIKE '%".$search['OBSERVACIONES_SOLICITUD']."%' OR ";}

if($search['FECHA_SOLICITUD']!=""){
$sWhere2.="  $tables.FECHA_SOLICITUD LIKE '%".$search['FECHA_SOLICITUD']."%' OR ";}

if($search['grupo']!=""){
$sWhere2.="  $tables.grupo LIKE '%".$search['grupo']."%' OR ";}


IF($sWhere2!=""){
				$sWhere22 = substr($sWhere2,0,-3);
			$sWhere3  = ' where ( '.$sWhere22.' ) ';
		}ELSE{
		$sWhere3  = '';	
		}
		
		$sWhere3.="  order by $tables.grupo desc ";
		 $sql="SELECT $campos FROM  $tables $sWhere $sWhere3 LIMIT $offset,$per_page";
		
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
