<script type="text/javascript">
	
	/*filtro */

/* iniciaB1*/
function LIMPIAR00(){
	
 $("#NUMERO_EVENTO_5").val("");
 $("#NOMBRE_EVENTO_5").val("");
 $("#FECHA_INICIO_EVENTO_5").val("");
 $("#PAIS_DEL_EVENTO_5").val("");
 $("#CIUDAD_DEL_EVENTO_5").val("");
 $("#DEPARTAMENTO2WE").val("");
 
 
 $("#OFICINA_EQUIPO_5").val("");
 $("#OFICINA_LUGAR_5").val("");
 $("#OFICINA_HORA_5").val("");
 $("#OFICINA_FOTO_5").val("");
 $("#OFICINA_ENTREGA_5").val("");
 $("#OFICINA_DEVOLU_5").val("");
 $("#OFICINA_LUDEVO_5").val("");
 $("#OFICINA_HORADEVO_5").val("");
 $("#OFICINA_SOLICITUD_5").val("");
 $("#OFICINA_DIAS_5").val("");
 $("#OFICINA_COSTO_5").val("");
 $("#OFICINA_IVA_5").val("");
 $("#OFICINA_SUB_5").val("");
 $("#OFICINA_TOTAL_5").val("");
 $("#OFICINA_OBSERVA_5").val("");
 $("#HOFICINA_5").val("");

 
		$(function() {
			loadOFI(1);
		});
}


		$(function() {
			loadOFI(1);
		});
		function loadOFI(page){
			var query=$("#NOMBRE_EVENTO").val();
			var NUMERO_EVENTO=$("#NUMERO_EVENTO_5").val();
			var DEPARTAMENTO2=$("#DEPARTAMENTO2WE").val();
			
			var NOMBRE_EVENTO=$("#NOMBRE_EVENTO_5").val();
			var FECHA_INICIO_EVENTO=$("#FECHA_INICIO_EVENTO_5").val();
			var PAIS_DEL_EVENTO=$("#PAIS_DEL_EVENTO_5").val();
			var CIUDAD_DEL_EVENTO=$("#CIUDAD_DEL_EVENTO_5").val();
			
			
			
var OFICINA_EQUIPO=$("#OFICINA_EQUIPO_5").val();
var OFICINA_CANTIDAD=$("#OFICINA_CANTIDAD_5").val();
var OFICINA_FOTO=$("#OFICINA_FOTO_5").val();
var OFICINA_ENTREGA=$("#OFICINA_ENTREGA_5").val();
var OFICINA_LUGAR=$("#OFICINA_LUGAR_5").val();
var OFICINA_HORA=$("#OFICINA_HORA_5").val();
var OFICINA_DEVOLU=$("#OFICINA_DEVOLU_5").val();
var OFICINA_LUDEVO=$("#OFICINA_LUDEVO_5").val();
var OFICINA_HORADEVO=$("#OFICINA_HORADEVO_5").val();
var OFICINA_SOLICITUD=$("#OFICINA_SOLICITUD_5").val();
var OFICINA_DIAS=$("#OFICINA_DIAS_5").val();
var OFICINA_COSTO=$("#OFICINA_COSTO_5").val();
var OFICINA_IVA=$("#OFICINA_IVA_5").val();
var OFICINA_SUB=$("#OFICINA_SUB_5").val();
var OFICINA_TOTAL=$("#OFICINA_TOTAL_5").val();
var OFICINA_OBSERVA=$("#OFICINA_OBSERVA_5").val();
var HOFICINA=$("#HOFICINA_5").val();

/*termina copiar y pegar*/
			
			var per_page=$("#per_pageofi").val();
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


'OFICINA_EQUIPO':OFICINA_EQUIPO,
'OFICINA_CANTIDAD':OFICINA_CANTIDAD,
'OFICINA_FOTO':OFICINA_FOTO,
'OFICINA_ENTREGA':OFICINA_ENTREGA,
'OFICINA_LUGAR':OFICINA_LUGAR,
'OFICINA_HORA':OFICINA_HORA,
'OFICINA_DEVOLU':OFICINA_DEVOLU,
'OFICINA_LUDEVO':OFICINA_LUDEVO,
'OFICINA_HORADEVO':OFICINA_HORADEVO,
'OFICINA_SOLICITUD':OFICINA_SOLICITUD,
'OFICINA_DIAS':OFICINA_DIAS,
'OFICINA_COSTO':OFICINA_COSTO,
'OFICINA_IVA':OFICINA_IVA,
'OFICINA_SUB':OFICINA_SUB,
'OFICINA_TOTAL':OFICINA_TOTAL,
'OFICINA_OBSERVA':OFICINA_OBSERVA,
'HOFICINA':HOFICINA,
/*termina copiar y pegar*/

			'DEPARTAMENTO2':DEPARTAMENTO2
			};
			$("#loader95").fadeIn('slow');
			$.ajax({
				url:'DIARIO/clasesOFICINA/controlador_filtro.php',
				type: 'POST',				
				data: parametros,
				 beforeSend: function(objeto){
				$("#loader95").html("Cargando...");
			  },
				success:function(data){//datos_ajaxBO
					$(".datos_ajaxOFI").html(data).fadeIn('slow');
					$("#loader95").html("");
				}
			})
		}
/* terminaB1*/		
		
	</script>
