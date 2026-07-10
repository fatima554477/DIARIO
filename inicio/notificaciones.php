          <nav class="navbar navbar-expand gap-3">
              <div class="mobile-menu-button"><ion-icon name="menu-sharp"></ion-icon></div>
             <!-- <form class="searchbar">
                <div class="position-absolute top-50 translate-middle-y search-icon ms-3"><ion-icon name="search-sharp"></ion-icon></div>
                <input class="form-control" type="text" placeholder="Search for anything">
                <div class="position-absolute top-50 translate-middle-y search-close-icon"><ion-icon name="close-sharp"></ion-icon></div>
             </form>-->
			 
			 
			 
			 
					 
<div id="content" >     

<strong><p class="mb-0 text-uppercase" style="font-size:22px;">&nbsp;&nbsp;&nbsp; INICIO </p> </strong> </div> 	 
			 
<div id="content" >     

			  <strong><p class="mb-0 text-uppercase">&nbsp;&nbsp;&nbsp;MOSTRAR TODO
<img src="includes/contraertodos11.png" id="mostrartodos" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp;CONTRAER TODO
<img src="includes/contraertodos2.png" id="ocultartodos" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<?php echo  isset($NFE_INFORMACION)?'||'.$NFE_INFORMACION:'';?>&nbsp;<?php echo  isset($NCE_INFORMACION)?$NCE_INFORMACION:'';?>	 </p> </strong> </div>

			
			 
			 
			 
             <div class="top-navbar-right ms-auto">

              <ul class="navbar-nav align-items-center">
                <li class="nav-item mobile-search-button">
                  <a class="nav-link" href="javascript:;">
                    <div class="">
                      <ion-icon name="search-sharp"></ion-icon>
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link dark-mode-icon" href="javascript:;">
                    <div class="mode-icon">
                      <ion-icon name="moon-sharp"></ion-icon> 
                    </div>
                  </a>
                </li>
                <!--<li class="nav-item dropdown dropdown-large dropdown-apps">
                  <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                    <div class="">
                      <ion-icon name="apps-sharp"></ion-icon>
                    </div>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
                    <div class="row row-cols-3 g-3 p-3">
                      <div class="col text-center">
                        <div class="app-box mx-auto bg-gradient-purple text-white"><ion-icon name="cart-sharp"></ion-icon>
                        </div>
                        <div class="app-title">Orders</div>
                      </div>
                      <div class="col text-center">
                        <div class="app-box mx-auto bg-gradient-info text-white"><ion-icon name="people-sharp"></ion-icon>
                        </div>
                        <div class="app-title">Teams</div>
                      </div>
                      <div class="col text-center">
                        <div class="app-box mx-auto bg-gradient-success text-white"><ion-icon name="shield-checkmark-sharp"></ion-icon>
                        </div>
                        <div class="app-title">Tasks</div>
                      </div>
                      <div class="col text-center">
                        <div class="app-box mx-auto bg-gradient-danger text-white"><ion-icon name="videocam-sharp"></ion-icon>
                        </div>
                        <div class="app-title">Media</div>  
                      </div>
                      <div class="col text-center">
                        <div class="app-box mx-auto bg-gradient-warning text-white"><ion-icon name="file-tray-sharp"></ion-icon>
                        </div>
                        <div class="app-title">Files</div>
                      </div>
                      <div class="col text-center">
                        <div class="app-box mx-auto bg-gradient-branding text-white"><ion-icon name="notifications-sharp"></ion-icon>
                        </div>
                        <div class="app-title">Alerts</div>
                      </div>
                    </div>
                  </div>
                </li>-->
                <li class="nav-item dropdown dropdown-large dropdown-notificaciones-grande">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown" data-bs-auto-close="outside">

                     <div class="position-relative notif-campana-wrapper" id="notifCampanaWrapper">

                      <span class="notify-badge" id="notificacionesDiarioBadge">0</span>
                      <ion-icon name="notifications-sharp" class="notif-campana-icono"></ion-icon>

                    </div>
                  </a>

                  <div class="dropdown-menu dropdown-menu-end notif-panel-grande">
                    <div class="notif-panel-header">
                      <p class="notif-panel-titulo mb-0" id="notificacionesDiarioTitulo">SIN NOTIFICACIONES</p>
                    </div>

                    <div class="notif-tabs">
                      <button type="button" class="notif-tab active" data-modulo="todos">
                        <ion-icon name="apps-outline"></ion-icon>
                        Todos
                        <span class="notif-tab-badge" id="tabBadgeTodos">0</span>
                      </button>
                      <button type="button" class="notif-tab" data-modulo="pagoProveedores">
                        <ion-icon name="cash-outline"></ion-icon>
                        Pago a Proveedor
                        <span class="notif-tab-badge" id="tabBadgePagoProveedores">0</span>
                      </button>
                      <button type="button" class="notif-tab" data-modulo="comprobaciones">
                        <ion-icon name="document-text-outline"></ion-icon>
                        Comprobaciones
                        <span class="notif-tab-badge" id="tabBadgeComprobaciones">0</span>
                      </button>
                    </div>

                    <div class="notif-lista-grande" id="notificacionesDiarioLista">
                      <!-- generado dinámicamente -->
                    </div>
                  </div>
                </li>

              
