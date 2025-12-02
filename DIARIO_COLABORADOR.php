<?php

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
isset($_SESSION["logeado"])?'':header("location: index.php?salir=1");

require "includes/error_reporting.php";
require "DIARIO/controladorDC.php";

		
?><!doctype html>
<html lang="en" class="light-theme">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- loader-->
	  <link href="assets/css/pace.min.css" rel="stylesheet" />
	  <script src="assets/js/pace.min.js"></script>
   <!--<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="altaeventos/typeahead.js"></script>-->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
	<style>
	
	/*.typeahead {
	border: 2px solid #CCC;
	border-radius: 4px;
	padding: 8px 12px;
	max-width: 300px;min-width: 290px;
	background: rgba(66, 52, 52, 0.5);
	color: #FFF;
	}
	.tt-menu { width:300px; }
	
	ul.typeahead{margin:0px;padding:10px 0px;}
	
	ul.typeahead.dropdown-menu li a {
		padding: 10px !important;	
		border-bottom:#CCC 1px solid;
		color:#FFF;
		}
	ul.typeahead.dropdown-menu li:last-child a { 
	border-bottom:0px !important; 
	}
	.bgcolor {
		max-width: 550px;
		min-width:290px; 
		max-height:340px;
		border-radius:4px;
		text-align:center;
		margin:10px;
		}
	
	.demo-label {
		font-size:1.5em;
		color: #686868;
		font-weight: 500;
		color:#FFF;}
	
	.dropdown-menu>.active>a, .dropdown-menu>.active>a:focus, .dropdown-menu>.active>a:hover {
		text-decoration: none;
		background-color: #1f3f41;
		outline: 0;
	}
	*/
	
/*	
.tt-query, // UPDATE: newer versions use tt-input instead of tt-query 
.tt-hint {
    width: 396px;
    height: 30px;
    padding: 8px 12px;
    font-size: 24px;
    line-height: 30px;
    border: 2px solid #ccc;
    border-radius: 8px;
    outline: none;
}

.tt-query { // UPDATE: newer versions use tt-input instead of tt-query
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
}

.tt-hint {
    color: #999;
}

.tt-menu { // UPDATE: newer versions use tt-menu instead of tt-dropdown-menu
    width: 422px;
    margin-top: 12px;
    padding: 8px 0;
    background-color: #fff;
    border: 1px solid #ccc;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 8px;
    box-shadow: 0 5px 10px rgba(0,0,0,.2);
}

.tt-suggestion {
    padding: 3px 20px;
    font-size: 18px;
    line-height: 24px;
}

.tt-suggestion.tt-is-under-cursor { /* UPDATE: newer versions use .tt-suggestion.tt-cursor */
    color: #fff;
    background-color: #0097cf;

}

.tt-suggestion p {
    margin: 0;
}	
*/


span.twitter-typeahead .tt-menu,
span.twitter-typeahead .tt-dropdown-menu {
  cursor: pointer;
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 1000;
  display: none;
  float: left;
  min-width: 160px;
  padding: 5px 0;
  margin: 2px 0 0;
  list-style: none;
  font-size: 14px;
  text-align: left;
  background-color: #ffffff;
  border: 1px solid #cccccc;
  border: 1px solid rgba(0, 0, 0, 0.15);
  border-radius: 4px;
  -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
  background-clip: padding-box;
}
span.twitter-typeahead .tt-suggestion {
  display: block;
  padding: 3px 20px;
  clear: both;
  font-weight: normal;
  line-height: 1.42857143;
  color: #333333;
  white-space: nowrap;
}
span.twitter-typeahead .tt-suggestion.tt-cursor,
span.twitter-typeahead .tt-suggestion:hover,
span.twitter-typeahead .tt-suggestion:focus {
  color: #ffffff;
  text-decoration: none;
  outline: 0;
  background-color: #337ab7;
}
.input-group.input-group-lg span.twitter-typeahead .form-control {
  height: 46px;
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.3333333;
  border-radius: 6px;
}
.input-group.input-group-sm span.twitter-typeahead .form-control {
  height: 30px;
  padding: 5px 10px;
  font-size: 12px;
  line-height: 1.5;
  border-radius: 3px;
}
span.twitter-typeahead {
  width: 100%;
}
.input-group span.twitter-typeahead {
  display: block !important;
  height: 34px;
}
.input-group span.twitter-typeahead .tt-menu,
.input-group span.twitter-typeahead .tt-dropdown-menu {
  top: 32px !important;
}
.input-group span.twitter-typeahead:not(:first-child):not(:last-child) .form-control {
  border-radius: 0;
}
.input-group span.twitter-typeahead:first-child .form-control {
  border-top-left-radius: 4px;
  border-bottom-left-radius: 4px;
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
}
.input-group span.twitter-typeahead:last-child .form-control {
  border-top-left-radius: 0;
  border-bottom-left-radius: 0;
  border-top-right-radius: 4px;
  border-bottom-right-radius: 4px;
}
.input-group.input-group-sm span.twitter-typeahead {
  height: 30px;
}
.input-group.input-group-sm span.twitter-typeahead .tt-menu,
.input-group.input-group-sm span.twitter-typeahead .tt-dropdown-menu {
  top: 30px !important;
}
.input-group.input-group-lg span.twitter-typeahead {
  height: 46px;
}
.input-group.input-group-lg span.twitter-typeahead .tt-menu,
.input-group.input-group-lg span.twitter-typeahead .tt-dropdown-menu {
  top: 46px !important;
}

	</style>		
    <!--plugins-->
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />

    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <!--Theme Styles-->
    <link href="assets/css/dark-theme.css" rel="stylesheet" />
    <link href="assets/css/semi-dark.css" rel="stylesheet" />
    <link href="assets/css/header-colors.css" rel="stylesheet" />
        <style type="text/css">
            #content {

            }
            #close {

            }
            .content2 {
                margin: 0px auto;
                min-height: 100px;
                box-shadow: 0 2px 5px #666666;
                padding: 10px;
            }
			
	#drop_file_zone {
	    background-color: #EEE;
	    border: #999 1px solid;
	    padding: 8px;
	}			

	#nono {
	  display: none;
	}
	
