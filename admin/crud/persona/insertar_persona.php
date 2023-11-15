<!DOCTYPE html>
<html lang="es">

<head>
  <!-- Meta Tags -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Fin Meta Tags -->
  <!-- Descripción -->
  <title>ChillClass 📚 | Persona</title>
  <link rel="shortcut icon" href="../assets/img/logo/Logo-colores.svg" type="image/x-icon">
  <!-- Fin Descripción -->
  <!-- Links CSS -->
  <link rel="stylesheet" href="../assets/styles/normalize.css">
  <link rel="stylesheet" href="../assets/styles/styles.css">
  <!-- Fin Links CSS -->
  <!-- Links Bootstrap CSS -->
  <link rel="stylesheet" href="../assets/libs/node_modules/bootstrap/dist/css/bootstrap.css">
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
    <a href="./persona-1.php" class="btn btn-primary mb-4">
      <span class="bi bi-arrow-left"></span> Regresar
    </a>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../index.php" class="tx-azul">Inicio</a></li>
        <li class="breadcrumb-item"><a href="./persona-1.php" class="tx-azul">Persona</a></li>
        <li class="breadcrumb-item" aria-current="page">Persona</li>
      </ol>
    </nav>
    <h1 class="fw-bold">Insertar Personas</h1>
    <form action="ins_persona.php" method="POST">
      <?php
      try {
        $conexion = new PDO('mysql:host=localhost;port=3306;dbname=chillclass;', 'root', '');
      } catch (PDOException $e) {
        echo "Fallo la conexión " . $e->getMessage();
      }
      ?>

      <div class="form-group mb-2">
        <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Id persona">
      </div>

      <div class="form-group mb-2">
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
      </div>

      <div class="form-group mb-2">
        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido">
      </div>

      <div class="form-group mb-2">
        <input type="text" class="form-control" id="edad" name="edad" placeholder="Edad">
      </div>

      <div class="form-group mb-2">
        <input type="text" class="form-control" id="contrasena" name="contrasena" placeholder="Contraseña">
      </div>

      <?php
      try {
        $consulta = $conexion->query("select cod_genero, descripcion from genero");
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
      ?>
        <div class="form-group mb-2">
          <select class="form-control" id="genero" name="genero">
            <?php
            while ($row = $consulta->fetch()) {
              echo "<option value=" . $row['cod_genero'] . ">" . $row['descripcion'] . "</option>";
            }
            ?>
          </select>
        </div>
      <?php
      } catch (PDOException $e) {
        echo $e->getMessage();
      }

      try {
        $consulta = $conexion->query("select tipo_persona, descripcion from tipo_persona;");
      ?>
        <div class="form-group">
          <select class="form-control" id="persona" name="persona">
            <?php
            while ($linea = $consulta->fetch(PDO::FETCH_ASSOC)) {
              echo "<option value=" . $linea['tipo_persona'] . ">" . $linea['descripcion'] . "</option>";
            }
            ?>
          </select>
        </div>
      <?php
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
      ?>
      <div class="d-flex justify-content-center align-content-center">
        <button type="submit" class="btn btn-primary form-group mt-4">
          <span class="bi bi-plus"></span> Insertar
        </button>
      </div>
    </form>
  </div>
  <!-- Agrega el enlace al archivo Bootstrap JS al final de la página antes de cerrar el body -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
