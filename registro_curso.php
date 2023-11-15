<?php
// Inicia la sesión y obtiene el ID de usuario de la sesión
session_start();
$usuario = $_SESSION['id'];
?>

<html>
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
                        <a class="nav-link fw-bold" href="presentar_chillclass.php" role="button"  aria-expanded="false">
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
            // Join de persona para llamar la variable de session
            $result = mysqli_query($dbhandle, "select a.id_persona, a.nombre, a.apellido, a.edad, a.contrasena, b.cod_genero, b.descripcion descripcion_1, c.tipo_persona, c.descripcion FROM persona a, genero b, tipo_persona c where a.cod_genero= b.cod_genero and a.tipo_persona= c.tipo_persona and a.id_persona=$usuario;") or die(mysqli_error($dbhandle));

            // Join de persona curso, persona y curso
            $query = "SELECT 
            a.cod_curso, 
            a.descripcion AS descripcion_curso, 
            b.descripcion AS academia, 
            a.fecha_creacion, 
            a.duracion_curso, 
            c.descripcion AS descripcion_2, 
            d.descripcion AS descripcion_3, 
            a.video,
            pc.fecha_registro
            FROM 
                curso a
            INNER JOIN 
                academia b ON a.cod_academia = b.cod_academia
            INNER JOIN 
                tematica c ON a.cod_tematica = c.cod_tematica
            INNER JOIN 
                estado d ON a.cod_estado = d.cod_estado
            INNER JOIN 
                persona_curso pc ON a.cod_curso = pc.cod_curso
            INNER JOIN
                persona p ON pc.id_persona = p.id_persona
            WHERE 
                p.id_persona = '".$usuario."'
            ORDER BY 
                a.cod_curso";


            
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
    <!-- Fin Nav -->
        <div class="container  ">
        <br>
        <br>
        <h1 class="fw-bold mb-3 span-rosado">Registro curso</h1>

    <form action="registro_curso2.php" method="POST">
            
            <?php

            try {
                //Interfaz de conexion
                $conexion = new PDO('mysql:host=localhost;port=3306;dbname=chillclass;', 'root', ''); 
            
            } catch (PDOException $e) {
                //Casa de que ocurra algun error
                echo "Fallo la conexión".$e->getMessage();
            }


                try {
                    // Ejecutando sql

                    $curso = $conexion->query("SELECT cod_curso, descripcion FROM curso");
                    $curso->setFetchMode(PDO::FETCH_ASSOC);


                } catch (PDOException $e) {
                
                    echo $e->getMessage();
                }


                
                // Variable de la fecha system
                $fechaActual = date("Y-m-d");
        
            ?>

            <div class="mb-3 ">
            <label for="persona" class="form-label tx-blanco fw-bold">Usuario</label>
            <input type="text" class="form-control" id="persona" name="persona" value="<?php echo $usuario; ?>" readonly>
            </div>
            <!-- Drop down de curso -->
            <div class="mb-3">
                <label for="curso" class="form-label tx-blanco fw-bold" >Curso</label>
                <select id="curso" name="curso" class="form-select">
                    <?php
                        try {
                            $consulta = $conexion->query("SELECT cod_curso, descripcion, cod_estado FROM curso");
                            $consulta->setFetchMode(PDO::FETCH_ASSOC);
                
                            while ($row = $consulta->fetch()) {
                                $cod_curso = $row['cod_curso'];
                                $descripcion = $row['descripcion'];
                                $cod_estado = $row['cod_estado'];
                
                                echo "<option value='$cod_curso' data-estado='$cod_estado'>$descripcion</option>";
                            }
                        } catch (PDOException $e) {
                            echo $e->getMessage();
                        }
                    ?>
                </select>
            </div>    
            
            <div class="mb-3 mt-3">
            <label for="fecha" class="form-label tx-blanco fw-bold">Fecha</label>
            <input type="text" class="form-control" id="fecha" name="fecha" value="<?php echo $fechaActual;  ?>" readonly>
            </div> 
            <!-- Añade un nuevo ID para el botón de envío -->
            <input type="submit" class="btn btn-primary mt-4" value="Registrar" id="submitBtn">
            

            <div id="mensaje" class="tx-blanco" style="display:none;">
            <h1 class="fs-5">Este curso no está disponible debido a que todavia no se encuentra abierto, <a href="cursos_disponibles.php" class="tx-rosado"> aquí puedes ver nuestra disponibilidad de cursos y sus características</a></h1>
            </div>

            <!-- Boton de volver -->
            <a href="index_persona.php" class="btn btn-secondary mt-4">Volver</a>  

            <!-- Añade un bloque de script JavaScript -->
            <script>
                // Espera a que el contenido de la página esté completamente cargado
                document.addEventListener('DOMContentLoaded', function() {
                    // Obtiene el elemento con el ID 'curso' y lo guarda en la variable cursoSelect
                    var cursoSelect = document.getElementById('curso');

                    // Obtiene el elemento con el ID 'mensaje' y lo guarda en la variable mensajeDiv
                    var mensajeDiv = document.getElementById('mensaje');

                    // Obtiene el elemento con el ID 'submitBtn' y lo guarda en la variable submitBtn
                    var submitBtn = document.getElementById('submitBtn');

                    // Agrega un escuchador de eventos para el cambio en el elemento cursoSelect
                    cursoSelect.addEventListener('change', function() {
                        // Obtiene el valor del atributo 'data-estado' de la opción seleccionada
                        var estadoSeleccionado = this.options[this.selectedIndex].getAttribute('data-estado');

                        // Verifica si el estado seleccionado es '01' o '03'
                        if (estadoSeleccionado === '01' || estadoSeleccionado === '03') {
                            // Si es '01' o '03', muestra el botón y oculta el mensaje
                            submitBtn.style.display = 'block';
                            mensajeDiv.style.display = 'none';
                        } else {
                            // Si no es '01' ni '03', oculta el botón y muestra el mensaje
                            submitBtn.style.display = 'none';
                            mensajeDiv.style.display = 'block';
                        }
                    });
                });
            </script>


            
    </form>

            
           

          

    
        <!--JavaScript-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
            <!--Fin JavaScript-->
            <!--Bootstrap JavaScript-->
        <script src="./assets/libs/node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
            <!--Fin Bootstrap JavaScript-->
    </body>
</html>