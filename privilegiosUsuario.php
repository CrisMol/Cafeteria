<?php

//require_once 'include/redireccion.php';
require_once 'include/conexion.php';
require_once 'include/cabecera.php';
require_once 'include/helpers.php';

?>

                    <!-- BEGIN Page Content -->
                    <main id="js-page-content" role="main" class="page-content">
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Katu School</a></li>
        <li class="breadcrumb-item">Configurci&oacute;n</li>
        <li class="breadcrumb-item">Usuarios</li>
        <li class="breadcrumb-item">Privilegios</li>
    </ol>
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-home'></i> Privilegios Usuario <span class='fw-300'>Dashboard</span>
        </h1>
  </div>



  <div class="row">
      <div class="col-xl-6">
          <div id="panel-1" class="panel">
              <div class="panel-hdr">
                  <h2>
                      Privilegios <span class="fw-300"><i>Usuario</i></span>
                  </h2>
                  <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Minimizar"></button>
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Pantalla Completa"></button>
                    <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Cerrar"></button>
                </div>
              </div>
              <div class="panel-container show">
                  <div class="panel-content">
                      <div class="panel-tag">
                          Seleccione las opciones que NO tiene acceso este usuario. Las opciones seleccionadas est&aacute;n bloquedas.
                      </div>
<?php
if (isset($_GET['idUsuario'])):
	$usuario = conseguir_usuarios($db, $_GET['idUsuario']);
    if(!empty($usuario) && mysqli_num_rows($usuario) >= 1):
    	$usuario = mysqli_fetch_assoc($usuario);
?>
                      <h2>Bloquear Opciones de Menus Usuario: <?=$usuario['NOMBRE']?></h2>
<?php
	endif;
?>
					  		
<?php
else:
?>
					   <h2>Bloquear Opciones de Menus Usuario: </h2>
<?php
	endif;
?>
                      <div class="frame-wrap">
                          <div class="demo">
<br>
<form id="form1" name="form1" method="POST" action="guardarPrivilegios.php">
<h4>Menu Recargas / Pagos</h4><label>
<?php
$arrPuntos[] = 0;
 if (isset($_GET['idUsuario'])):
    $usuarios_privilegios = conseguir_usuarios_privilegios($db, $_GET['idUsuario']);
    if(!empty($usuarios_privilegios) && mysqli_num_rows($usuarios_privilegios) >= 1) :
    	$usuario_privilegios = mysqli_fetch_assoc($usuarios_privilegios);
 		if ($usuario_privilegios['MODULO'] == 1 && $usuario_privilegios['NOMBRE_PRIVILEGIO'] == 'Estudiante Efectivo') :
?>
                              <input type="checkbox" name="idOpcion[]" value="$usuario_privilegios['CODIGO']" checked="checked">
                              <i></i>Estudiante Efectivo</label><br><label>
<?php
		else :
?>
							  <input type="checkbox" name="idOpcion[]" value="1">
							  <i></i>Estudiante Efectivo</label><br><label>
<?php  
		endif;
    else:
?>
				    		  <input type="checkbox" name="idOpcion[]" value="1">
							  <i></i>Estudiante Efectivo</label><br><label>
<?php
	endif;
  else:
?>
							  <input type="checkbox" name="idOpcion[]" value="1">
							  <i></i>Estudiante Efectivo</label><br><label>
<?php
  endif;
