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

<?php

  function llamar_input($nombrePrivilegio, $db, $modulo, $idPrivilegio){
    $arrPuntos[] = 0;
    if (isset($_GET['idUsuario'])) {
      $usuarios_privilegios = conseguir_usuarios_privilegios($db, $_GET['idUsuario'], $idPrivilegio);
      if (!empty($usuarios_privilegios) && mysqli_num_rows($usuarios_privilegios) >= 1) {
        $usuario_privilegios = mysqli_fetch_assoc($usuarios_privilegios);
        if ($usuario_privilegios['MODULO'] == $modulo && $usuario_privilegios['NOMBRE_PRIVILEGIO'] == $nombrePrivilegio) {
          echo "<input type='checkbox' name='idOpcion[]'' value='".$usuario_privilegios['ID_PRIVILEGIO']."'checked='checked'> <i></i>".$nombrePrivilegio."</label><br><label>";
        }else{
          echo "<input type='checkbox' name='idOpcion[]'' value='".$idPrivilegio."'> <i></i>".$nombrePrivilegio."</label><br><label>";
        }
      }else{
        echo "<input type='checkbox' name='idOpcion[]'' value='".$idPrivilegio."'> <i></i>".$nombrePrivilegio."</label><br><label>";
      }
    }else{
      echo "<input type='checkbox' name='idOpcion[]'' value='".$idPrivilegio."'> <i></i>".$nombrePrivilegio."</label><br><label>";
    }
  }
?>

<form id="form1" name="form1" method="POST" action="guardarPrivilegios.php">
<?php
//Conseguir privilegios
$modulos = conseguir_modulos($db);
while ($modulo = mysqli_fetch_assoc($modulos)) {
	echo "<br><h4>". $modulo['NOMBRE'] ."</h4><label>";
	$privilegios = conseguir_privilegios($db, $modulo['CODIGO']);
	while($privilegio = mysqli_fetch_assoc($privilegios)){
		llamar_input($privilegio['NOMBRE'], $db, $privilegio['CODIGO_MODULO'], $privilegio['CODIGO']);
	}
}
?>

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

<?php echo isset($_SESSION['errores']) ? mostrar_error($_SESSION['errores'], 'idUsuario') : ''; ?>
<?php borrar_error();?> 


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
