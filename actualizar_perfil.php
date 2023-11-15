<?php
session_start();
$usuario = $_SESSION['id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fin Meta Tags -->
    <!-- Descripción -->
    <title>ChillClass 📚 | Inicia Sesión</title>
    <link rel="shortcut icon" href="./assets/img/logo/Logo-colores.svg" type="image/x-icon">
    <!-- Fin Descripción -->
    <!-- Links CSS -->
    <link rel="stylesheet" href="./assets/styles/normalize.css">
    <link rel="stylesheet" href="./assets/styles/styles.css">
    <!-- Fin Links CSS -->
    <!-- Links Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/libs/node_modules/bootstrap/dist/css/bootstrap.css">
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
<body>
<div class="container mt-5">
  <form action="act_perfil.php" method="POST">

    <?php
      try {
        $conexion = new PDO('mysql:host=localhost;port=3306;dbname=chillclass;', 'root', ''); 
      } catch (PDOException $e) {
         echo "Fallo la conexión ".$e->getMessage();
      }

      try {
        $persona = $conexion->query("select a.id_persona, a.nombre, a.apellido, a.edad, a.contrasena, b.cod_genero, b.descripcion descripcion_1 FROM persona a, genero b where a.cod_genero= b.cod_genero and id_persona='".$usuario."'");
        $persona->setFetchMode(PDO::FETCH_ASSOC);
        $row = $persona->fetch();
        $vnombre=$row['nombre'];
        $vapellido=$row['apellido'];
        $vedad=$row['edad'];
        $vcontraseña=$row['contrasena'];
        $vgenero=$row['descripcion_1'];
      } catch (PDOException $e) {
        echo 'Error' . $e->getMessage();
      }


      

      try {
          $consulta = $conexion->query("select cod_genero, descripcion from genero");
          $consulta->setFetchMode(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
          echo $e->getMessage();
       }
    ?>


    <div class="mb-3">
      <label for="nombre" class="form-label">Nombre</label>
      <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $vnombre; ?>">
    </div>
    <div class="mb-3">
      <label for="apellido" class="form-label">Apellido</label>
      <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $vapellido; ?>">
    </div>
    <div class="mb-3">
      <label for="edad" class="form-label">Edad</label>
      <input type="text" class="form-control" id="edad" name="edad" value="<?php echo $vedad; ?>">
    </div>
    <div class="mb-3">
      <label for="contraseña" class="form-label">Contraseña</label>
      <input type="text" class="form-control" id="contraseña" name="contrasena" value="<?php echo $vcontraseña; ?>">
    </div>
    <div class="mb-3">
        <label for="genero" class="form-label">Genero</label>
        <select id="genero" name="genero" class="form-select">
            <?php
                while ($row = $consulta->fetch()) {
                    if ($vgenero == $row['cod_genero']) {
                        echo "<option value=".$row['cod_genero']." selected>".$row['descripcion']."</option>";
                    } else {
                        echo "<option value=".$row['cod_genero'].">".$row['descripcion']."</option>";
                    }
                }
            ?>
      </select>
    <input type="submit" class="btn btn-primary mt-4" value="Actualizar Perfil">
    <a href="profile.php" class="btn btn-secondary mt-4">Volver</a>


 </form>

</div>
</body>
</html>

