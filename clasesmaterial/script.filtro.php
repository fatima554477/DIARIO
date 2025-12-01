<script type="text/javascript">
	
	/*filtro */

/* iniciaB1*/
function LIMPIAR99(){
 $("#NUMERO_EVENTO_3").val("");
 $("#NOMBRE_EVENTO_3").val("");
 $("#FECHA_INICIO_EVENTO_3").val("");
 $("#PAIS_DEL_EVENTO_3").val("");
 $("#CIUDAD_DEL_EVENTO_3").val("");
 $("#DEPARTAMENTO2WE").val("");
 
 
 $("#MATERIAL_EQUIPO_3").val("");
 $("#MATERIAL_LUGAR_3").val("");
 $("#MATERIAL_HORA_3").val("");
 $("#MATERIAL_FOTO_3").val("");
 $("#MATERIAL_ENTREGA_3").val("");
 $("#MATERIAL_DEVOLU_3").val("");
 $("#MATERIAL_LUDEVO_3").val("");
 $("#MATERIAL_HORADEVO_3").val("");
 $("#MATERIAL_SOLICITUD_3").val("");
 $("#MATERIAL_DIAS_3").val("");
 $("#MATERIAL_COSTO_3").val("");
 $("#MATERIAL_IVA_3").val("");
 $("#MATERIAL_SUB_3").val("");
 $("#MATERIAL_TOTAL_3").val("");
 $("#MATERIAL_OBSERVA_3").val("");
 $("#HMATERIAL_3").val("");

 
		$(function() {
			loadMATE(1);
		});
}


		$(function() {
			loadMATE(1);
		});
		function loadMATE(page){
			var query=$("#NOMBRE_EVENTO").val();
			var DEPARTAMENTO2=$("#DEPARTAMENTO2WE").val();
			var query=$("#NOMBRE_EVENTO").val();
			var NUMERO_EVENTO=$("#NUMERO_EVENTO_3").val();
			var DEPARTAMENTO2=$("#DEPARTAMENTO2WE").val();
			var NOMBRE_EVENTO=$("#NOMBRE_EVENTO_3").val();
			var FECHA_INICIO_EVENTO=$("#FECHA_INICIO_EVENTO_3").val();
			var PAIS_DEL_EVENTO=$("#PAIS_DEL_EVENTO_3").val();
			var CIUDAD_DEL_EVENTO=$("#CIUDAD_DEL_EVENTO_3").val();			
var MATERIAL_EQUIPO=$("#MATERIAL_EQUIPO_3").val();
var MATERIAL_CANTIDAD=$("#MATERIAL_CANTIDAD_3").val();
var MATERIAL_FOTO=$("#MATERIAL_FOTO_3").val();
var MATERIAL_ENTREGA=$("#MATERIAL_ENTREGA_3").val();
var MATERIAL_LUGAR=$("#MATERIAL_LUGAR_3").val();
var MATERIAL_HORA=$("#MATERIAL_HORA_3").val();
var MATERIAL_DEVOLU=$("#MATERIAL_DEVOLU_3").val();
var MATERIAL_LUDEVO=$("#MATERIAL_LUDEVO_3").val();
var MATERIAL_HORADEVO=$("#MATERIAL_HORADEVO_3").val();
var MATERIAL_SOLICITUD=$("#MATERIAL_SOLICITUD_3").val();
var MATERIAL_DIAS=$("#MATERIAL_DIAS_3").val();
var MATERIAL_COSTO=$("#MATERIAL_COSTO_3").val();
var MATERIAL_IVA=$("#MATERIAL_IVA_3").val();
var MATERIAL_SUB=$("#MATERIAL_SUB_3").val();
var MATERIAL_TOTAL=$("#MATERIAL_TOTAL_3").val();
var MATERIAL_OBSERVA=$("#MATERIAL_OBSERVA_3").val();
var HMATERIAL=$("#HMATERIAL_3").val();

/*termina copiar y pegar*/
			
			var per_page=$("#per_pageMAT").val();
			var parametros = {
			"action":"ajax",
			"page":page,
			'query':query,
			'per_page':per_page,
			
'NUMERO_EVENTO':NUMERO_EVENTO,
'NOMBRE_EVENTO':NOMBRE_EVENTO,
'FECHA_INICIO_EVENTO':FECHA_INICIO_EVENTO,
'PAIS_DEL_EVENTO':PAIS_DEL_EVENTO,
'CIUDAD_DEL_EVENTO':CIUDAD_DEL_EVENTO,

'MATERIAL_EQUIPO':MATERIAL_EQUIPO,
'MATERIAL_CANTIDAD':MATERIAL_CANTIDAD,
'MATERIAL_FOTO':MATERIAL_FOTO,
'MATERIAL_ENTREGA':MATERIAL_ENTREGA,
'MATERIAL_LUGAR':MATERIAL_LUGAR,
'MATERIAL_HORA':MATERIAL_HORA,
'MATERIAL_DEVOLU':MATERIAL_DEVOLU,
'MATERIAL_LUDEVO':MATERIAL_LUDEVO,
'MATERIAL_HORADEVO':MATERIAL_HORADEVO,
'MATERIAL_SOLICITUD':MATERIAL_SOLICITUD,
'MATERIAL_DIAS':MATERIAL_DIAS,
'MATERIAL_COSTO':MATERIAL_COSTO,
'MATERIAL_IVA':MATERIAL_IVA,
'MATERIAL_SUB':MATERIAL_SUB,
'MATERIAL_TOTAL':MATERIAL_TOTAL,
'MATERIAL_OBSERVA':MATERIAL_OBSERVA,
'HMATERIAL':HMATERIAL,
/*termina copiar y pegar*/

			'DEPARTAMENTO2':DEPARTAMENTO2
			};
			$("#loader88").fadeIn('slow');
			$.ajax({
				url:'DIARIO/clasesmaterial/controlador_filtro.php',
				type: 'POST',				
				data: parametros,
				 beforeSend: function(objeto){
				$("#loader88").html("Cargando...");
			  },
				success:function(data){//datos_ajaxBO
					$(".datos_ajaxMATE").html(data).fadeIn('slow');
					$("#loader88").html("");
				}
			})
		}
/* terminaB1*/		
		
	</script>
