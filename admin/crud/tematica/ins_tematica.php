<?php
try {
  $conexion = new PDO('mysql:host=localhost;port=3306;dbname=chillclass;', 'root', ''); 
 
} catch (PDOException $e) {
   echo "Fallo la conexión ".$e->getMessage();
}


try {
    // Variables...
    $vcodigo = filter_var($_POST['codigo']);
    $vdescripcion_tematica = filter_var($_POST['descripcion']);

    $insertar = $conexion->prepare("INSERT INTO tematica (cod_tematica, descripcion) VALUES (:Codigo, :desc)");

    $insertar->bindParam(':desc', $vdescripcion_tematica);
    $insertar->bindParam(':Codigo', $vcodigo);

    $insertar->execute();

    header("location: tematica.php");

} catch (PDOException $e) {
    // Error;
    $error = $e->getCode();

    if ($error == 23000) {
        echo '<script>confirmar=confirm("Ese código de temática ya existe");
              if (confirmar)
                window.location.href="./insertar_tematica.php";
              else
                window.location.href="./insertar_tematica.php";</script>';
    } else {
        echo 'Error' . $e->getMessage();
        echo 'Error' . $e->getCode();
        echo "<a href='./insertar_tematica.php'>Volver</a>";
    }
}
?>




