<?php
try {
  $conexion = new PDO('mysql:host=localhost;port=3306;dbname=chillclass;', 'root', ''); 
} catch (PDOException $e) {
   echo "Fallo la conexión ".$e->getMessage();
}

try {
    // Variables...
    $vcodigo = filter_var($_POST['codigo']);
    $vdescripcion_academia = filter_var($_POST['descripcion']);
    $vfecha_academia = filter_var($_POST['fecha']);
    $vnombre_academia = filter_var($_POST['nombre']);

    $insertar = $conexion->prepare("INSERT INTO academia (cod_academia, descripcion, fecha_creacion_academia, id_persona) values (:Codigo, :desc, :fecha, :nombre)");

    $insertar->bindParam(':desc', $vdescripcion_academia);
    $insertar->bindParam(':fecha', $vfecha_academia);
    $insertar->bindParam(':nombre', $vnombre_academia);
    $insertar->bindParam(':Codigo', $vcodigo);

    $insertar->execute();

    header("location: academia.php");
} catch (PDOException $e) {
    // Error;
    $error = $e->getCode();

    if ($error == 23000) {
        echo '<script>confirmar=confirm("Ese código de academia ya existe");
              if (confirmar)
                window.location.href="./insertar_academia.php";
              else
                window.location.href="./insertar_academia.php";</script>';
    } else {
        echo 'Error ' . $e->getMessage();
        echo 'Error ' . $e->getCode();
        echo "<a href='./insertar_academia.php'>Volver</a>";
    }
}

?>



