<?php
try {
  $conexion = new PDO('mysql:host=localhost;port=3306;dbname=chillclass;', 'root', ''); 
 
} catch (PDOException $e) {
   echo "Fallo la conexión ".$e->getMessage();
}


try {
    // Variables...
    $vcodigo = filter_var($_POST['codigo']);
    $descripcion = filter_var($_POST['descripcion']);
    $academia = filter_var($_POST['academia']);
    $creacion = filter_var($_POST['creacion']);
    $duracion = filter_var($_POST['duracion']);
    $tematica = filter_var($_POST['tematica']);
    $estado = filter_var($_POST['estado']);

    $insertar = $conexion->prepare("INSERT INTO curso (cod_curso, descripcion, cod_academia, fecha_creacion, duracion_curso, cod_tematica, cod_estado) VALUES (:Codigo, :desc, :academia, :creacion, :duracion, :tematica, :estado)");

    $insertar->bindParam(':academia', $academia);
    $insertar->bindParam(':desc', $descripcion);
    $insertar->bindParam(':creacion', $creacion);
    $insertar->bindParam(':duracion', $duracion);
    $insertar->bindParam(':tematica', $tematica);
    $insertar->bindParam(':estado', $estado);
    $insertar->bindParam(':Codigo', $vcodigo);

    $insertar->execute();

    header("location: curso.php");

} catch (PDOException $e) {
    // Error;
    $error = $e->getCode();

    if ($error == 23000) {
        echo '<script>confirmar=confirm("Ese código de curso ya existe");
        if (confirmar)
                window.location.href="./insertar_curso.php";
              else
                window.location.href="./insertar_curso.php";</script>';
    } else {
        echo 'Error' . $e->getMessage();
        echo 'Error' . $e->getCode();
        echo "<a href='./insertar_curso.php'>Volver</a>";
    }
}
