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
    <title>ChillClass 📚 | Inicio</title>
    <link rel="shortcut icon" href="../assets/img/logo/Logo-colores.svg" type="image/x-icon">
    <!-- Fin Descripción -->
    <!-- Links CSS -->
    <link rel="stylesheet" href="./assets/styles/normalize.css">
    <link rel="stylesheet" href="./assets/styles/styles.css">
    <!-- Fin Links CSS -->
    <!-- Links Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/libs/node_modules/bootstrap/dist/css/bootstrap.css">
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
    <header class="header">
        <div class="container-fluid">
            <div class="row flex-nowrap">
                <!-- NavBar -->
                <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 oscuro shadow">
                    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 min-vh-100">
                        <a class="navbar-brand d-flex jutify-content-center align-items-center fw-bold tx-rosado" href="index.php">
                            <img src="./assets/img/logo/Logo-colores.svg" alt="ChillClass" width="95" height="95">
                        </a>
                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                            <div class="container p-0">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a href="./index.php" class="nav-link align-items-center d-flex">
                                            <i class="bi bi-house-door-fill me-2 tx-rosado fw-bolder"></i> <!-- Icono de Bootstrap -->
                                            <span class="tx-blanco fw-bolder">Home</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="./academia/academia.php" class="nav-link align-items-center d-flex">
                                            <i class="bi bi-building-fill me-2 tx-rosado fw-bolder"></i> <!-- Icono de Bootstrap -->
                                            <span class="tx-blanco fw-bolder">Academia</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="./curso/curso.php" data-bs-toggle="collapse" class="nav-link align-items-center d-flex">
                                            <i class="bi bi-mortarboard-fill me-2 tx-rosado fw-bolder"></i> <!-- Icono de Bootstrap -->
                                            <span class="tx-blanco fw-bolder">Curso</span>
                                        </a>
                                        <!-- Este de persona solo cuando ya se haya hecho esto -->
                                    </li>
                                    <li class="nav-item">
                                        <a href="./persona/persona-1.php" data-bs-toggle="collapse" class="nav-link align-items-center d-flex">
                                            <i class="bi bi-people-fill me-2 tx-rosado fw-bolder"></i> <!-- Icono de Bootstrap -->
                                            <span class="tx-blanco fw-bolder">Persona</span>
                                        </a>
                                        <!-- Este de persona solo cuando ya se haya hecho esto -->
                                    </li>
                                    <li class="nav-item">
                                        <a href="./tematica/tematica.php" data-bs-toggle="collapse" class="nav-link align-items-center d-flex">
                                            <i class="bi bi-book-fill me-2 tx-rosado fw-bolder"></i> <!-- Icono de Bootstrap -->
                                            <span class="tx-blanco fw-bolder">Tematica</span>
                                        </a>
                                        <!-- Este de persona solo cuando ya se haya hecho esto -->
                                    </li>
                                    <li class="nav-item">
                                        <a href="./persona_curso/persona_curso.php" data-bs-toggle="collapse" class="nav-link align-items-center d-flex">
                                            <i class="bi bi-person-fill me-2 tx-rosado fw-bolder"></i> <!-- Icono de Bootstrap -->
                                            <span class="tx-blanco fw-bolder">Persona Curso</span>
                                        </a>
                                        <!-- Este de persona solo cuando ya se haya hecho esto -->
                                    </li>
                                </ul>
                            </div>

                        </ul>
                        <hr>
                        <div class="container pb-3">
                            <a href="../usuario/cerrar.php" class="btn btn-primary fw-bold tx-osuro" role="button">Cerrar <i class="fas fa-sign-out-alt"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Fin NavBar -->
                <div class="col py-3">
                    <div class="container">
                        <div class="p-5">
                            <?php
                            foreach ($resultados as $fila) {
                                echo "<h2 class='fs-1 fw-bold tx-blanco'>Bienvenid@ " . $_SESSION['usuario'] . " al panel de " . $fila['descripcion'] . " de ChillClass.</h2>";
                            }
                            ?>
                            <p class="tx-blanco">Administre información de ChillClass</p>
                            <a href="persona/persona-1.php" class="btn btn-secondary fw-bold text-dark" role="button"><i class="fas fa-user-plus"></i> Registrar Personas</a>
                            <a href="../usuario/cerrar.php" class="btn btn-secondary bg-dark fw-bold text-light" role="button"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
                        </div>

                        <footer class="footer">
                            <div>
                                <div class="p-5">
                                    <h2 class="fs-1 fw-bold"></h2>
                                    <p>Edite información de ChillClass</p>
                                    <a href="../../index_persona.php"><button class="btn btn-secondary fw-bold tx-oscuro" type="button">Iniciar la aplicación</button></a>
                                </div>
                            </div>
                        </footer>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Fin Header Principal -->


    <!-- Fin Footer -->

    <!-- Scripts de Bootstrap y otros -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>