

<!DOCTYPE html>
<!--
Template Name:  SmartAdmin Responsive WebApp - Template build with Twitter Bootstrap 4
Version: 4.0.2
Author: Sunnyat Ahmmed
Website: http://gootbootstrap.com
Purchase: https://wrapbootstrap.com/theme/smartadmin-responsive-webapp-WB0573SK0
License: You must have a valid license purchased only from wrapbootstrap.com (link above) in order to legally use this theme for your project.
-->
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>
            Administrativo - CAFETERISA
        </title>
        <meta name="description" content="ColumnFilter">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <!-- Call App Mode on ios devices -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no">
        <!-- base css -->
        <link rel="stylesheet" media="screen, print" href="css/vendors.bundle.css">
        <link rel="stylesheet" media="screen, print" href="css/app.bundle.css">
        <!-- Place favicon.ico in the root directory -->
        <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
        <link rel="shortcut icon" href="img/favicon/cafeterisa.ico" />
        <link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <link rel="stylesheet" media="screen, print" href="css/datagrid/datatables/datatables.bundle.css">
    </head>

    <body class="mod-bg-1 ">
        <!-- DOC: script to save and load page settings -->
        <script>
            /**
             *	This script should be placed right after the body tag for fast execution
             *	Note: the script is written in pure javascript and does not depend on thirdparty library
             **/
            'use strict';

            var classHolder = document.getElementsByTagName("BODY")[0],
                /**
                 * Load from localstorage
                 **/
                themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
                {},
                themeURL = themeSettings.themeURL || '',
                themeOptions = themeSettings.themeOptions || '';
            /**
             * Load theme options
             **/
            if (themeSettings.themeOptions)
            {
                classHolder.className = themeSettings.themeOptions;
                console.log("%c✔ Theme settings loaded", "color: #148f32");
            }
            else
            {
                console.log("Heads up! Theme settings is empty or does not exist, loading default settings...");
            }
            if (themeSettings.themeURL && !document.getElementById('mytheme'))
            {
                var cssfile = document.createElement('link');
                cssfile.id = 'mytheme';
                cssfile.rel = 'stylesheet';
                cssfile.href = themeURL;
                document.getElementsByTagName('head')[0].appendChild(cssfile);
            }
            /**
             * Save to localstorage
             **/
            var saveSettings = function()
            {
                themeSettings.themeOptions = String(classHolder.className).split(/[^\w-]+/).filter(function(item)
                {
                    return /^(nav|header|mod|display)-/i.test(item);
                }).join(' ');
                if (document.getElementById('mytheme'))
                {
                    themeSettings.themeURL = document.getElementById('mytheme').getAttribute("href");
                };
                localStorage.setItem('themeSettings', JSON.stringify(themeSettings));
            }
            /**
             * Reset settings
             **/
            var resetSettings = function()
            {
                localStorage.setItem("themeSettings", "");
            }

        </script>
        <!-- BEGIN Page Wrapper -->
        <div class="page-wrapper">
            <div class="page-inner">
                <!-- BEGIN Left Aside -->
                <aside class="page-sidebar">
                    <div class="page-logo">
                        <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
                            <img src="img/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo">
                            <span class="page-logo-text mr-1">CAFETERISA</span>
                            <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
                            <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
                        </a>
                    </div>
                    <!-- BEGIN PRIMARY NAVIGATION -->
                    <nav id="js-primary-nav" class="primary-nav" role="navigation">
    <ul id="js-nav-menu" class="nav-menu">

