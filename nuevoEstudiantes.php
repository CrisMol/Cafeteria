<?php

//require_once 'include/redireccion.php';
require_once 'include/cabecera.php';
require_once 'include/helpers.php';
require_once 'include/conexion.php';

?>

                    <!-- END Page Header -->
                    <!-- BEGIN Page Content -->
                    <main id="js-page-content" role="main" class="page-content">
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">CAFETERISA</a></li>
        <li class="breadcrumb-item">Estudiantes</li>
    </ol>
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-home'></i> Estudiantes <span class='fw-300'>Dashboard</span>
        </h1>
  </div>


  <div class="row">
      <div class="col-xl-12">
          <div id="panel-1" class="panel">
              <div class="panel-hdr">
                  <h2>
                      Estudiantes <span class="fw-300"><i>Registrados</i></span>
                  </h2>
                  <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Minimizar"></button>
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Pantalla Completa"></button>
                    <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Cerrar"></button>                  </div>
              </div>
              <div class="panel-container show">
                  <div class="panel-content">
                      <div class="panel-tag">
                        <a href="formNuevoEstudiante.php">
                        <button type="button" class="btn btn-lg btn-info">
                            <span class="fal fa-graduation-cap"></span>
                            Nuevo Estudiante
                        </button>
                      </div>
                    </a>
                      <!-- datatable start -->
                      <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                          <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>Codigo</th>
                                  <th>Apellidos</th>
                                  <th>Nombre</th>
                                  <th>Grado</th>
                                  <th>Codigo Familia</th>
                                  <th>&nbsp;</th>
                              </tr>
                          </thead>
                          <tbody>
<?php
	$contador = 0;
	$estudiantes =conseguir_estudiantes($db);
	if(!empty($estudiantes) && mysqli_num_rows($estudiantes) >= 1):
		while ($estudiante = mysqli_fetch_assoc($estudiantes)) :
			$contador++;
?>
<tr>
                                  <td><?=$contador?></td>
                                  <td><?=$estudiante['CODIGO']?></td>
                                  <td><?=$estudiante['APELLIDO']?></td>
                                  <td><?=$estudiante['NOMBRE']?></td>
                                  <td><?=$estudiante['GRADO']?></td>
                                  <td><?=$estudiante['CODIGO_FAMILIA']?></td>
                                  <td align="center"><button type="button" class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#modalEditar<?=$estudiante['CODIGO']?>">Editar</button></td>
                              </tr><!-- Modal -->
<div class="modal fade" id="modalEditar<?=$estudiante['CODIGO']?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Editar Estudiante <?=$estudiante['CODIGO']?>              </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="guardarCambiosEstudiante.php">

                <div class="form-group">
                    <label class="form-label" for="single-default">
                        Codigo Familia
                    </label>
                    <select class="select2 form-control w-100" name="codigoFamilia" id="single-default" required>
<?php
	$codigos_familias = conseguir_codigos_familias($db);
	if(!empty($codigos_familias) && mysqli_num_rows($codigos_familias) >= 1):
		while ($codigo_familia = mysqli_fetch_assoc($codigos_familias)) :
?>
<option value="<?=$codigo_familia['CODIGO_FAMILIA']?>"> Codigo <?=$codigo_familia['CODIGO_FAMILIA']?></option>        
<?php
		endwhile;
	endif;
?>
					</select>
                </div>

                  <div class="form-group">
                      <label class="form-label" for="simpleinput">Apellidos</label>
                      <input type="text" id="simpleinput" name="apellidosEstudiante" value="<?=$estudiante['APELLIDO']?>" class="form-control" autocomplete="off" required>
                  </div>

                  <?php echo isset($_SESSION['errores']) ? mostrar_error($_SESSION['errores'], 'apellidosEstudiante') : ''; ?> 

                  <div class="form-group">
                      <label class="form-label" for="simpleinput">Nombre</label>
                      <input type="text" id="simpleinput" name="nombreEstudiante" value="<?=$estudiante['NOMBRE']?>" class="form-control" autocomplete="off" required>
                  </div>

                  <?php echo isset($_SESSION['errores']) ? mostrar_error($_SESSION['errores'], 'nombreEstudiante') : ''; ?> 

                  <div class="form-group">
                      <label class="form-label" for="single-default">
                          Grado
                      </label>
                      <select class="select2 form-control w-100" name="grado" id="single-default" required>
<?php
	$grados = conseguir_grados($db);
	if(!empty($grados) && mysqli_num_rows($grados) >= 1):
		while ($grado = mysqli_fetch_assoc($grados)) :
?>
    <option value="<?=$grado['CODIGO_GRADO']?>"><?=$grado['NOMBRE_GRADO']?>
<?php
		endwhile;
	endif;
?>
						</select>
                  </div>

            </div>
            <div class="modal-footer">
               <input name="idEstudiante" type="hidden" id="idEstudiante" value="<?=$estudiante['CODIGO']?>" />
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-info btn-primary">Guardar Cambios</button>
            </div>
            </form>
            <?php borrar_error();?>
        </div>
    </div>
</div>

<?php
	endwhile;
	endif;
?>

                          </tbody>
                          <tfoot>
                              <tr>
                                <th>ID</th>
                                <th>Codigo</th>
                                <th>Apellidos</th>
                                <th>Nombre</th>
                                <th>Grado</th>
                                <th>Codigo Familia</th>
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
