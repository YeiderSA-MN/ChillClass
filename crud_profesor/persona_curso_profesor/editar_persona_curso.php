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
  <div class="container mt-5 tx-blanco">
    <a href="./persona_curso.php" class="btn btn-primary mb-4">
      <span class="bi bi-arrow-left"></span> Regresar
    </a>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../../index_profesor.php" class="tx-azul">Inicio</a></li>
        <li class="breadcrumb-item"><a href="./persona_curso.php" class="tx-azul">Persona Curso</a></li>
        <li class="breadcrumb-item" aria-current="page"> Editar persona</li>
      </ol>
    </nav>
    <h1 class="fw-bold">Insertar Personas</h1>
    <form action="actualizar_persona_curso.php" method="POST">
      <?php
      // Tu código PHP para conectarte a la base de datos y obtener los datos a editar aquí

      try {
        //Interfaz de conexion
        $conexion = new PDO('mysql:host=localhost;port=3306;dbname=chillclass;', 'root', '');
      } catch (PDOException $e) {
        //Casa de que ocurra algun error
        echo "Fallo la conexión" . $e->getMessage();
      }

      // Variables para los valores predeterminados o datos a editar
      $vcodigo = "";
      $vpersona = "";
      $cod_estado = "";
      $fecha = "";

      // Tu código PHP para obtener los datos a editar y establecer los valores predeterminados
      $vcodigo = filter_var($_GET['curso']);
      $vpersona = filter_var($_GET['code']);

      try {
        $consulta = $conexion->query("SELECT b.id_persona, b.nombre, d.cod_curso, d.descripcion, a.fecha_registro FROM persona_curso a, persona b, curso d WHERE b.id_persona = a.id_persona AND d.cod_curso = a.cod_curso AND a.cod_curso='" . $vcodigo . "' AND b.id_persona='" . $vpersona . "'");

        $consulta->setFetchMode(PDO::FETCH_ASSOC);

        $row = $consulta->fetch();

  
        $fecha = $row['fecha_registro'];
       
      } catch (PDOException $e) {
        echo 'Error' . $e->getMessage();
      }

      // Mostrar el formulario con los valores actuales
      ?>
      <div class="form-group mb-3">
        <label for="curso">Curso:</label>
        <input type="text" class="form-control" id="curso" name="curso" value="<?php echo $vcodigo; ?>" readonly>
      </div>
      <div class="form-group mb-3">
        <label for="persona">Persona:</label>
        <input type="text" class="form-control" id="persona" name="persona" value="<?php echo $vpersona; ?>" readonly>
      </div>
      <div class="form-group mb-3">
        <label for="fecha">Fecha de registro:</label>
        <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo $fecha; ?>">
      </div>
      <button type="submit" class="btn btn-primary form-control">Actualizar</button>
    </form>
  </div>

  <!-- Scripts de Bootstrap y jQuery (al final del documento) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>