<li>
            <a href="#" title="Recargas / Pagos" data-filter-tags="recargas">
                <i class="fal fa-money-bill"></i>
                <span class="nav-link-text" data-i18n="nav.application_intel">Recargas / Pagos</span>
            </a>
            <ul><li>
                    <a href="recargaEfectivo.php" title="Estudiante Efectivo" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Estudiante Efectivo</span>
                    </a>
                </li><li>
                    <a href="recargaEfectivoProfesor.php" title="Profesor Efectivo" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Profesor Efectivo</span>
                    </a>
                </li><li>
                    <a href="pagoCredito.php" title="Pago Credito" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Pago Credito</span>
                    </a>
                </li></ul>
        </li><li>
            <a href="#" title="Familias" data-filter-tags="recargas">
                <i class="fal fa-users"></i>
                <span class="nav-link-text" data-i18n="nav.application_intel">Familias</span>
            </a>
            <ul><li>
                    <a href="nuevaFamilia.php" title="Nueva / Editar" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Nueva / Editar</span>
                    </a>
                </li><li>
                    <a href="restablecerPassword.php" title="Restablecer Contraseña" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Restablecer Contraseña</span>
                    </a>
                </li></ul>
        </li><li>
            <a href="#" title="Estudiantes" data-filter-tags="recargas">
                <i class="fal fa-graduation-cap"></i>
                <span class="nav-link-text" data-i18n="nav.application_intel">Estudiantes</span>
            </a>
            <ul><li>
                    <a href="nuevoEstudiantes.php" title="Nuevo / Editar" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Nuevo / Editar</span>
                    </a>
                </li><li>
                    <a href="movimientosEstudiante.php" title="Movimientos" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Movimientos</span>
                    </a>
                </li><li>
                    <a href="asignarRfidEstudiante.php" title="Registrar RFID" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Registrar RFID</span>
                    </a>
                </li><li>
                    <a href="grados.php" title="Grados" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Grados</span>
                    </a>
                </li></ul>
        </li><li>
            <a href="#" title="Profesores" data-filter-tags="recargas">
                <i class="fal fa-user"></i>
                <span class="nav-link-text" data-i18n="nav.application_intel">Profesores</span>
            </a>
            <ul><li>
                    <a href="nuevoProfesor.php" title="Nuevo / Editar" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Nuevo / Editar</span>
                    </a>
                </li><li>
                    <a href="movimientosProfesor.php" title="Movimientos" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Movimientos</span>
                    </a>
                </li><li>
                    <a href="asignarRfidProfesor.php" title="Registrar RFID" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Registrar RFID</span>
                    </a>
                </li><li>
                    <a href="movimientosCredito.php" title="Movimientos Credito" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Movimientos Credito</span>
                    </a>
                </li></ul>
        </li><li>
            <a href="#" title="Productos" data-filter-tags="recargas">
                <i class="fal fa-shopping-cart"></i>
                <span class="nav-link-text" data-i18n="nav.application_intel">Productos</span>
            </a>
            <ul><li>
                    <a href="seleccionarProductos.php" title="Seleccionar" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Seleccionar</span>
                    </a>
                </li><li>
                    <a href="nuevoProducto.php" title="Nuevo" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Nuevo</span>
                    </a>
                </li><li>
                    <a href="listaProductos.php" title="Listado" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Listado</span>
                    </a>
                </li><li>
                    <a href="verFotosProductos.php" title="Fotos Productos" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Fotos Productos</span>
                    </a>
                </li></ul>
        </li><li>
            <a href="#" title="Inventario" data-filter-tags="recargas">
                <i class="fal fa-inventory"></i>
                <span class="nav-link-text" data-i18n="nav.application_intel">Inventario</span>
            </a>
            <ul><li>
                    <a href="verInventario.php" title="Ver Inventario" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Ver Inventario</span>
                    </a>
                </li><li>
                    <a href="movimientoProducto.php" title="Movimiento Producto" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Movimiento Producto</span>
                    </a>
                </li><li>
                    <a href="facturaProveedor.php" title="Ingresar Factura" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Ingresar Factura</span>
                    </a>
                </li></ul>
        </li><li>
            <a href="#" title="Proveedores" data-filter-tags="recargas">
                <i class="fal fa-truck"></i>
                <span class="nav-link-text" data-i18n="nav.application_intel">Proveedores</span>
            </a>
            <ul><li>
                    <a href="nuevoProveedor.php" title="Nuevo / Editar" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Nuevo / Editar</span>
                    </a>
                </li><li>
                    <a href="pagosProveedor.php" title="Pagos Proveedor" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Pagos Proveedor</span>
                    </a>
                </li><li>
                    <a href="facturasProveedorIngresadas.php" title="Facturas" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Facturas</span>
                    </a>
                </li></ul>
        </li><li>
            <a href="#" title="Menu " data-filter-tags="recargas">
                <i class="fal fa-image"></i>
                <span class="nav-link-text" data-i18n="nav.application_intel">Menu </span>
            </a>
            <ul><li>
                    <a href="cargarMenu.php" title="Cargar Menu" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Cargar Menu</span>
                    </a>
                </li></ul>
        </li><li>
            <a href="#" title="Informes" data-filter-tags="recargas">
                <i class="fal fa-chart-pie"></i>
                <span class="nav-link-text" data-i18n="nav.application_intel">Informes</span>
            </a>
            <ul><li>
                    <a href="cuadreCajeros.php" title="Cuadre Cajeros" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Cuadre Cajeros</span>
                    </a>
                </li><li>
                    <a href="cuadreRecargas.php" title="Cuadre Admin" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Cuadre Admin</span>
                    </a>
                </li><li>
                    <a href="resumenVenta.php" title="Resumen Ventas" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Resumen Ventas</span>
                    </a>
                </li><li>
                    <a href="ventasPuntoVenta.php" title="Ventas Puntos" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Ventas Puntos</span>
                    </a>
                </li><li>
                    <a href="informeRecargas.php" title="Recargas" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Recargas</span>
                    </a>
                </li><li>
                    <a href="creditosProfesores.php" title="Créditos Profesores" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Créditos Profesores</span>
                    </a>
                </li><li>
                    <a href="cxc.php" title="Cuentas Por Cobrar" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Cuentas Por Cobrar</span>
                    </a>
                </li><li>
                    <a href="ventasMensuales.php" title="Ventas Mensuales" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Ventas Mensuales</span>
                    </a>
                </li><li>
                    <a href="productosVendidos.php" title="Productos Vendidos" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Productos Vendidos</span>
                    </a>
                </li><li>
                    <a href="preComprasPtes.php" title="Pre Compras Estudiantes" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Pre Compras Estudiantes</span>
                    </a>
                </li><li>
                    <a href="preComprasProfesores.php" title="Pre Compras Profesores" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Pre Compras Profesores</span>
                    </a>
                </li><li>
                    <a href="informeSaldosFamilias.php" title="Saldos Familias" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Saldos Familias</span>
                    </a>
                </li></ul>
        </li><li>
            <a href="#" title="Reversiones" data-filter-tags="recargas">
                <i class="fal fa-undo-alt"></i>
                <span class="nav-link-text" data-i18n="nav.application_intel">Reversiones</span>
            </a>
            <ul><li>
                    <a href="reversionEfectivo.php" title="Venta Efectivo" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Venta Efectivo</span>
                    </a>
                </li><li>
                    <a href="reversionRecargaEstudiante.php" title="Recarga Familia" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Recarga Familia</span>
                    </a>
                </li><li>
                    <a href="reversionRecargaProfesor.php" title="Recarga Profesor" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Recarga Profesor</span>
                    </a>
                </li><li>
                    <a href="reversionCorteCreditos.php" title="Corte Créditos" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Corte Créditos</span>
                    </a>
                </li><li>
                    <a href="reversarCierreCaja.php" title="Cierre Caja" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Cierre Caja</span>
                    </a>
                </li><li>
                    <a href="reversionPagoCredito.php" title="Pago Credito" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Pago Credito</span>
                    </a>
                </li></ul>
        </li><li>
            <a href="#" title="Cuenta Virtual" data-filter-tags="recargas">
                <i class="fal fa-cloud"></i>
                <span class="nav-link-text" data-i18n="nav.application_intel">Cuenta Virtual</span>
            </a>
            <ul><li>
                    <a href="saldoCuentaVirtual.php" title="Saldo" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Saldo</span>
                    </a>
                </li><li>
                    <a href="cuentaBanco.php" title="Bancos" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Bancos</span>
                    </a>
                </li><li>
                    <a href="pagoTercero.php" title="Pago Tercero" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Pago Tercero</span>
                    </a>
                </li><li>
                    <a href="terceros.php" title="Terceros" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Terceros</span>
                    </a>
                </li></ul>
        </li><li>
            <a href="#" title="Importar" data-filter-tags="recargas">
                <i class="fal fa-upload"></i>
                <span class="nav-link-text" data-i18n="nav.application_intel">Importar</span>
            </a>
            <ul><li>
                    <a href="importarEstudiantes.php" title="Estudiantes" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Estudiantes</span>
                    </a>
                </li><li>
                    <a href="importarProfesores.php" title="Profesores" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Profesores</span>
                    </a>
                </li></ul>
        </li><li>
            <a href="#" title="Configuración" data-filter-tags="recargas">
                <i class="fal fa-cogs"></i>
                <span class="nav-link-text" data-i18n="nav.application_intel">Configuración</span>
            </a>
            <ul><li>
                    <a href="puntosVenta.php" title="Puntos Venta" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Puntos Venta</span>
                    </a>
                </li><li>
                    <a href="categoriasProductos.php" title="Categorias Productos" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Categorias Productos</span>
                    </a>
                </li><li>
                    <a href="cajeros.php" title="Cajeros" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Cajeros</span>
                    </a>
                </li><li>
                    <a href="usuarios.php" title="Usuarios" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Usuarios</span>
                    </a>
                </li><li>
                    <a href="parametrizacion.php" title="Parametrización" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Parametrización</span>
                    </a>
                </li><li>
                    <a href="kioskos.php" title="Kioskos" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Kioskos</span>
                    </a>
                </li><li>
                    <a href="subirFotos.php" title="Subir Fotos" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Subir Fotos</span>
                    </a>
                </li></ul>
        </li><li>
            <a href="#" title="Pagos / Bolsas" data-filter-tags="recargas">
                <i class="fal fa-usd-circle"></i>
                <span class="nav-link-text" data-i18n="nav.application_intel">Pagos / Bolsas</span>
            </a>
            <ul></ul>
        </li><li>
            <a href="#" title="Planes Alimentación" data-filter-tags="recargas">
                <i class="fal fa-utensils"></i>
                <span class="nav-link-text" data-i18n="nav.application_intel">Planes Alimentación</span>
            </a>
            <ul><li>
                    <a href="registroPlan.php" title="Registro" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Registro</span>
                    </a>
                </li><li>
                    <a href="estudiantesPlan.php" title="Estudiantes" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Estudiantes</span>
                    </a>
                </li><li>
                    <a href="entregaPlanes.php" title="Entregas" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Entregas</span>
                    </a>
                </li><li>
                    <a href="configuracionPlanes.php" title="Configuración" data-filter-tags="application intel analytics dashboard">
                        <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Configuración</span>
                    </a>
                </li></ul>
        </li>
    </ul>
    <div class="filter-message js-filter-message bg-success-600"></div>
