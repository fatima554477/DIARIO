<script type="text/javascript">
	
	/*filtro */

/* iniciaB1*/
function LIMPIAR0(){
 $("#NUMERO_EVENTO_4").val("");
 $("#NOMBRE_EVENTO_4").val("");
 $("#FECHA_INICIO_EVENTO_4").val("");
 $("#PAIS_DEL_EVENTO_4").val("");
 $("#CIUDAD_DEL_EVENTO_4").val("");
 $("#DEPARTAMENTO2WE").val("");
 
 
 $("#PAPELERIA_EQUIPO_4").val("");
 $("#PAPELERIA_LUGAR_4").val("");
 $("#PAPELERIA_HORA_4").val("");
 $("#PAPELERIA_FOTO_4").val("");
 $("#PAPELERIA_ENTREGA_4").val("");
 $("#PAPELERIA_DEVOLU_4").val("");
 $("#PAPELERIA_LUDEVO_4").val("");
 $("#PAPELERIA_HORADEVO_4").val("");
 $("#PAPELERIA_SOLICITUD_4").val("");
 $("#PAPELERIA_DIAS_4").val("");
 $("#PAPELERIA_COSTO_4").val("");
 $("#PAPELERIA_IVA_4").val("");
 $("#PAPELERIA_SUB_4").val("");
 $("#PAPELERIA_TOTAL_4").val("");
 $("#PAPELERIA_OBSERVA_4").val("");
 $("#HPAPELERIA_4").val("");

 
		$(function() {
			loadpape(1);
		});
}


		$(function() {
			loadpape(1);
		});
		function loadpape(page){
			var query=$("#NOMBRE_EVENTO").val();
			var NUMERO_EVENTO=$("#NUMERO_EVENTO_4").val();
			var DEPARTAMENTO2=$("#DEPARTAMENTO2WE").val();
			
			var NOMBRE_EVENTO=$("#NOMBRE_EVENTO_4").val();
			var FECHA_INICIO_EVENTO=$("#FECHA_INICIO_EVENTO_4").val();
			var PAIS_DEL_EVENTO=$("#PAIS_DEL_EVENTO_4").val();
			var CIUDAD_DEL_EVENTO=$("#CIUDAD_DEL_EVENTO_4").val();
			
			
			
var PAPELERIA_EQUIPO=$("#PAPELERIA_EQUIPO_4").val();
var PAPELERIA_CANTIDAD=$("#PAPELERIA_CANTIDAD_4").val();
var PAPELERIA_FOTO=$("#PAPELERIA_FOTO_4").val();
var PAPELERIA_ENTREGA=$("#PAPELERIA_ENTREGA_4").val();
var PAPELERIA_LUGAR=$("#PAPELERIA_LUGAR_4").val();
var PAPELERIA_HORA=$("#PAPELERIA_HORA_4").val();
var PAPELERIA_DEVOLU=$("#PAPELERIA_DEVOLU_4").val();
var PAPELERIA_LUDEVO=$("#PAPELERIA_LUDEVO_4").val();
var PAPELERIA_HORADEVO=$("#PAPELERIA_HORADEVO_4").val();
var PAPELERIA_SOLICITUD=$("#PAPELERIA_SOLICITUD_4").val();
var PAPELERIA_DIAS=$("#PAPELERIA_DIAS_4").val();
var PAPELERIA_COSTO=$("#PAPELERIA_COSTO_4").val();
var PAPELERIA_IVA=$("#PAPELERIA_IVA_4").val();
var PAPELERIA_SUB=$("#PAPELERIA_SUB_4").val();
var PAPELERIA_TOTAL=$("#PAPELERIA_TOTAL_4").val();
var PAPELERIA_OBSERVA=$("#PAPELERIA_OBSERVA_4").val();
var HPAPELERIA=$("#HPAPELERIA_4").val();

/*termina copiar y pegar*/
			
			var per_page=$("#per_pagePA").val();
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


'PAPELERIA_EQUIPO':PAPELERIA_EQUIPO,
'PAPELERIA_CANTIDAD':PAPELERIA_CANTIDAD,
'PAPELERIA_FOTO':PAPELERIA_FOTO,
'PAPELERIA_ENTREGA':PAPELERIA_ENTREGA,
'PAPELERIA_LUGAR':PAPELERIA_LUGAR,
'PAPELERIA_HORA':PAPELERIA_HORA,
'PAPELERIA_DEVOLU':PAPELERIA_DEVOLU,
'PAPELERIA_LUDEVO':PAPELERIA_LUDEVO,
'PAPELERIA_HORADEVO':PAPELERIA_HORADEVO,
'PAPELERIA_SOLICITUD':PAPELERIA_SOLICITUD,
'PAPELERIA_DIAS':PAPELERIA_DIAS,
'PAPELERIA_COSTO':PAPELERIA_COSTO,
'PAPELERIA_IVA':PAPELERIA_IVA,
'PAPELERIA_SUB':PAPELERIA_SUB,
'PAPELERIA_TOTAL':PAPELERIA_TOTAL,
'PAPELERIA_OBSERVA':PAPELERIA_OBSERVA,
'HPAPELERIA':HPAPELERIA,
/*termina copiar y pegar*/

			'DEPARTAMENTO2':DEPARTAMENTO2
			};
			$("#loader84").fadeIn('slow');
			$.ajax({
				url:'DIARIO/clasesPAPELERIA/controlador_filtro.php',
				type: 'POST',				
				data: parametros,
				 beforeSend: function(objeto){
				$("#loader84").html("Cargando...");
			  },
				success:function(data){//datos_ajaxBO
					$(".datos_ajaxPAPE").html(data).fadeIn('slow');
					$("#loader84").html("");
				}
			})
		}
/* terminaB1*/		
		
	</script>
