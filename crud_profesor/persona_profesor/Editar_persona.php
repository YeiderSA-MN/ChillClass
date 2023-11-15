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
  <div class="container">
    <header class="header">
      <div class="container mt-5 tx-blanco">
        <a href="./persona-1.php" class="btn btn-primary mb-4">
          <span class="bi bi-arrow-left"></span> Regresar
        </a>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../../index_profesor.php" class="tx-azul">Inicio</a></li>
            <li class="breadcrumb-item"><a href="./persona.php" class="tx-azul">Persona</a></li>
            <li class="breadcrumb-item" aria-current="page">Editar Persona</li>
          </ol>
        </nav>
        <h1 class="fw-bold">Editar Persona</h1>
        <form action="edit2persona.php" method="POST">
          <?php
          try {
            $conexion = new PDO('mysql:host=localhost;port=3306;dbname=chillclass;', 'root', '');
          } catch (PDOException $e) {
            echo "Fallo la conexión " . $e->getMessage();
          }

          $vcodigo = filter_var($_GET['code']);

          echo "<div class='form-group'>
                              <label class='tx-rosado fw-bold' for='code'>id de la persona: " . $vcodigo . "</label><br><br>
                          </div>";

          try {

            $persona = $conexion->query("select a.id_persona, a.nombre, a.apellido, a.edad, a.contrasena, b.cod_genero, b.descripcion descripcion_1, c.tipo_persona, c.descripcion FROM persona a, genero b, tipo_persona c where a.cod_genero= b.cod_genero and a.tipo_persona= c.tipo_persona and id_persona='" . $vcodigo . "'");

            $persona->setFetchMode(PDO::FETCH_ASSOC);

            $row = $persona->fetch();

            $vnombre = $row['nombre'];
            $vapellido = $row['apellido'];
            $vedad = $row['edad'];
            $vcontraseña = $row['contrasena'];
            $vgenero = $row['descripcion_1'];
            $persona = $row['descripcion'];
          } catch (PDOException $e) {

            echo 'Error' . $e->getMessage();
          }

          echo "<div class='form-group mb-3'>
                              <label for='nombre'>Nombre:</label>
                              <input type='text' id='nombre' name='nombre' class='form-control' value=" . $vnombre . ">
                          </div>";

          echo "<div class='form-group mb-3'>
                              <label for='apellido'>Apellido:</label>
                              <input type='text' id='apellido' name='apellido' class='form-control' value=" . $vapellido . ">
                          </div>";

          echo "<div class='form-group mb-3'>
                              <label for='edad'>Edad:</label>
                              <input type='text' id='edad' name='edad' class='form-control' value=" . $vedad . ">
                          </div>";

          echo "<div class='form-group mb-3'>
                              <label for='contrasena'>Contraseña:</label>
                              <input type='text' id='contrasena' name='contrasena' class='form-control' value=" . $vcontraseña . ">
                          </div>";

          try {

            $consulta = $conexion->query("select cod_genero, descripcion from genero");
            $consulta->setFetchMode(PDO::FETCH_ASSOC);
            echo "<div class='form-group'>
                                  <label for='genero'>Género:</label>
                                  <select id='genero' name='genero' class='form-control'>";

            while ($row = $consulta->fetch()) {
              if ($vgenero == $row['cod_genero']) {
                echo "<option value=" . $row['cod_genero'] . " selected>" . $row['descripcion'] . "</option>";
              } else {
                echo "<option value=" . $row['cod_genero'] . ">" . $row['descripcion'] . "</option>";
              }
            }

            echo "</select>
                              </div>";
          } catch (PDOException $e) {

            echo $e->getMessage();
          }

          try {
            $consulta = $conexion->query("select tipo_persona, descripcion from tipo_persona;");
            echo "<div class='form-group'>
                                  <label for='persona'>Tipo persona:</label>
                                  <select id='persona' name='persona' class='form-control'>";

            while ($linea = $consulta->fetch(PDO::FETCH_ASSOC)) {
              if ($persona == $linea['persona']) {
                echo "<option value=" . $linea['tipo_persona'] . " selected>" . $linea['descripcion'] . "</option>";
              } else {
                echo "<option value=" . $linea['tipo_persona'] . ">" . $linea['descripcion'] . "</option>";
              }
            }
            echo "</select>
                              </div>";
          } catch (PDOException $e) {

            echo $e->getMessage();
          }

          echo "<input type='hidden' id='codigo' name='codigo' value='" . $vcodigo . "'>";

          ?>
          <div class="text-center mt-4">
            <input type="submit" class="btn btn-primary" value="Actualizar Persona">
          </div>
        </form>
      </div>
    </header>
  </div>
</body>

</html>