<?php

//require_once 'include/redireccion.php';
require_once 'include/cabecera.php';
require_once 'include/helpers.php';
require_once 'include/conexion.php';

?>
                    <!-- BEGIN Page Content -->
                    
<main id="js-page-content" role="main" class="page-content">
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">CAFETERISA</a></li>
        <li class="breadcrumb-item">Informes</li>
        <li class="breadcrumb-item">Cr&eacute;ditos Profesores</li>
    </ol>
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-home'></i> Cr&eacute;ditos Profesores <span class='fw-300'>Dashboard</span>
        </h1>
  </div>


  <div class="row">
      <div class="col-xl-12">
          <div id="panel-1" class="panel">
              <div class="panel-hdr">
                  <h2>
                      Corte  <span class="fw-300"><i>Cr&eacute;ditos</i></span>
                  </h2>

              </div>
              <div class="panel-container show">
                  <div class="panel-content">
                    <form method="GET" action="corteCreditos.php">
                      <div class="form-group row">
                          <label class="col-form-label col-12 col-lg-3 form-label text-lg-right">Fecha Corte</label>
                          <div class="col-12 col-lg-6">
                              <div class="input-group">
                                  <input type="text" class="form-control " placeholder="Seleccione fecha" value="" name="fechaCorte" id="datepicker-2" autocomplete="off" required>
                                  <div class="input-group-append">
                                      <span class="input-group-text fs-xl">
                                          <i class="fal fa-calendar"></i>
                                      </span>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <input name="proceso" type="hidden" id="proceso" value="1602827433" />
                      <button type="submit" class="btn btn-info btn-primary">Realizar Corte</button>
                      </div>
                    </form>

                  </div>
              </div>
          </div>
      </div>
  </div>



  <div class="row">
      <div class="col-xl-12">
          <div id="panel-1" class="panel">
              <div class="panel-hdr">
                  <h2>
                      Cr&eacute;ditos <span class="fw-300"><i>Profesores</i></span>
                  </h2>
                  <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Pantalla Completa"></button>
                  </div>
              </div>

              <div class="panel-container show">
                  <div class="panel-content">
                      <div class="table-responsive-lg">
                          <table class="table table-bordered m-0" id="table_credit">
                              <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>C&oacute;digo</th>
                                      <th>Nombre Profesor</th>
                                      <th>Saldo Cr&eacute;dito</th>
                                      <th>&nbsp;</th>
                                  </tr>
                              </thead>
                              <tbody>
<?php
    $contador = 0;
    $profesores = conseguir_profesores($db);
    if(!empty($profesores) && mysqli_num_rows($profesores) >= 1):
        while ($profesor = mysqli_fetch_assoc($profesores)) :
            if($profesor['SALDO_CREDITO']!=0):
            $contador++;
?>
<tr>
                                      <th scope="row"><?=$contador?></th>
                                      <td><?=$profesor['CODIGO_PROFESOR']?></td>
                                      <td><?=$profesor['APELLIDOS_PROFESOR']?> <?=$profesor['NOMBRE_PROFESOR']?></td>
                                      <td align="right"><?=$profesor['SALDO_CREDITO']?></td>
                                      <td align="center"><a href="extractoProfesor.php?codigoProfesor=<?=$profesor['CODIGO_PROFESOR']?>"><button type="button" class="btn btn-xs btn-info">Ver Extracto</button></a></td>
                                  </tr><tr>
    <th scope="row">&nbsp;</th>
    <td>&nbsp;</td>
    <td align="right"><strong>Total Cr&eacute;ditos</strong></td>
    <td align="right" id="total_credito"><strong>0.0</strong></td>
    <td>&nbsp;</td>
</tr> 
<?php       endif;
        endwhile;
    endif;
