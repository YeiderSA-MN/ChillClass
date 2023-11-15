<?php
$mysql_host = 'localhost';
$mysql_user = 'root';
$password = '';
$dbhandle = mysqli_connect($mysql_host, $mysql_user, $password) or die('Problemas de conexion BD');
$selected = mysqli_select_db($dbhandle, 'chillclass') or die('No se encontro el esquema');
if (empty($_GET['buscar'])) {
    $result = mysqli_query($dbhandle, "SELECT b.id_persona, b.nombre, d.cod_curso, d.descripcion, a.fecha_registro FROM persona_curso a, persona b, curso d WHERE b.id_persona = a.id_persona AND d.cod_curso = a.cod_curso order by a.fecha_registro DESC") or die(mysqli_error($dbhandle));
} else {
    $result = mysqli_query($dbhandle, "SELECT b.id_persona, b.nombre, d.cod_curso, d.descripcion, a.fecha_registro FROM persona_curso a, persona b, curso d WHERE b.id_persona = a.id_persona AND d.cod_curso = a.cod_curso AND a.fecha_registro LIKE '%" . $_GET['buscar'] . "%' ") or die(mysqli_error($dbhandle));
}
?>

<!DOCTYPE html>
<html>

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
    <!-- Header Principal -->
    <header class="header">
        <form id="forma" name="forma" action="persona_curso.php">
            <div class="container-fluid">
                <div class="row flex-nowrap">
                    <?php include("../../components/sidebar.php") ?>
                    <div class="col py-3">
                        <div class="container">
                            <div class="buscar d-flex p-5 pt-0 pb-0 container">
                                <div class="buscar1">
                                    <input type="date" id="buscar" name="buscar" class="input-categorias shadow form-control pe-5 me-2" style="width: 350px;">
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
                                <div class="container">
                                    <h1 class="fw-bold">Persona Curso</h1>
                                    <a href="./insertar_persona_curso.php" class="btn btn-primary mt-2"><i class="fas fa-plus-circle"></i> Insertar Persona</a>

                                    <!-- Tabla -->
                                    <div class="table-responsive mt-4 ">
                                        <table class="table">
                                            <thead>
                                                <tr class="tx-blanco">
                                                    <th>Codigo curso</th>
                                                    <th>Curso</th>
                                                    <th>Id persona</th>
                                                    <th>Persona</th>
                                                    <th>Fecha Registro</th>
                                                    <th>Editar</th>
                                                    <th>Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody class="tx-blanco">
                                                <?php
                                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row['cod_curso'] . "</td>";
                                                    echo "<td>" . $row['descripcion'] . "</td>";
                                                    echo "<td>" . $row['id_persona'] . "</td>";
                                                    echo "<td>" . $row['nombre'] . "</td>";
                                                    echo "<td>" . $row['fecha_registro'] . "</td>";
                                                    echo "<td><a href='editar_persona_curso.php?code=" . $row['id_persona'] . "&curso=" . $row['cod_curso'] . "' class='btn btn-secondary btn-sm bolder'><i class='bi bi-pencil-square'></i> Editar</a></td>";
                                                    echo "<td><a href='#' onclick='preguntar(\"" . $row['id_persona'] . "\",\"" . $row['cod_curso'] . "\")' class='btn btn-primary btn-sm'><i class='bi bi-trash'></i> Borrar</a></td>";
                                                    echo "</tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- Fin Tabla -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </header>
    <!-- Fin Header Principal -->

    <!-- Modal -->
    <div class="modal fade" id="eliminarModal" tabindex="-1" aria-labelledby="eliminarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eliminarModalLabel">Eliminar Curso</h5>
                    <button type="button" class="close border-0" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que deseas eliminar este registro?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <a id="deleteLink" href="#" class="btn btn-danger">Eliminar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Modal -->

    <!-- Script Modal -->
    <script>
        function preguntar(valor, valor2) {
            $('#deleteLink').attr('href', 'eliminar_persona_curso.php?cod=' + valor + '&cod2=' + valor2);
            $('#eliminarModal').modal('show');
        }
    </script>
    <!-- Fin Script Modal -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>