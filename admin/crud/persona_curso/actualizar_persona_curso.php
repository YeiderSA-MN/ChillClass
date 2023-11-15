<?php
try {
  $conexion = new PDO('mysql:host=localhost;port=3306;dbname=chillclass;', 'root', ''); 
 
} catch (PDOException $e) {
   echo "Fallo la conexión ".$e->getMessage();
}


try {
    //Variables...
$vcodigo = filter_var($_POST['curso']);
$vpersona = filter_var($_POST['persona']);
$fecha = filter_var($_POST['fecha']);


$update = $conexion->prepare("UPDATE persona_curso SET fecha_registro = :fech_fin WHERE id_persona = :per AND cod_curso = :codigo");


$update->bindParam(':per', $vpersona);
$update->bindParam(':codigo', $vcodigo);
$update->bindParam(':fech_fin', $fecha);



$update->execute();

header("location: persona_curso.php");

} catch (PDOException $e) {
    //Error;
    echo 'Error' . $e->getMessage();
}
?>