<li class="nav-item">
    <div class="mode-icon">
        <h6 class="mb-0 dropdown-user-name"><?php echo $_SESSION["NOMBREUSUARIO"]; ?></h6>
        <small style="color: #0d6efd; font-weight: 700; font-family: 'Georgia', serif; font-style: italic;"><?php echo $_SESSION["PERMISOSxusuario"]; ?></small>
    </div>
</li>			
				
                <li class="nav-item dropdown dropdown-user-setting">
                  <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                    <div class="user-setting">
                      <img src="<?PHP ECHO 'includes/archivos/'.$_SESSION["F_FOTO_ACTUAL"]; ?>" class="user-img" alt="">
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                       <a class="dropdown-item" href="#">
                         <div class="d-flex flex-row align-items-center gap-2">
                            <img src="<?PHP ECHO 'includes/archivos/'.$_SESSION["F_FOTO_ACTUAL"]; ?>" alt="" class="rounded-circle" width="54" height="54">
                            <div class="">
                              <h6 class="mb-0 dropdown-user-name"><?php echo $_SESSION["NOMBREUSUARIO"]; ?></h6>
                              <!--<small class="mb-0 dropdown-user-designation text-secondary">UI Developer</small>-->
                            </div>
                         </div>
                       </a>
                     </li>
                     <!-- <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="pages-user-profile.html">
                           <div class="d-flex align-items-center">
                             <div class=""><ion-icon name="person-outline"></ion-icon></div>
                             <div class="ms-3"><span>Profile</span></div>
                           </div>
                         </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="#">
                           <div class="d-flex align-items-center">
                             <div class=""><ion-icon name="settings-outline"></ion-icon></div>
                             <div class="ms-3"><span>Setting</span></div>
                           </div>
                         </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="index2.html">
                           <div class="d-flex align-items-center">
                             <div class=""><ion-icon name="speedometer-outline"></ion-icon></div>
                             <div class="ms-3"><span>Dashboard</span></div>
                           </div>
                         </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="#">
                           <div class="d-flex align-items-center">
                             <div class=""><ion-icon name="wallet-outline"></ion-icon></div>
                             <div class="ms-3"><span>Earnings</span></div>
                           </div>
                         </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="#">
                           <div class="d-flex align-items-center">
                             <div class=""><ion-icon name="cloud-download-outline"></ion-icon></div>
                             <div class="ms-3"><span>Downloads</span></div>
                           </div>
                         </a>
                      </li>-->
                      <li><hr class="dropdown-divider"></li>
                      <li>
                        <a class="dropdown-item" href="index.php?salir=1">
                           <div class="d-flex align-items-center">
                             <div class=""><ion-icon name="log-out-outline"></ion-icon></div>
                             <div class="ms-3"><span>SALIR</span></div>
                           </div>
                         </a>
                      </li>
                  </ul>
                </li>

               </ul>

              </div>
            </nav>
<style>
/* Campana más grande */

.notif-campana-icono{

  font-size: 30px;

  transition: color .15s, transform .15s;

}



/* Estado con notificaciones pendientes: parpadeo + aura amarilla */

.notif-campana-wrapper.notif-alerta{

  border-radius: 50%;

  animation: notifAuraPulso 1.2s ease-in-out infinite;

}

