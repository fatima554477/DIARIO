<script type="text/javascript">


    function STATUS_RESPONSABLE_EVENTO_COM2(RESPONSABLE_EVENTO_id){
        var checkBox = document.getElementById("STATUS_RESPONSABLE_EVENTO_COM2_"+RESPONSABLE_EVENTO_id);
        var RESPONSABLE_text = checkBox.checked ? "si" : "no";
        $.ajax({
            url:'comprobaciones/controladorPP.php',
            method:'POST',
            data:{RESPONSABLE_EVENTO_id:RESPONSABLE_EVENTO_id, RESPONSABLE_text:RESPONSABLE_text},
            success:function(data){
                var result = data.split('^');
                $('#color_RESPONSABLE_EVENTO_COM2_'+RESPONSABLE_EVENTO_id).css('background-color', result[1]=='si' ? '#ceffcc' : '#e9d8ee');
            }
        });
    }

    function STATUS_VENTAS_COM2(VENTAS_id){
        var checkBox = document.getElementById("STATUS_VENTAS_COM2_"+VENTAS_id);
        var VENTAS_text = checkBox.checked ? "si" : "no";
        $.ajax({
            url:'comprobaciones/controladorPP.php',
            method:'POST',
            data:{VENTAS_id:VENTAS_id, VENTAS_text:VENTAS_text},
            success:function(data){
                var result = data.split('^');
                loadCOM(1);
                actualizarContadorDesbloqueados_COM2();
                if(result[1]=='si'){
                    $('#color_VENTAS_COM2_'+VENTAS_id).css('background-color','#ceffcc');
                    $('#STATUS_RECHAZADO_COM2_'+VENTAS_id)
                        .prop('disabled',true)
                        .css('cursor','not-allowed')
                        .attr('title','No se puede rechazar: autorizado por ventas');
                    actualizarBotonesRechazo_COM2(VENTAS_id);
                }
                if(result[1]=='no'){
                    $('#color_VENTAS_COM2_'+VENTAS_id).css('background-color','#e9d8ee');
                    $('#STATUS_RECHAZADO_COM2_'+VENTAS_id)
                        .prop('disabled',false)
                        .css('cursor','pointer')
                        .attr('title','');
                    actualizarBotonesRechazo_COM2(VENTAS_id);
                }
            }
        });
    }

    function STATUS_FINANZAS_COM2(FINANZAS_id){
        var checkBox = document.getElementById("STATUS_FINANZAS_COM2_"+FINANZAS_id);
        var FINANZAS_text = checkBox.checked ? "si" : "no";
        $.ajax({
            url:'comprobaciones/controladorPP.php',
            method:'POST',
            data:{FINANZAS_id:FINANZAS_id, FINANZAS_text:FINANZAS_text},
            success:function(data){
                var result = data.split('^');
                $('#color_FINANZAS_COM2_'+FINANZAS_id).css('background-color', result[1]=='si' ? '#ceffcc' : '#e9d8ee');
                actualizarContadorDesbloqueados_COM2();
            }
        });
    }

    function STATUS_AUDITORIA2_COM2(AUDITORIA2_id){
        var checkBox = document.getElementById("STATUS_AUDITORIA2_COM2_"+AUDITORIA2_id);
        var AUDITORIA2_text = checkBox.checked ? "si" : "no";
        $.ajax({
            url:'comprobaciones/controladorPP.php',
            method:'POST',
            data:{AUDITORIA2_id:AUDITORIA2_id, AUDITORIA2_text:AUDITORIA2_text},
            success:function(data){
				loadCOM(1);
                actualizarContadorDesbloqueados_COM2();
                var result = data.split('^');
                $('#color_AUDITORIA2_COM2_'+AUDITORIA2_id).css('background-color', result[1]=='si' ? '#ceffcc' : '#e9d8ee');
            }
        });
    }

    function STATUS_AUDITORIA3_COM2(AUDITORIA3_id){
        var checkBox = document.getElementById("STATUS_AUDITORIA3_COM2_"+AUDITORIA3_id);
        var AUDITORIA3_text = checkBox.checked ? "si" : "no";
        $.ajax({
            url:'comprobaciones/controladorPP.php',
            method:'POST',
            data:{AUDITORIA3_id:AUDITORIA3_id, AUDITORIA3_text:AUDITORIA3_text},
            success:function(data){
                var result = data.split('^');
				loadCOM(1);
                actualizarContadorDesbloqueados_COM2();
                $('#color_AUDITORIA3_COM2_'+AUDITORIA3_id).css('background-color', result[1]=='si' ? '#ceffcc' : '#e9d8ee');
            }
        });
    }

    function STATUS_RECHAZADO_COM2(RECHAZADO_id){
        var $checkBox = $("#STATUS_RECHAZADO_COM2_"+RECHAZADO_id);
        if($checkBox.length === 0) return;

        var checkBox = $checkBox.get(0);
        var estadoAnterior = $checkBox.data('estadoAnterior') || (checkBox.checked ? 'si' : 'no');
        var RECHAZADO_text = checkBox.checked ? "si" : "no";

        if(RECHAZADO_text === 'no'){
            $checkBox.data('forzarAgregarMotivo','si');
			loadCOM(1);
        } else if(RECHAZADO_text === 'si' && $checkBox.data('forzarAgregarMotivo') !== 'si'){
            $checkBox.removeData('forzarAgregarMotivo');
        }

        actualizarBotonesRechazo_COM2(RECHAZADO_id, RECHAZADO_text);

        $.ajax({
            url:'comprobaciones/controladorPP.php',
            method:'POST',
            data:{RECHAZADO_id:RECHAZADO_id, RECHAZADO_text:RECHAZADO_text},
            success:function(data){
                var result = (data || '').trim().split('^');
                loadCOM(1);
                if(result[1]=='si' || result[1]=='no'){
                    $checkBox.data('estadoAnterior', result[1]);
                    if(result[1]=='si' && $checkBox.data('forzarAgregarMotivo') !== 'si'){
                        $checkBox.removeData('forzarAgregarMotivo');
                    }
                    actualizarBotonesRechazo_COM2(RECHAZADO_id, result[1]);
                } else {
                    checkBox.checked = (estadoAnterior === 'si');
                    actualizarBotonesRechazo_COM2(RECHAZADO_id, estadoAnterior);
                }
            },
            error:function(){
                checkBox.checked = (estadoAnterior === 'si');
                actualizarBotonesRechazo_COM2(RECHAZADO_id, estadoAnterior);
            }
        });
    }

    function abrirFormularioRechazo_COM2(RECHAZADO_id){
        var motivoActual = $('#motivo_rechazo_COM2_'+RECHAZADO_id).val() || '';
        $('#modal_rechazo_id').val(RECHAZADO_id);
        configurarModalRechazo_COM2('editar', motivoActual, 'Captura el motivo y presiona Guardar.');
        $('#btn_guardar_rechazo_modal').off('click').on('click', function(){
            guardarMotivoRechazoModal_COM2();
        });
    }

    function guardarMotivoRechazoModal_COM2(){
        var RECHAZADO_id = $('#modal_rechazo_id').val();
        var motivo = ($('#modal_rechazo_texto').val() || '').trim();
        if(motivo === ''){
            $('#modal_rechazo_mensaje').text('Debes capturar un motivo de rechazo.').css('color','#b22222');
            return;
        }
        $.ajax({
            url:'comprobaciones/controladorPP.php',
            method:'POST',
            data:{RECHAZO_MOTIVO_id:RECHAZADO_id, RECHAZO_MOTIVO_text:motivo},
            success:function(resp){
                if(resp.indexOf('ok') !== -1){
                    $('#motivo_rechazo_COM2_'+RECHAZADO_id).val(motivo);
                    $('#STATUS_RECHAZADO_COM2_'+RECHAZADO_id).removeData('forzarAgregarMotivo');
                    actualizarBotonesRechazo_COM2(RECHAZADO_id);
                    $('#modal_rechazo_mensaje').text('Motivo guardado correctamente.').css('color','#228b22');
                    setTimeout(function(){ cerrarModalRechazoPago_COM2(); }, 400);
                } else {
                    $('#modal_rechazo_mensaje').text('No fue posible guardar el motivo.').css('color','#b22222');
                }
            }
        });
    }

    function verMotivoRechazo_COM2(RECHAZADO_id){
        var motivoLocal = $('#motivo_rechazo_COM2_'+RECHAZADO_id).val() || '';
        $('#modal_rechazo_id').val(RECHAZADO_id);
        if(motivoLocal !== ''){
            configurarModalRechazo_COM2('ver', motivoLocal, 'Consulta del motivo registrado.');
            return;
        }
        $.ajax({
            url:'comprobaciones/controladorPP.php',
            method:'POST',
            data:{RECHAZO_MOTIVO_VER_id:RECHAZADO_id},
            success:function(resp){
                var motivo = (resp || '').trim();
                if(motivo !== ''){
                    $('#motivo_rechazo_COM2_'+RECHAZADO_id).val(motivo);
                    configurarModalRechazo_COM2('ver', motivo, 'Consulta del motivo registrado.');
                } else {
                    configurarModalRechazo_COM2('ver','No hay motivo de rechazo registrado.','Consulta del motivo registrado.');
                }
            }
        });
    }

    function configurarModalRechazo_COM2(modo, texto, mensaje){
        var esVer = (modo === 'ver');
        $('#modalRechazoPagoLabel').text(esVer ? 'Ver motivo del rechazo' : 'Agregar motivo del rechazo');
        $('#modal_rechazo_texto').val(texto || '').prop('readonly', esVer);
        $('#modal_rechazo_mensaje').text(mensaje || '').css('color','#666');
        $('#btn_guardar_rechazo_modal').toggle(!esVer);
        mostrarModalRechazoPago_COM2();
    }

    function actualizarBotonesRechazo_COM2(RECHAZADO_id, statusRechazado){
        var statusActual = statusRechazado;
        if(typeof statusActual === 'undefined'){
            statusActual = $('#STATUS_RECHAZADO_COM2_'+RECHAZADO_id).is(':checked') ? 'si' : 'no';
        }
        var motivo = ($('#motivo_rechazo_COM2_'+RECHAZADO_id).val() || '').trim();
        var forzarAgregarMotivo = ($('#STATUS_RECHAZADO_COM2_'+RECHAZADO_id).data('forzarAgregarMotivo') === 'si');
        var mostrarVer     = (statusActual === 'si' && motivo !== '');
        var mostrarAgregar = (statusActual === 'si' && (motivo === '' || forzarAgregarMotivo));
        if(forzarAgregarMotivo && statusActual === 'si') mostrarVer = false;
        $('#agregar_rechazo_COM2_'+RECHAZADO_id).toggle(mostrarAgregar);
        $('#ver_rechazo_COM2_'+RECHAZADO_id).toggle(mostrarVer);
    }

    function mostrarModalRechazoPago_COM2(){
        if($('#modalRechazoPago').length === 0) return;
        if(typeof $('#modalRechazoPago').modal === 'function'){
            $('#modalRechazoPago').modal('show');
        } else {
            $('#modalRechazoPago').show();
        }
    }

    function cerrarModalRechazoPago_COM2(){
        if($('#modalRechazoPago').length === 0) return;
        if(typeof $('#modalRechazoPago').modal === 'function'){
            $('#modalRechazoPago').modal('hide');
        } else {
            $('#modalRechazoPago').hide();
        }
    }

    function STATUS_CHECKBOX_COM2(CHECKBOX_id, permisoModificar){
        var checkBox = document.getElementById("STATUS_CHECKBOX_COM2_"+CHECKBOX_id);
        var CHECKBOX_text = checkBox.checked ? "si" : "no";

        var newColor = checkBox.checked ? '#ceffcc' : '#e9d8ee';
        $('#color_CHECKBOX_COM2_'+CHECKBOX_id).css('background-color', newColor);

        let monto = $('#montoOriginal_COM2_'+CHECKBOX_id).text().replace(/,/g,'');

        if(checkBox.checked && !permisoModificar){
            setTimeout(function(){ checkBox.disabled = true; }, 100);
        }

        if(checkBox.checked){
            $('#valorCalculado_COM2_'+CHECKBOX_id).text('');
        } else {
            if(!isNaN(monto)){
                let resultado = monto * 1.46;
                $('#valorCalculado_COM2_'+CHECKBOX_id).text('$'+resultado.toLocaleString('es-MX',{minimumFractionDigits:2,maximumFractionDigits:2}));
            }
        }

        $.ajax({
            url:'comprobaciones/controladorPP.php',
            method:'POST',
            data:{CHECKBOX_id:CHECKBOX_id, CHECKBOX_text:CHECKBOX_text},
            beforeSend:function(){
                $('#ajax-notification-COM2').html('<div class="loader"></div> ⏳ ACTUALIZANDO...').fadeIn();
            },
            success:function(data){
                var result = data.split('^');
                $('#ajax-notification-COM2').html("✅ ACTUALIZADO").delay(1000).fadeOut();
                if(result[1]==='si'){
                    $('#color_CHECKBOX_COM2_'+CHECKBOX_id).css('background-color','#ceffcc');
                    $('#valorCalculado_COM2_'+CHECKBOX_id).text('');
                    if(!permisoModificar) checkBox.disabled = true;
                } else if(result[1]==='no'){
                    $('#color_CHECKBOX_COM2_'+CHECKBOX_id).css('background-color','#e9d8ee');
                    if(!isNaN(monto)){
                        let resultado = monto * 1.46;
                        $('#valorCalculado_COM2_'+CHECKBOX_id).text('$'+resultado.toLocaleString('es-MX',{minimumFractionDigits:2,maximumFractionDigits:2}));
                    }
                    checkBox.disabled = false;
                }
            },
            error:function(){
                checkBox.checked = !checkBox.checked;
                checkBox.disabled = false;
                $('#ajax-notification-COM2').html("❌ Error al actualizar").delay(2000).fadeOut();
            }
        });
        recalcularTotal_COM2();
    }

    function recalcularTotal_COM2(){
        let total = 0;
        $('[id^=valorCalculado_COM2_]').each(function(){
            let texto = $(this).text().replace(/[$,]/g,'');
            let valor = parseFloat(texto);
            if(!isNaN(valor)) total += valor;
        });
        $('#totalCalculado_COM2').text('$'+total.toLocaleString('es-MX',{minimumFractionDigits:2,maximumFractionDigits:2}));
    }

    /* ---- Inicialización y carga del filtro COM2 ---- */
    $(function(){
        $('#target3').on('keydown', 'thead input, thead select', function(event){
            if(event.key === 'Enter' || event.which === 13){
                event.preventDefault();
                loadCOM(1);
            }
        });
        loadCOM(1);
    });

    function actualizarContadorDesbloqueados_COM2(){
        var total       = $('.checkbox_COM2').length;
        var marcados    = $('.checkbox_COM2:checked').length;
        var desbloqueados = total - marcados;
        document.getElementById('COM-registros').innerHTML =
            "<span class='circulo-contador'>" + desbloqueados + "</span>";
    }

    function loadCOM(page){
        var getVal = function(id){ return $("#"+id).val(); };
        var parametros = {
            "actionCOM"                 : "ajaxCOM",
            "page"                      : page,
            'query'                     : $("#NOMBRE_EVENTO").val(),
            'per_pageCOM'               : getVal("per_pageCOM"),
            'NUMERO_CONSECUTIVO_PROVEE' : getVal("NUMERO_CONSECUTIVO_PROVEE_1"),
            'RAZON_SOCIAL'              : getVal("RAZON_SOCIAL_1"),
            'RFC_PROVEEDOR'             : getVal("RFC_PROVEEDOR_1"),
            'NUMERO_EVENTO'             : getVal("NUMERO_EVENTO_1"),
            'NOMBRE_EVENTO'             : getVal("NOMBRE_EVENTO_1"),
            'MOTIVO_GASTO'              : getVal("MOTIVO_GASTO_1"),
            'CONCEPTO_PROVEE'           : getVal("CONCEPTO_PROVEE_1"),
            'MONTO_TOTAL_COTIZACION_ADEUDO': getVal("MONTO_TOTAL_COTIZACION_ADEUDO_1"),
            'MONTO_FACTURA'             : getVal("MONTO_FACTURA_1"),
            'MONTO_PROPINA'             : getVal("MONTO_PROPINA_1"),
            'MONTO_DEPOSITAR'           : getVal("MONTO_DEPOSITAR_1"),
            'TIPO_DE_MONEDA'            : getVal("TIPO_DE_MONEDA_1"),
            'IVA'                       : getVal("IVA_1"),
            'PFORMADE_PAGO'             : getVal("PFORMADE_PAGO_1"),
            'FECHA_A_DEPOSITAR'         : getVal("FECHA_A_DEPOSITAR_1"),
            'STATUS_DE_PAGO'            : getVal("STATUS_DE_PAGO_1"),
            'BANCO_ORIGEN'              : getVal("BANCO_ORIGEN1AA"),
            'ACTIVO_FIJO'               : getVal("ACTIVO_FIJO_1"),
            'GASTO_FIJO'                : getVal("GASTO_FIJO_1"),
            'PAGAR_CADA'                : getVal("PAGAR_CADA_1"),
            'FECHA_PPAGO'               : getVal("FECHA_PPAGO_1"),
            'FECHA_TPROGRAPAGO'         : getVal("FECHA_TPROGRAPAGO_1"),
            'NUMERO_EVENTOFIJO'         : getVal("NUMERO_EVENTOFIJO_1"),
            'CLASI_GENERAL'             : getVal("CLASI_GENERAL_1"),
            'SUB_GENERAL'               : getVal("SUB_GENERAL_1"),
            'MONTO_DE_COMISION'         : getVal("MONTO_DE_COMISION_1"),
            'POLIZA_NUMERO'             : getVal("POLIZA_NUMERO_1"),
            'NOMBRE_DEL_EJECUTIVO'      : getVal("NOMBRE_DEL_EJECUTIVO_1"),
            'NOMBRE_DEL_AYUDO'          : getVal("NOMBRE_DEL_AYUDO_1"),
            'EJECUTIVOTARJETA'          : getVal("EJECUTIVOTARJETA_1"),
            'OBSERVACIONES_1'           : getVal("OBSERVACIONES_1_1_1"),
            'FECHA_DE_LLENADO'          : getVal("FECHA_DE_LLENADO_1"),
            'ADJUNTAR_COTIZACION_1_1'   : getVal("ADJUNTAR_COTIZACION_1_1"),
            'TIPO_CAMBIOP'              : getVal("TIPO_CAMBIOP_1"),
            'TOTAL_ENPESOS'             : getVal("TOTAL_ENPESOS_1"),
            'IMPUESTO_HOSPEDAJE'        : getVal("IMPUESTO_HOSPEDAJE_1"),
            'TImpuestosRetenidosIVA_5'  : getVal("TImpuestosRetenidosIVA_5"),
            'TImpuestosRetenidosISR_5'  : getVal("TImpuestosRetenidosISR_5"),
            'descuentos_5'              : getVal("descuentos_5"),
            'NOMBRE_COMERCIAL'          : getVal("NOMBRE_COMERCIAL_1"),
            'UUID'                      : getVal("UUID"),
            'metodoDePago'              : getVal("metodoDePago"),
            'total'                     : getVal("total"),
            'serie'                     : getVal("serie"),
            'folio'                     : getVal("folio"),
            'regimenE'                  : getVal("regimenE"),
            'UsoCFDI'                   : getVal("UsoCFDI"),
            'TImpuestosTrasladados'     : getVal("TImpuestosTrasladados"),
            'TImpuestosRetenidos'       : getVal("TImpuestosRetenidos"),
            'Version'                   : getVal("Version"),
            'tipoDeComprobante'         : getVal("tipoDeComprobante"),
            'condicionesDePago'         : getVal("condicionesDePago"),
            'fechaTimbrado'             : getVal("fechaTimbrado"),
            'nombreR'                   : getVal("nombreR"),
            'rfcR'                      : getVal("rfcR"),
            'Moneda'                    : getVal("Moneda"),
            'TipoCambio'                : getVal("TipoCambio"),
            'ValorUnitarioConcepto'     : getVal("ValorUnitarioConcepto"),
            'DescripcionConcepto'       : getVal("DescripcionConcepto"),
            'ClaveUnidad'               : getVal("ClaveUnidad"),
            'ClaveProdServ'             : getVal("ClaveProdServ"),
            'Cantidad'                  : getVal("Cantidad"),
            'ImporteConcepto'           : getVal("ImporteConcepto"),
            'UnidadConcepto'            : getVal("UnidadConcepto"),
            'TUA'                       : getVal("TUA"),
            'TuaTotalCargos'            : getVal("TuaTotalCargos"),
            'Descuento'                 : getVal("Descuento"),
            'propina'                   : getVal("propina"),
            'DEPARTAMENTO2'             : getVal("DEPARTAMENTO2WE")
        };

        $("#loaderCOM").fadeIn('slow');
        $.ajax({
            url: 'DIARIO/clases/controlador_filtro.php',
            type: 'POST',
            data: parametros,
            beforeSend:function(){
                $("#loaderCOM").html("Cargando...").fadeIn().delay(500).fadeOut();
            },
            success:function(data){
                $(".datos_ajaxCOM").html(data).fadeIn('slow');
                /* Restaurar checkboxes de marcado visual desde localStorage */
                $('.checkbox_COM2').each(function(){
                    const id = $(this).data('id');
                    if(localStorage.getItem('checkbox_COM2_'+id) === 'checked'){
                        this.checked = true;
                        this.closest('tr').style.filter = 'brightness(65%) sepia(100%) saturate(200%) hue-rotate(0deg)';
                    }
                });
                actualizarContadorDesbloqueados_COM2();
            }
        });
    }
</script>
