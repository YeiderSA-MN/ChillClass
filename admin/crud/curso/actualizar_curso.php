<?php
try {
  $conexion = new PDO('mysql:host=localhost;port=3306;dbname=chillclass;', 'root', ''); 
 
} catch (PDOException $e) {
   echo "Fallo la conexión ".$e->getMessage();
}


try {
    //Variables...
$vcodigo = filter_var($_POST['codigo']);
$descripcion = filter_var($_POST['descripcion']);
$academia = filter_var($_POST['academia']);
$creacion = filter_var($_POST['creacion']);
$duracion = filter_var($_POST['duracion']);
$tematica = filter_var($_POST['tematica']);
$estado = filter_var($_POST['estado']);
$video = filter_var($_POST['video']);



$update = $conexion->prepare("UPDATE curso SET descripcion=:desc, cod_academia = :academia, fecha_creacion=:creacion, duracion_curso = :duracion, cod_tematica=:tematica, cod_estado=:estado, video=:video
  WHERE cod_curso = :Codigo");


$update->bindParam(':desc', $descripcion);
$update->bindParam(':academia', $academia);
$update->bindParam(':creacion', $creacion);
$update->bindParam(':duracion', $duracion);
$update->bindParam(':tematica', $tematica);
$update->bindParam(':estado', $estado);
$update->bindParam(':video', $video);
$update->bindParam(':Codigo', $vcodigo);



$update->execute();

header("location: curso.php");

} catch (PDOException $e) {
    //Error;
    echo 'Error' . $e->getMessage();
}
?>