</nav>
                    <!-- END PRIMARY NAVIGATION -->
                    <!-- NAV FOOTER -->
                </aside>
                <!-- END Left Aside -->
                </aside>
                <!-- END Left Aside -->
                <div class="page-content-wrapper">
                    <!-- BEGIN Page Header -->
                    <header class="page-header" role="banner">
                        <!-- we need this logo when user switches to nav-function-top -->
                        <div class="page-logo">
                            <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
                                <img src="img/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo">
                                <span class="page-logo-text mr-1">CAFETERISA</span>
                                <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
                                <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
                            </a>
                        </div>
                        <!-- DOC: nav menu layout change shortcut -->
                        <div class="hidden-md-down dropdown-icon-menu position-relative">
                            <a href="#" class="header-btn btn js-waves-off" data-action="toggle" data-class="nav-function-hidden" title="Hide Navigation">
                                <i class="ni ni-menu"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-minify" title="Minify Navigation">
                                        <i class="ni ni-minify-nav"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-fixed" title="Lock Navigation">
                                        <i class="ni ni-lock-nav"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- DOC: mobile button appears during mobile width -->
                        <div class="hidden-lg-up">
                            <a href="#" class="header-btn btn press-scale-down" data-action="toggle" data-class="mobile-nav-on">
                                <i class="ni ni-menu"></i>
                            </a>
                        </div>

                        <div class="ml-auto d-flex">
                            <!-- activate app search icon (mobile) -->
                            <div class="hidden-sm-up">
                                <a href="#" class="header-icon" data-action="toggle" data-class="mobile-search-on" data-focus="search-field" title="Search">
                                    <i class="fal fa-search"></i>
                                </a>
                            </div>


                            <!-- app notification -->
  
                            <!-- app user menu -->
  <div>
    <a href="#" data-toggle="dropdown" title="demoec" class="header-icon d-flex align-items-center justify-content-center ml-2">
        <img src="img/cafeterisapng.png" class="profile-image rounded-circle" alt="Daniel Merino">
        <!-- you can also add username next to the avatar with the codes below:
