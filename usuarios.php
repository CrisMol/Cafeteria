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
        <li class="breadcrumb-item">Configurci&oacute;n</li>
        <li class="breadcrumb-item">Usuarios</li>
    </ol>
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-home'></i> Usuarios Admininistrativos <span class='fw-300'>Dashboard</span>
        </h1>
  </div>

<?php echo isset($_SESSION['completado']) ? mostrar_succesful($_SESSION['completado'], 'exito') : ''; ?>

  <div class="row">
      <div class="col-xl-12">
          <div id="panel-1" class="panel">
              <div class="panel-hdr">
                  <h2>
                      Usuarios Administrativos <span class="fw-300"><i>Registrados</i></span>
                  </h2>
                  <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Minimizar"></button>
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Pantalla Completa"></button>
                    <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Cerrar"></button>                  </div>
              </div>
              <div class="panel-container show">
                  <div class="panel-content">
                      <div class="panel-tag">
                        <button type="button" class="btn btn-lg btn-info" data-toggle="modal" data-target="#modalNuevoUsuario">
                            <span class="fal fa-user-plus"></span>
                            Nuevo Usuario
                        </button>
                      </div>

                      <!-- datatable start -->
                      <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                          <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>Usuario</th>
                                  <th>Nombre Usuario</th>
                                  <th>&nbsp;</th>
                              </tr>
                          </thead>
                          <tbody>
<?php
    $contador = 0;
    $usuarios = conseguir_usuarios($db);
    if(!empty($usuarios) && mysqli_num_rows($usuarios) >= 1):
        while ($usuario = mysqli_fetch_assoc($usuarios)) :
            $contador++;
?>
<tr>
                                  <td><?=$contador?></td>
                                  <td><?=$usuario['ALIAS']?></td>
                                  <td><?=$usuario['NOMBRE']?></td>
                                  <td align="center"><button type="button" class="btn btn-xs btn-outline-info" data-toggle="modal" data-target="#modalEditar<?=$usuario['CODIGO']?>">Editar</button>
                                  &nbsp;
                                  <button type="button" class="btn btn-xs btn-outline-danger" data-toggle="modal" data-target="#modalEliminar<?=$usuario['CODIGO']?>">Eliminar</button>
                                  &nbsp;
                                  <button type="button" class="btn btn-xs btn-outline-success" data-toggle="modal" data-target="#modalPassword<?=$usuario['CODIGO']?>">Contrase&ntilde;a</button>
                                  &nbsp;
                                  <a href="privilegiosUsuario.php?idUsuario=<?=$usuario['CODIGO']?>"><button type="button" class="btn btn-xs btn-outline-warning">Privilegios</button></a>
                                  </td>
                              </tr><!-- Modal editar-->
<div class="modal fade" id="modalEditar<?=$usuario['CODIGO']?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Editar Usuario                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="guardarCambiosUsuario.php">

                    <div class="form-group">
                      <label class="form-label" for="simpleinput">Nombre Usuario</label>
                      <input type="text" id="simpleinput" name="nombreUsuario" value="<?=$usuario['NOMBRE']?>" class="form-control" autocomplete="off" required>
                  </div>

                  <div class="form-group">
                    <label class="form-label" for="simpleinput">E-mail</label>
                    <input type="email" id="simpleinput" name="emailUsuario" value="<?=$usuario['EMAIL']?>" class="form-control" autocomplete="off" required>
                </div>

            </div>
            <div class="modal-footer">
               <input name="idUsuario" type="hidden" id="idUsuario" value="<?=$usuario['CODIGO']?>" />
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-info btn-primary">Guardar Cambios</button>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal eliminar-->
<div class="modal fade" id="modalEliminar<?=$usuario['CODIGO']?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Eliminar Usuario                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="eliminarUsuario.php">

                    <div class="form-group">
                      <label class="form-label" for="simpleinput">Nombre Usuario</label>
                      <input type="text" id="simpleinput" name="nombreUsuario" value="<?=$usuario['NOMBRE']?>" class="form-control" disabled>
                  </div>

            </div>
            <div class="modal-footer">
            	<input name="nombreUsuario" type="hidden" id="nombreUsuario" value="<?=$usuario['NOMBRE']?>" />
               <input name="idUsuario" type="hidden" id="idUsuario" value="<?=$usuario['CODIGO']?>" />
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-info btn-primary">Eliminar Usuario</button>
            </div>
            </form>
        </div>
    </div>
</div>



<!-- Modal password-->
<div class="modal fade" id="modalPassword<?=$usuario['CODIGO']?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Restablecer Contrase&ntilde;a Usuario                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="restablecerPasswordUsuario.php">

                    <div class="form-group">
                      <label class="form-label" for="simpleinput">Nombre Usuario</label>
                      <input type="text" id="simpleinput" name="nombreUsuario" value="<?=$usuario['NOMBRE']?>" class="form-control" disabled>
                  </div>

                  <div class="form-group">
                    <label class="form-label" for="simpleinput">E-mail</label>
                    <input type="text" id="simpleinput" name="emailUsuario" value="<?=$usuario['EMAIL']?>" class="form-control" disabled>
                </div>

            </div>
            <div class="modal-footer">
               <input name="idUsuario" type="hidden" id="idUsuario" value="<?=$usuario['CODIGO']?>" />
               <input name="nombreUsuario" type="hidden" id="idUsuario" value="<?=$usuario['NOMBRE']?>" />
               <input name="emailUsuario" type="hidden" id="idUsuario" value="<?=$usuario['EMAIL']?>" />
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-info btn-primary">Restablecer Contrase&ntilde;a</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php
        endwhile;
    endif;
?>

<?php echo isset($_SESSION['errores']) ? mostrar_error($_SESSION['errores'], 'nombreUsuario') : ''; ?>
<?php echo isset($_SESSION['errores']) ? mostrar_error($_SESSION['errores'], 'emailUsuario') : ''; ?>
<?php echo isset($_SESSION['errores']) ? mostrar_error($_SESSION['errores'], 'idUsuario') : ''; ?>
<?php borrar_error();?>

                          </tbody>
                          <tfoot>
                              <tr>
                                <th>ID</th>
                                <th>Usuario</th>
                                <th>Nombre Usuario</th>
                                <th>&nbsp;</th>
                              </tr>
                          </tfoot>
                      </table>
                      <!-- datatable end -->
                  </div>
              </div>
          </div>
      </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="modalNuevoUsuario" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">
                      Registro Nuevo Usuario                  </h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true"><i class="fal fa-times"></i></span>
                  </button>
              </div>
              <div class="modal-body">
                <form method="POST" action="guardarNuevoUsuario.php">

                <div class="form-group">
                    <label class="form-label" for="simpleinput">Usuario</label>
                    <input type="text" id="simpleinput" name="usuario" placeholder="Digite usuario" class="form-control" autocomplete="off" required>
                </div>

                      <div class="form-group">
                        <label class="form-label" for="simpleinput">Nombre Usuario</label>
                        <input type="text" id="simpleinput" name="nombreUsuario" placeholder="Digite nombre" class="form-control" autocomplete="off" required>
                    </div>

                    <div class="form-group">
                      <label class="form-label" for="simpleinput">E-mail</label>
                      <input type="email" id="simpleinput" name="emailUsuario" placeholder="Digite correo e-mail" class="form-control" autocomplete="off" required>
                  </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-info btn-primary">Guardar Usuario</button>
              </div>
              </form>
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
