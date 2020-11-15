<?php

//require_once 'include/redireccion.php';
require_once 'include/conexion.php';
require_once 'include/cabecera.php';
require_once 'include/helpers.php';

?>
                    <!-- BEGIN Page Content -->
                    <main id="js-page-content" role="main" class="page-content">
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">CAFETERISA</a></li>
        <li class="breadcrumb-item">Configuraci&oacute;n</li>
        <li class="breadcrumb-item">Parametrizaci&oacute;n</li>
    </ol>
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-home'></i> Parametrizaci&oacute;n <span class='fw-300'>Dashboard</span>
        </h1>
  </div>
  <div class="row">
      <div class="col-xl-6">
          <div id="panel-1" class="panel">
              <div class="panel-hdr">
                  <h2>
                      Configuraci&oacute;n <span class="fw-300"><i>Plataforma</i></span>
                  </h2>
                  <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Minimizar"></button>
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Pantalla Completa"></button>
                    <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Cerrar"></button>                  </div>
              </div>
              <div class="panel-container show">
                  <div class="panel-content">
<?php
	$parametrizacion = conseguir_parametrizacion($db, 1);
?>
                  <form method="get" action="guardarcambiosConfiracion.php">

                      <div class="form-group">
                        <label class="form-label" for="addon-wrapping-left">Col&eacute;gio</label>
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fal fa-university fs-xl"></i></span>
                            </div>
                            <?php
                            	if(!empty($parametrizacion) && mysqli_num_rows($parametrizacion) >= 1):
                            ?>
                        		<input id="addon-wrapping-left" type="text" class="form-control" name="nombreColegio" value="<?=$parametrizacion['COLEGIO']?>" aria-label="Username" aria-describedby="addon-wrapping-left" autocomplete="off" required>
                        	<?php
                        		else:
                        	?>
                        		<input id="addon-wrapping-left" type="text" class="form-control" name="nombreColegio" value="" aria-label="Username" aria-describedby="addon-wrapping-left" autocomplete="off" required>
                        	<?php
                        		endif;
                        	?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="addon-wrapping-left">Responsable</label>
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fal fa-user-circle fs-xl"></i></span>
                            </div>
                            <?php
                            	if(!empty($parametrizacion) && mysqli_num_rows($parametrizacion) >= 1):
                            ?>
                        		<input id="addon-wrapping-left" type="text" class="form-control" name="reponsable" value="<?=$parametrizacion['RESPONSABLE']?>" aria-label="Username" aria-describedby="addon-wrapping-left" autocomplete="off" required>
                        	<?php
                        		else:
                        	?>
                        		<input id="addon-wrapping-left" type="text" class="form-control" name="reponsable" value="" aria-label="Username" aria-describedby="addon-wrapping-left" autocomplete="off" required>
                        	<?php
                        		endif;
                        	?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="addon-wrapping-left">E-mail Notificaciones</label>
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fal fa-at fs-xl"></i></span>
                            </div>
                            <?php
                            	if(!empty($parametrizacion) && mysqli_num_rows($parametrizacion) >= 1):
                            ?>
                        		<input id="addon-wrapping-left" type="email" class="form-control" name="email" value="<?=$parametrizacion['EMAIL_NOTIFICACIONES']?>" aria-label="Username" aria-describedby="addon-wrapping-left" autocomplete="off" required>
                        	<?php
                        		else:
                        	?>
                        		<input id="addon-wrapping-left" type="email" class="form-control" name="email" value="" aria-label="Username" aria-describedby="addon-wrapping-left" autocomplete="off" required>
                        	<?php
                        		endif;
                        	?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="addon-wrapping-left">E-mail Pre Compras</label>
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fal fa-at fs-xl"></i></span>
                            </div>
                            <input id="addon-wrapping-left" type="email" class="form-control" name="emailPrecompras" value="daniel.merino@katulatam.com" aria-label="Username" aria-describedby="addon-wrapping-left" autocomplete="off" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="example-time-2">Hora M&aacute;xima Pre Compras (Pedidos mismo d&iacute;a)</label>
                        <input class="form-control" id="example-time-2" type="time" name="horaPrecompras" value="09:00:00">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="example-select">Entrega Pre Compras Sabados</label>
                        <select class="form-control" id="example-select" name="preCompraSabados">
<option value="0">NO</option>
                            <option value="0">NO</option>
                            <option value="1">SI</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="addon-wrapping-left">E-mail Tienda Online</label>
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fal fa-at fs-xl"></i></span>
                            </div>
                            <input id="addon-wrapping-left" type="email" class="form-control" name="emailTiendaOnline" value="d.merino@corpsunrise.com" aria-label="Username" aria-describedby="addon-wrapping-left" autocomplete="off" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="addon-wrapping-left">WhatsApp Soporte (Ejemplo: 573107778800)</label>
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fal fa-comments fs-xl"></i></span>
                            </div>
                            <input id="addon-wrapping-left" type="number" class="form-control" name="whatsapp" value="593991943124" aria-label="Username" aria-describedby="addon-wrapping-left" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="example-select">Ventas Control Inventario</label>
                        <select class="form-control" id="example-select" name="controlInventario">
<option value="no">NO</option>
                            <option value="no">NO</option>
                            <option value="si">SI</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="example-select">Servicio Pre Compras</label>
                        <select class="form-control" id="example-select" name="servicioPrecompras">
<option value="1">Activo</option>
                            <option value="0">Desactivado</option>
                            <option value="1">Activo</option>
                        </select>
                    </div>




                      <div class="modal-footer">
                      <button type="submit" class="btn btn-info btn-primary">Guardar Cambios</button>
                      </form>
                    </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

