<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChillClass</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">ChillClass</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Quiénes Somos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contáctanos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./admin/usuario/usuario.php">Login/Regístrate</a>
            </li>
        </ul>
    </div>
</nav>

<!-- Contenido principal -->
<div class="container mt-5">
    <h1>Bienvenido a ChillClass</h1>
    <p>Aquí encontrarás una plataforma educativa innovadora...</p>
</div>

<!-- Cursos favoritos -->
<div class="container mt-5 mb-5">
    <h2>Cursos Favoritos</h2>
    <ul>
        <li>Curso 1</li>
        <li>Curso 2</li>
        <li>Curso 3</li>
    </ul>
</div>

<!--Footer-->
<footer class="d-flex pt-5 pb-0 h-100 footer oscuro">
      <div class="container align-self-center">
        <div class="row mb-3">
          <div class="col-lg-3 col-sm-6 my-4 logo-footer">
            <img src="../assets/img/logo/Logo-colores.svg" alt="" />
          </div>

          <!--Columna 1-->
          <div class="col-lg-3 col-sm-6 my-4">
            <h5 class="fw-bold mb-3">Home</h5>
            <ul class="list-unstyled">
              <li class="mb-1">
                <a href="" class="text-muted text-decoration-none">Sobre Nosotros</a>
              </li>
              <li class="mb-1">
                <a href="" class="text-muted text-decoration-none">Contactanos</a>
              </li>
              <li class="mb-1">
                <a href="" class="text-muted text-decoration-none">Sobre el Proyecto</a>
              </li>
              
            </ul>
          </div>
          <!--Fin Columna 1-->

          <!--Columna 2-->
          <div class="col-lg-3 col-sm-6 my-4">
            <h5 class="fw-bold mb-3">Documentación</h5>
            <ul class="list-unstyled">
              <li class="mb-1">
                <a href="https://docs.google.com/document/d/1sqLwSy_Q5eLTpqxP39eaf5vfEv-BDRwEl8VjLPTVrk0/edit?usp=sharing" class="text-muted text-decoration-none">Ir a Documentación</a>
              </li>
            </ul>
          </div>
          <!--Fin Columna 2-->

          <!--Columna 3-->
          <div class="col-lg-3 col-sm-6 my-4">
            <h5 class="fw-bold mb-3">Contactanos</h5>
            <div class="social-container">
              <a href="https://github.com/haderrenteria13/ChillClass" class="social-link"></a>
              <a href="https://www.instagram.com/hader_renteria/"
                class="social-link"></a>
              <a href="mailto:chillclass3@gmail.com"
                class="social-link"></a>
            </div>
          </div>
          <!--Fin Columna 3-->
        </div>
      </div>
    </footer>
    <!--Fin Footer-->

<!-- Scripts de Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
