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
        <li class="breadcrumb-item" aria-current="page">Insertar Persona</li>
      </ol>
    </nav>
    <h1 class="fw-bold">Insertar Personas</h1>
    <form action="ins_persona_curso.php" method="POST">
      <?php
      // Inicializar las variables que usarás para valores predeterminados o para procesar datos.
      $vcodigo = ""; // Valor predeterminado para el campo de curso
      $vpersona = ""; // Valor predeterminado para el campo de persona
      $cod_estado = ""; // Valor predeterminado para el campo de estado

      // Tu código PHP para conectarte a la base de datos y realizar consultas si es necesario
      try {
        $conexion = new PDO('mysql:host=localhost;port=3306;dbname=chillclass;', 'root', '');
      } catch (PDOException $e) {
        echo "Fallo la conexión: " . $e->getMessage();
      }

      // Obtener datos para campos select (curso, persona, estado) y establecer valores predeterminados
      try {
        $consultaCurso = $conexion->query("SELECT cod_curso, descripcion FROM curso");
        $consultaCurso->setFetchMode(PDO::FETCH_ASSOC);

        $consultaPersona = $conexion->query("SELECT id_persona, nombre FROM persona");
        $consultaPersona->setFetchMode(PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
        echo $e->getMessage();
      }

      ?>
      <form action="ins_persona_curso.php" method="POST">
        <div class="form-group mb-3">
          <label for="curso">Curso:</label>
          <select id="curso" name="curso" class="form-control">
            <?php
            while ($row = $consultaCurso->fetch()) {
              if ($vcodigo == $row['cod_curso']) {
                echo "<option value=" . $row['cod_curso'] . " selected>" . $row['descripcion'] . "</option>";
              } else {
                echo "<option value=" . $row['cod_curso'] . ">" . $row['descripcion'] . "</option>";
              }
            }
            ?>
          </select>
        </div>
        <div class="form-group mb-3">
          <label for="persona">Persona:</label>
          <select id="persona" name="persona" class="form-control">
            <?php
            while ($row = $consultaPersona->fetch()) {
              if ($vpersona == $row['id_persona']) {
                echo "<option value=" . $row['id_persona'] . " selected>" . $row['nombre'] . "</option>";
              } else {
                echo "<option value=" . $row['id_persona'] . ">" . $row['nombre'] . "</option>";
              }
            }
            ?>
          </select>
        </div>
        <div class="form-group mb-3">
          <label for="fecha">Fecha de Registro:</label>
          <input type="date" id="fecha" name="fecha" class="form-control" value="">
        </div>
        <button type="submit" class="btn btn-primary form-control">Insertar</button>
      </form>
  </div>

  <!-- Asegúrate de incluir los scripts necesarios al final del documento -->
</body>
</div>

<!-- Scripts de Bootstrap y jQuery (al final del documento) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>