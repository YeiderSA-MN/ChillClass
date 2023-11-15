<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChillClass 📚 | Presentación del Quiz</title>
    <link rel="shortcut icon" href="./assets/img/logo/Logo-colores.svg" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <!-- Links CSS -->
    <link rel="stylesheet" href="./assets/styles/normalize.css">
    <link rel="stylesheet" href="./assets/styles/styles.css">
    <!-- Links Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/libs/node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .modal-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }
        /* Agrega estilos de movimiento de burbuja */
        .move-bubble {
            animation: moveBubble 2s linear infinite;
        }
        @keyframes moveBubble {
            0% {
                transform: translate(0, 0);
            }
            50% {
                transform: translate(0, -10px);
            }
            100% {
                transform: translate(0, 0);
            }
        }
    </style>
</head>
<body class="oscuro tx-blanco">
<?php
    $mysql_host = 'localhost';
    // user name es root
    $mysql_user = 'root';
    $password = '';

    // Esta es la función para conectarse usando el usuario y el password

    $dbhandle = mysqli_connect($mysql_host, $mysql_user, $password) or die('Problemas de conexión con BD');

    $selected = mysqli_select_db($dbhandle, 'chillclass') or die("No se encontró el esquema");

    if (empty($_POST['Pr1'])) {
        $resp1 = 0;
    } else {
        $resp1 = filter_var($_POST['Pr1']);
    }
    if (empty($_POST['Pr2'])) {
        $resp2 = 0;
    } else {
        $resp2 = filter_var($_POST['Pr2']);
    }
    if (empty($_POST['Pr3'])) {
        $resp3 = 0;
    } else {
        $resp3 = filter_var($_POST['Pr3']);
    }
    if (empty($_POST['Pr4'])) {
        $resp4 = 0;
    } else {
        $resp4 = filter_var($_POST['Pr4']);
    }
    if (empty($_POST['Pr5'])) {
        $resp5 = 0;
    } else {
        $resp5 = filter_var($_POST['Pr5']);
    }
    if (empty($_POST['Pr6'])) {
        $resp6 = 0;
    } else {
        $resp6 = filter_var($_POST['Pr6']);
    }
    if (empty($_POST['Pr7'])) {
        $resp7 = 0;
    } else {
        $resp7 = filter_var($_POST['Pr7']);
    }
    if (empty($_POST['Pr8'])) {
        $resp8 = 0;
    } else {
        $resp8 = filter_var($_POST['Pr8']);
    }
    if (empty($_POST['Pr9'])) {
        $resp9 = 0;
    } else {
        $resp9 = filter_var($_POST['Pr9']);
    }
    if (empty($_POST['Pr10'])) {
        $resp10 = 0;
    } else {
        $resp10 = filter_var($_POST['Pr10']);
    }

    $quiz_presentar = $_POST['cod_quiz'];
    $result = mysqli_query($dbhandle, "select respuesta_correcta FROM quiz where cod_quiz ='" . $quiz_presentar . "' ") or die(mysqli_error($dbhandle));

    $cont = 0;
    $i = 1;
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        if ($i == 1) {
            if ($resp1 == $row['respuesta_correcta']) {
                $cont++;
            }
            if ($resp1 != $row['respuesta_correcta']) {
                $cont = $cont - 0;
            }
        }

        if ($i == 2) {
            if ($resp2 == $row['respuesta_correcta']) {
                $cont++;
            }
            if ($resp2 != $row['respuesta_correcta']) {
                $cont = $cont - 0;
            }
        }

        if ($i == 3) {
            if ($resp3 == $row['respuesta_correcta']) {
                $cont++;
            }
            if ($resp3 != $row['respuesta_correcta']) {
                $cont = $cont - 0;
            }
        }

        if ($i == 4) {
            if ($resp4 == $row['respuesta_correcta']) {
                $cont++;
            }
            if ($resp4 != $row['respuesta_correcta']) {
                $cont = $cont - 0;
            }
        }

        if ($i == 5) {
            if ($resp5 == $row['respuesta_correcta']) {
                $cont++;
            }
            if ($resp5 != $row['respuesta_correcta']) {
                $cont = $cont - 0;
            }
        }

        if ($i == 6) {
            if ($resp6 == $row['respuesta_correcta']) {
                $cont++;
            }
            if ($resp6 != $row['respuesta_correcta']) {
                $cont = $cont - 0;
            }
        }

        if ($i == 7) {
            if ($resp7 == $row['respuesta_correcta']) {
                $cont++;
            }
            if ($resp7 != $row['respuesta_correcta']) {
                $cont = $cont - 0;
            }
        }

        if ($i == 8) {
            if ($resp8 == $row['respuesta_correcta']) {
                $cont++;
            }
            if ($resp8 != $row['respuesta_correcta']) {
                $cont = $cont - 0;
            }
        }

        if ($i == 9) {
            if ($resp9 == $row['respuesta_correcta']) {
                $cont++;
            }
            if ($resp9 != $row['respuesta_correcta']) {
                $cont = $cont - 0;
            }
        }

        if ($i == 10) {
            if ($resp10 == $row['respuesta_correcta']) {
                $cont++;
            }
            if ($resp10 != $row['respuesta_correcta']) {
                $cont = $cont - 0;
            }
        }
        $i++;
    }
    ?>
    <div class="container">
        <h1 class="mt-5 text-center fw-bold display-3">Resultados del Quiz:</h1>
        <div class="modal-container ">
            <?php
            echo '<h1 class="display-4 fw-bold tx-azul">' . $cont . '</h1>';
            if ($cont == 10) {
                echo '<img src="./assets/img/quiz/si.png" alt="" class="mt-5 img-fluid move-bubble card shadow oscuro">';
                echo '<h1 class="tx-blanco">¡Felicidades!</h1>';
            } else if ($cont >=6 and $cont <=9) {
                echo '<img src="./assets/img/quiz/bueno.png" alt="" class="mt-5 img-fluid move-bubble card shadow oscuro">';
                echo '<h2 class="tx-blanco">No estás mal, pero podrías mejorar.</h2>';
            } else {
                echo '<img class="mt-5 img-fluid move-bubble card shadow oscuro" src="./assets/img/quiz/no.png" height="200px" width="200px" alt=""> ';
                echo '<div>';
                echo '<h2 class="tx-blanco text-center">Parece que todavía te hace falta aprender un poco más, ¡mejora tus conocimientos <a href="curso_chillclass.php" class="tx-azul fw-bold">aquí!</a></h2>';
                echo '</div>';
            }
            ?>
        </div>
        <div class="text-center mt-5">
            <a href="presentar_chillclass.php" class="btn btn-primary fw-bold"><span class="bi bi-arrow-left"></span> Regresar</a>
        </div>
    </div>
    <!-- JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="./assets/libs/node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>
</html>