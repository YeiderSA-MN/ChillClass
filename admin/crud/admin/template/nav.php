<!DOCTYPE html>
<html lang="es">

<head>
    <!--Meta Tags-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Fin Meta Tags-->
    <!--Descripcion-->
    <title>ChillClass 📚 | Administrador</title>
    <link rel="shortcut icon" href="./assets/img/logo/Logo-colores.svg" type="image/x-icon">
    <!--Fin Descripcion-->
    <!--Links CSS-->
    <link rel="stylesheet" href="../../assets/styles/normalize.css">
    <link rel="stylesheet" href="../../assets/styles/styles.css">
    <!--Fin Links CSS-->
    <!--Links Bootstrap CSS-->
    <link rel="stylesheet" href="../../assets/styles/bootstrap.css">
    <!--Fin Links Bootstrap CSS-->
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <!--Fin Google Fonts-->
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!--Fin Font Awesome-->
</head>

<body class="oscuro">
    <!--Nav-->
    <nav class="navbar sticky-top navbar-expand-lg oscuro shadow">
        <div class="container">
            <a class="navbar-brand fw-bold tx-azul" href="../src/index.html">
                <img src="../../assets/styles/bootstrap.css" alt="Bootstrap" width="85" height="85">
                | &nbsp;Administrador
            </a>
            <!--Responsive Nav-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!--Fin Responsive Nav-->
            <div class="collapse navbar-collapse justify-content-end text-center" id="navbarNavAltMarkup">
                <ul class="navbar-nav menu justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link tx-azul fw-bold" href="../src/admin.html">Inicio</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link fw-bold tx-azul dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Administrador
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Foros</a></li>
                            <li><a class="dropdown-item" href="">Cursos</a></li>
                            <div class="container">
                                <hr>
                            </div>
                            <li><a class="dropdown-item text-danger fw-bold" href="../src/index.html"><i class="fa fa-sign-out"></i> Salir</a></li>
                        </ul>
                    </li>

                </ul>
                <a href="../src/index.html" class="btn btn-secondary fw-bold">Ver Pagina Web</a>
            </div>
        </div>
    </nav>
    <!--Fin Nav-->