<script type="text/javascript">

function LIMPIAR7(){
 $("#idRelacionDiario_1").val("");
 $("#nombreDiario_1").val("");
 $("#departamentoDiario_1").val("");
 $("#OBSERVACIONES_SOLICITUD_1").val("");
 $("#FECHA_SOLICITUD_1").val("");
 $("#grupo_1").val("");

 
		$(function() {
			loadI1(1);
		});
}

		$(function() {
			loadI1(1);
		});
		function loadI1(page){
			var query=$("#NOMBRE_EVENTO").val();
			var DEPARTAMENTO2=$("#DEPARTAMENTO2WE").val();
			var FECHA_INCIDENCIAS=$("#FECHA_INCIDENCIAS_1").val();
var idRelacionDiario=$("#idRelacionDiario_1").val();
var nombreDiario=$("#nombreDiario_1").val();
var departamentoDiario=$("#departamentoDiario_1").val();
var OBSERVACIONES_SOLICITUD=$("#OBSERVACIONES_SOLICITUD_1").val();
var FECHA_SOLICITUD=$("#FECHA_SOLICITUD_1").val();
var grupo=$("#grupo_1").val();

/*termina copiar y pegar*/
			
			var per_page=$("#per_pageI").val();
			var parametros = {
			"action":"ajax",
			"page":page,
			'query':query,
			'per_page':per_page,

/*inicia copiar y pegar*/
'idRelacionDiario':idRelacionDiario,
'nombreDiario':nombreDiario,
'departamentoDiario':departamentoDiario,
'OBSERVACIONES_SOLICITUD':OBSERVACIONES_SOLICITUD,
'FECHA_SOLICITUD':FECHA_SOLICITUD,
'grupo':grupo,
/*termina copiar y pegar*/

			'DEPARTAMENTO2':DEPARTAMENTO2
			};
			$("#loaderI").fadeIn('slow');
			$.ajax({
				url:'DIARIO/SUPERFILTRO/controlador_filtro.php',
				type: 'POST',				
				data: parametros,
				 beforeSend: function(objeto){
				$("#loaderI").html("Cargando...");
			  },
				success:function(data){
					$(".datos_ajaxI").html(data).fadeIn('slow');
					$("#loaderI").html("");
				}
			})
		}
/* terminaB1*/		
		
	</script>
