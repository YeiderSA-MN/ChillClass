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
    <title>ChillClass 📚 | Index</title>
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
                        <a class="nav-link fw-bold " href="presentar_chillclass.php" role="button" aria-expanded="false">
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
                                echo '<li class="nav-item dropdown">
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
                echo '<a href="admin/usuario/cerrar.php" class="btn btn-secondary fw-bold me-2">Cerrar sesion</a>';
            } else {
                echo '<a href="admin/usuario/usuario.php" class="btn btn-primary fw-bold me-2">Iniciar sesion</a>';
            }
            ?>
            <?php
            if (isset($_SESSION['id'])) {
                echo '<a class="navbar-brand" href="profile.php"><i class="bi bi-person-circle tx-blanco" height="45" width="45"></i></a>';
            }
            ?>
        </div>
    </nav>
    <!-- Fin Nav -->

    <!-- Header Principal -->
    <header class="header-principal">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-6 d-flex align-items-center">
                    <div class="content">
                        <h1 class="texto-principal tx-oscuro">¡Hola! <?php
                                                                        foreach ($resultados as $fila) {
                                                                            echo "<h2 class='fw-bold tx-oscuro'>Bienvenid@ " . $_SESSION['usuario'] . " al panel de " . $fila['descripcion'] . " de ChillClass.</h2>";
                                                                        }
                                                                        ?><img src="../assets/img/iconos/emoji-hello-apple.svg" alt=""></h1>
                        <p class="lead m-0 fw-bold tx-oscuro">Somos una plataforma E-Learning</p>
                        <p class="lead fw-bold tx-oscuro">¡Registrate ahora!</p>
                        <a href="https://youtu.be/tdIB4LnSRn0?si=iQ0oxCcVxxfL2x40" class="btn mb-5 btn-secondary tx-oscuro fw-semibold" target="_blank">Ver Video<img src="./assets/img/iconos/play-video.svg" alt="" width="20px" height="15px" class="mb-1"></a>
                    </div>
                </div>

                <div class="col-lg-6 d-flex d-none d-sm-none d-md-block">
                    <div class="content mx-auto">
                        <img src="./assets/img/imagenes/niño.png" loading="lazy" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Fin Header Principal -->

    <?php
    if (!isset($_SESSION['id'])) {

        echo '<section class="py-4">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-between">
                <div class="col-lg-4 d-flex">
                    <i class="fas fa-video d-block rounded-circle tx-rosado p-3 shadow me-3"></i>
                    <div class="header-sub-text ml-3">
                        <h6 class="tx-rosado fw-600 m-0 p-0">Mas de 12 Cursos</h6>
                        <p class="tx-blanco fs-14 m-0 p-0">Para una mejor educación</p>
                    </div>
                </div>
                <div class="col-lg-4 d-flex">
                    <i class="fa fa-users d-block rounded-circle tx-rosado p-3 shadow me-3"></i>
                    <div class="header-sub-text ml-3">
                        <h6 class="tx-rosado fw-600 m-0 p-0">Tu eliges</h6>
                        <p class="tx-blanco fs-14 m-0 p-0">Que quieres Aprender</p>
                    </div>
                </div>
                <div class="col-lg-3 d-flex">
                    <i class="fas fa-clock d-block rounded-circle tx-rosado p-3 shadow me-3"></i>
                    <div class="header-sub-text ml-3">
                        <h6 class="tx-rosado fw-600 m-0 p-0">Tu decides</h6>
                        <p class="tx-blanco fs-14 m-0 p-0">Libre de Horarios</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
    <hr>
    </div>';
    }
    ?>


    <!--Informacion-->

    <!--Informacion-->

    <!--Linea-->
    <!--Linea-->

    <!--Section Como Funciona-->
    <?php
    if (!isset($_SESSION['id'])) {

        echo '<section class="oscuro">
      <div class="container align-self-center">
        <div class="row d-flex align-items-center justify-content-between">

          <div class="p-0 col-lg-6 d-flex justify-content-center align-items-center">
            <div class="content">
              <img src="assets/img/imagenes/tu-dicides.png" loading="lazy" class="img-fluid"/>
            </div>
          </div>

          <div class="p-0 col-lg-6 d-flex">
            <div class="align-self-center my-5 px-4">
              <h2 class="display-4 fw-bold mb-5 tx-blanco">
                Es muy<br>sencillo<span class="span-rosado">.</span>
              </h2>

              <ul class="list-unstyled mb-0">
                <li class="d-flex mb-4">
                  <p class="lead fw-bold d-flex step">1</p>
                  <div class="ms-3">
                    <p class="lead fw-bold tx-blanco">
                      Crea tu cuenta.
                    </p>
                    <p class="tx-blanco">
                     Solamente te registras y listo.
                    </p>
                  </div>
                </li>
                <li class="d-flex mb-4">
                  <p class="lead fw-bold d-flex step">2</p>
                  <div class="ms-3">
                    <p class="lead fw-bold tx-blanco">
                      Encuentra lo que te fascina y elige tu curso.
                    </p>
                    <p class="tx-blanco">
                      Selecciona el curso que mas se adapte a lo que busques y listo.
                    </p>
                  </div>
                </li>
                <li class="d-flex mb-4">
                  <p class="lead fw-bold d-flex step">3</p>
                  <div class="ms-3">
                    <p class="lead fw-bold tx-blanco">
                      Aprende haciendo.
                    </p>
                    <p class="tx-blanco">
                      Lee, Juega y aprende lo que mas te gusta.
                    </p>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>';
    }
    ?>
    <!--Fin Section Como Funciona-->

    <?php
    if (!isset($_SESSION['id'])) {

        echo '<section id="about-us">
        <div class="container">
            <div class="section-title tx-blanco">
                <h2 class="fw-bold m-0">Sobre <span class="span-rosado">Nosotros</span></h2>
                <p class="text-secondary m-0">¿Quienes Somos?</p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <p class="about-us-description tx-blanco">
                        ChillClass es un proyecto que tiene como finalidad principal una página web para que los estudiantes puedan aprender y/o hacer sus actividades de manera más efectiva, brindando la posibilidad de visualizar cursos en los cuales podamos ayudar a brindar trabajos a aquellos que tengan una habilidad y/o conocimiento en una rama en específico.
                    </p>
                    <a href="#container" class="btn btn-secondary fw-bold btn-learn-more">Contacto</a>
                </div>
                <div class="col-lg-6 d-flex justify-content-center align-items-center">
                    <img src="./assets/img/imagenes/crea-tu-app-movil.png" alt="ChillClass Imagen" class="w-50" />
                </div>
            </div>
        </div>
    </section>
    <div class="container">
    <hr>
    </div>';
    }
    ?>

   <section class="oscuro">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!--Titulo-->
                    <div class="section-title">
                        <h2 class="fw-bold mb-4 mt-3 titulo-2 tx-blanco">
                            Algunos <span class="span-azul">Testimonios</span>
                        </h2>
                    </div>
                    <!-- Fin Titulo-->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="card oscuro rounded shadow mb-4 mb-lg-0">
                        <div class="card-body mb-0 pb-0">
                            <i class="fa fa-star fa-xs" style="color: orange;"></i>
                            <i class="fa fa-star fa-xs" style="color: orange;"></i>
                            <i class="fa fa-star fa-xs" style="color: orange;"></i>
                            <i class="fa fa-star fa-xs" style="color: orange;"></i>
                            <p class="tx-blanco font-weight-bold m-0 p-0 my-3 fs-18 fw-500" style="line-height: 1.8;">
                                "ChillClass ha sido un verdadero cambio de juego en mi experiencia de aprendizaje en INEAD. Las nuevas metodologías y la plataforma fácil de usar han hecho que estudiar sea mucho más atractivo. Me encanta cómo puedo acceder a los cursos desde cualquier lugar y a cualquier hora. ¡Realmente han llevado la educación en línea a un nivel superior!"
                            </p>
                        </div>
                        <div class="card-footer d-flex align-items-center">
                            <img src="../ChillClass/assets/img/imagenes/usuario_mujer.png" class="rounded-circle me-2" width="24" alt="">
                            <span class="text-muted fs-14 ml-2 fw-bold">Laura P.</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card oscuro rounded shadow mb-4 mb-lg-0">
                        <div class="card-body mb-0 pb-0">
                            <i class="fa fa-star fa-xs" style="color: orange;"></i>
                            <i class="fa fa-star fa-xs" style="color: orange;"></i>
                            <i class="fa fa-star fa-xs" style="color: orange;"></i>
                            <i class="fa fa-star fa-xs" style="color: orange;"></i>
                            <p class="tx-blanco font-weight-bold m-0 p-0 my-3 fs-18 fw-500" style="line-height: 1.8;">
                                "Como estudiante de INEAD, he estado usando ChillClass durante varios meses y no puedo estar más impresionado. Las lecciones interactivas y las actividades prácticas realmente me ayudaron a comprender mejor los conceptos. Además, el equipo de soporte siempre está dispuesto a ayudar. ¡Recomiendo ChillClass a todos los que buscan una educación en línea de calidad!"
                            </p>
                        </div>
                        <div class="card-footer d-flex align-items-center">
                            <img src="../ChillClass/assets/img/imagenes/usuario_hombre.png" class="rounded-circle me-2" width="24" alt="">
                            <span class="text-muted fs-14 ml-2 fw-bold">Juan M.</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card oscuro rounded shadow mb-4 mb-lg-0">
                        <div class="card-body mb-0 pb-0">
                            <i class="fa fa-star fa-xs" style="color: orange;"></i>
                            <i class="fa fa-star fa-xs" style="color: orange;"></i>
                            <i class="fa fa-star fa-xs" style="color: orange;"></i>
                            <i class="fa fa-star fa-xs" style="color: orange;"></i>
                            <p class="tx-blanco font-weight-bold m-0 p-0 my-3 fs-18 fw-500" style="line-height: 1.8;">
                                "¡ChillClass ha transformado mi experiencia de aprendizaje! Las herramientas de colaboración en línea y los recursos multimedia hacen que cada lección sea interesante y efectiva. Gracias a ChillClass, siento que estoy obteniendo una educación de alta calidad de manera conveniente. ¡No puedo esperar para ver cómo sigue evolucionando este proyecto!"
                            </p>
                        </div>
                        <div class="card-footer d-flex align-items-center">
                            <img src="../ChillClass/assets/img/imagenes/usuario_mujer.png" class="rounded-circle me-2" width="24" alt="">
                            <span class="text-muted fs-14 ml-2 fw-bold">Maria G.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 
    <div class="container" id="container">
        <hr>
    </div>
   

    <?php
    if (!isset($_SESSION['id'])) {

        echo '<section>
        <div class="container">
            <div class="section-title tx-blanco">
                <h2 class="fw-bold m-0">Preguntas <span class="tx-azul">Frecuentes</span></h2>
            </div>

            <div class="accordion accordion-flush shadow" id="accordionFlushExample">
                <div class="accordion-item oscuro tx-blanco">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed oscuro tx-blanco" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            <i class="fa fa-question-circle tx-verde"></i>&nbsp;¿A quién está vinculado este proyecto?
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                        El proyecto sobre e-learning desarrollado en la media técnica de programación de software está vinculado directamente a la institución educativa Asamblea Departamental. Esto significa que el proyecto ha sido concebido y ejecutado con el propósito específico de beneficiar a esta institución en particular.<br><br>

                        Esta vinculación implica que el proyecto fue diseñado teniendo en cuenta las necesidades, recursos y objetivos educativos de la institución Asamblea Departamental. El e-learning, al ser una modalidad de enseñanza basada en tecnología, puede ofrecer ventajas significativas en términos de acceso a la educación, flexibilidad de horarios y la posibilidad de utilizar recursos multimedia interactivos.<br><br>

                        Además, al estar enfocado en el campo de la programación de software, es probable que el proyecto tenga como objetivo mejorar la formación en esta área específica, lo cual puede ser de gran relevancia en el contexto de la institución educativa Asamblea Departamental.


                        </div>
                    </div>
                </div>

                <div class="accordion-item oscuro tx-blanco">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed oscuro tx-blanco" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            <i class="fa fa-question-circle tx-verde"></i>&nbsp;¿Qué
                            servicios ofrece ChillClass?
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            ChillClass ofrece servicios de cursos y exámenes. Estos servicios están diseñados para proporcionar a los usuarios acceso a material de aprendizaje y evaluaciones en línea. Los cursos pueden abarcar una amplia variedad de temas y materias, y están destinados a facilitar el proceso de aprendizaje a través de recursos multimedia interactivos y actividades didácticas. Por otro lado, los exámenes ofrecidos por ChillClass están concebidos para evaluar el nivel de conocimiento y comprensión de los estudiantes en relación con el material cubierto en los cursos. Estos exámenes pueden ser una herramienta útil para medir el progreso y la adquisición de habilidades por parte de los estudiantes. En resumen, ChillClass brinda servicios de educación en línea a través de cursos y exámenes.
                        </div>
                    </div>
                </div>

                <div class="accordion-item oscuro tx-blanco">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed oscuro tx-blanco" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            <i class="fa fa-question-circle tx-verde"></i>&nbsp;¿ChillClass me va a ayudar a aprender mas facil?
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            Sí, ChillClass está diseñado con la metodología e-learning, la cual utiliza recursos digitales y tecnología para facilitar el aprendizaje en línea. Esta metodología ofrece ventajas significativas, como la flexibilidad de horarios y la posibilidad de acceder al material desde cualquier lugar con conexión a internet. Además, los cursos en línea suelen estar estructurados de manera interactiva, incluyendo videos y evaluaciones que pueden facilitar el proceso de comprensión y retención del contenido. <br><br>

                            Al utilizar ChillClass, tendrás acceso a un entorno de aprendizaje virtual que se adapta a tus necesidades y ritmo de estudio. También puedes beneficiarte de posibles recursos adicionales, como tutorías personalizadas y material complementario, que están diseñados para reforzar tu comprensión y habilidades en el tema que estés estudiando.<br><br>

                            Sin embargo, es importante recordar que el éxito en el aprendizaje depende en gran medida de tu compromiso y dedicación personal. Si aprovechas al máximo los recursos y te mantienes constante en tu estudio, es muy probable que ChillClass te ayude a aprender de manera más efectiva y a adquirir nuevas habilidades con mayor facilidad.

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container" id="container">
        <hr>
    </div>';
    }
    ?>


    <!-- Section Contacto -->
    <section id="contact" class="contact mt-3">
        <div class="container">

            <div class="row">
                <div class="col-lg-8">
                    <!--Titulo-->
                    <div class="section-title">
                        <h2 class="fw-bold mb-4 mt-3 titulo-2 tx-blanco">¡<span class="span-rosado">Contáctanos </span>ahora!
                        </h2>
                    </div>
                    <!-- Fin Titulo-->
                </div>
            </div>

            <div class="row">

                <div class="col-lg-4">
                    <div class="info negro">
                        <div class="address">
                            <h4 class="tx-blanco fw-bolder">Ubicacion:</h4>
                            <p class="text-secondary">I.E Asamblea Departamental</p>
                        </div>

                        <div class="email">
                            <h4 class="tx-blanco fw-bolder">Email:</h4>
                            <p class="text-secondary">chillclass3@gmail.com</p>
                        </div>

                        <div class="phone">
                            <h4 class="tx-blanco fw-bolder">Telefono:</h4>
                            <p class="text-secondary">+57 301 3540792</p>
                        </div>

                    </div>

                </div>

                <div class="col-lg-8 mt-5 mt-lg-0">

                    <form action="contactenos2.php" class="formulario row g-3" method="POST">
                        <div class="col-12">
                            <label for="asunto" class="form-label tx-blanco">Asunto:</label>
                            <select class="form-select" aria-label="Default select example" id="asunto" name="asunto" aria-placeholder="Asunto">
                                <option value="A">Queja</option>
                                <option value="B">Reclamo</option>
                                <option value="C">Pregunta-Sugerencia</option>
                            </select>
                        </div>

                        <div class=" col">
                            <div class="row">
                                <div class="col">
                                    <label for="nombre" class="form-label tx-blanco">Nombre:</label>
                                    <input type="text" class="form-control" placeholder="Escribe tu nombre" id="nombre" name="nombre" value="">
                                </div>
                                <div class="col">
                                    <label for="tel" class="form-label tx-blanco">Telefono:</label>
                                    <input type="text" class="form-control" placeholder="Escribe tu telefono" id="tel" name="tel" value="">
                                </div>
                            </div>
                        </div>

                        <div class=" col-12">
                            <label for="correo" class="form-label tx-blanco">Correo Electrónico:</label>
                            <input type="text" class="form-control" id="correo" placeholder="Escribe tu correo electrónico" name="correo" required>
                        </div>

                        <div class=" col-12">
                            <label for="floatingTextarea" class="form-label tx-blanco">Mensaje:</label>
                            <textarea class="form-control" placeholder="Escribe tu mensaje" id="mensaje" name="mensaje" value="" for="mensaje" style="height: 150px"></textarea>
                        </div>

                        <div class="mb-3 col-12">
                            <input id="but" class="btn btn-primary form-control fw-bold" type="submit" value="Enviar">
                        </div>
                    </form>



                </div>

            </div>
    </section>
    <!-- Fin Section Contacto -->

    <div class="container" id="container">
        <hr>
    </div>

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
                            <a href="#container" class="text-muted text-decoration-none">Contáctanos</a>
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