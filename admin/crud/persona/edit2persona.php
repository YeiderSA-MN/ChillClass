<?php
try {
  $conexion = new PDO('mysql:host=localhost;port=3306;dbname=chillclass;', 'root', ''); 
 
} catch (PDOException $e) {
   echo "Fallo la conexión ".$e->getMessage();
}


try {
    //Variables...
$vcodigo = filter_var($_POST['codigo']);
$vnombre = filter_var($_POST['nombre']);
$vapellido = filter_var($_POST['apellido']);
$vedad = filter_var($_POST['edad']);
$vcontraseña = filter_var($_POST['contrasena']);
$vgenero = filter_var($_POST['genero']);
$persona = filter_var($_POST['persona']);


$update = $conexion->prepare("UPDATE persona SET nombre = :name, apellido=:ape, edad = :ed, contrasena=:cont, cod_genero=:gen, tipo_persona=:per 
  WHERE id_persona = :Codigo");


$update->bindParam(':name', $vnombre);
$update->bindParam(':ape', $vapellido);
$update->bindParam(':ed', $vedad);
$update->bindParam(':cont', $vcontraseña);
$update->bindParam(':gen', $vgenero);
$update->bindParam(':per', $persona);
$update->bindParam(':Codigo', $vcodigo);



$update->execute();

header("location: persona-1.php");

} catch (PDOException $e) {
    //Error;
    echo 'Error' . $e->getMessage();
}
?>



