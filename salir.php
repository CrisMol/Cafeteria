
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
            Ingreso Administrativo - Kat&uacute;
        </title>
        <meta name="description" content="Login">
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
        <link rel="shortcut icon" href="img/favicon/favicon.ico" />
        <link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <!-- Optional: page related CSS-->
        <link rel="stylesheet" media="screen, print" href="css/fa-brands.css">
    </head>
    <body>
        <div class="page-wrapper">
            <div class="page-inner bg-brand-gradient">
                <div class="page-content-wrapper bg-transparent m-0">
                    <div class="height-10 w-100 shadow-lg px-4 bg-brand-gradient">
                        <div class="d-flex align-items-center container p-0">
                            <div class="page-logo width-mobile-auto m-0 align-items-center justify-content-center p-0 bg-transparent bg-img-none shadow-0 height-9">
                                <a href="javascript:void(0)" class="page-logo-link press-scale-down d-flex align-items-center">
                                    <span class="page-logo-text mr-1">Kat&uacute; School</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="flex-1" style="background: url(img/svg/pattern-1.svg) no-repeat center bottom fixed; background-size: cover;">
                        <div class="container py-4 py-lg-5 my-lg-5 px-4 px-sm-0">
                            <div class="row">
                                <div class="col col-md-6 col-lg-7 hidden-sm-down">
                                    <h2 class="fs-xxl fw-500 mt-4 text-white">
                                        Ingreso Administrativo
                                        <small class="h3 fw-300 mt-3 mb-5 text-white opacity-60">
                                            Colegio Sagrados Corazones De Rumipamba                                        </small>
                                    </h2>
                                    <div class="d-sm-flex flex-column align-items-center justify-content-center d-md-block">
                                        <div class="px-0 py-1 mt-5 text-white fs-nano opacity-50">
                                            Encuentranos en redes sociales
                                        </div>
                                        <div class="d-flex flex-row opacity-70">
                                          <a href="https://www.facebook.com/appkatu/" class="mr-2 fs-xxl text-white">
                                              <i class="fab fa-facebook-square"></i>
                                          </a>
                                          <a href="https://twitter.com/appkatu" class="mr-2 fs-xxl text-white">
                                              <i class="fab fa-twitter-square"></i>
                                          </a>
                                          <a href="https://www.instagram.com/katuschool/" class="mr-2 fs-xxl text-white">
                                              <i class="fab fa-instagram"></i>
                                          </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-5 col-xl-4 ml-auto">
                                    <h1 class="text-white fw-300 mb-3 d-sm-block d-md-none">
                                        Ingreso Administrativo
                                    </h1>
                                    <div class="card p-4 rounded-plus bg-faded">
<form id="js-login" novalidate="" method="POST" action="login.php">
                                            <div class="form-group">
                                                <label class="form-label" for="username">Usuario</label>
                                                <input type="text" id="username" name="username" class="form-control form-control-lg" placeholder="Digite usuario" autocomplete="off" required>
                                                <div class="invalid-feedback">Este campo es obligatorio.</div>
                                                <div class="help-block">Tu nombre de usuario &uacute;nico para la aplicaci&oacute;n</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="password">Contrase&ntilde;a</label>
                                                <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Digite contrase&ntilde;a" required>
                                                <div class="invalid-feedback">Lo sentimos, este campo es obligatorio.</div>
                                                <div class="help-block">Tu contrase&ntilde;a</div>
                                            </div>
                                            <div class="form-group text-left">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="rememberme" name="recordar">
                                                    <label class="custom-control-label" for="rememberme"> Recuerdame los pr&oacute;ximos 30 d&iacute;as</label>
                                                </div>
                                            </div>
                                            <div class="row no-gutters">
                                                <div class="col-lg-12 pr-lg-1 my-2">
                                                    <button type="submit" class="btn btn-info btn-block btn-lg">Ingresar</button>
                                                </div>
                                            </div>
                                        </form>                                    </div>
                                </div>
                            </div>
                            <div class="position-absolute pos-bottom pos-left pos-right p-3 text-center text-white">
                                2014 - 2020 © Un producto de Grupo Online SAS&nbsp;<a href='https://www.katu.com.co' class='text-white opacity-40 fw-500' title='gotbootstrap.com' target='_blank'>www.katu.com.co</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
        <script>
            $("#js-login-btn").click(function(event)
            {

                // Fetch form to apply custom Bootstrap validation
                var form = $("#js-login")

                if (form[0].checkValidity() === false)
                {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.addClass('was-validated');
                // Perform ajax submit here...
            });

        </script>
    </body>
</html>
