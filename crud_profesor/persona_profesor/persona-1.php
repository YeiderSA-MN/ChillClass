<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fin Meta Tags -->
    <!-- Descripción -->
    <title>ChillClass 📚 | Cursos</title>
    <link rel="shortcut icon" href="../../assets/img/logo/Logo-colores.svg" type="image/x-icon">
    <!-- Fin Descripción -->
    <!-- Links CSS -->
    <link rel="stylesheet" href="../../assets/styles/normalize.css">
    <link rel="stylesheet" href="../../assets/styles/styles.css">
    <!-- Fin Links CSS -->
    <!-- Links Bootstrap CSS -->
    <link rel="stylesheet" href="../../assets/libs/node_modules/bootstrap/dist/css/bootstrap.css">
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
        <form id="forma" name="forma" action="persona-1.php">
            <div class="container-fluid">
                <div class="row flex-nowrap">
                    <?php include("../../components/sidebar.php") ?>
                    <div class="col py-3">
                        <div class="container">
                            <div class="buscar d-flex p-5 pt-0 pb-0 container">
                                <div class="buscar1">
                                    <input type="text" id="buscar" name="buscar" class="input-categorias shadow form-control pe-5 me-2" style="width: 350px;">
                                </div>
                                <div class="buscar2 ">
                                    <a href="#">
                                        <svg xmlns='http://www.w3.org/2000/svg' onclick="document.getElementById('forma').submit();"
                                            class='icon icon-tabler icon-tabler-list-search' width='40' height='40' viewBox='0 0 24 24'
                                            stroke-width='1.5' stroke='#00abfb' fill='none' stroke-linecap='round'
                                            stroke-linejoin='round'>
                                            <path stroke='none' d='M0 0h24v24H0z' fill='none' />
                                            <circle cx='15' cy='15' r='4' />
                                            <path d='M18.5 18.5l2.5 2.5' />
                                            <path d='M4 6h16' />
                                            <path d='M4 12h4' />
                                            <path d='M4 18h4' />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="p-5 tx-blanco">
                                <div class="container ">
                                    <!-- BreadCrumb -->
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="../../index_profesor.php" class="tx-azul">Inicio</a></li>
                                            <li class="breadcrumb-item" aria-current="page">Persona</li>
                                        </ol>
                                    </nav>
                                    <!-- Fin BreadCrumb -->
                                    <h1 class="fw-bold">Administrador de Persona</h1>
                                    <a href="./insertar_persona.php" class="btn btn-secondary mt-2"><i class="fas fa-plus-circle"></i> Insertar Personas</a>

                                    <!-- Tabla -->
                                    <?php
                                    $mysql_host = 'localhost';
                                    $mysql_user = 'root';
                                    $password = '';

                                    $dbhandle = mysqli_connect($mysql_host, $mysql_user, $password) or die('Problemas de conexion BD');
                                    $selected = mysqli_select_db($dbhandle, 'chillclass') or die('No se encontro el esquema');

                                    if (empty($_GET['buscar'])) {
                                        // Si está vacío, mostrar todos los registros.
                                        $result = mysqli_query($dbhandle, "SELECT a.id_persona, a.nombre, a.apellido, a.edad, a.contrasena, b.cod_genero, b.descripcion AS descripcion_genero, c.tipo_persona, c.descripcion AS descripcion_tipo_persona FROM persona a, genero b, tipo_persona c WHERE a.cod_genero = b.cod_genero AND a.tipo_persona = c.tipo_persona;") or die(mysqli_error($dbhandle));
                                    } else {
                                        // Si se especifica un nombre para buscar, filtrar por ese nombre.
                                        $result = mysqli_query($dbhandle, "SELECT a.id_persona, a.nombre, a.apellido, a.edad, a.contrasena, b.cod_genero, b.descripcion AS descripcion_genero, c.tipo_persona, c.descripcion AS descripcion_tipo_persona FROM persona a, genero b, tipo_persona c WHERE a.cod_genero = b.cod_genero AND a.tipo_persona = c.tipo_persona AND nombre LIKE '%" . $_GET['buscar'] . "%';") or die(mysqli_error($dbhandle));
                                    }
                                    ?>

                                    <table class="table tx-blanco mt-3">
                                        <thead>
                                            <tr>
                                                <th>ID Persona</th>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>Edad</th>
                                                <th>Código Género</th>
                                                <th>Contraseña</th>
                                                <th>Tipo Persona</th>
                                                <th>Editar</th>
                                                <th>Eliminar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                                echo "<tr>";
                                                echo "<td>" . $row['id_persona'] . "</td>";
                                                echo "<td>" . $row['nombre'] . "</td>";
                                                echo "<td>" . $row['apellido'] . "</td>";
                                                echo "<td>" . $row['edad'] . "</td>";
                                                echo "<td>" . $row['descripcion_genero'] . "</td>";
                                                echo "<td>" . $row['contrasena'] . "</td>";
                                                echo "<td>" . $row['descripcion_tipo_persona'] . "</td>";
                                                echo "<td> <a class='btn btn-primary' href='Editar_persona.php?code=" . $row['id_persona'] . "'><i class='bi bi-pencil-square'></i> Editar</a> </td>";
                                                echo "<td> <a class='btn btn-danger' href='#' onclick='preguntar(\"" . $row['id_persona'] . "\")'class='btn btn-primary btn-sm'><i class='bi bi-trash'></i> Borrar</a> </td>";
                                                echo "</tr>";
                                            };
                                            ?>
                                        </tbody>
                                    </table>
                                    <!-- Fin Tabla -->
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </form>
    </header>

    <!-- Modal para confirmar eliminación -->
    <div class="modal fade" id="confirmarBorradoModal" tabindex="-1" aria-labelledby="confirmarBorradoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmarBorradoModalLabel">Confirmar Eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Deseas eliminar este registro?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <a id="confirmarBorradoLink" class="btn btn-danger" href="#">Confirmar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Modal para confirmar eliminación -->

    <script>
        function preguntar(valor) {
            // Configurar el enlace de confirmación para que redireccione a "eliminar_persona.php"
            document.getElementById("confirmarBorradoLink").href = "eliminar_persona.php?code=" + valor;

            // Abrir el modal
            var myModal = new bootstrap.Modal(document.getElementById('confirmarBorradoModal'), { backdrop: 'static', keyboard: false });
            myModal.show();
        }
    </script>

    <?php
    mysqli_close($dbhandle);
    ?>
    <script src="../../assets/libs/node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>

</html>
