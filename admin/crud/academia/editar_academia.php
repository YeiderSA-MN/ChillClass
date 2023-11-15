<!DOCTYPE html>
<html lang="es">

<head>
  <!-- Meta Tags -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Fin Meta Tags -->
  <!-- Descripción -->
  <title>ChillClass 📚 | Academia</title>
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
        <a href="./academia.php" class="btn btn-primary mb-4">
          <span class="bi bi-arrow-left"></span> Regresar
        </a>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.php" class="tx-azul">Inicio</a></li>
            <li class="breadcrumb-item"><a href="./academia.php" class="tx-azul">Academia</a></li>
            <li class="breadcrumb-item" aria-current="page">Editar Academia</li>
          </ol>
        </nav>
        <h1 class="fw-bold">Editar Academia</h1>
        <form action="actualizar_academia.php" method="POST" class="mt-3">
            <?php
            try {
                $conexion = new PDO('mysql:host=localhost;port=3306;dbname=chillclass;', 'root', '');
            } catch (PDOException $e) {
                echo "Fallo la conexión " . $e->getMessage();
            }

            $vcodigo = filter_var($_GET['num']);

            echo "<div class='form-group tx-rosado fw-bold mb-3'>
                      <label for='num'>Código Academia: " . $vcodigo . "</label>
                  </div>";

            try {
                $cod = $conexion->query("SELECT a.cod_academia, a.descripcion, a.fecha_creacion_academia, b.id_persona, b.nombre FROM academia a, persona b WHERE a.id_persona=b.id_persona AND cod_academia='" . $vcodigo . "'");
                $cod->setFetchMode(PDO::FETCH_ASSOC);

                $row = $cod->fetch();
                $vdescripcion_academia = $row['descripcion'];
                $vfecha_academia = $row['fecha_creacion_academia'];
                $vnombre_academia = $row['nombre'];
            } catch (PDOException $e) {
                echo 'Error' . $e->getMessage();
            }
            ?>

            <div class="form-group mb-3">
                <label for="descripcion">Descripción de la Academia:</label>
                <input type="text" id="descripcion" name="descripcion" class="form-control" value="<?php echo $vdescripcion_academia; ?>">
            </div>

            <div class="form-group mb-3">
                <label for="fecha">Fecha de Creación:</label>
                <input type="text" id="fecha" name="fecha" class="form-control" value="<?php echo $vfecha_academia; ?>">
            </div>

            <div class="form-group mb-3">
                <label for="nombre">Nombre del Responsable:</label>
                <select id="nombre" name="nombre" class="form-control">
                    <?php
                    try {
                        $consulta = $conexion->query("SELECT id_persona, nombre FROM persona;");
                        while ($linea = $consulta->fetch(PDO::FETCH_ASSOC)) {
                            $selected = ($vnombre_academia == $linea['nombre']) ? "selected" : "";
                            echo "<option value='" . $linea['id_persona'] . "' " . $selected . ">" . $linea['nombre'] . "</option>";
                        }
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }
                    ?>
                </select>
            </div>

            <input type="hidden" id="codigo" name="codigo" value="<?php echo $vcodigo; ?>">

            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Actualizar">
            </div>
        </form>
    </div>
</body>

</html>