.notif-campana-wrapper.notif-alerta .notif-campana-icono{

  animation: notifColorPulso 1.2s ease-in-out infinite;

}



@keyframes notifAuraPulso{

  0%   { box-shadow: 0 0 0 0 rgba(255, 193, 7, .85); }

  70%  { box-shadow: 0 0 0 16px rgba(255, 193, 7, 0); }

  100% { box-shadow: 0 0 0 0 rgba(255, 193, 7, 0); }

}

@keyframes notifColorPulso{

  0%, 100% { color: #ffc107; text-shadow: 0 0 6px rgba(255,193,7,.9); }

  50%      { color: #ff8f00; text-shadow: 0 0 14px rgba(255,193,7,1); }

}

.dropdown-notificaciones-grande .notif-panel-grande{
  width: 560px;
  max-width: 96vw;

  padding: 0;
  border: none;
  border-radius: 14px;
  box-shadow: 0 12px 40px rgba(0,0,0,.18);
  overflow: hidden;
}
.notif-panel-header{
  padding: 16px 20px;
  background: linear-gradient(135deg,#0d6efd,#0a58ca);
}
.notif-panel-titulo{
  color:#fff;
  font-weight:700;
  font-size:15px;
  letter-spacing:.03em;
  text-transform:uppercase;
}
.notif-tabs{
  display:flex;
  border-bottom:1px solid #e9ecef;
  background:#f8f9fa;
}
.notif-tab{
  flex:1;
  display:flex;
  align-items:center;
  justify-content:center;
  gap:6px;
  padding:12px 8px;
  border:none;
  background:transparent;
  font-size:13px;
  font-weight:600;
  color:#6c757d;
  cursor:pointer;
  border-bottom:3px solid transparent;
  transition:.15s;
}
.notif-tab ion-icon{ font-size:16px; }
.notif-tab:hover{ color:#0d6efd; background:#eef4ff; }
.notif-tab.active{ color:#0d6efd; border-bottom-color:#0d6efd; background:#fff; }
.notif-tab-badge{
  min-width:20px;
  padding:1px 6px;
  border-radius:10px;
  background:#e9ecef;
  color:#495057;
  font-size:11px;
  font-weight:700;
}
.notif-tab.active .notif-tab-badge{ background:#0d6efd; color:#fff; }
.notif-lista-grande{
  max-height:420px;
  overflow-y:auto;
  padding:6px;
}
.notif-lista-grande::-webkit-scrollbar{ width:6px; }
.notif-lista-grande::-webkit-scrollbar-thumb{ background:#dee2e6; border-radius:3px; }

/* Tarjetas de notificación con mejor separación visual */
.notif-item-grande{
  display:flex;
  gap:12px;
   padding:16px 14px;
  border-radius:12px;
  margin-bottom:10px;
  text-decoration:none;
  transition:.15s;
  border-left:3px solid transparent;
  background:#fff;
  box-shadow:0 1px 4px rgba(0,0,0,.06);
}
.notif-item-grande:last-child{ margin-bottom:0; }
.notif-item-grande:hover{ background:#f1f5ff; box-shadow:0 2px 8px rgba(0,0,0,.10); }
.notif-item-grande.pagoProveedores{ border-left-color:#0d6efd; }
.notif-item-grande.comprobaciones{ border-left-color:#20c997; }

.notif-icono-grande{
  width:38px; height:38px; min-width:38px;
  border-radius:50%;
  display:flex; align-items:center; justify-content:center;
  font-size:18px;
}
.notif-item-grande.pagoProveedores .notif-icono-grande{ background:#e7f1ff; color:#0d6efd; }
.notif-item-grande.comprobaciones .notif-icono-grande{ background:#e6fbf3; color:#20c997; }
.notif-item-grande h6{ margin:0 0 2px; font-size:14.5px; font-weight:700; color:#212529; }
.notif-item-grande p{ margin:0; font-size:13.5px; color:#6c757d; line-height:1.35; }
.notif-vacio-grande{ padding:40px 20px; text-align:center; color:#adb5bd; }
.notif-vacio-grande ion-icon{ font-size:40px; margin-bottom:8px; }

/* Chip con el nombre del módulo dentro de cada tarjeta */
.notif-modulo-chip{
  display:inline-block;
  font-size:10.5px;
  font-weight:700;
  text-transform:uppercase;
  letter-spacing:.03em;
  padding:2px 8px;
  border-radius:20px;
  margin-bottom:4px;
}
.notif-modulo-chip.pagoProveedores{ background:#e7f1ff; color:#0d6efd; }
.notif-modulo-chip.comprobaciones{ background:#e6fbf3; color:#20c997; }

/* Encabezados de sección para la vista agrupada "Todos" */
.notif-seccion-titulo{
  display:flex;
  align-items:center;
  gap:8px;
  padding:10px 10px 6px;
  font-size:12px;
  font-weight:700;
  text-transform:uppercase;
  letter-spacing:.04em;
  color:#6c757d;
}
.notif-seccion-titulo.pagoProveedores{ color:#0d6efd; }
.notif-seccion-titulo.comprobaciones{ color:#20c997; }
.notif-seccion-titulo .notif-seccion-count{
  background:#e9ecef;
  color:#495057;
  border-radius:10px;
  padding:1px 7px;
  font-size:10.5px;
}
.notif-seccion-grande{ margin-bottom:8px; }
.notif-seccion-grande + .notif-seccion-grande{
  border-top:1px solid #eef0f2;
  padding-top:6px;
}
</style>

<script>
(function(){
    var moduloActivo = 'todos';
	   var fuentesRemotasCargadas = false;

    var fuentesRemotasCargando = false;

    var idContenedorRemoto = 'notificacionesDiarioFuentesRemotas';


    function textoLimpio(valor) {
        return (valor || '').replace(/\s+/g, ' ').trim();
    }

    function extraerId(input) {
        var match = (input.id || '').match(/(\d+)$/);
        return match ? match[1] : '';
    }

    function textoFila(input) {
        var fila = input.closest ? input.closest('tr') : null;
        if (!fila) return '';
        return textoLimpio(fila.innerText || fila.textContent || '');
    }
   function normalizarTexto(valor) {

        return textoLimpio(valor).toUpperCase()

            .normalize('NFD').replace(/[\u0300-\u036f]/g, '');

    }


   function obtenerTextoControl(control) {

        if (!control) return '';

        if (control.tagName === 'SELECT') {

            var opcion = control.options && control.selectedIndex >= 0 ? control.options[control.selectedIndex] : null;

            return textoLimpio(opcion ? (opcion.text || opcion.value) : control.value);

        }

        return textoLimpio(control.value);

    }



    function obtenerTextoCelda(celda) {

        if (!celda) return '';



        var controlConValor = Array.prototype.slice.call(celda.querySelectorAll('input, select, textarea'))

            .map(obtenerTextoControl)

            .filter(function(valor){ return valor !== ''; })

            .join(' ');



        if (controlConValor !== '') return controlConValor;



        return textoLimpio(celda.innerText || celda.textContent || '');

    }

    function obtenerValorPorEncabezado(fila, alternativas) {

        var tabla = fila && fila.closest ? fila.closest('table') : null;

        if (!tabla) return '';



        var encabezados = Array.prototype.slice.call(tabla.querySelectorAll('thead th'));

        if (encabezados.length === 0) {

            encabezados = Array.prototype.slice.call(tabla.querySelectorAll('tr:first-child th'));

        }



        var celdas = Array.prototype.slice.call(fila.children || []);

        var alternativasNormalizadas = alternativas.map(normalizarTexto);



        for (var a = 0; a < alternativasNormalizadas.length; a++) {

            for (var i = 0; i < encabezados.length; i++) {

                var encabezado = normalizarTexto(encabezados[i].innerText || encabezados[i].textContent || '');

                if (encabezado.indexOf(alternativasNormalizadas[a]) === -1 || !celdas[i]) continue;

               return obtenerTextoCelda(celdas[i]);


            }

        }

        return '';

    }

    function obtenerValorPorSelector(fila, selectores) {

        if (!fila) return '';



        for (var i = 0; i < selectores.length; i++) {

            var elemento = fila.querySelector(selectores[i]);

            if (!elemento) continue;



            var valor = /^(INPUT|SELECT|TEXTAREA)$/.test(elemento.tagName)

                ? obtenerTextoControl(elemento)

                : textoLimpio(elemento.innerText || elemento.textContent || elemento.getAttribute('value') || '');



            if (valor !== '') return valor;

        }



        return '';

    }

    function obtenerValorPorIdNotificacion(fila, input) {



        var id = extraerId(input);



        if (!id) return '';







        var posiblesIds = [



            'MONTO_DEPOSITAR_' + id,



            'montoOriginal_' + id,



            'montoOriginal_COM2_' + id



        ];







        for (var i = 0; i < posiblesIds.length; i++) {



            var elemento = document.getElementById(posiblesIds[i]);



            if (!elemento || (fila && elemento.closest('tr') !== fila)) continue;







            var valor = /^(INPUT|SELECT|TEXTAREA)$/.test(elemento.tagName)



                ? obtenerTextoControl(elemento)



                : textoLimpio(elemento.innerText || elemento.textContent || elemento.getAttribute('value') || '');







            if (valor !== '') return valor;



        }







        return '';



    }






    function crearDetalleNotificacion(input, modulo) {

        var fila = input.closest ? input.closest('tr') : null;

        if (!fila) return textoFila(input);



        var campos = [];

        if (modulo === 'pagoProveedores') {

            campos.push({ etiqueta: 'Solicitud', valor: obtenerValorPorEncabezado(fila, ['NUMERO SOLICITUD', 'NUMERO CONSECUTIVO', 'SOLICITUD']) });

        }

        campos.push({ etiqueta: 'Nombre comercial', valor: obtenerValorPorEncabezado(fila, ['NOMBRE COMERCIAL']) });

        campos.push({ etiqueta: 'Evento', valor: obtenerValorPorEncabezado(fila, ['NUMERO EVENTO', 'NUMERO DE EVENTO']) });

           var monto = obtenerValorPorIdNotificacion(fila, input);


        if (monto === '') {

            monto = obtenerValorPorSelector(fila, [


                "[id^='MONTO_DEPOSITAR']",

                "[name^='MONTO_DEPOSITAR']",
				
                "[id^='montoOriginal_']",




                "[id^='MONTO_FACTURA_']",

                "[name^='MONTO_FACTURA']"

            ]);

        }
		
        if (monto === '') {



            monto = obtenerValorPorEncabezado(fila, ['MONTO_DEPOSITAR', 'MONTO DEPOSITAR', 'MONTO A DEPOSITAR', 'TOTAL A PAGAR', 'TOTAL DE LA CONVERSION', 'TOTAL CONVERSION', 'TOTAL', 'SUBTOTAL']);



        }

		

        campos.push({ etiqueta: 'Monto', valor: monto });




        var detalle = campos

            .filter(function(campo){ return campo.valor !== ''; })

            .map(function(campo){ return campo.etiqueta + ': ' + campo.valor; })

            .join(' - ');



        if (detalle) return detalle;

        var filaTexto = textoFila(input);

        return filaTexto ? filaTexto.substring(0, 220) : modulo;

    }



    function crearNotificacion(input, modulo) {
        var id = extraerId(input);
     
        return {
            id: id,
            modulo: modulo,
            key: modulo + ':' + (id || input.id),
              titulo: modulo === 'comprobaciones' ? 'Comprobación pendiente' : 'Pago pendiente',


            detalle: crearDetalleNotificacion(input, modulo),

            orden: id ? parseInt(id, 10) : 0
        };
    }
	
	   function asegurarContenedorRemoto() {

        var contenedor = document.getElementById(idContenedorRemoto);

        if (!contenedor) {

            contenedor = document.createElement('div');

            contenedor.id = idContenedorRemoto;

            contenedor.style.display = 'none';

            document.body.appendChild(contenedor);

        }

        return contenedor;

    }



    function cargarFuenteRemota(config) {

        var parametros = new URLSearchParams();

        Object.keys(config.data).forEach(function(clave){

            parametros.append(clave, config.data[clave]);

        });



        return fetch(config.url, {

            method: 'POST',

            credentials: 'same-origin',

            headers: {

                'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'

            },

            body: parametros.toString()

        }).then(function(respuesta){

            if (!respuesta.ok) throw new Error('No se pudo cargar ' + config.url);

            return respuesta.text();

        }).catch(function(){

            return '';

        });

    }



    function cargarFuentesRemotasNotificaciones() {

        if (fuentesRemotasCargadas || fuentesRemotasCargando || typeof fetch !== 'function') return;

        fuentesRemotasCargando = true;



        var fuentes = [

            {

                url: 'clases3/controlador_filtro.php',

                data: { actionAUT: 'ajaxAUT', page: '1', per_pageAUT: '500', ADJUNTAR_FACTURA_XML_VACIO: 'si' }

            },

            {

                url: 'clases/controlador_filtro.php',

                data: { actionCOM: 'ajaxCOM', page: '1', per_pageCOM: '500' }

            }

        ];



        Promise.all(fuentes.map(cargarFuenteRemota)).then(function(respuestas){

            var contenedor = asegurarContenedorRemoto();

            contenedor.innerHTML = respuestas.join('');

            fuentesRemotasCargadas = true;

            fuentesRemotasCargando = false;

            renderizarNotificacionesDiario();

        }).catch(function(){

            fuentesRemotasCargando = false;

        });

    }


    function obtenerNotificacionesDiario() {
        var notificaciones = { pagoProveedores: [], comprobaciones: [] };
        var vistos = {};
        var selectores = [
            {
                modulo: 'pagoProveedores',
                selector: [
                    "input[id^='STATUS_VENTAS']",
                    "input[id^='STATUS_AUDITORIA1']",
                    "input[id^='STATUS_FINANZAS']",
                    "input[id^='pasarpagado1a2']",
                    "input[id^='STATUS_AUDITORIA2']"
                ].join(','),
                excluir: /_COM2_/,
                validarId: /^(STATUS_VENTAS|STATUS_AUDITORIA1|STATUS_FINANZAS|pasarpagado1a2|STATUS_AUDITORIA2)\d+$/
            },
            {
                modulo: 'comprobaciones',
                selector: [
                    "input[id^='STATUS_VENTAS_COM2_']",
                    "input[id^='STATUS_FINANZAS_COM2_']",
                    "input[id^='STATUS_AUDITORIA2_COM2_']",
                    "input[id^='STATUS_AUDITORIA3_COM2_']"
                ].join(','),
                validarId: /^(STATUS_VENTAS_COM2_|STATUS_FINANZAS_COM2_|STATUS_AUDITORIA2_COM2_|STATUS_AUDITORIA3_COM2_)\d+$/
            }
        ];

        selectores.forEach(function(config){
            document.querySelectorAll(config.selector).forEach(function(input){
                if (!config.validarId.test(input.id || '')) return;
                if (config.excluir && config.excluir.test(input.id || '')) return;
                if (input.disabled || input.checked) return;
                var notificacion = crearNotificacion(input, config.modulo);
                if (vistos[notificacion.key]) return;
                vistos[notificacion.key] = true;
                notificaciones[config.modulo].push(notificacion);
            });
        });

        notificaciones.pagoProveedores.sort(function(a,b){ return b.orden - a.orden; });
        notificaciones.comprobaciones.sort(function(a,b){ return b.orden - a.orden; });
        return notificaciones;
    }

    function escapeHtml(valor) {
        return String(valor || '').replace(/[&<>'"]/g, function(caracter){
            return {'&':'&amp;','<':'&lt;','>':'&gt;',"'":'&#039;','"':'&quot;'}[caracter];
        });
    }

    var ICONOS = {
        pagoProveedores: 'cash-outline',
        comprobaciones: 'document-text-outline'
    };
    var MODULO_TEXTO = {
        pagoProveedores: 'Pago a Proveedor',
        comprobaciones: 'Comprobaciones'
    };
    var VACIO_TEXTO = {
        pagoProveedores: 'No hay pagos a proveedores pendientes',
        comprobaciones: 'No hay comprobaciones pendientes'
    };

    function renderizarTarjeta(n) {
        return '<a class="notif-item-grande ' + n.modulo + '" href="javascript:;">'
            + '<div class="notif-icono-grande"><ion-icon name="' + ICONOS[n.modulo] + '"></ion-icon></div>'
            + '<div class="flex-grow-1">'
            + '<span class="notif-modulo-chip ' + n.modulo + '">' + MODULO_TEXTO[n.modulo] + '</span>'
            + '<h6>' + escapeHtml(n.titulo) + '</h6>'
            + '<p>' + escapeHtml(n.detalle) + '</p>'
            + '</div></a>';
    }

    function renderizarLista(notificaciones) {
        var contenedor = document.getElementById('notificacionesDiarioLista');
        if (!contenedor) return;

        if (moduloActivo === 'todos') {
            var total = notificaciones.pagoProveedores.length + notificaciones.comprobaciones.length;
            if (total === 0) {
                contenedor.innerHTML = '<div class="notif-vacio-grande">'
                    + '<ion-icon name="checkmark-done-circle-outline"></ion-icon>'
                    + '<p class="mb-0">No hay notificaciones pendientes</p>'
                    + '</div>';
                return;
            }

            var html = '';
            ['pagoProveedores', 'comprobaciones'].forEach(function(modulo){
                var lista = notificaciones[modulo];
                if (lista.length === 0) return;
                html += '<div class="notif-seccion-grande">'
                    + '<div class="notif-seccion-titulo ' + modulo + '">'
                    + '<ion-icon name="' + ICONOS[modulo] + '"></ion-icon>'
                    + MODULO_TEXTO[modulo]
                    + '<span class="notif-seccion-count">' + lista.length + '</span>'
                    + '</div>'
                    + lista.map(renderizarTarjeta).join('')
                    + '</div>';
            });
            contenedor.innerHTML = html;
            return;
        }

        var lista = notificaciones[moduloActivo];
        if (lista.length === 0) {
            contenedor.innerHTML = '<div class="notif-vacio-grande">'
                + '<ion-icon name="checkmark-done-circle-outline"></ion-icon>'
                + '<p class="mb-0">' + VACIO_TEXTO[moduloActivo] + '</p>'
                + '</div>';
            return;
        }
        contenedor.innerHTML = lista.map(renderizarTarjeta).join('');
    }

    function renderizarNotificacionesDiario() {
        var badge = document.getElementById('notificacionesDiarioBadge');
        var titulo = document.getElementById('notificacionesDiarioTitulo');
        var badgeTodos = document.getElementById('tabBadgeTodos');
        var badgeProveedores = document.getElementById('tabBadgePagoProveedores');
        var badgeComprobaciones = document.getElementById('tabBadgeComprobaciones');
        if (!badge || !titulo) return;

        var notificaciones = obtenerNotificacionesDiario();
        var total = notificaciones.pagoProveedores.length + notificaciones.comprobaciones.length;
		   if (total === 0 && !fuentesRemotasCargadas) {

            cargarFuentesRemotasNotificaciones();

        }


        badge.textContent = total;
        titulo.textContent = total > 0 ? 'NOTIFICACIONES (' + total + ')' : 'SIN NOTIFICACIONES';
        if (badgeTodos) badgeTodos.textContent = total;
        if (badgeProveedores) badgeProveedores.textContent = notificaciones.pagoProveedores.length;
        if (badgeComprobaciones) badgeComprobaciones.textContent = notificaciones.comprobaciones.length;
		  var wrapper = document.getElementById('notifCampanaWrapper');

        if (wrapper) {

            wrapper.classList.toggle('notif-alerta', total > 0);

        }


        renderizarLista(notificaciones);
    }

    window.actualizarNotificacionesDiario = renderizarNotificacionesDiario;

    document.addEventListener('click', function(event){
        var tab = event.target.closest ? event.target.closest('.notif-tab') : null;
        if (!tab) return;
        document.querySelectorAll('.notif-tab').forEach(function(t){ t.classList.remove('active'); });
        tab.classList.add('active');
        moduloActivo = tab.getAttribute('data-modulo');
        renderizarNotificacionesDiario();
    });
   document.addEventListener('click', function(event){

        if (event.target.closest && event.target.closest('.notif-panel-grande')) {

            event.stopPropagation();

        }

    });

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', renderizarNotificacionesDiario);
    } else {
        renderizarNotificacionesDiario();
    }

    document.addEventListener('change', function(event){
        if (event.target && event.target.matches && event.target.matches('input[type="checkbox"]')) {
            setTimeout(renderizarNotificacionesDiario, 0);
        }
    });

    var observador = new MutationObserver(function(){
        clearTimeout(observador._timer);
        observador._timer = setTimeout(renderizarNotificacionesDiario, 100);
    });
    observador.observe(document.body, {childList: true, subtree: true, attributes: true, attributeFilter: ['disabled', 'checked']});
})();
</script>
