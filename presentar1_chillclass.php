<?php
session_start();
$usuario = $_SESSION['id'];
?>

<!DOCTYPE html>
<html>

<head>
  <!-- Meta Tags -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Fin Meta Tags -->

  <!-- Descripción -->
  <title>ChillClass 📚 | Presentación del Quiz</title>
  <link rel="shortcut icon" href="./assets/img/logo/Logo-colores.svg" type="image/x-icon">
  <link rel="shortcut icon" href="./assets/img/logo/Logo-colores.svg" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
  <!-- Fin Descripción -->

  <!-- Links CSS -->
  <link rel="stylesheet" href="./assets/styles/normalize.css">
  <link rel="stylesheet" href="./assets/styles/styles.css">
  <!-- Fin Links CSS -->

  <!-- Links Bootstrap CSS -->
  <link rel="stylesheet" href="./assets/libs/node_modules/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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

  <style>
    .forma {
      width: 80%;
      margin: auto;
      margin-top: 30px;
    }
  </style>
</head>

<body class="oscuro">
  <form class="forma formulario offset-6 " name="forma" action="respuesta_chillclass.php" method="POST">
    <a href="Presentar_chillclass.php" class="regresar_1 btn btn-primary mb-4">
      <span class="bi bi-arrow-left"></span> Regresar
    </a>

    <?php

    // Este script es para conectarme a la BD
    // Los datos se traen del servidor local
    $mysql_host = 'localhost';
    // user name es root
    $mysql_user = 'root';
    $password = '';

    // Esta es la función para conectarse usando el usuario y el password

    $dbhandle = mysqli_connect($mysql_host, $mysql_user, $password) or die('Problemas de conexión con BD');


    $selected = mysqli_select_db($dbhandle, 'chillclass') or die("No se encontró el esquema");


    $a = 1;

    //Aqui reviso si hay una categoria/region escogida
    $quiz_presentar = $_GET['cod_quiz'];

    $result = mysqli_query($dbhandle, "SELECT a.cod_quiz, a.titulo, a.cod_pregunta, a.pregunta, a.A, a.B, a.C, a.respuesta_correcta, a.cod_curso, b.descripcion FROM quiz a, curso b WHERE a.cod_curso = b.cod_curso and a.cod_quiz ='" . $quiz_presentar . "'  order by a.cod_quiz") or die(mysqli_error($dbhandle));




    $i = 1;



    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {


      if ($i == 1) {

        echo "<h1 class='mt-md-5 tx-azul  fw-bold col-sm-10' style='margin-top: 50px;' >Estás presentando el  " . $row['titulo'] . ".</h1>";
        echo "<h4 class='tx-blanco'> El código del curso es: " . $row['cod_curso'] . "      " . $row['descripcion'] . "     </h4>";

        echo '<p class="mt-sm-5 tx-rosado fw-bold text-uppercase"> Pregunta ' . $row['cod_pregunta'] . ' - ' . $row['pregunta'] . '    :</p>';


        echo '<input class="form-check-input " type="radio" id="Pr1" name="Pr1" value="A">';
        echo '<label class="form-check-label tx-blanco ms-sm-3 " for="A">A. ' . $row['A'] . ' </label><br><br>';

        echo '<input class="form-check-input" type="radio" id="Pr1" name="Pr1" value="B">';
        echo '<label class="form-check-label tx-blanco ms-sm-3" for="B">B. ' . $row['B'] . ' </label><br><br>';

        echo '<input class="form-check-input" type="radio" id="Pr1" name="Pr1" value="C">';
        echo '<label class="form-check-label tx-blanco ms-sm-3" for="C">C. ' . $row['C'] . ' </label><br><br><br>';



        echo "<input type='hidden' id='tipo' name='cod_quiz' value=" . $quiz_presentar . ">";
      }

      if ($i == 2) {

        echo '<p class="mt-sm-5 tx-rosado fw-bold text-uppercase"> Pregunta ' . $row['cod_pregunta'] . ' - ' . $row['pregunta'] . '    :</p>';


        echo '<input class="form-check-input" type="radio" id="Pr2" name="Pr2" value="A">';
        echo '<label class="form-check-label tx-blanco ms-sm-3" for="A">A. ' . $row['A'] . ' </label><br><br>';

        echo '<input class="form-check-input" type="radio" id="Pr2" name="Pr2" value="B">';
        echo '<label class="form-check-label tx-blanco ms-sm-3" for="B">B. ' . $row['B'] . ' </label><br><br>';

        echo '<input class="form-check-input" type="radio" id="Pr2" name="Pr2" value="C">';
        echo '<label class="form-check-label tx-blanco ms-sm-3" for="C">C. ' . $row['C'] . ' </label><br><br><br>';


        echo "<input type='hidden' id='tipo' name='cod_quiz' value=" . $quiz_presentar . ">";
      }

      if ($i == 3) {

        echo '<p class="mt-sm-5 tx-rosado fw-bold text-uppercase"> Pregunta ' . $row['cod_pregunta'] . ' - ' . $row['pregunta'] . '    :</p>';


        echo '<input class="form-check-input" type="radio" id="Pr3" name="Pr3" value="A">';
        echo '<label class="form-check-label tx-blanco ms-sm-3" for="A">A. ' . $row['A'] . ' </label><br><br>';

        echo '<input class="form-check-input" type="radio" id="Pr3" name="Pr3" value="B">';
        echo '<label class="form-check-label tx-blanco ms-sm-3" for="B">B. ' . $row['B'] . ' </label><br><br>';

        echo '<input class="form-check-input" type="radio" id="Pr3" name="Pr3" value="C">';
        echo '<label class="form-check-label tx-blanco ms-sm-3 justify" for="C">C. ' . $row['C'] . ' </label><br><br><br>';


        echo "<input type='hidden' id='tipo' name='cod_quiz' value=" . $quiz_presentar . ">";
      }

      if ($i == 4) {

        echo '<p class="mt-sm-5 tx-rosado fw-bold text-uppercase"> Pregunta ' . $row['cod_pregunta'] . ' - ' . $row['pregunta'] . '    :</p>';


        echo '<input class="form-check-input" type="radio" id="Pr4" name="Pr4" value="A">';
        echo '<label class="form-check-label tx-blanco ms-sm-3" for="A">A. ' . $row['A'] . ' </label><br><br>';

        echo '<input class="form-check-input" type="radio" id="Pr4" name="Pr4" value="B">';
        echo '<label class="form-check-label tx-blanco ms-sm-3" for="B">B. ' . $row['B'] . ' </label><br><br>';

        echo '<input class="form-check-input" type="radio" id="Pr4" name="Pr4" value="C">';
        echo '<label class="form-check-label tx-blanco ms-sm-3" for="C">C. ' . $row['C'] . ' </label><br><br><br>';



        echo "<input type='hidden' id='tipo' name='cod_quiz' value=" . $quiz_presentar . ">";
      }

      if ($i == 5) {

        echo '<p class="mt-sm-5 tx-rosado fw-bold text-uppercase"> Pregunta ' . $row['cod_pregunta'] . ' - ' . $row['pregunta'] . '    :</p>';


        echo '<input class="form-check-input" type="radio" id="Pr5" name="Pr5" value="A">';
        echo '<label class="form-check-label tx-blanco ms-sm-3" for="A">A. ' . $row['A'] . ' </label><br><br>';

        echo '<input class="form-check-input" type="radio" id="Pr5" name="Pr5" value="B">';
        echo '<label class="form-check-label tx-blanco ms-sm-3" for="B">B. ' . $row['B'] . ' </label><br><br>';

        echo '<input class="form-check-input" type="radio" id="Pr5" name="Pr5" value="C">';
        echo '<label class="form-check-label tx-blanco ms-sm-3" for="C">C. ' . $row['C'] . ' </label><br><br><br>';



        echo "<input type='hidden' id='tipo' name='cod_quiz' value=" . $quiz_presentar . ">";
      }

      if ($i == 6) {

        echo '<p class="mt-sm-5 tx-rosado fw-bold text-uppercase"> Pregunta ' . $row['cod_pregunta'] . ' - ' . $row['pregunta'] . '    :</p>';


        echo '<input class="form-check-input" type="radio" id="Pr6" name="Pr6" value="A">';
        echo '<label class="form-check-label tx-blanco ms-sm-3" for="A">A. ' . $row['A'] . ' </label><br><br>';

        echo '<input class="form-check-input" type="radio" id="Pr6" name="Pr6" value="B">';
        echo '<label class="form-check-label tx-blanco ms-sm-3" for="B">B. ' . $row['B'] . ' </label><br><br>';

        echo '<input class="form-check-input" type="radio" id="Pr6" name="Pr6" value="C">';
        echo '<label class="form-check-label tx-blanco ms-sm-3" for="C">C. ' . $row['C'] . ' </label><br>';



        echo "<input type='hidden' id='tipo' name='cod_quiz' value=" . $quiz_presentar . ">";
      }

      if ($i == 7) {

        echo '<p class="mt-sm-5 tx-rosado fw-bold text-uppercase"> Pregunta ' . $row['cod_pregunta'] . ' - ' . $row['pregunta'] . '    :</p>';


        echo '<input class="form-check-input" type="radio" id="Pr7" name="Pr7" value="A">';
        echo '<label class="form-check-label tx-blanco ms-sm-3" for="A">A. ' . $row['A'] . ' </label><br><br>';

        echo '<input class="form-check-input" type="radio" id="Pr7" name="Pr7" value="B">';
        echo '<label class="form-check-label tx-blanco ms-sm-3" for="B">B. ' . $row['B'] . ' </label><br><br>';

        echo '<input class="form-check-input" type="radio" id="Pr7" name="Pr7" value="C">';
        echo '<label class="form-check-label tx-blanco ms-sm-3" for="C">C. ' . $row['C'] . ' </label><br>';



        echo "<input type='hidden' id='tipo' name='cod_quiz' value=" . $quiz_presentar . ">";
      }

      if ($i == 8) {

        echo '<p class="mt-sm-5 tx-rosado fw-bold text-uppercase"> Pregunta ' . $row['cod_pregunta'] . ' - ' . $row['pregunta'] . '    :</p>';


        echo '<input class="form-check-input" type="radio" id="Pr8" name="Pr8" value="A">';
        echo '<label class="form-check-label tx-blanco ms-sm-3" for="A">A. ' . $row['A'] . ' </label><br><br>';

        echo '<input class="form-check-input" type="radio" id="Pr8" name="Pr8" value="B">';
        echo '<label class="form-check-label tx-blanco ms-sm-3" for="B">B. ' . $row['B'] . ' </label><br><br>';

        echo '<input class="form-check-input" type="radio" id="Pr8" name="Pr8" value="C">';
        echo '<label class="form-check-label tx-blanco ms-sm-3" for="C">C. ' . $row['C'] . ' </label><br>';



        echo "<input type='hidden' id='tipo' name='cod_quiz' value=" . $quiz_presentar . ">";
      }

      if ($i == 9) {

        echo '<p class="mt-sm-5 tx-rosado fw-bold text-uppercase"> Pregunta ' . $row['cod_pregunta'] . ' - ' . $row['pregunta'] . '    :</p>';


        echo '<input class="form-check-input" type="radio" id="Pr9" name="Pr9" value="A">';
        echo '<label class="form-check-label tx-blanco ms-sm-3" for="A">A. ' . $row['A'] . ' </label><br><br>';

        echo '<input class="form-check-input" type="radio" id="Pr9" name="Pr9" value="B">';
        echo '<label class="form-check-label tx-blanco ms-sm-3" for="B">B. ' . $row['B'] . ' </label><br><br>';

        echo '<input class="form-check-input" type="radio" id="Pr9" name="Pr9" value="C">';
        echo '<label class="form-check-label tx-blanco ms-sm-3" for="C">C. ' . $row['C'] . ' </label><br>';



        echo "<input type='hidden' id='tipo' name='cod_quiz' value=" . $quiz_presentar . ">";
      }

      if ($i == 10) {

        echo '<p class="mt-sm-5 tx-rosado fw-bold text-uppercase"> Pregunta ' . $row['cod_pregunta'] . ' - ' . $row['pregunta'] . '    :</p>';


        echo '<input class="form-check-input" type="radio" id="Pr10" name="Pr10" value="A">';
        echo '<label class="form-check-label tx-blanco ms-sm-3" for="A">A. ' . $row['A'] . ' </label><br><br>';

        echo '<input class="form-check-input" type="radio" id="Pr10" name="Pr10" value="B">';
        echo '<label class="form-check-label tx-blanco ms-sm-3" for="B">B. ' . $row['B'] . ' </label><br><br>';

        echo '<input class="form-check-input" type="radio" id="Pr10" name="Pr10" value="C">';
        echo '<label class="form-check-label tx-blanco ms-sm-3" for="C">C. ' . $row['C'] . ' </label><br>';



        echo "<input type='hidden' id='tipo' name='cod_quiz' value=" . $quiz_presentar . ">";
      }



      $i = $i + 1;
    }

    ?>
    <div class="text-center">
      <input type="submit" class="btn btn-secondary mt-sm-5" value="Enviar respuesta"><br><br><br>
    </div>
  </form>

  <!--JavaScript-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <!--Fin JavaScript-->
  <!--Bootstrap JavaScript-->
  <script src="./assets/libs/node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
  <!--Fin Bootstrap JavaScript-->

</body>

</html>