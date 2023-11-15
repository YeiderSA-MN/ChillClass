<?php
session_start();
$usuario = $_SESSION['id'];
?>

<!DOCTYPE html>
<html>

    <title>ChillClass 📚 | Presentación del Quiz</title>
    <link rel="shortcut icon" href="./assets/img/logo/Logo-colores.svg" type="image/x-icon">

    <head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fin Meta Tags -->

    <!-- Descripción -->
    <title>ChillClass 📚 | Presentación del Quiz</title>
    <link rel="shortcut icon" href="./assets/img/logo/Logo-colores.svg" type="image/x-icon">
    <link rel="shortcut icon" href="./assets/img/logo/Logo-colores.svg" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
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
            $mysql_host = 'localhost';
            $mysql_user = 'root';
            $password = '';
            $dbhandle = mysqli_connect($mysql_host, $mysql_user, $password) or die('Problemas de conexión a la BD');
            $selected = mysqli_select_db($dbhandle, 'chillclass') or die('No se encontró el esquema');
           

            ?>
            <a href="index_persona.php" class="btn btn-secondary fw-bold ">
                Salir
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"></path>
                    <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"></path>
                </svg>
            </a>
        </div>
    </nav>
     <div class="container mt-sm-5" >
        <form id="forma" class="mt-10" name="forma" action="presentar1_chillclass.php">
            <?php
            if (isset($_SESSION['id'])){
            echo'<h1 class="fw-bold tx-blanco">Presentar Quiz</h1>';
            }
            else {
                echo'<h1 class="fw-bold tx-blanco">Para presentar los quizes debes <a href="admin/usuario/registro.php" class="span span-rosado">registrarte</a></h1>';
            }
            ?>

            <?php
                // Este script es para conectarme a la BD
                $mysql_host = 'localhost';
                $mysql_user = 'root';
                $password = '';
                $dbhandle = mysqli_connect ($mysql_host, $mysql_user, $password) or die('Problemas de conexión con BD');
                $selected = mysqli_select_db($dbhandle, 'chillclass') or die("No se encontró el esquema");

                $result = mysqli_query($dbhandle,"select a.cod_quiz, a.titulo, a.cod_pregunta, a.pregunta, a.A, a.B, a.C, a.respuesta_correcta, a.cod_curso, b.descripcion as descur FROM quiz a, curso b where a.cod_curso = b.cod_curso group by a.cod_quiz") or die( mysqli_error($dbhandle));

                echo "<table class='table tx-blanco mt-3'>";
                echo "<tr><th>Código quiz</th>
                <th>Descripción</th>
                <th>Código de Curso</th>
                <th>Descripción de Curso</th>";
                echo"<th>"; if (isset($_SESSION['id'])){ echo"Presentar"; }echo"</th>
                </tr>";

                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {  
                    echo "<td>".$row['cod_quiz']."</td>";
                    echo "<td>".$row['titulo']."</td>";
                    echo "<td>".$row['cod_curso']."</td>";
                    echo "<td>".$row['descur']."</td>";
                    if (isset($_SESSION['id'])) {
                    echo "</td><td> <div class='col-12'><a class='btn btn-primary' href='presentar1_chillclass.php?cod_quiz=".$row['cod_quiz']."'>Presentar </a></div> </td>";
                    }
                    echo "<tr>";          
                } 
                echo "</table>";
            ?>
            
            <a href="index_persona.php" class="btn btn-secondary fw-bold mt-sm-5">Volver al menu principal</a>


        </form>
    </div>
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

</body>
</html