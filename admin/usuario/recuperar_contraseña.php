<!DOCTYPE html>
<html lang="es">

<head>
    <!--Meta Tags-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Fin Meta Tags-->
    <!--Descripcion-->
    <title>ChillClass 📚 | Inicia Sesión</title>
    <link rel="shortcut icon" href="../../assets/img/logo/Logo-colores.svg" type="image/x-icon">
    <!--Fin Descripcion-->
    <!--Links CSS-->
    <link rel="stylesheet" href="../../assets/styles/normalize.css">
    <link rel="stylesheet" href="../../assets/styles/styles.css">
    <!--Fin Links CSS-->
    <!--Links Bootstrap CSS-->
    <link rel="stylesheet" href="../../assets/libs/node_modules/bootstrap/dist/css/bootstrap.css">
    <!--Fin Links Bootstrap CSS-->
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <!--Fin Google Fonts-->
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!--Fin Font Awesome-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="oscuro">
    <!--Loader-->
    <div class="page-loading active">
        <div class="page-loading-inner">
            <div class="page-spinner"></div>
            <span>Cargando...</span>
        </div>
    </div>
    <!--Fin Loader-->

    <!--Nav-->
    <nav class="navbar oscuro shadow py-2">
        <div class="container justify-content-center justify-content-between">
            <a class="navbar-brand" href="../src/index.html">
                <img src="../../assets/img/logo/Logo-colores.svg" alt="" class="d-inline-block align-text-top" width="85" height="85">
            </a>
            <span class="navbar-text tx-blanco">
                ¿Ya tienes Cuenta? <a href="../src/login.html" class="tx-azul">Inicia Sesión</a>
            </span>
        </div>
    </nav>
    <!--Fin Nav-->

    <!--Login-->
    <section class="m-5"">
      <!-- container -->
      <div class=" container margin-login">
        <!-- row -->
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-6 col-lg-4 order-lg-1 order-2">
                <!-- img -->
                <img src="" alt="" class="img-fluid">
            </div>
            <div class="col-12 col-md-6 offset-lg-1 col-lg-4 order-lg-2 order-1 d-flex align-items-center">
                <div>
                    <div class="mb-lg-9 mb-3">
                        <!-- heading -->
                        <h1 class="mb-2 fw-bold tx-blanco">¿Olvidaste tu Contraseña?</h1>
                        <p>Ingrese la dirección de correo electrónico asociada con su cuenta y le enviaremos un enlace por correo electrónico para restablecer su contraseña.</p>
                    </div>
                    <!-- form -->
                    <form method="POST" action="reset_password.php">
                        <label for="username" class="tx-blanco">Nombre de Usuario:</label>
                        <input type="text" id="username" name="username" required>

                        <label for="security_answer">Respuesta a la Pregunta de Seguridad:</label>
                        <input type="text" id="security_answer" name="security_answer" required>

                        <label for="new_password">Nueva Contraseña:</label>
                        <input type="password" id="new_password" name="new_password" required>

                        <button type="submit">Restablecer Contraseña</button>
                    </form>

                </div>
            </div>
        </div>
        </div>


    </section>
    <!--Fin Login-->

    <!--Footer-->
    <footer class="d-flex pt-5 pb-0 h-100 footer oscuro">
        <div class="container align-self-center">
            <div class="row mb-3">
                <div class="col-lg-3 col-sm-6 my-4 logo-footer">
                    <img src="../../assets/img/logo/Logo-colores.svg" alt="" />
                </div>

                <!--Columna 1-->
                <div class="col-lg-3 col-sm-6 my-4">
                    <h5 class="fw-bold mb-3">Home</h5>
                    <ul class="list-unstyled">
                        <li class="mb-1">
                            <a href="" class="text-muted text-decoration-none">Sobre Nosotros</a>
                        </li>
                        <li class="mb-1">
                            <a href="" class="text-muted text-decoration-none">Contactanos</a>
                        </li>
                        <li class="mb-1">
                            <a href="" class="text-muted text-decoration-none">Sobre el Proyecto</a>
                        </li>

                    </ul>
                </div>
                <!--Fin Columna 1-->

                <!--Columna 2-->
                <div class="col-lg-3 col-sm-6 my-4">
                    <h5 class="fw-bold mb-3">Documentación</h5>
                    <ul class="list-unstyled">
                        <li class="mb-1">
                            <a href="https://docs.google.com/document/d/1sqLwSy_Q5eLTpqxP39eaf5vfEv-BDRwEl8VjLPTVrk0/edit?usp=sharing" class="text-muted text-decoration-none">Ir a Documentación</a>
                        </li>
                    </ul>
                </div>
                <!--Fin Columna 2-->

                <!--Columna 3-->
                <div class="col-lg-3 col-sm-6 my-4">
                    <h5 class="fw-bold mb-3">Contactanos</h5>
                    <div class="social-container">
                        <a href="https://github.com/haderrenteria13/ChillClass" class="social-link"></a>
                        <a href="https://www.instagram.com/hader_renteria/" class="social-link"></a>
                        <a href="mailto:chillclass3@gmail.com" class="social-link"></a>
                    </div>
                </div>
                <!--Fin Columna 3-->
            </div>
        </div>
    </footer>
    <!--Fin Footer-->

    <!--JavaScript-->
    <!--Fin JavaScript-->
    <!--Bootstrap JavaScript-->
    <script src="../assets/libs/node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <!--Fin Bootstrap JavaScript-->

    <!--Logica Loader-->
    <script>
        (function() {
            window.onload = function() {
                const preloader = document.querySelector(".page-loading");
                preloader.classList.remove("active");
                setTimeout(function() {
                    preloader.remove();
                }, 1000);
            };
        })();
    </script>
    <!--Fin Logica Loader-->
</body>

</html>