<?php

//require_once 'include/redireccion.php';
require_once 'include/cabecera.php';
require_once 'include/helpers.php';
require_once 'include/conexion.php';

?>
<?php
	date_default_timezone_set('America/Lima');
    $fechaInforme = date("Y") . "-" . date("m") . "-" . date("d");
 
   	$fechaInformeConvertidor = "Hoy";

    if(isset($_GET['fechaCuadre'])){
    	$fechaInforme = $_GET['fechaCuadre'];
    	$fechaEntera = strtotime($fechaInforme);
		$anio = date("Y", $fechaEntera);
		$mes = date("m", $fechaEntera);
		$dia = date("d", $fechaEntera);
		$fechaInforme = $anio . "-" . $mes . "-" .$dia;
		$fechaInformeConvertidor = $dia . " de " . $mes . " del " .$anio;
    }
?>
                    <!-- BEGIN Page Content -->
                    <main id="js-page-content" role="main" class="page-content">
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">CAFETERISA</a></li>
        <li class="breadcrumb-item">Informes</li>
        <li class="breadcrumb-item">Cuadre Cajeros</li>
    </ol>
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-home'></i> Cuadre Cajeros <span class='fw-300'>Dashboard</span>
        </h1>
  </div>


  <div class="row">
      <div class="col-xl-12">
          <div id="panel-1" class="panel">
              <div class="panel-hdr">
                  <h2>
                      Cuadre Caja  <span class="fw-300"><i>Otra Fecha</i></span>
                  </h2>

              </div>
              <div class="panel-container show">
                  <div class="panel-content">
                    <form method="get" action="cuadreCajeros.php">
                      <div class="form-group row">
                          <label class="col-form-label col-12 col-lg-3 form-label text-lg-right">Fecha Informe</label>
                          <div class="col-12 col-lg-6">
                              <div class="input-group">
                                  <input type="text" class="form-control " placeholder="Seleccione fecha" name="fechaCuadre" id="datepicker-2" autocomplete="off" required>
                                  <div class="input-group-append">
                                      <span class="input-group-text fs-xl">
                                          <i class="fal fa-calendar"></i>
                                      </span>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                      <button type="submit" class="btn btn-info btn-primary">Ver Cuadre Caja</button>
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
                      Ventas Efectivo <span class="fw-300"><i>Cajeros</i></span>
                  </h2>
                  <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Pantalla Completa"></button>
                  </div>
              </div>

              <div class="panel-container show">
                  <div class="panel-content">
                      <div class="table-responsive-lg">
                          <table class="table table-bordered m-0">
                              <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>Punto Venta</th>
                                      <th>Usuario</th>
                                      <th>Nombre</th>
                                      <th>Transacciones</th>
                                      <th>Total Ventas</th>
                                  </tr>
                              </thead>
                              <tbody>
<?php
    $contador = 0;
    $ventas_efectivo_por_cajas = conseguir_ventas_efectivo_por_caja($db, $fechaInforme);
    if(!empty($ventas_efectivo_por_cajas) && mysqli_num_rows($ventas_efectivo_por_cajas) >= 1):
        while ($venta_efectivo_por_caja = mysqli_fetch_assoc($ventas_efectivo_por_cajas)) :
            $contador++;
?>
								   <tr>
                                      <th scope="row"><?=$contador?></th>
                                      <td><?=$venta_efectivo_por_caja['PUNTO_VENTA']?></td>
                                      <td><?=$venta_efectivo_por_caja['USUARIO']?></td>
                                      <td><?=$venta_efectivo_por_caja['CAJERO']?></td>
                                      <?php
        $Transacciones = conseguir_transacciones_por_caja($db, $fechaInforme, $venta_efectivo_por_caja['CODIGO_CAJERO']);
        if(!empty($Transacciones) && mysqli_num_rows($Transacciones) >= 1):
            $Transaccion = mysqli_fetch_assoc($Transacciones);
            if($Transaccion['TRANSACCIONES'] != null):
    ?>
           	<td align="right"><?=$Transaccion['TRANSACCIONES']?></td>
    <?php
            else:
    ?>
            <td align="right">0</td>
    <?php
            endif;
        else:
    ?>
    	<td align="right">0</td>
    <?php
        endif;
    ?>
                                      <td align="right"><?=$venta_efectivo_por_caja['TOTAL']?></td>
                                  </tr> 
