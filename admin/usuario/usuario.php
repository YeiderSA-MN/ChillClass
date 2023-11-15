<!DOCTYPE html>
<html lang="es">

<head>
  <!--Meta Tags-->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Fin Meta Tags-->
  <!--Descripcion-->
  <title>ChillClass 📚 | Inicia Sesión</title>
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
        ¿No tienes Cuenta? <a href="../../admin/usuario/registro.php" class="tx-azul">Crea una</a>
      </span>
    </div>
  </nav>
  <!--Fin Nav-->

  <!--Login-->
  <section class="m-5">
    <div class="container margin-login">
      <!-- row -->
      <div class="row justify-content-center align-items-center">
        <div class="col-12 col-md-6 col-lg-4 order-lg-1 order-2">
          <!-- img -->
          <img src="../../assets/img/imagenes/inicia.png" alt="" class="img-fluid">
        </div>
        <!-- col -->
        <div class="col-12 col-md-6 offset-lg-1 col-lg-4 order-lg-2">
          <div class="mb-lg-9 mb-3">
            <h1 class="mb-1 tx-blanco fw-bold">Inicie Sesión</h1>
            <p class="text-muted">Bienvenido de nuevo a ChillClass! Ingrese su correo electrónico para comenzar.</p>
          </div>

          <form id="miforma" action="usuario.php" method="GET">
            <div class="row g-3">
              <!-- row -->

              <div class="col-12">
                <!-- input -->
                <input type="text" class="form-control" id="username" name="username" placeholder="Identificador" required>
              </div>
              <div class="col-12">
                <!-- input -->
                <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Contraseña" required>
              </div>
              <!-- btn -->
              <div class="col-12 d-grid">
                <button type="submit" class="btn btn-primary fw-bold">iniciar Sesión</button>
              </div>
              <!-- link -->
              <div class="tx-blanco">¿No tienes Cuenta? <a href="registro.php" class="tx-azul"> Crea una</a></div>
              </div>
              <!-- link -->
              <div class="tx-blanco"><a href="../../index_persona.php" class="tx-azul"> Volver</a> al Home</div>
            </div>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </section>
  <!--Fin Login-->

  <!-- PHP -->
  <?php
  if (!empty($_GET['username']) && !empty($_GET['pwd'])) {
    // Definición de las credenciales de la base de datos
    $mysql_host = 'localhost';
    $mysql_user = 'root';
    $password = '';

    // Intento de conexión a la base de datos MySQL
    $dbhandle = mysqli_connect($mysql_host, $mysql_user, $password) or die('Problemas de conexión BD');

    // Selección de la base de datos 'chillclass'
    $selected = mysqli_select_db($dbhandle, 'chillclass') or die('No se encontró el esquema');

    // Recogida de los valores de usuario y contraseña desde la URL
    $vusuario = $_GET['username'];
    $vclave = $_GET['pwd'];

    // Construcción de la consulta SQL para verificar las credenciales
    $query = "SELECT id_persona, nombre, apellido, contrasena, tipo_persona FROM persona WHERE id_persona = '$vusuario' AND contrasena = '$vclave'";

    // Ejecución de la consulta
    $result = mysqli_query($dbhandle, $query) or die(mysqli_error($dbhandle));

    // Contar el número de registros encontrados
    $vregistros = mysqli_num_rows($result);

    // Obtener la primera fila de resultados
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if ($vregistros > 0) {
      // Iniciar una sesión y almacenar información sobre el usuario
      session_start();
      $_SESSION['id'] = $row['id_persona'];
      $_SESSION['usuario'] = $row['nombre'];
      $_SESSION['tipo_persona'] = $row['tipo_persona'];

      // Redirigir al usuario a diferentes páginas según su tipo de persona
      if ($row['tipo_persona'] == '01') {
          $redirect = '../../admin/crud/index.php';
      } elseif ($row['tipo_persona'] == '02') {
          $redirect = '../../index_profesor.php';
      } else {
          $redirect = '../../index_persona.php'; // Cambia 'otra_pagina.php' por la página a la que quieras redirigir
      }
      
      header("Location: $redirect");
      exit();
      
    } else {
      // Mostrar un mensaje de error si las credenciales son incorrectas utilizando la biblioteca Swal (SweetAlert) de JavaScript
      echo "
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Usuario o contraseña incorrectos'
            });
        </script>";
    }
  }
  ?>
  <!-- PHP -->

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

</body>

</html>