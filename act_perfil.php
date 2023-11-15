<?php

session_start();
$usuario = $_SESSION['id'];

try {
  $conexion = new PDO('mysql:host=localhost;port=3306;dbname=chillclass;', 'root', ''); 
 
} catch (PDOException $e) {
   echo "Fallo la conexión ".$e->getMessage();
}


try {
    //Variables...
$vnombre = filter_var($_POST['nombre']);
$vapellido = filter_var($_POST['apellido']);
$vedad = filter_var($_POST['edad']);
$vcontraseña = filter_var($_POST['contrasena']);
$vgenero = filter_var($_POST['genero']);



$update = $conexion->prepare("UPDATE persona SET nombre = :name, apellido=:ape, edad = :ed, contrasena=:cont, cod_genero=:gen WHERE id_persona = :usuario");

$update->bindParam(':name', $vnombre);
$update->bindParam(':ape', $vapellido);
$update->bindParam(':ed', $vedad);
$update->bindParam(':cont', $vcontraseña);
$update->bindParam(':gen', $vgenero);
$update->bindParam(':usuario', $usuario); // Asegúrate de tener $usuario definido

$update->execute();






header("location: profile.php");

} catch (PDOException $e) {
    //Error;
    echo 'Error' . $e->getMessage();
}
?>