</main>
<div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div> <!-- END Page Content -->
              <!-- this overlay is activated only when mobile menu is triggered -->
                    <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div> <!-- END Page Content -->
                    <!-- BEGIN Page Footer -->
                    <footer class="page-footer" role="contentinfo">
    <div class="d-flex align-items-center flex-1 text-muted">
        <span class="hidden-md-down fw-700">2011 - 2020 © CAFETERISA ES UN PRODUCTO CORPSUNRISE<a href='https://www.cafeterisa.com.ec' class='text-primary fw-500' title='gotbootstrap.com' target='_blank'> www.cafeterisa.com.ec</a></span>
    </div> <span class="hidden-md
    <div>
        <ul class="list-table m-0">
            <li><a href="https://www.katu.com.co/docs/politicaManejoDatosPersonales.pdf" target="_blank"class="text-secondary fw-700">Politica Manejo Datos Personales</a></li>
            <li class="pl-3"><a href="https://www.katu.com/docs/terminosCondiciones.pdf" class="text-secondary fw-700">Terminos Condiciones</a></li>
            </ul>
    </div>
</footer>


<!-- Modal -->
<div class="modal fade" id="cambiarPassword" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Cambiar Contrase&ntilde;a
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
              <form method="post" action="actualizarPassword.php">

                  <div class="form-group">
                      <label class="form-label" for="simpleinput">Nueva Contrase&ntilde;a</label>
                      <input type="password" id="simpleinput" name="password1" placeholder="Digite contrase&ntilde;a" class="form-control" autocomplete="off" required>
                  </div>

                  <div class="form-group">
                      <label class="form-label" for="simpleinput">Repita Contrase&ntilde;a</label>
                      <input type="password" id="simpleinput" name="password2" placeholder="Repita contrase&ntilde;a" class="form-control" autocomplete="off" required>
                  </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info btn-primary">Guardar Cambios</button>
            </div>
            </form>
        </div>
    </div>
</div>
                <!-- END Page Footer -->
                    <!-- BEGIN Shortcuts -->
                    <div class="modal fade modal-backdrop-transparent" id="modal-shortcut" tabindex="-1" role="dialog" aria-labelledby="modal-shortcut" aria-hidden="true">
    <div class="modal-dialog modal-dialog-top modal-transparent" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <ul class="app-list w-auto h-auto p-0 text-left">
                    <li>
                        <a href="index.php" class="app-list-item text-white border-0 m-0">
                            <div class="icon-stack">
                                <i class="base base-7 icon-stack-3x opacity-100 color-primary-500 "></i>
                                <i class="base base-7 icon-stack-2x opacity-100 color-primary-300 "></i>
                                <i class="fal fa-home icon-stack-1x opacity-100 color-white"></i>
                            </div>
                            <span class="app-list-name">
                                Inicio
                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="https://api.whatsapp.com/send?phone=593991943124&text=Hola, me puedes ayudar?" target="_blank" class="app-list-item text-white border-0 m-0">
                            <div class="icon-stack">
                                <i class="base base-7 icon-stack-3x opacity-100 color-primary-500 "></i>
                                <i class="base base-7 icon-stack-2x opacity-100 color-primary-300 "></i>
                                <i class="fal fa-comment icon-stack-1x opacity-100 color-white"></i>
                            </div>
                            <span class="app-list-name">
                                Whatsapp
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
                  <!-- END Shortcuts -->
                </div>
            </div>
        </div>
        <!-- END Page Wrapper -->
        <!-- BEGIN Quick Menu -->
        <!-- to add more items, please make sure to change the variable '$menu-items: number;' in your _page-components-shortcut.scss -->
<nav class="shortcut-menu d-none d-sm-block">
    <input type="checkbox" class="menu-open" name="menu-open" id="menu_open" />
    <label for="menu_open" class="menu-open-button ">
        <span class="app-shortcut-icon d-block"></span>
    </label>
    <a href="#" class="menu-item btn" data-toggle="tooltip" data-placement="left" title="Scroll Incio">
        <i class="fal fa-arrow-up"></i>
    </a>
    <a href="salir.php" class="menu-item btn" data-toggle="tooltip" data-placement="left" title="Salir">
        <i class="fal fa-sign-out"></i>
    </a>
    <a href="#" class="menu-item btn" data-action="app-fullscreen" data-toggle="tooltip" data-placement="left" title="Pantalla Completa">
        <i class="fal fa-expand"></i>
    </a>
    <a href="#" class="menu-item btn" data-action="app-print" data-toggle="tooltip" data-placement="left" title="Imprimir Pagina">
        <i class="fal fa-print"></i>
    </a>
</nav>
      <!-- END Quick Menu -->
        <!-- BEGIN Messenger -->
        <!-- END Messenger -->
        <!-- BEGIN Page Settings -->


        <!-- END Page Settings -->
        <!-- base vendor bundle:
			 DOC: if you remove pace.js from core please note on Internet Explorer some CSS animations may execute before a page is fully loaded, resulting 'jump' animations
						+ pace.js (recommended)
						+ jquery.js (core)
						+ jquery-ui-cust.js (core)
						+ popper.js (core)
						+ bootstrap.js (core)
						+ slimscroll.js (extension)
						+ app.navigation.js (core)
						+ ba-throttle-debounce.js (core)
						+ waves.js (extension)
						+ smartpanels.js (extension)
						+ src/../jquery-snippets.js (core) -->
            <script src="js/vendors.bundle.js"></script>
            <script src="js/app.bundle.js"></script>
    </body>
</html>