<?php
		endwhile;
	endif;
?>                           
                              </tbody>
                          </table>
                      </div>
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
                      Pagos Proveedores <span class="fw-300"><i>Cajeros</i></span>
                  </h2>
                  <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Pantalla Completa"></button>
                  </div>
              </div>

              <div class="panel-container show">
                  <div class="panel-content">
                      <div class="table-responsive-lg">
                          <table class="table table-bordered m-0">
                              <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>Punto Venta</th>
                                      <th>Usuario</th>
                                      <th>Nombre</th>
                                      <th>Transacciones</th>
                                      <th>Total Pagos</th>
                                  </tr>
                              </thead>
                              <tbody>
<?php
    $contador = 0;
    $pagos_proveedor_por_cajas = conseguir_pagos_proveedor_por_caja($db, $fechaInforme);
    if(!empty($pagos_proveedor_por_cajas) && mysqli_num_rows($pagos_proveedor_por_cajas) >= 1):
        while ($pago_proveedor_por_caja = mysqli_fetch_assoc($pagos_proveedor_por_cajas)) :
            $contador++;
?>
<tr>
                                      <th scope="row"><?=$contador?></th>
                                      <?php
        $punto_venta = conseguir_puntos_por_cajero($db, $pago_proveedor_por_caja['CODIGO_USUARIO']);
        if(!empty($punto_venta) && mysqli_num_rows($punto_venta) >= 1):
            $punto_venta = mysqli_fetch_assoc($punto_venta);
            if($punto_venta['NOMBRE'] != null):
    ?>
           	<td><?=$punto_venta['NOMBRE']?></td>
    <?php
            else:
    ?>
            <td></td>
    <?php
            endif;
        else:
    ?>
    	<td></td>
    <?php
        endif;
    ?>
                                      <td><?=$pago_proveedor_por_caja['ALIAS']?></td>
                                      <td><?=$pago_proveedor_por_caja['USUARIO']?></td>
                                      <td><?=$pago_proveedor_por_caja['TRANSACCIONES']?></td>
                                      <td align="right"><?=$pago_proveedor_por_caja['TOTAL']?></td>
                                  </tr>
<?php
		endwhile;
	endif;
?>       
                              </tbody>
                          </table>
                      </div>
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
                      Cuadre Caja  <span class="fw-300"><i>Cajeros</i></span>
                  </h2>
                  <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Pantalla Completa"></button>
                  </div>
              </div>

              <div class="panel-container show">
                  <div class="panel-content">
                      <div class="table-responsive-lg">
                          <table class="table table-bordered m-0" id="tabla_cuadre">
                              <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>Nombre</th>
                                      <th>Ventas Efectivo(+)</th>
                                      <th>Pagos Proveedores(-)</th>
                                      <th>Total Efectivo(=)</th>
                                      <th>Efectivo Reportado</th>
                                      <th>Diferencia</th>
                                      <th>Estado Caja</th>
                                      <th>Hora Cierre</th>
                                  </tr>
                              </thead>
                              <tbody>
<?php
    $contador = 0;
    $cajeros = conseguir_cajeros($db);
    if(!empty($cajeros) && mysqli_num_rows($cajeros) >= 1):
        while ($cajero = mysqli_fetch_assoc($cajeros)) :
            $contador++;
