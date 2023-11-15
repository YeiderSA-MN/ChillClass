<?php
try {
  $conexion = new PDO('mysql:host=localhost;port=3306;dbname=chillclass;', 'root', ''); 
 
} catch (PDOException $e) {
   echo "Fallo la conexión ".$e->getMessage();
}


try {
    //Variables...
$vcodigo = filter_var($_POST['codigo']);
$vdescripcion_tematica = filter_var($_POST['descripcion']);



$update = $conexion->prepare("UPDATE tematica SET descripcion= :desc WHERE cod_tematica = :Codigo");


$update->bindParam(':desc', $vdescripcion_tematica);
$update->bindParam(':Codigo', $vcodigo);




$update->execute();

header("location: tematica.php");

} catch (PDOException $e) {
    //Error;
    echo 'Error' . $e->getMessage();
}
?>