input[type=text] {
    text-transform: uppercase;
}


.fixed2{
position:fixed;
top:65px;
background-color:#fff;
margin-left:500px;
box-shadow:0 0 10px #222;
-webkit-box-shadow:0 0 10px #222;
-moz-box-shadow:0 0 10px #222;
z-index:1;
}

#ACTUALIZADO{
color:green;
    text-transform: uppercase;
	font-size:30px;
	font-weight: bold;
}
  #ERROR{
color:red;
    text-transform: uppercase;
	font-size:25px;
	font-weight: bold;
}

		td ,tr, table, textarea {
    text-transform: uppercase;
}
        </style>
    <title>DIARIO COLABORADORES</title>
  </head>
  <body>
    

 <!--start wrapper-->
    <div class="wrapper">
       <!--start sidebar -->
	    <aside class="sidebar-wrapper" data-simplebar="true">
      <?php require "includes/menuLateral.php"; /*php menu lateral*/ ?>
		</aside>
     <!--end sidebar -->

        <!--start top header-->
          <header class="top-header">
<?php 
	require "DIARIO/notificaciones3.php"; /*php notificaciones*/ 
?>
          </header>
        <!--end top header-->


        <!-- start page content wrapper-->
        <div class="page-content-wrapper">
          <!-- start page content-->
         <div class="page-content">

          <!--start breadcrumb-->
          <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
<?php 	
	require "DIARIO/mapeo3.php"; /*php mapa*/ 
?>
          </div>
          <!--end breadcrumb SOLICITUD -->

          <div class="row">
            <div class="col-xl-12 mx-auto"> 
<?php

	//ECHO 'PPP'.$SOLICITUD->departamentoDiarioPapeleria2();
	
	/*require "DIARIO/expansores.php";*/
	   require "DIARIO/fetch_page_nuevoAUCOM.php";
	   require "DIARIO/fetch_page_nuevocom2.php";
	   require "DIARIO/fetch_page_nuevo3.php";
	 require "DIARIO/fetch_page_nuevop2.php";
	   
	    require "reportes/fetch_page_AMERICANE2.php";
	    require "reportes/fetch_page_BBVA2.php";
	    require "reportes/fetch_page_INBURSA2.php";
	    require "INCIDENCIAS/fetch_page_nuevo2.php";
	if($SOLICITUD->departamentoDiarioVEHICULOS2()>=1){
	/*require "DIARIO/VEHICULOS2.php"; */
		require "DIARIO/fetch_page_vehiculos.php";
	}
	if($SOLICITUD->departamentoDiarioMATERIAL2()>=1){
	/*require "DIARIO/MATERIALYEQUIPO2.php";*/
	require "DIARIO/fetch_page_material.php";
	}
	if($SOLICITUD->departamentoDiarioPAPELERIA2()>=1){
	/*require "DIARIO/PAPELERIA2.php";*/
	require "DIARIO/fetch_page_papeleria.php";
	}
	if($SOLICITUD->departamentoDiarioEQUIPODEOFICINA2()>=1){
	/*require "DIARIO/EQUIPOOFICINA2.php";*/
	require "DIARIO/fetch_page_oficina.php";
	}
	
	if($SOLICITUD->departamentoDiarioBOTIQUIN2()>=1){
	/*require "DIARIO/BOTIQUIN2.php";*/
    require "DIARIO/fetch_page_botiquin.php";
	}
	if($SOLICITUD->departamentoDiarioMENSAJERIA2()>=1){
	require "DIARIO/fetch_page_mensajeria2.php";
	}	


    require "DIARIO/GRUPOS.php";
    require "DIARIO/GRUPOS_TODOS.php";
?>
            </div>
          </div>
             

          </div>
          <!-- end page content-->
         </div>
         


         <!--Start Back To Top Button-->
		     <a href="javaScript:;" class="back-to-top"><ion-icon name="arrow-up-outline"></ion-icon></a>
         <!--End Back To Top Button-->
  
         <!--start switcher-->
         <div class="switcher-body">
		 <?php require "includes/coloresEncabezado.php"; ?>
         </div>
         <!--end switcher-->


         <!--start overlay-->
          <div class="overlay"></div>
         <!--end overlay-->

     </div>
  <!--end wrapper-->

    <!-- JS Files-->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script src="assets/bootstrap/js/jquery.min.js"></script>
    <script src="//code.angularjs.org/snapshot/angular.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jspdf.umd.min.js"></script> 
    <script src="js/html2canvas.min.js"></script> 
    <script src="js/convertir.js"></script>                
    <script src="html2pdf.bundle.min.js"></script>
    <script src="colaboradores/script.js"></script> 
    <script src="assets/js/jquery.min.js"></script>
	<?php require "includes/convertirma.php"; ?>
	<?php require "calendariodeeventos2/scriptAE.php"; ?>
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="assets/js/main.js"></script>


  </body>
</html>