?>                              	
									<tr>
                                      <th scope="row"><?=$contador?></th>
                                      <td><?=$cajero['USUARIO']?></td>
                                      <?php
                                      	$venta_efectivo = conseguir_ventas_efectivo_por_cajero($db, $cajero['CODIGO_CAJERO'], $fechaInforme);
                                      	if(!empty($venta_efectivo) && mysqli_num_rows($venta_efectivo) >= 1):
                                      		$venta_efectivo = mysqli_fetch_assoc($venta_efectivo);
                                      			if($venta_efectivo['VENTAS'] != null):
                                      ?>
                                  				<td align="right"><?=$venta_efectivo['VENTAS']?></td>
                                  	  <?php
                                  	  		else:
                                  	  ?>
                                  	  		<td align="right">0.00</td>
                                  	  <?php
                                  	  		endif;
                                  	  	else:
                                  	  ?>
                                  	  		<td align="right">0.00</td>
                                  	  <?php
                                  	  	endif;
                                  	  ?>

                                  	  <?php
                                      	$pagos_por_usuario = conseguir_pagos_proveedor_por_usuario($db, $cajero['CODIGO_CAJERO'], $fechaInforme);
                                      	if(!empty($pagos_por_usuario) && mysqli_num_rows($pagos_por_usuario) >= 1):
                                      		$pagos_por_usuario = mysqli_fetch_assoc($pagos_por_usuario);
                                      			if($pagos_por_usuario['VALOR'] != null):
                                      ?>
                                  				<td align="right"><?=$pagos_por_usuario['VALOR']?></td>
                                  	  <?php
                                  	  			else:
                                  	  ?>
                                  	  		<td align="right">0.00</td>
                                  	  <?php
                                  	  			endif;
                                  	  	else:
                                  	  ?>
                                  	  		<td align="right">0.00</td>
                                  	  <?php
                                  	  	endif;
                                  	  ?>
                                      <td align="right">0.00</td>
                                      <?php
                                      	$movimientos_caja = conseguir_movimientos_caja($db, $cajero['CODIGO_CAJERO'], $fechaInforme);
                                      	if(!empty($movimientos_caja) && mysqli_num_rows($movimientos_caja) >= 1):
                                      		$movimiento_caja = mysqli_fetch_assoc($movimientos_caja);
                                      			if($movimiento_caja['VALOR'] != null):
                                      ?>
                                  				<td align="right"><?=$movimiento_caja['VALOR']?></td>
                                  	  <?php
                                  	  			else:
                                  	  ?>
                                  	  		<td align="right">0.00</td>
                                  	  <?php
                                  	  			endif;
                                  	  	else:
                                  	  ?>
                                  	  		<td align="right">0.00</td>
                                  	  <?php
                                  	  	endif;
                                  	  ?>
                                  	  <td align="right">0.00</td>
                                      <?php
                                      	$estado_caja = conseguir_estado_caja($db, $cajero['CODIGO_CAJERO'], $fechaInforme);
                                      	if(!empty($estado_caja) && mysqli_num_rows($estado_caja) >= 1):
                                      		$estado_caja = mysqli_fetch_assoc($estado_caja);
                                      			if($estado_caja['ESTADO'] != null):
                                      ?>
                                  				<td align="right"><?=$estado_caja['ESTADO']?></td>
                                  	  <?php
                                  	  			else:
                                  	  ?>
                                  	  		<td align="right">0.00</td>
                                  	  <?php
                                  	  			endif;
                                  	  	else:
                                  	  ?>
                                  	  		<td align="right">0.00</td>
                                  	  <?php
                                  	  	endif;
                                  	  ?>
                                      <?php
                                      	$movimientos_caja = conseguir_movimientos_caja($db, $cajero['CODIGO_CAJERO'], $fechaInforme);
                                      	if(!empty($movimientos_caja) && mysqli_num_rows($movimientos_caja) >= 1):
                                      		$movimiento_caja = mysqli_fetch_assoc($movimientos_caja);
                                      			if($movimiento_caja['HORA'] != null):
                                      ?>
                                  				<td align="right"><?=$movimiento_caja['HORA']?></td>
                                  	  <?php
                                  	  			else:
                                  	  ?>
                                  	  		<td align="right">0.00</td>
                                  	  <?php
                                  	  			endif;
                                  	  	else:
                                  	  ?>
                                  	  		<td align="right">0.00</td>
                                  	  <?php
                                  	  	endif;
                                  	  ?>
                                      <td></td>
                                  </tr>    
<?php
		endwhile;
	endif;
?>                   
                              </tbody>
                          </table>
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
			<script src="js/mainCuadraCajas.js"></script>
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