<span class="ml-1 mr-1 text-truncate text-truncate-header hidden-xs-down">Me</span>
<i class="ni ni-chevron-down hidden-xs-down"></i> -->
    </a>
    <div class="dropdown-menu dropdown-menu-animated dropdown-lg">
        <div class="dropdown-header bg-trans-gradient d-flex flex-row py-4 rounded-top">
            <div class="d-flex flex-row align-items-center mt-1 mb-1 color-white">
                <span class="mr-2">
                    <img src="img/cafeterisapng.png" class="rounded-circle profile-image" alt="Dr. Codex Lantern">
                </span>
                <div class="info-card-text">
                    <div class="fs-lg text-truncate text-truncate-lg">Daniel Merino</div>
                    <span class="text-truncate text-truncate-md opacity-80">demoec</span>
                </div>
            </div>
        </div>
        <div class="dropdown-divider m-0"></div>
        <a href="#cambiarPassword" class="dropdown-item" data-toggle="modal" data-target="#cambiarPassword">
            <span data-i18n="drpdwn.settings">Cambiar Contrase&ntilde;a</span>
        </a>
        <div class="dropdown-divider m-0"></div>
        <a href="#" class="dropdown-item" data-action="app-fullscreen">
            <span data-i18n="drpdwn.fullscreen">Pantalla Completa</span>
            <i class="float-right text-muted fw-n">F11</i>
        </a>
        <a href="#" class="dropdown-item" data-action="app-print">
            <span data-i18n="drpdwn.print">Imprimir</span>
            <i class="float-right text-muted fw-n">Ctrl + P</i>
        </a>
        <div class="dropdown-divider m-0"></div>
        <a class="dropdown-item fw-500 pt-3 pb-3" href="salir.php">
            <span data-i18n="drpdwn.page-logout">Salir</span>
        </a>
    </div>
