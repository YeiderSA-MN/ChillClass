<?php
session_start(); // Iniciar la sesión

// Conexión a la base de datos
try {
    $conexion = new PDO('mysql:host=localhost;port=3306;dbname=chillclass;', 'root', '');
} catch (PDOException $e) {
    echo "Fallo la conexión " . $e->getMessage();
}

$consulta = "SELECT a.id_persona, a.nombre, a.apellido, a.edad, a.contrasena, b.tipo_persona, b.descripcion 
             FROM persona a, tipo_persona b 
             WHERE a.tipo_persona = b.tipo_persona AND a.id_persona = :id_persona;";

$row = $conexion->prepare($consulta);

$row->bindParam(':id_persona', $_SESSION['id'], PDO::PARAM_INT); // Usar bindParam para evitar inyecciones SQL

$row->execute();

$resultados = $row->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fin Meta Tags -->

    <!-- Descripción -->
    <title>ChillClass 📚 | Sobre Nosotros</title>
    <link rel="shortcut icon" href="./assets/img/logo/Logo-colores.svg" type="image/x-icon">
    <!-- Fin Descripción -->

    <!-- Links CSS -->
    <link rel="stylesheet" href="./assets/styles/normalize.css">
    <link rel="stylesheet" href="./assets/styles/styles.css">
    <!-- Fin Links CSS -->

    <!-- Links Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/libs/node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Fin Links Bootstrap CSS -->

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <!-- Fin Google Fonts -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- Fin Font Awesome -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="oscuro">
      <!-- Nav -->
      <nav class="navbar sticky-top navbar-expand-lg oscuro shadow justify-content-between">
        <div class="container">
            <a class="navbar-brand" href="index_persona.php">
                <img src="./assets/img/logo/Logo-colores.svg" alt="Bootstrap" width="85" height="85">
            </a>
            <!-- Responsive Nav -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Fin Responsive Nav -->
            <div class="collapse navbar-collapse align-items-center justify-content-center" id="navbarNavAltMarkup">
                <ul class="navbar-nav menu text-center">
                    <li class="nav-item dropdown">
                        <a class="nav-link fw-bold " href="presentar_chillclass.php" role="button"  aria-expanded="false">
                            Evaluaciones
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link fw-bold dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Cursos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="cursos_disponibles.php">Cursos disponibles</a></li>
                            <?php
                            if (isset($_SESSION['id'])) {
                            echo'<li class="nav-item dropdown">
                                <a class="dropdown-item" href="registro_curso.php" role="button" aria-expanded="false">
                                    Registro de cursos
                                </a>
                            </li>
                            <li><a class="dropdown-item" href="curso_chillclass.php">Tus cursos</a></li>';
                            }
                            ?>
                            
                        </ul>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="../chillclass/sobre_proyecto.php">Sobre el proyecto</a>
                    </li>
                </ul>
            </div>
            <?php
            if (isset($_SESSION['id'])) {
            echo'<a href="admin/usuario/cerrar.php" class="btn btn-secondary fw-bold me-2">Cerrar sesion</a>';
            }
            else{
                echo'<a href="admin/usuario/usuario.php" class="btn btn-primary fw-bold me-2">Iniciar sesion</a>';
            }
            ?>
            <?php
            if (isset($_SESSION['id'])) {
             echo'<a class="navbar-brand" href="profile.php"><i class="bi bi-person-circle tx-blanco" height="45" width="45"></i></a>';
           }
           ?>
        </div>
    </nav>
    <!-- Fin Nav -->

    <!--Section Nuestro Equipo-->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!--Titulo-->
                    <div class="section-title">
                        <h2 class="fw-bold mb-4 mt-3 titulo-2 tx-blanco">
                            Sobre <span class="span-rosado">Nosotros</span>
                        </h2>
                    </div>
                    <!-- Fin Titulo-->
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                    <div class="card  oscuro rounded shadow mb-4 mb-lg-0">
                        <img src="../ChillClass/assets/img/imagenes/diaz_grupo.jpg" class="card-img-top img-fluid rounded-top" alt="">
                        <div class="card-body d-flex justify-content-center align-items-center flex-column">
                            <a class="tx-blanco card-link m-0 p-0">Juan J. Diaz</a>
                            <p class="card-text tx-rosado fw-bold m-0 p-0 fs-14">Backend Developer</p>
                            <div class="d-flex align-items-center justify-content-center mt-3">
                                <a href="https://github.com/JuanDiazsk8" target="_blank"><i class="fab fa-github me-2 tx-rosado fs-5 "></i></a>
                                <a href="https://www.instagram.com/xdiax.0/" target="_blank"><i class="fab fa-instagram me-2 tx-rosado fs-5"></i></a>
                                <a href="https://www.linkedin.com/in/juan-jose-diaz-rodriguez-aaa63928a/" target="_blank"><i class="fab fa-linkedin tx-rosado fs-5"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card oscuro rounded shadow mb-4 mb-lg-0">
                        <img src="../ChillClass/assets/img/imagenes/hader_grupo.jpg" class="card-img-top img-fluid rounded-top" alt="">
                        <div class="card-body d-flex justify-content-center align-items-center flex-column">
                            <a class="tx-blanco card-link m-0 p-0">Hader Renteria</a>
                            <p class="card-text tx-rosado fw-bold m-0 p-0 fs-14">FullStack Developer</p>
                            <div class="d-flex align-items-center justify-content-center mt-3">
                                <a href="https://github.com/haderrenteria13" target="_blank"><i class="fab fa-github me-2 tx-rosado hover-azul fs-5"></i></a>
                                <a href="https://www.instagram.com/hader_renteria/" target="_blank"><i class="fab fa-instagram me-2 tx-rosado hover-azul fs-5" ></i></a>
                                <a href="https://www.linkedin.com/in/hader-renteria-565119240/" target="_blank"><i class="fab fa-linkedin tx-rosado hover-azul fs-5"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card oscuro rounded shadow mb-4 mb-lg-0">
                        <img src="../ChillClass/assets/img/imagenes/pablo_grupo.jpg" class="card-img-top rounded-top" alt="">
                        <div class="card-body d-flex justify-content-center align-items-center flex-column">
                            <a class="tx-blanco card-link m-0 p-0">Juan P. Mejia</a>
                            <p class="card-text tx-rosado fw-bold m-0 p-0 fs-14">Frontend Developer</p>
                            <div class="d-flex align-items-center justify-content-center mt-3">
                                <a href="https://github.com/Jupa15" target="_blank"><i class="fab fa-github me-2 tx-rosado fs-5"></i></a>
                                <a href="https://www.instagram.com/pablito.docx/" target="_blank"><i class="fab fa-instagram me-2 tx-rosado fs-5"></i></a>
                                <a href="https://www.linkedin.com/in/juan-pablo-mej%C3%ADa-galvis-783066277/" target="_blank"><i class="fab fa-linkedin tx-rosado fs-5"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--Fin Section Nuestro Equipo-->

    <!--Linea-->
    <div class="container">
        <hr>
    </div>
    <!--Linea-->

    <!--Section Como Funciona-->
    <section class="oscuro">
        <div class="container align-self-center">
            <div class="row d-flex align-items-center justify-content-between">

                <div class="p-0 col-lg-6 d-flex justify-content-center align-items-center">
                    <div class="content">
                        <img src="../ChillClass/assets/img/imagenes/numero-1.png" loading="lazy" class="img-fluid" />
                    </div>
                </div>

                <div class="p-0 col-lg-6 d-flex">
                    <div class="align-self-center my-5 px-4">
                        <h2 class="display-4 fw-bold mb-5 tx-blanco">
                            Nuestra<br><span class="span-rosado">Misión</span>.
                        </h2>

                        <ul class="list-unstyled mb-0">
                            <li class="d-flex mb-5">
                                <div class="ms-3">
                                    <p class="tx-blanco">
                                    La misión de ChillClass es transformar la educación de la INEAD a través de la implementación de un sitio web basado en E-Learning, promoviendo la excelencia académica y el bienestar mental de nuestros estudiantes. Nos comprometemos a crear un entorno enriquecedor y de apoyo, donde cada estudiante pueda alcanzar su máximo potencial académico y emocional. A través de metodologías innovadoras y herramientas de aprendizaje integradas, buscamos intensificar positivamente la estructura educativa de una forma sencilla y entretenida. Nuestro enfoque está en el desarrollo académico y personal de nuestros estudiantes, asegurándonos de velar por un equilibrio entre el trabajo académico y emocional para su éxito a largo plazo.
                                    </p>
                                </div>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Fin Section Como Funciona-->

    <!--Linea-->
    <div class="container">
        <hr>
    </div>
    <!--Linea-->

    <!--Section Como Funciona-->
    <section class="oscuro">
        <div class="container align-self-center">
            <div class="row d-flex align-items-center justify-content-between">

            <div class="p-0 col-lg-6 d-flex">
                    <div class="align-self-center my-5 px-4">
                        <h2 class="display-4 fw-bold mb-5 tx-blanco" style="text-align: right;">
                            Nuestra<br><span class="span-azul">Visión</span>.
                        </h2>

                        <ul class="list-unstyled mb-0">
                            <li class="d-flex mb-5">
                                <div class="ms-3">
                                    <p class="tx-blanco" style="text-align: right;">
                                    La visión de ChillClass es ser líderes indiscutibles en el ámbito de la educación E-Learning, reconocidos a nivel nacional e internacional por nuestra dedicación a la calidad educativa y el bienestar mental de los estudiantes. Nos proyectamos como el referente en el desarrollo académico, emocional y profesional de los alumnos de la INEAD, habiendo logrado expandir nuestro alcance a otras instituciones educativas.

                                    <br>
                                    <br>
                                    
                                    En los próximos 10-15 años, aspiramos a ser una plataforma educativa integral, que no solo ofrezca cursos y programas de alta calidad en diversos campos de estudio, sino también que brinde un apoyo continuo y personalizado a los estudiantes. Nuestro enfoque centrado en el estudiante nos permitirá adaptarnos a las necesidades cambiantes de la educación y a las demandas del mundo laboral.

                                    </p>
                                </div>
                            </li>
                            
                        </ul>
                    </div>
                </div>

                <div class="p-0 col-lg-6 d-flex justify-content-center align-items-center">
                    <div class="content">
                        <img src="../ChillClass/assets/img/imagenes/feliz.png" loading="lazy" class="img-fluid" />
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--Fin Section Como Funciona-->

    <!--Linea-->
    <div class="container">
        <hr>
    </div>
    <!--Linea-->

    <!--Footer-->
    <footer class="d-flex pt-5 pb-0 h-100 footer oscuro">
        <div class="container align-self-center">
            <div class="row mb-3">
                <div class="col-lg-3 col-sm-6 my-4 logo-footer">
                    <img src="../ChillClass/assets/img/logo/logo-colores.svg" alt="" />
                </div>

                <!--Columna 1-->
                <div class="col-lg-3 col-sm-6 my-4">
                    <h5 class="fw-bold mb-3">Home</h5>
                    <ul class="list-unstyled">
                        <li class="mb-1">
                            <a href="sobre_nosotros.php" class="text-muted text-decoration-none">Sobre Nosotros</a>
                        </li>
                        <li class="mb-1">
                            <a href="index_persona.php#container" class="text-muted text-decoration-none">Contáctanos</a>
                        </li>
                        <li class="mb-1">
                            <a href="sobre_proyecto.php" class="text-muted text-decoration-none">Sobre el Proyecto</a>
                        </li>

                    </ul>
                </div>
                <!--Fin Columna 1-->

                <!--Columna 2-->
                <div class="col-lg-3 col-sm-6 my-4">
                    <h5 class="fw-bold mb-3">Documentación</h5>
                    <ul class="list-unstyled">
                        <li class="mb-1">
                            <a href="https://docs.google.com/document/d/1sqLwSy_Q5eLTpqxP39eaf5vfEv-BDRwEl8VjLPTVrk0/edit?usp=sharing" class="text-muted text-decoration-none" target="_blank">Ir a Documentación</a>
                        </li>
                    </ul>
                </div>
                <!--Fin Columna 2-->

                <!--Columna 3-->
                <div class="col-lg-3 col-sm-6 my-4">
                    <h5 class="fw-bold mb-3">Contáctanos</h5>
                    <div class="social-container">
                        <a href="https://github.com/haderrenteria13/ChillClass" class="social-link" target="_blank"></a>
                        <a href="https://instagram.com/chillclass.php/" class="social-link" target="_blank"></a>
                        <a href="mailto:chillclass3@gmail.com" class="social-link"></a>
                    </div>
                </div>
                <!--Fin Columna 3-->
            </div>
        </div>
    </footer>
    <!--Fin Footer-->

    <!--JavaScript-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <!--Fin JavaScript-->
    <!--Bootstrap JavaScript-->
    <script src="./assets/libs/node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <!--Fin Bootstrap JavaScript-->

    <!--Logica Loader-->
    <script type="text/javascript">
        $(window).load(function() {
            $(".carga").fadeOut("slow");
        });
    </script>
    <!--Fin Logica Loader-->
</body>

</html>