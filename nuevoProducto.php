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
        <li class="breadcrumb-item">Productos</li>
        <li class="breadcrumb-item">Nuevo</li>
    </ol>
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-home'></i> Nuevo Producto<span class='fw-300'> Dashboard</span>
        </h1>
  </div>
 <div class="row">
     <div class="col-xl-6">
         <div id="panel-1" class="panel">
             <div class="panel-hdr">
                 <h2>
                     Tipo Preparado<span class="fw-300"><i>Producto</i></span>
                 </h2>
                 <div class="panel-toolbar">
                   <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Minimizar"></button>
                   <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Pantalla Completa"></button>
                   <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Cerrar"></button>                  </div>
             </div>
             <div class="panel-container show">
                 <div class="panel-content">
                   <div class="panel-tag">
                       .
                   </div>
                 <form method="POST" action="guardarNuevoProductoCodigoBarras.php">

                   <div class="form-group">
                       <label class="form-label" for="example-select">Categoria Producto</label>
                       <select class="form-control" name="idCategoria" id="example-select" required>
<?php
    $categorias_productos = conseguir_categoria_producto($db);
    if(!empty($categorias_productos) && mysqli_num_rows($categorias_productos) >= 1):
        while ($categoria_producto = mysqli_fetch_assoc($categorias_productos)) :
?>
<option value="<?=$categoria_producto['CODIGO_CATEGORIA']?>"><?=$categoria_producto['NOMBRE_CATEGORIA']?></option>       
<?php  
        endwhile;
    endif;
?>          
                        </select>
                   </div>

                   <div class="form-group">
                       <label class="form-label" for="addon-wrapping-left">Codigo Barras</label>
                       <div class="input-group flex-nowrap">
                           <div class="input-group-prepend">
                               <span class="input-group-text"><i class="fal fa-barcode-alt fs-xl"></i></span>
                           </div>
                           <input id="addon-wrapping-left" type="text" class="form-control" name="codigoBarras" placeholder="Digite codigo barras" aria-label="Username" aria-describedby="addon-wrapping-left" autocomplete="off" required>
                       </div>
                   </div>

                   <?php echo isset($_SESSION['errores']) ? mostrar_error($_SESSION['errores'], 'codigo_barra') : ''; ?>

                   <div class="form-group">
                        <label class="form-label" for="addon-wrapping-left">Titulo Producto</label>
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fal fa-utensils fs-xl"></i></span>
                            </div>
                            <input id="addon-wrapping-left" type="text" class="form-control" name="nombreProducto" placeholder="Digite descripción producto" maxlength="30" aria-label="Username" aria-describedby="addon-wrapping-left" autocomplete="off" required="">
                        </div>
                    </div>

                   <?php echo isset($_SESSION['errores']) ? mostrar_error($_SESSION['errores'], 'nombreProducto') : ''; ?> 

                   <div class="form-group">
                       <label class="form-label" for="addon-wrapping-left">Descripcion Producto</label>
                       <div class="input-group flex-nowrap">
                           <div class="input-group-prepend">
                               <span class="input-group-text"><i class="fal fa-utensils fs-xl"></i></span>
                           </div>
                           <input id="addon-wrapping-left" type="text" class="form-control" name="descripcionProducto" placeholder="Digite descripcion producto" maxlength="30" aria-label="Username" aria-describedby="addon-wrapping-left" autocomplete="off" required>
                       </div>
                   </div>

                    
                   <?php echo isset($_SESSION['errores']) ? mostrar_error($_SESSION['errores'], 'descripcionProducto') : ''; ?>

                   <div class="form-group">
                       <label class="form-label" for="addon-wrapping-left">Costo</label>
                       <div class="input-group flex-nowrap">
                           <div class="input-group-prepend">
                               <span class="input-group-text"><i class="fal fa-usd-circle fs-xl"></i></span>
                           </div>
                           <input id="addon-wrapping-left" type="text" class="form-control" name="costoProducto" placeholder="Digite costo producto" aria-label="Username" aria-describedby="addon-wrapping-left" autocomplete="off" required>
                       </div>
                   </div>

                    <?php echo isset($_SESSION['errores']) ? mostrar_error($_SESSION['errores'], 'costoProducto') : ''; ?>

                   <div class="form-group">
                       <label class="form-label" for="addon-wrapping-left">Precio Venta</label>
                       <div class="input-group flex-nowrap">
                           <div class="input-group-prepend">
                               <span class="input-group-text"><i class="fal fa-usd-circle fs-xl"></i></span>
                           </div>
                           <input id="addon-wrapping-left" type="text" class="form-control" name="ventaProducto" placeholder="Digite cprecio venta producto" aria-label="Username" aria-describedby="addon-wrapping-left" autocomplete="off" required>
                       </div>
                   </div>

                    <?php echo isset($_SESSION['errores']) ? mostrar_error($_SESSION['errores'], 'ventaProducto') : ''; ?>

                   <div class="form-group">
                       <label class="form-label" for="addon-wrapping-left">Cantidad</label>
                       <div class="input-group flex-nowrap">
                           <div class="input-group-prepend">
                               <span class="input-group-text"><i class="fal fa-inventory fs-xl"></i></span>
                           </div>
                           <input id="addon-wrapping-left" type="number" class="form-control" name="cantidadProducto" value="0" aria-label="Username" aria-describedby="addon-wrapping-left" autocomplete="off" required>
                       </div>
                   </div>

                    <?php echo isset($_SESSION['errores']) ? mostrar_error($_SESSION['errores'], 'cantidadProducto') : ''; ?>
                    
                   <div class="form-group">
                       <label class="form-label" for="example-select">Ver Inventario</label>
                       <select class="form-control" name="verInventario" id="example-select" required>
                           <option value="">Seleccione</option>
                           <option value="1">Si</option>
                           <option value="0">No</option>
                       </select>
                   </div>

                   <div class="form-group">
                       <label class="form-label" for="example-select">Disponible Kiosko / Pre Compras</label>
                       <select class="form-control" name="kiosko" id="example-select" required>
                           <option value="">Seleccione</option>
                           <option value="1">Si</option>
                           <option value="0">No</option>
                       </select>
                   </div>                   

                     <div class="modal-footer">
                     <input name="tipoProducto" type="hidden" id="tipoProducto" value="2" />
                     <button type="submit" class="btn btn-info btn-primary">Guardar Producto</button>
                     </form>
                     <?php borrar_error();?>
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
            <script src="js/vendors.bundle.js"></script>
            <script src="js/app.bundle.js"></script>
    </body>
</html>