?>                               </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

 <?php echo isset($_SESSION['errores']) ? mostrar_error($_SESSION['errores'], 'fechaCorte') : ''; ?>
 <?php borrar_error();?>

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
            <script src="js/creditosProfesores.js"></script>
            <script src="js/vendors.bundle.js"></script>
            <script src="js/app.bundle.js"></script>
            <script src="js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
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
            <!-- datatbles buttons bundle contains:
    	+ "jszip.js",
    	+ "pdfmake.js",
    	+ "vfs_fonts.js"
    	NOTE: 	The file size is pretty big, but you can always use the
    			build.json file to deselect any components you do not need under "export" -->
            <script src="js/datagrid/datatables/datatables.export.js"></script>
            <script>
                $(document).ready(function()
                {

                    // initialize datatable
                    $('#dt-basic-example').dataTable(
                    {
                        responsive: true,
                        lengthChange: false,
                        dom:
                            /*	--- Layout Structure
                            	--- Options
                            	l	-	length changing input control
                            	f	-	filtering input
                            	t	-	The table!
                            	i	-	Table information summary
                            	p	-	pagination control
                            	r	-	processing display element
                            	B	-	buttons
                            	R	-	ColReorder
                            	S	-	Select

                            	--- Markup
                            	< and >				- div element
                            	<"class" and >		- div with a class
                            	<"#id" and >		- div with an ID
                            	<"#id.class" and >	- div with an ID and a class

                            	--- Further reading
                            	https://datatables.net/reference/option/dom
                            	--------------------------------------
                             */
                            "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'lB>>" +
                            "<'row'<'col-sm-12'tr>>" +
                            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                        buttons: [
                            /*{
                            	extend:    'colvis',
                            	text:      'Column Visibility',
                            	titleAttr: 'Col visibility',
                            	className: 'mr-sm-3'
                            },*/
                            {
                                extend: 'pdfHtml5',
                                text: 'PDF',
                                titleAttr: 'Generate PDF',
                                className: 'btn-outline-danger btn-sm mr-1'
                            },
                            {
                                extend: 'excelHtml5',
                                text: 'Excel',
                                titleAttr: 'Generate Excel',
                                className: 'btn-outline-success btn-sm mr-1'
                            },
                            {
                                extend: 'csvHtml5',
                                text: 'CSV',
                                titleAttr: 'Generate CSV',
                                className: 'btn-outline-primary btn-sm mr-1'
                            },
                            {
                                extend: 'copyHtml5',
                                text: 'Copy',
                                titleAttr: 'Copy to clipboard',
                                className: 'btn-outline-primary btn-sm mr-1'
                            },
                            {
                                extend: 'print',
                                text: 'Print',
                                titleAttr: 'Print Table',
                                className: 'btn-outline-primary btn-sm'
                            }
                        ]
                    });

                });


                // Class definition

                var controls = {
                    leftArrow: '<i class="fal fa-angle-left" style="font-size: 1.25rem"></i>',
                    rightArrow: '<i class="fal fa-angle-right" style="font-size: 1.25rem"></i>'
                }

                var runDatePicker = function()
                {

                    // minimum setup
                    $('#datepicker-1').datepicker(
                    {
                        todayHighlight: true,
                        orientation: "bottom left",
                        templates: controls
                    });


                    // input group layout
                    $('#datepicker-2').datepicker(
                    {
                        todayHighlight: true,
                        orientation: "bottom left",
                        templates: controls
                    });

                    // input group layout for modal demo
                    $('#datepicker-modal-2').datepicker(
                    {
                        todayHighlight: true,
                        orientation: "bottom left",
                        templates: controls
                    });

                    // enable clear button
                    $('#datepicker-3').datepicker(
                    {
                        todayBtn: "linked",
                        clearBtn: true,
                        todayHighlight: true,
                        templates: controls
                    });

                    // enable clear button for modal demo
                    $('#datepicker-modal-3').datepicker(
                    {
                        todayBtn: "linked",
                        clearBtn: true,
                        todayHighlight: true,
                        templates: controls
                    });

                    // orientation
                    $('#datepicker-4-1').datepicker(
                    {
                        orientation: "top left",
                        todayHighlight: true,
                        templates: controls
                    });

                    $('#datepicker-4-2').datepicker(
                    {
                        orientation: "top right",
                        todayHighlight: true,
                        templates: controls
                    });

                    $('#datepicker-4-3').datepicker(
                    {
                        orientation: "bottom left",
                        todayHighlight: true,
                        templates: controls
                    });

                    $('#datepicker-4-4').datepicker(
                    {
                        orientation: "bottom right",
                        todayHighlight: true,
                        templates: controls
                    });

                    // range picker
                    $('#datepicker-5').datepicker(
                    {
                        todayHighlight: true,
                        templates: controls
                    });

                    // inline picker
                    $('#datepicker-6').datepicker(
                    {
                        todayHighlight: true,
                        templates: controls
                    });
                }

                $(document).ready(function()
                {
                    runDatePicker();
                });


            </script>

    </body>
</html>
