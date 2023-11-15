<?php
session_start();
$usuario = $_SESSION['id'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChillClass 📚 | Perfil</title>
    <link rel="shortcut icon" href="./assets/img/logo/Logo-colores.svg" type="image/x-icon">
    <link rel="stylesheet" href="./assets/styles/normalize.css">
    <link rel="stylesheet" href="./assets/styles/styles.css">
    <link rel="stylesheet" href="./assets/libs/node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="oscuro">

<nav class="navbar sticky-top navbar-expand-lg oscuro shadow justify-content-between">
        <div class="container">
            <a class="navbar-brand" href="index_persona.php">
                <img src="./assets/img/logo/Logo-colores.svg" alt="Bootstrap" width="85" height="85">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse align-items-center justify-content-center" id="navbarNavAltMarkup">
                <ul class="navbar-nav menu text-center">
                    <li class="nav-item dropdown">
                        <a class="nav-link fw-bold dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Evaluaciones
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Foros</a></li>
                            <li><a class="dropdown-item" href="#">Categorias</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link fw-bold dropdown-toggle" href="registro_curso.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Cursos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="registrocursos.html">Todos los Cursos</a></li>
                            <li><a class="dropdown-item" href="#">Escuelas</a></li>
                            <li><a class="dropdown-item" href="#">Subir un Curso</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="sobre_nosotros.php">Sobre Nosotros</a>
                    </li>
                </ul>
            </div>
            <a href="index_persona.php"><button class="btn btn-secondary active">Volver</button></a>
        </div>
    </nav>
    <?php
        $mysql_host = 'localhost';
        $mysql_user = 'root';
        $password = '';
        $dbhandle = mysqli_connect ($mysql_host, $mysql_user, $password) or die('Problemas de conexión a la BD');
        $selected = mysqli_select_db ($dbhandle, 'chillclass') or die('No se encontró el esquema');
        $result = mysqli_query($dbhandle, "select a.id_persona, a.nombre, a.apellido, a.edad, a.contrasena, b.cod_genero, b.descripcion descripcion_1, c.tipo_persona, c.descripcion FROM persona a, genero b, tipo_persona c where a.cod_genero= b.cod_genero and a.tipo_persona= c.tipo_persona and a.id_persona=$usuario;") or die(mysqli_error($dbhandle));

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
    ?>
    <div style="margin-left: -1rem; text-align:center; margin-top: 2rem;" class="">
        <h1 class="fw-bold tx-blanco">Perfil de Usuario</h1>
        <h2 class="fw-bold tx-azul mt-1"> <?php echo $row['nombre']; ?></h2>
        <h2 class="fw-bold tx-blanco mt-1"> <?php echo $row['descripcion']; ?></h2>
    </div>
    <?php
        } else {
            echo "No se encontraron resultados para el usuario con ID $usuario.";
        }
    ?>

<?php
    $descripcion_cursos = "";

    $result = mysqli_query($dbhandle, "SELECT b.id_persona, b.nombre, d.cod_curso, d.descripcion, a.fecha_registro FROM persona_curso a, persona b, curso d WHERE b.id_persona = a.id_persona AND d.cod_curso = a.cod_curso AND b.id_persona= '".$usuario."'") or die(mysqli_error($dbhandle));

    $registros = mysqli_num_rows($result);

    if ($registros <= 0) {
        echo "<h1 style='font-size:25px; line-height: 30px; color: white'>No se encontraron cursos</h1>";
    } else {
        while ($row_cursos = mysqli_fetch_assoc($result)) {
            $descripcion_curso = $row_cursos['descripcion'];
            $descripcion_cursos .= $descripcion_curso . ", ";
        }
        $descripcion_cursos = rtrim($descripcion_cursos, ", ");
    }
    ?>

    <div class='card container' style='width: 30rem; text-align:center;'>
        <img src='' class='card-img-top' alt=''>
        <div class='card-body'>
            <p class='card-text'>
                <?php
                if ($registros > 0) {
                    echo "Los cursos que has hecho son " . $registros . " y estos corresponden a " . $descripcion_cursos . ".";
                }
                ?>
            </p>
        </div>
    </div>

    <div class="container mt-5">
        <form action="act_perfil.php" method="POST">
            <?php
            try {
                $conexion = new PDO('mysql:host=localhost;port=3306;dbname=chillclass;', 'root', ''); 
            } catch (PDOException $e) {
                echo "Fallo la conexión ".$e->getMessage();
            }

            try {
                $persona = $conexion->query("select a.id_persona, a.nombre, a.apellido, a.edad, a.contrasena, b.cod_genero, b.descripcion descripcion_1 FROM persona a, genero b where a.cod_genero= b.cod_genero and id_persona='".$usuario."'");
                $persona->setFetchMode(PDO::FETCH_ASSOC);
                $row = $persona->fetch();
                $vnombre=$row['nombre'];
                $vapellido=$row['apellido'];
                $vedad=$row['edad'];
                $vcontraseña=$row['contrasena'];
                $vgenero=$row['descripcion_1'];
            } catch (PDOException $e) {
                echo 'Error' . $e->getMessage();
            }

            try {
                $consulta = $conexion->query("select cod_genero, descripcion from genero");
                $consulta->setFetchMode(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            ?>

            <div class="mb-3">
                <label for="nombre" class="form-label tx-blanco">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $vnombre; ?>">
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label tx-blanco">Apellido:</label>
                <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $vapellido; ?>">
            </div>
            <div class="mb-3">
                <label for="edad" class="form-label tx-blanco">Edad:</label>
                <input type="text" class="form-control" id="edad" name="edad" value="<?php echo $vedad; ?>">
            </div>
            <div class="mb-3">
                <label for="contraseña" class="form-label tx-blanco">Contraseña:</label>
                <input type="password" class="form-control" id="contraseña" name="contrasena" value="<?php echo $vcontraseña; ?>">
            </div>
            <div class="mb-3">
                <label for="genero" class="form-label tx-blanco">Género:</label>
                <select id="genero" name="genero" class="form-select">
                    <?php
                    while ($row = $consulta->fetch()) {
                        if ($vgenero == $row['cod_genero']) {
                            echo "<option value=".$row['cod_genero']." selected>".$row['descripcion']."</option>";
                        } else {
                            echo "<option value=".$row['cod_genero'].">".$row['descripcion']."</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <input type="submit" class="btn btn-primary mt-4" value="Actualizar Perfil">
            <a href="profile.php" class="btn btn-secondary mt-4">Volver</a>
        </form>
    </div>
</body>
</html>
