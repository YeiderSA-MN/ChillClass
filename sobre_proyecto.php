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
    <title>ChillClass 📚 | Sobre Proyecto</title>
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
                        <a class="nav-link fw-bold" href="../chillclass/sobre_nosotros.php">Sobre Nosotros</a>
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

    <!--Section Sobre El Proyecto-->
    <section class="oscuro">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!--Titulo-->
                    <div class="section-title">
                        <h2 class="display-4 fw-bold mb-4 mt-3 titulo-2 tx-blanco">
                            Sobre el <span class="span-azul">Proyecto</span>
                        </h2>
                    </div>
                    <!-- Fin Titulo-->
                </div>
            </div>
            <div class="card-course">
                <div class="card oscuro rounded shadow">
                    <div class="card-body p-0">
                        <div class="row align-items-center">
                            <div class="col-lg-8" style="height: 450px !important;">
                                <a href="#" style="height: 450px !important;">
                                    <img src="../ChillClass/assets/img/imagenes/foto_con_minan.jpg" style="width: 100%; height: 100%; object-fit: cover; object-position: center; border-radius: 10px">
                                </a>
                            </div>
                            <div class="col-lg-3 mr-auto ml-auto m-0 p-5 p-lg-0">
                                <div>
                                <h4 class="display-6 fw-bold mb-4 mt-3 titulo-2 tx-blanco">
                                ¿Cómo <span class="span-rosado">surgió</span>?
                                </h4>
                                </div>
                                <p class="tx-blanco fs-14 m-0 p-0 my-3"><span class="span-azul">
                                    Todo empezó por la elección y estructuración de un proyecto dirigido al instituto educativo SENA. <span class="span-rosado">ChillClass</span> es una plataforma que pasó por arduas etapas de elaboración, e incluso tuvo que retroceder para avanzar en distintas ocasiones. El punto de partida de <span class="span-rosado">ChillClass</span> fueron las ganas de implementar un nuevo patrón de enseñanza en nuestra institución.
                                </span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Fin Section Sobre El Proyecto-->

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
                        <img src="../ChillClass/assets/img/imagenes/inicia.png" loading="lazy" class="img-fluid" />
                    </div>
                </div>

                <div class="p-0 col-lg-6 d-flex">
                    <div class="align-self-center my-5 px-4">
                        <h2 class="display-4 fw-bold mb-5 tx-blanco">
                            ¿Cuál es <br><span class="span-azul">su propósito</span>?
                        </h2>

                        <ul class="list-unstyled mb-0">
                            <li class="d-flex mb-5">
                                <div class="ms-3">
                                    <p class="tx-blanco">
                                    El propósito de ChillClass es introducir la educación en línea (E-Learning) dentro de la INEAD (Institución Educativa mencionada) en el año 2023. El proyecto tiene como objetivo principal modernizar la educación en INEAD mediante la digitalización y la implementación de nuevas metodologías de aprendizaje, aprovechando las lecciones aprendidas durante la pandemia de 2020. Además, busca dinamizar la educación dentro de la institución, hacerla más eficiente y accesible, y utilizar herramientas digitales y tecnologías como HTML5, PHP, PYTHON, CSS y JAVASCRIPT para lograr este objetivo.
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
                            ¿Cuál fue la<br><span class="span-rosado">metodología</span>?
                        </h2>

                        <ul class="list-unstyled mb-0">
                            <li class="d-flex mb-5">
                                <div class="ms-3">
                                    <p class="tx-blanco" style="text-align: right;">
                                    Scrum es una metodología ágil ampliamente utilizada en el desarrollo de proyectos, especialmente en el ámbito de la tecnología. Se basa en la colaboración, la flexibilidad y la entrega incremental de productos o servicios.
                                    <br>
                                    <br>
                                    En ChillClass, Scrum se aplicó de la siguiente manera: Los tres desarrolladores se organizaron en un equipo Scrum y asumieron roles específicos, como Scrum Master, Product Owner y miembros del equipo de desarrollo. Se definieron historias de usuario que representaban las funcionalidades clave de la plataforma y se organizaron en un Backlog del Producto. Luego, se planificaron Sprints, que son intervalos de tiempo cortos (por ejemplo, 2 semanas) durante los cuales se trabajaría en un conjunto específico de historias de usuario. 

                                    </p>
                                </div>
                            </li>
                            
                        </ul>
                    </div>
                </div>

                <div class="p-0 col-lg-6 d-flex justify-content-center align-items-center">
                    <div class="content">
                        <img src="../ChillClass/assets/img/imagenes/olvido.png" loading="lazy" class="img-fluid" />
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
                            <a href="sobre_proyecto.php" class="text-muted text-decoration-none">Sobre Nosotros</a>
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