</div>
</div>

                    </header>
                    <!-- END Page Header -->
                    <!-- BEGIN Page Content -->

<main id="js-page-content" role="main" class="page-content">
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">CAFETERISA</a></li>
        <li class="breadcrumb-item">Profesor</li>
        <li class="breadcrumb-item">Movimientos</li>
    </ol>
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-home'></i> Movimientos Profesor <span class='fw-300'>Dashboard</span>
        </h1>
  </div>

  <div class="row">
      <div class="col-xl-6">
          <div id="panel-1" class="panel">
              <div class="panel-hdr">
                  <h2>
                      Profesor <span class="fw-300"><i>Seleccionado</i></span>
                  </h2>
                  <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Minimizar"></button>
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Pantalla Completa"></button>
                    <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Cerrar"></button>
                  </div>
              </div>
              <div class="panel-container show">
                  <div class="panel-content">
                      <form>
                          <div class="form-group">
                              <label class="form-label" for="simpleinput">Codigo</label>
                              <input type="text" id="simpleinput" value="1714764230" class="form-control" disabled>
                          </div>

                          <div class="form-group">
                              <label class="form-label" for="simpleinput">Apellidos</label>
                              <input type="text" id="simpleinput" value="Arias Moreno" class="form-control" disabled>
                          </div>

                          <div class="form-group">
                              <label class="form-label" for="simpleinput">Nombre</label>
                              <input type="text" id="simpleinput" value="Pablo Andres" class="form-control" disabled>
                          </div>

                      </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>



  <div class="row">
      <div class="col-xl-12">
          <div id="panel-1" class="panel">
              <div class="panel-hdr">
                  <h2>
                      Movimientos <span class="fw-300"><i>Registrados (&Uacute;ltimos 100 registros)</i></span>
                  </h2>
                  <div class="panel-toolbar">
                      <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Minimizar"></button>
                      <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Pantalla Completa"></button>
                      <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Cerrar"></button>
                  </div>
              </div>
              <div class="panel-container show">
                  <div class="panel-content">
                      <!-- datatable start -->
                      <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                          <thead class="bg-primary-600">
                              <tr>
                                  <th>ID</th>
                                  <th>Fecha</th>
                                  <th>Hora</th>
                                  <th>Descripcion</th>
                                  <th>Cantidad</th>
                                  <th>Debito</th>
                                  <th>Credito</th>
                                  <th>&nbsp;</th>
                              </tr>
                          </thead>
                          <tbody>
                            <tr>
                                  <td>1</td>
                                  <td>2020-10-07</td>
                                  <td>21:52:26</td>
                                  <td>Recarga Efectivo</td>
                                  <td align="center">1</td>
                                  <td align="right">0.00</td>
                                  <td align="right">20.00</td>
                                  <td align="center">&nbsp;</td></tr><!-- Modal -->
