<script type="text/javascript">
	
	/*filtro */

/* iniciaB1*/
function LIMPIAR60(){
 $("#NUMERO_EVENTO_1").val("");
 $("#NOMBRE_EVENTO_1").val("");
 $("#FECHA_INICIO_EVENTO_1").val("");
 $("#PAIS_DEL_EVENTO_1").val("");
 $("#CIUDAD_DEL_EVENTO_1").val("");
 $("#DEPARTAMENTO2WE").val("");
 
 
 $("#VEHICULOSEVE_VEHICULO_1").val("");
 $("#VEHICULOSEVE_LUGAR_1").val("");
 $("#VEHICULOSEVE_HORA_1").val("");
 $("#VEHICULOSEVE_FOTO_1").val("");
 $("#VEHICULOSEVE_ENTREGA_1").val("");
 $("#VEHICULOSEVE_DEVOLU_1").val("");
 $("#VEHICULOSEVE_LUDEVO_1").val("");
 $("#VEHICULOSEVE_HORADEVO_1").val("");
 $("#VEHICULOSEVE_SOLICITUD_1").val("");
 $("#VEHICULOSEVE_DIAS_1").val("");
 $("#VEHICULOSEVE_COSTO_1").val("");
 $("#VEHICULOSEVE_IVA_1").val("");
 $("#VEHICULOSEVE_SUB_1").val("");
 $("#PRECIOPESOS_SOFTWARE_1").val("");
 $("#VEHICULOSEVE_OBSERVA_1").val("");
 $("#HVEHICULOSEVE_1").val("");

 
		$(function() {
			loadVEHI(1);
		});
}


		$(function() {
			loadVEHI(1);
		});
		function loadVEHI(page){
			var query=$("#NOMBRE_EVENTO").val();
			var NUMERO_EVENTO=$("#NUMERO_EVENTO_1").val();
			var DEPARTAMENTO2=$("#DEPARTAMENTO2WE").val();
			
			var NOMBRE_EVENTO=$("#NOMBRE_EVENTO_1").val();
			var FECHA_INICIO_EVENTO=$("#FECHA_INICIO_EVENTO_1").val();
			var PAIS_DEL_EVENTO=$("#PAIS_DEL_EVENTO_1").val();
			var CIUDAD_DEL_EVENTO=$("#CIUDAD_DEL_EVENTO_1").val();
			
				
			
var VEHICULOSEVE_VEHICULO=$("#VEHICULOSEVE_VEHICULO_1").val();
var VEHICULOSEVE_CANTIDAD=$("#VEHICULOSEVE_CANTIDAD_1").val();
var VEHICULOSEVE_FOTO=$("#VEHICULOSEVE_FOTO_1").val();
var VEHICULOSEVE_ENTREGA=$("#VEHICULOSEVE_ENTREGA_1").val();
var VEHICULOSEVE_LUGAR=$("#VEHICULOSEVE_LUGAR_1").val();
var VEHICULOSEVE_HORA=$("#VEHICULOSEVE_HORA_1").val();
var VEHICULOSEVE_DEVOLU=$("#VEHICULOSEVE_DEVOLU_1").val();
var VEHICULOSEVE_LUDEVO=$("#VEHICULOSEVE_LUDEVO_1").val();
var VEHICULOSEVE_HORADEVO=$("#VEHICULOSEVE_HORADEVO_1").val();
var VEHICULOSEVE_SOLICITUD=$("#VEHICULOSEVE_SOLICITUD_1").val();
var VEHICULOSEVE_DIAS=$("#VEHICULOSEVE_DIAS_1").val();
var VEHICULOSEVE_COSTO=$("#VEHICULOSEVE_COSTO_1").val();
var VEHICULOSEVE_IVA=$("#VEHICULOSEVE_IVA_1").val();
var VEHICULOSEVE_SUB=$("#VEHICULOSEVE_SUB_1").val();
var PRECIOPESOS_SOFTWARE=$("#PRECIOPESOS_SOFTWARE_1").val();
var VEHICULOSEVE_OBSERVA=$("#VEHICULOSEVE_OBSERVA_1").val();
var HVEHICULOSEVE=$("#HVEHICULOSEVE_1").val();

/*termina copiar y pegar*/
			
			var per_page=$("#per_pageVE").val();
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


'VEHICULOSEVE_VEHICULO':VEHICULOSEVE_VEHICULO,  
'VEHICULOSEVE_FOTO':VEHICULOSEVE_FOTO,
'VEHICULOSEVE_ENTREGA':VEHICULOSEVE_ENTREGA,
'VEHICULOSEVE_LUGAR':VEHICULOSEVE_LUGAR,
'VEHICULOSEVE_HORA':VEHICULOSEVE_HORA,
'VEHICULOSEVE_DEVOLU':VEHICULOSEVE_DEVOLU,
'VEHICULOSEVE_LUDEVO':VEHICULOSEVE_LUDEVO,
'VEHICULOSEVE_HORADEVO':VEHICULOSEVE_HORADEVO,
'VEHICULOSEVE_SOLICITUD':VEHICULOSEVE_SOLICITUD,
'VEHICULOSEVE_DIAS':VEHICULOSEVE_DIAS,
'VEHICULOSEVE_COSTO':VEHICULOSEVE_COSTO,
'VEHICULOSEVE_IVA':VEHICULOSEVE_IVA,
'VEHICULOSEVE_SUB':VEHICULOSEVE_SUB,
'PRECIOPESOS_SOFTWARE':PRECIOPESOS_SOFTWARE,
'VEHICULOSEVE_OBSERVA':VEHICULOSEVE_OBSERVA,
'HVEHICULOSEVE':HVEHICULOSEVE,
/*termina copiar y pegar*/

			'DEPARTAMENTO2':DEPARTAMENTO2
			};
			$("#loader74").fadeIn('slow');
			$.ajax({
				url:'DIARIO/clasesVEHICULOS/controlador_filtro.php',
				type: 'POST',				
				data: parametros,
				 beforeSend: function(objeto){
				$("#loader74").html("Cargando...");
			  },
				success:function(data){//datos_ajaxBO
					$(".datos_ajaxVEHI").html(data).fadeIn('slow');
					$("#loader74").html("");
				}
			})
		}
/* terminaB1*/		
		
	</script>
