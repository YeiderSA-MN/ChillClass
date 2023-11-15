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
  <div class="container">
    <header class="header">
      <div class="container mt-5 tx-blanco">
        <a href="./curso.php" class="btn btn-primary mb-4">
          <span class="bi bi-arrow-left"></span> Regresar
        </a>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.php" class="tx-azul">Inicio</a></li>
            <li class="breadcrumb-item"><a href="./curso.php" class="tx-azul">Curso</a></li>
            <li class="breadcrumb-item" aria-current="page">Editar Curso</li>
          </ol>
        </nav>
        <h1 class="fw-bold">Editar Persona</h1>
        <form action="actualizar_curso.php" method="POST" class="mt-3">
          <?php
          try {
            $conexion = new PDO('mysql:host=localhost;port=3306;dbname=chillclass;', 'root', '');
          } catch (PDOException $e) {
            echo "Fallo la conexión " . $e->getMessage();
          }

          $vcodigo = filter_var($_GET['code']);

          echo "<div class='form-group'>
                      <label class='tx-rosado fw-bold' for='code'>Código Curso: " . $vcodigo . "</label>
                  </div>";

          try {
            $persona = $conexion->query("SELECT a.cod_curso, a.descripcion AS descripcion_curso, b.cod_academia, b.descripcion, a.fecha_creacion, a.duracion_curso, c.cod_tematica, c.descripcion AS descripcion_2, d.cod_estado, d.descripcion AS descripcion_3, a.video AS video FROM curso a, academia b, tematica c, estado d WHERE a.cod_academia=b.cod_academia AND a.cod_tematica=c.cod_tematica AND a.cod_estado=d.cod_estado AND cod_curso='" . $vcodigo . "'");
            $persona->setFetchMode(PDO::FETCH_ASSOC);

            $row = $persona->fetch();
            $descripcion = $row['descripcion_curso'];
            $academia = $row['descripcion'];
            $creacion = $row['fecha_creacion'];
            $duracion = $row['duracion_curso'];
            $tematica = $row['descripcion_2'];
            $estado = $row['descripcion_3'];
            $video = $row['video'];
          } catch (PDOException $e) {
            echo 'Error' . $e->getMessage();
          }
          ?>

          <div class="form-group mb-3">
            <label for="descripcion">Descripción:</label>
            <input type="text" id="descripcion" name="descripcion" class="form-control" value="<?php echo $descripcion; ?>">
          </div>

          <div class="form-group mb-3">
            <label for="academia">Academia:</label>
            <select id="academia" name="academia" class="form-control">
              <?php
              try {
                $consulta = $conexion->query("SELECT cod_academia, descripcion FROM academia");
                $consulta->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $consulta->fetch()) {
                  $selected = ($academia == $row['descripcion']) ? "selected" : "";
                  echo "<option value='" . $row['cod_academia'] . "' " . $selected . ">" . $row['descripcion'] . "</option>";
                }
              } catch (PDOException $e) {
                echo $e->getMessage();
              }
              ?>
            </select>
          </div>

          <div class="form-group mb-3">
            <label for="creacion">Fecha de Creación:</label>
            <input type="text" id="creacion" name="creacion" class="form-control" value="<?php echo $creacion; ?>">
          </div>

          <div class="form-group mb-3">
            <label for="duracion">Duración del Curso:</label>
            <input type="text" id="duracion" name="duracion" class="form-control" value="<?php echo $duracion; ?>">
          </div>

          <div class="form-group mb-3">
            <label for="tematica">Temática:</label>
            <select id="tematica" name="tematica" class="form-control">
              <?php
              try {
                $consulta = $conexion->query("SELECT cod_tematica, descripcion FROM tematica");
                $consulta->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $consulta->fetch()) {
                  $selected = ($tematica == $row['descripcion']) ? "selected" : "";
                  echo "<option value='" . $row['cod_tematica'] . "' " . $selected . ">" . $row['descripcion'] . "</option>";
                }
              } catch (PDOException $e) {
                echo $e->getMessage();
              }
              ?>
            </select>
          </div>

          <div class="form-group mb-3">
            <label for="estado">Estado:</label>
            <select id="estado" name="estado" class="form-control">
              <?php
              try {
                $consulta = $conexion->query("SELECT cod_estado, descripcion FROM estado");
                $consulta->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $consulta->fetch()) {
                  $selected = ($estado == $row['descripcion']) ? "selected" : "";
                  echo "<option value='" . $row['cod_estado'] . "' " . $selected . ">" . $row['descripcion'] . "</option>";
                }
              } catch (PDOException $e) {
                echo $e->getMessage();
              }
              ?>
            </select>
          </div>

          <div class="form-group mb-3">
            <label for="video">Enlace del video:</label>
            <input type="text" id="video" name="video" class="form-control" value="<?php echo $video; ?>">
          </div>

          <input type="hidden" id="codigo" name="codigo" value="<?php echo $vcodigo; ?>">

          <div class="text-center">
            <input type="submit" class="btn btn-primary" value="Actualizar">
          </div>
        </form>
      </div>
</body>

</html>