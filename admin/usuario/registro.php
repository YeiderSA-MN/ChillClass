<!DOCTYPE html>
<html lang="es">

<head>
  <!--Meta Tags-->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Fin Meta Tags-->
  <!--Descripcion-->
  <title>ChillClass 📚 | Registro</title>
  <link rel="shortcut icon" href="../../assets/img/logo/Logo-colores.svg" type="image/x-icon">
  <!--Fin Descripcion-->
  <!--Links CSS-->
  <link rel="stylesheet" href="../../assets/styles/normalize.css">
  <link rel="stylesheet" href="../../assets/styles/styles.css">
  <!--Fin Links CSS-->
  <!--Links Bootstrap CSS-->
  <link rel="stylesheet" href="../../assets/libs/node_modules/bootstrap/dist/css/bootstrap.css">
  <!--Fin Links Bootstrap CSS-->
  <!--Google Fonts-->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
  <!--Fin Google Fonts-->
  <!--Font Awesome-->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <!--Fin Font Awesome-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="oscuro">
  <!--Nav-->
  <nav class="navbar oscuro shadow py-2">
    <div class="container justify-content-center justify-content-between">
      <a class="navbar-brand" href="../../index_persona.php" >
        <img src="../../assets/img/logo/Logo-colores.svg" alt="" class="d-inline-block align-text-top" width="85" height="85">
      </a>
      <span class="navbar-text tx-blanco">
        ¿Ya tienes Cuenta? <a href="../../admin/usuario/usuario.php" class="tx-azul">Inicia Sesión</a>
      </span>
    </div>
  </nav>
  <!--Fin Nav-->

  <!--Registrate-->
  <section class="m-5">
    <!-- container -->
    <div class="container margin-login">
      <!-- row -->
      <div class="row justify-content-center align-items-center">
        <div class="col-12 col-md-6 col-lg-4 order-lg-1 order-2">
          <!-- img -->
          <img src="../../assets/img/imagenes/feliz.png" alt="" class="img-fluid">
        </div>
        <!-- col -->
        <div class="col-12 col-md-6 offset-lg-1 col-lg-4 order-lg-2 order-1">
          <div class="mb-lg-9 mb-3">
            <h1 class="mb-1 fw-bold tx-blanco">Registrate!</h1>
            <p class="text-muted">Bienvenido a ChillClass! Registre su correo electrónico para comenzar.</p>
          </div>
          <!-- form -->
          <form action="registro_2.php" method="POST" onsubmit="return mostrarAlerta();">
            <?php
            // Conexión a la base de datos
            try {
              $conexion = new PDO('mysql:host=localhost;port=3306;dbname=chillclass;', 'root', '');
            } catch (PDOException $e) {
              echo "Fallo la conexión " . $e->getMessage();
            }
            ?>
            <div class="row g-3">
              <!-- columna -->
              <div class="col">
                <!-- input -->
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" aria-label="Nombre" required>
              </div>
              <div class="col">
                <!-- input -->
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" aria-label="Apellido" required>
              </div>
              <div class="col-12">
                <!-- input -->
                <input type="text" class="form-control" id="edad" name="edad" placeholder="Edad" aria-label="Edad" required>
              </div>
              <div class="col-12">
                <!-- input -->
                <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Identidad" aria-label="Identidad" required>
              </div>
              <div class="col-12">
                <!-- input -->
                <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Contraseña" required>
              </div>

              <?php
              try {
                $consulta = $conexion->query("SELECT cod_genero, descripcion FROM genero");
                $consulta->setFetchMode(PDO::FETCH_ASSOC);
              ?>

                <div class="form-group">
                  <select class="form-control" id="genero" name="genero">
                    <!-- Opción de marcador de posición -->
                    <option value="" disabled selected>Seleccione su género</option>
                    <?php
                    while ($row = $consulta->fetch()) {
                      echo "<option value='" . $row['cod_genero'] . "'>" . $row['descripcion'] . "</option>";
                    }
                    ?>
                  </select>
                </div>

              <?php
              } catch (PDOException $e) {
                echo $e->getMessage();
              }
              ?>

              <?php
              try {
                $consulta = $conexion->query("SELECT tipo_persona, descripcion FROM tipo_persona;");
              ?>

                <div class="form-group">
                  <select class="form-control" id="persona" name="persona">
                    <!-- Opción de marcador de posición -->
                    <option value="" disabled selected>Selecciona su tipo de persona</option>
                    <?php
                    while ($linea = $consulta->fetch(PDO::FETCH_ASSOC)) {
                      if ($linea['tipo_persona'] != '01' and $linea['tipo_persona'] != '02') {
                        echo "<option value='" . $linea['tipo_persona'] . "'>" . $linea['descripcion'] . "</option>";
                      }
                    }
                    ?>
                  </select>
                </div>

              <?php
              } catch (PDOException $e) {
                echo $e->getMessage();
              }
              ?>

              <!-- btn -->
              <div class="col-12 d-grid">
                <button type="submit" class="btn btn-primary fw-bold tx-blanco">Registrate</button>
              </div>

              <div class="tx-blanco">¿Ya tienes Cuenta? <a href="./usuario.php" class="tx-azul"> Inicia Sesión</a></div>
              <div class="tx-blanco"><a href="../../index_persona.php" class="tx-azul"> Volver</a> al Home</div>
            </div>
          </form>
        </div>
      </div>
    </div>

  </section>
  <!--Fin Registrate-->

  <!--Footer-->
  <footer class="d-flex pt-5 pb-0 h-100 footer oscuro">
    <div class="container align-self-center">
      <div class="row mb-3">
        <div class="col-lg-3 col-sm-6 my-4 logo-footer">
          <img src="../../assets/img/logo/Logo-colores.svg" alt="" />
        </div>

        <!--Columna 1-->
        <div class="col-lg-3 col-sm-6 my-4">
          <h5 class="fw-bold mb-3">Home</h5>
          <ul class="list-unstyled">
            <li class="mb-1">
              <a href="../../sobre_nosotros.php" class="text-muted text-decoration-none">Sobre Nosotros</a>
            </li>
            <li class="mb-1">
              <a href="../../index_persona.php#container" class="text-muted text-decoration-none">Contactanos</a>
            </li>
            <li class="mb-1">
              <a href="../../sobre_proyecto.php" class="text-muted text-decoration-none">Sobre el Proyecto</a>
            </li>

          </ul>
        </div>
        <!--Fin Columna 1-->

        <!--Columna 2-->
        <div class="col-lg-3 col-sm-6 my-4">
          <h5 class="fw-bold mb-3">Documentación</h5>
          <ul class="list-unstyled">
            <li class="mb-1">
              <a href="https://docs.google.com/document/d/1sqLwSy_Q5eLTpqxP39eaf5vfEv-BDRwEl8VjLPTVrk0/edit?usp=sharing" class="text-muted text-decoration-none" target="_blank">Ir a Documentación</a>
            </li>
          </ul>
        </div>
        <!--Fin Columna 2-->

        <!--Columna 3-->
        <div class="col-lg-3 col-sm-6 my-4">
          <h5 class="fw-bold mb-3">Contactanos</h5>
          <div class="social-container">
            <a href="https://github.com/haderrenteria13/ChillClass" class="social-link" target="_blank"></a>
            <a href="https://www.instagram.com/hader_renteria/" class="social-link" target="_blank"></a>
            <a href="mailto:chillclass3@gmail.com" class="social-link"></a>
          </div>
        </div>
        <!--Fin Columna 3-->
      </div>
    </div>
  </footer>
  <!--Fin Footer-->

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  

</body>

</html>