<div class="modal fade" id="reversarMov3" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Reversar Movimiento ID#1                    <small>El valor sera debitado de la cuenta virtual. <br>Este proceso es irreversible.</small>
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">

              <form method="get" action="reversarMovimientoProfesorInt.php">

                    <div class="form-group">
                      <label class="form-label" for="simpleinput">Fecha</label>
                      <input type="text" id="simpleinput" value="2020-10-07" class="form-control" disabled>
                  </div>

                  <div class="form-group">
                      <label class="form-label" for="simpleinput">Hora</label>
                      <input type="text" id="simpleinput" value="21:52:26" class="form-control" disabled>
                  </div>

                  <div class="form-group">
                      <label class="form-label" for="simpleinput">Descripcion</label>
                      <input type="text" id="simpleinput" value="Recarga Efectivo" class="form-control" disabled>
                  </div>

                  <div class="form-group">
                      <label class="form-label" for="simpleinput">Valor</label>
                      <input type="text" id="simpleinput" value="0.00" class="form-control" disabled>
                  </div>

            </div>
            <div class="modal-footer">
              <input name="idExtracto" type="hidden" id="idExtracto" value="3" />
              <input name="idProfesor" type="hidden" id="idProfesor" value="2" />
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-info btn-primary">Confirmar Reversi&oacute;n</button>
            </div>
            </form>
        </div>
    </div>
</div>


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

            </script>
  </body>
</html>
