          <nav class="navbar navbar-expand gap-3">
              <div class="mobile-menu-button"><ion-icon name="menu-sharp"></ion-icon></div>
             <!-- <form class="searchbar">
                <div class="position-absolute top-50 translate-middle-y search-icon ms-3"><ion-icon name="search-sharp"></ion-icon></div>
                <input class="form-control" type="text" placeholder="Search for anything">
                <div class="position-absolute top-50 translate-middle-y search-close-icon"><ion-icon name="close-sharp"></ion-icon></div>
             </form>-->
			 
			 
			 
			 
					 
<div id="content" >     

<strong><p class="mb-0 text-uppercase" style="font-size:22px;">&nbsp;&nbsp;&nbsp; DIARIO COLABORADOR </p> </strong> </div> 	 
			 
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
                <li class="nav-item dropdown dropdown-large">
                  <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                    <div class="position-relative">
                      <span class="notify-badge" id="notificacionesDiarioBadge">0</span>
                      <ion-icon name="notifications-sharp"></ion-icon>
                    </div>
                  </a>
				  
				  
                 <div class="dropdown-menu dropdown-menu-end">
                    <a href="javascript:;">
                      <div class="msg-header">
                        <p class="msg-header-title" id="notificacionesDiarioTitulo">SIN NOTIFICACIONES</p>
                        <!--<p class="msg-header-clear ms-auto">Marks all as read</p>-->
                      </div>
                    </a>
                    <div class="header-notifications-list" id="notificacionesDiarioLista">
                      <a class="dropdown-item notificaciones-diario-vacio" href="javascript:;">
                        <div class="d-flex align-items-center">
                          <div class="flex-grow-1">
                            <p class="msg-info mb-0">SIN NOTIFICACIONES</p>
                          </div>
                        </div>
                      </a>
                       <!--<a class="dropdown-item" href="javascript:;">
                        <div class="d-flex align-items-center">
                          <div class="notify text-danger"><ion-icon name="person-outline"></ion-icon>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="msg-name">New Customers<span class="msg-time float-end">14 Sec
                           ago</span></h6>
                            <p class="msg-info">5 new user registered</p>
                          </div>
                        </div>
                      </a>
                      <a class="dropdown-item" href="javascript:;">
                        <div class="d-flex align-items-center">
                          <div class="notify text-success"><ion-icon name="document-outline"></ion-icon>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="msg-name">24 PDF File<span class="msg-time float-end">19 min
                          ago</span></h6>
                            <p class="msg-info">The pdf files generated</p>
                          </div>
                        </div>
                      </a>
                      
                      <a class="dropdown-item" href="javascript:;">
                        <div class="d-flex align-items-center">
                          <div class="notify text-info"><ion-icon name="checkmark-done-outline"></ion-icon>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="msg-name">New Product Approved <span
                          class="msg-time float-end">2 hrs ago</span></h6>
                            <p class="msg-info">Your new product has approved</p>
                          </div>
                        </div>
                      </a>
                      <a class="dropdown-item" href="javascript:;">
                        <div class="d-flex align-items-center">
                          <div class="notify text-warning"><ion-icon name="send-outline"></ion-icon>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="msg-name">Time Response <span class="msg-time float-end">28 min
                          ago</span></h6>
                            <p class="msg-info">5.1 min avarage time response</p>
                          </div>
                        </div>
                      </a>
                      <a class="dropdown-item" href="javascript:;">
                        <div class="d-flex align-items-center">
                          <div class="notify text-danger"><ion-icon name="chatbox-ellipses-outline"></ion-icon>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="msg-name">New Comments <span class="msg-time float-end">4 hrs
                          ago</span></h6>
                            <p class="msg-info">New customer comments recived</p>
                          </div>
                        </div>
                      </a>
                      <a class="dropdown-item" href="javascript:;">
                        <div class="d-flex align-items-center">
                          <div class="notify text-primary"><ion-icon name="albums-outline"></ion-icon>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="msg-name">New 24 authors<span class="msg-time float-end">1 day
                          ago</span></h6>
                            <p class="msg-info">24 new authors joined last week</p>
                          </div>
                        </div>
                      </a>
                      <a class="dropdown-item" href="javascript:;">
                        <div class="d-flex align-items-center">
                          <div class="notify text-success"><ion-icon name="shield-outline"></ion-icon>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="msg-name">Your item is shipped <span class="msg-time float-end">5 hrs
                          ago</span></h6>
                            <p class="msg-info">Successfully shipped your item</p>
                          </div>
                        </div>
                      </a>
                      <a class="dropdown-item" href="javascript:;">
                        <div class="d-flex align-items-center">
                          <div class="notify text-warning"><ion-icon name="cafe-outline"></ion-icon>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="msg-name">Defense Alerts <span class="msg-time float-end">2 weeks
                          ago</span></h6>
                            <p class="msg-info">45% less alerts last 4 weeks</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <a href="javascript:;">
                      <div class="text-center msg-footer">View All Notifications</div>
                    </a>                
				-->
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

#notificacionesDiarioLista {

    max-height: 520px;

    overflow-y: auto;

}