?>
                              <input type="checkbox" name="idOpcion[]" value="2">
                              <i></i>Profesor Efectivo</label><br><label>
                              <input type="checkbox" name="idOpcion[]" value="47">
                              <i></i>Pago Credito</label><br><hr><h4>Menu Familias</h4><label>
                              <input type="checkbox" name="idOpcion[]" value="3">
                              <i></i>Nueva / Editar</label><br><label>
                              <input type="checkbox" name="idOpcion[]" value="4">
                              <i></i>Restablecer Contraseña</label><br><hr><h4>Menu Estudiantes</h4><label>
                              <input type="checkbox" name="idOpcion[]" value="5">
                              <i></i>Nuevo / Editar</label><br><label>
                              <input type="checkbox" name="idOpcion[]" value="6">
                              <i></i>Movimientos</label><br><label>
                              <input type="checkbox" name="idOpcion[]" value="7">
                              <i></i>Registrar RFID</label><br><label>
                              <input type="checkbox" name="idOpcion[]" value="8">
                              <i></i>Grados</label><br><hr><h4>Menu Profesores</h4><label>
                              <input type="checkbox" name="idOpcion[]" value="9">
                              <i></i>Nuevo / Editar</label><br><label>
                              <input type="checkbox" name="idOpcion[]" value="10">
                              <i></i>Movimientos</label><br><label>
                              <input type="checkbox" name="idOpcion[]" value="11">
                              <i></i>Registrar RFID</label><br><label>
                              <input type="checkbox" name="idOpcion[]" value="62">
                              <i></i>Movimientos Credito</label><br><hr><h4>Menu Productos</h4><label>
                              <input type="checkbox" name="idOpcion[]" value="12">
                              <i></i>Seleccionar</label><br><label>
                              <input type="checkbox" name="idOpcion[]" value="13">
                              <i></i>Nuevo</label><br><label>
                              <input type="checkbox" name="idOpcion[]" value="14">
                              <i></i>Listado</label><br><label>
                              <input type="checkbox" name="idOpcion[]" value="55">
                              <i></i>Fotos Productos</label><br><hr><h4>Menu Inventario</h4><label>
                              <input type="checkbox" name="idOpcion[]" value="15">
                              <i></i>Ver Inventario</label><br><label>
                              <input type="checkbox" name="idOpcion[]" value="16">
                              <i></i>Movimiento Producto</label><br><label>
                              <input type="checkbox" name="idOpcion[]" value="17">
                              <i></i>Ingresar Factura</label><br><hr><h4>Menu Proveedores</h4><label>
                              <input type="checkbox" name="idOpcion[]" value="18">
                              <i></i>Nuevo / Editar</label><br><label>
                              <input type="checkbox" name="idOpcion[]" value="19">
                              <i></i>Pagos Proveedor</label><br><label>
                              <input type="checkbox" name="idOpcion[]" value="20">
                              <i></i>Facturas</label><br><hr><h4>Menu Menu </h4><label>
                              <input type="checkbox" name="idOpcion[]" value="21">
                              <i></i>Cargar Menu</label><br><hr><h4>Menu Informes</h4><label>
                              <input type="checkbox" name="idOpcion[]" value="22">
                              <i></i>Cuadre Cajeros</label><br><label>
                              <input type="checkbox" name="idOpcion[]" value="23">
                              <i></i>Cuadre Admin</label><br><label>
                              <input type="checkbox" name="idOpcion[]" value="24">
                              <i></i>Resumen Ventas</label><br><label>
                              <input type="checkbox" name="idOpcion[]" value="25">
                              <i></i>Ventas Puntos</label><br><label>
                              <input type="checkbox" name="idOpcion[]" value="26">
                              <i></i>Recargas</label><br><label>
                              <input type="checkbox" name="idOpcion[]" value="27">
                              <i></i>Créditos Profesores</label><br><label>
                              <input type="checkbox" name="idOpcion[]" value="28">
                              <i></i>Cuentas Por Cobrar</label><br><label>
                              <input type="checkbox" name="idOpcion[]" value="29">
                              <i></i>Ventas Mensuales</label><br><label>
                              <input type="checkbox" name="idOpcion[]" value="30">
                              <i></i>Productos Vendidos</label><br><label>
                              <input type="checkbox" name="idOpcion[]" value="51">
                              <i></i>Pre Compras Estudiantes</label><br><label>
                              <input type="checkbox" name="idOpcion[]" value="52">
                              <i></i>Pre Compras Profesores</label><br><label>
                              <input type="checkbox" name="idOpcion[]" value="61">
                              <i></i>Saldos Familias</label><br><hr><h4>Menu Reversiones</h4><label>
                              <input type="checkbox" name="idOpcion[]" value="31">
                              <i></i>Venta Efectivo</label><br><label>
                              <input type="checkbox" name="idOpcion[]" value="32">
                              <i></i>Recarga Familia</label><br><label>
                              <input type="checkbox" name="idOpcion[]" value="33">
                              <i></i>Recarga Profesor</label><br><label>
                              <input type="checkbox" name="idOpcion[]" value="34">
                              <i></i>Corte Créditos</label><br><label>
                              <input type="checkbox" name="idOpcion[]" value="35">
                              <i></i>Cierre Caja</label><br><label>
                              <input type="checkbox" name="idOpcion[]" value="48">
                              <i></i>Terceros</label><br><hr><h4>Menu Importar</h4><label>
                              <input type="checkbox" name="idOpcion[]" value="38">
                              <i></i>Estudiantes</label><br><label>
                              <input type="checkbox" name="idOpcion[]" value="39">
                              <i></i>Profesores</label><br><hr><h4>Menu Configuración</h4><label>
                              <input type="checkbox" name="idOpcion[]" value="40">
                              <i></i>Puntos Venta</label><br><label>
                              <input type="checkbox" name="idOpcion[]" value="41">
                              <i></i>Categorias Productos</label><br><label>
                              <input type="checkbox" name="idOpcion[]" value="42">
                              <i></i>Cajeros</label><br><label>
                              <input type="checkbox" name="idOpcion[]" value="43">
                              <i></i>Usuarios</label><br><label>
                              <input type="checkbox" name="idOpcion[]" value="44">
                              <i></i>Parametrización</label><br><label>
                              <input type="checkbox" name="idOpcion[]" value="50">
                              <i></i>Kioskos</label><br><label>
                              <input type="checkbox" name="idOpcion[]" value="54">
                              <i></i>Subir Fotos</label><br><hr><h4>Menu Pagos / Bolsas</h4><label>
                              <input type="checkbox" name="idOpcion[]" value="49"checked="checked">
                              <i></i>Pagar</label><br><label>
                              <input type="checkbox" name="idOpcion[]" value="53"checked="checked">
                              <i></i>Compra Bolsa SMS</label><br><label>
                              <input type="checkbox" name="idOpcion[]" value="60"checked="checked">
                              <i></i>Compra Bolsa Recargas</label><br><hr><h4>Menu Planes Alimentación</h4><label>
                              <input type="checkbox" name="idOpcion[]" value="56">
                              <i></i>Registro</label><br><label>
                              <input type="checkbox" name="idOpcion[]" value="57">
                              <i></i>Estudiantes</label><br><label>
                              <input type="checkbox" name="idOpcion[]" value="58">
                              <i></i>Entregas</label><br><label>
                              <input type="checkbox" name="idOpcion[]" value="59">
                              <i></i>Configuración</label><br><hr>

                          </div>
                          <div class="modal-footer">
                          <input name="idUsuario" type="hidden" id="idUsuario" value="<?=isset($_GET['idUsuario']) ? $_GET['idUsuario'] : 0 ?>" />
                          <button type="submit" class="btn btn-info btn-primary">Guardar Cambios</button>
                          </div>

                        </form>
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
        <span class="hidden-md-down fw-700">2014 - 2020 © Kat&uacute; School es un producto Grupo Online SAS<a href='https://www.katu.com.co' class='text-primary fw-500' title='gotbootstrap.com' target='_blank'> www.katu.com.co</a></span>
    </div>
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
                        <a href="https://api.whatsapp.com/send?phone=573136714713&text=Hola, me puedes ayudar?" target="_blank" class="app-list-item text-white border-0 m-0">
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
        <script src="js/formplugins/select2/select2.bundle.js"></script>
        <!-- datatble responsive bundle contains:
	+ jquery.dataTables.js
	+ dataTables.bootstrap4.js
	+ dataTables.autofill.js
	+ dataTables.buttons.js
	+ buttons.bootstrap4.js
	+ buttons.html5.js
	+ buttons.print.js
	+ buttons.colVis.js
	+ dataTables.colreorder.js
	+ dataTables.fixedcolumns.js
	+ dataTables.fixedheader.js
	+ dataTables.keytable.js
	+ dataTables.responsive.js
	+ dataTables.rowgroup.js
	+ dataTables.rowreorder.js
	+ dataTables.scroller.js
	+ dataTables.select.js
	+ datatables.styles.app.js
	+ datatables.styles.buttons.app.js -->
        <script src="js/datagrid/datatables/datatables.bundle.js"></script>
        <script>
            $(document).ready(function()
            {
                $('#dt-basic-example').dataTable(
                {
                    responsive: true,
                    autoFill:
                    {
                        focus: 'hover'
                    }
                });
            });

        </script>
    </body>
</html>
