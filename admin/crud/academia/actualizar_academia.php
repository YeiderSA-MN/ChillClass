<?php
try {
  $conexion = new PDO('mysql:host=localhost;port=3306;dbname=chillclass;', 'root', ''); 
 
} catch (PDOException $e) {
   echo "Fallo la conexión ".$e->getMessage();
}


try {
    //Variables...
$vcodigo = filter_var($_POST['codigo']);
$vdescripcion_academia = filter_var($_POST['descripcion']);
$vfecha_academia = filter_var($_POST['fecha']);
$vnombre_academia = filter_var($_POST['nombre']);


$update = $conexion->prepare("UPDATE academia SET descripcion= :desc, fecha_creacion_academia= :fecha, id_persona= :nombre WHERE cod_academia = :Codigo");


$update->bindParam(':desc', $vdescripcion_academia);
$update->bindParam(':fecha', $vfecha_academia);
$update->bindParam(':nombre', $vnombre_academia);
$update->bindParam(':Codigo', $vcodigo);




$update->execute();

header("location: academia.php");

} catch (PDOException $e) {
    //Error;
    echo 'Error' . $e->getMessage();
}
?>