#notificacionesDiarioLista .dropdown-item {

    white-space: normal;

}



#notificacionesDiarioLista .notificacion-diario-item {

    align-items: flex-start !important;

    gap: 12px;

}



#notificacionesDiarioLista .notificacion-diario-cuerpo {

    min-width: 0;

}



#notificacionesDiarioLista .notificacion-diario-tipo {

    display: block;

    font-size: 12px;

    font-weight: 700;

    color: #0d6efd;

    margin-bottom: 6px;

    text-transform: uppercase;

}



#notificacionesDiarioLista .notificacion-diario-detalle {

    display: flex;

    flex-direction: column;

    gap: 4px;

    margin-bottom: 0;

    line-height: 1.25;

}



#notificacionesDiarioLista .notificacion-diario-linea {

    display: block;

    overflow-wrap: anywhere;

}



.navbar .dropdown-large .dropdown-menu {

    width: min(680px, calc(100vw - 24px));

}

</style>

<script>
(function(){
    function textoLimpio(valor) {
        return (valor || '').replace(/\s+/g, ' ').trim();
    }

    function extraerId(input) {
        var match = (input.id || '').match(/(\d+)$/);
        return match ? match[1] : '';
    }

       function celdasFila(input) {

        var fila = input.closest ? input.closest('tr') : null;
        if (!fila) {
            return [];

        }
               return Array.prototype.slice.call(fila.children).map(function(celda){

                   return Array.prototype.slice.call(fila.children).map(function(celda){

            return textoLimpio(celda.innerText || celda.textContent || '');

        }).filter(function(texto){

            return texto !== '';

        });

    }



    function nombreModulo(modulo) {

        return modulo === 'comprobaciones' ? 'Comprobación' : 'Pago a proveedor';


        }).filter(function(texto){

            return texto !== '';

        });

    }



    function nombreModulo(modulo) {

        return modulo === 'comprobaciones' ? 'Comprobación' : 'Pago a proveedor';

    }

    function crearNotificacion(input, modulo) {
        var id = extraerId(input);
         var lineas = celdasFila(input);

        return {
            id: id,
            modulo: modulo,
			  tipo: nombreModulo(modulo),

            key: modulo + ':' + (id || input.id),
            titulo: nombreModulo(modulo) + ' pendiente #' + (id || input.id),

            detalle: lineas.length ? lineas.slice(0, 8) : [nombreModulo(modulo)],

            orden: id ? parseInt(id, 10) : 0
        };
    }

    function obtenerNotificacionesDiario() {
        var notificaciones = [];
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
                if (!config.validarId.test(input.id || '')) {
                    return;
                }
                if (config.excluir && config.excluir.test(input.id || '')) {
                    return;
                }
                if (input.disabled || input.checked) {
                    return;
                }
                var notificacion = crearNotificacion(input, config.modulo);
                if (vistos[notificacion.key]) {
                    return;
                }
                vistos[notificacion.key] = true;
                notificaciones.push(notificacion);
            });
        });

        notificaciones.sort(function(a, b){
            return b.orden - a.orden;
        });
        return notificaciones;
    }

    function renderizarNotificacionesDiario() {
        var badge = document.getElementById('notificacionesDiarioBadge');
        var titulo = document.getElementById('notificacionesDiarioTitulo');
        var lista = document.getElementById('notificacionesDiarioLista');
        if (!badge || !titulo || !lista) {
            return;
        }

        var notificaciones = obtenerNotificacionesDiario();
        badge.textContent = notificaciones.length;
        titulo.textContent = notificaciones.length > 0 ? 'NOTIFICACIONES' : 'SIN NOTIFICACIONES';

        if (notificaciones.length === 0) {
            lista.innerHTML = '<a class="dropdown-item notificaciones-diario-vacio" href="javascript:;"><div class="d-flex align-items-center"><div class="flex-grow-1"><p class="msg-info mb-0">SIN NOTIFICACIONES</p></div></div></a>';
            return;
        }

        lista.innerHTML = notificaciones.map(function(notificacion){
			       var detalle = notificacion.detalle.map(function(linea){

                return '<span class="notificacion-diario-linea">' + escapeHtml(linea) + '</span>';

            }).join('');

            return '<a class="dropdown-item" href="javascript:;">'
                + '<div class="d-flex notificacion-diario-item">'
                + '<div class="notify text-primary"><ion-icon name="cash-outline"></ion-icon></div>'
                          + '<div class="flex-grow-1 notificacion-diario-cuerpo">'

                + '<span class="notificacion-diario-tipo">' + escapeHtml(notificacion.tipo) + '</span>'

                + '<h6 class="msg-name mb-1">' + escapeHtml(notificacion.titulo) + '</h6>'

                + '<p class="msg-info notificacion-diario-detalle">' + detalle + '</p>'
                + '</div></div></a>';
        }).join('');
    }

    function escapeHtml(valor) {
        return String(valor || '').replace(/[&<>'"]/g, function(caracter){
            return {'&':'&amp;','<':'&lt;','>':'&gt;',"'":'&#039;','"':'&quot;'}[caracter];
        });
    }

    window.actualizarNotificacionesDiario = renderizarNotificacionesDiario;

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