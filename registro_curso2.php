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




$insertar = $conexion->prepare("INSERT INTO persona_curso (cod_curso, id_persona, fecha_registro) VALUES (:codigo, :per, :fecha_fin)");


$insertar->bindParam(':codigo', $vcodigo);
$insertar->bindParam(':per', $vpersona);
$insertar->bindParam(':fecha_fin', $fecha);





$insertar->execute();

header("location: curso_chillclass.php");

}catch (PDOException $e) {
  // Error;
  $error = $e->getCode();

  if ($error == 23000) {
      echo '<script>confirmar=confirm("Ya estás inscrito a este curso");
            if (confirmar)
              window.location.href="registro_curso.php";
            else
              window.location.href="registro_curso.php";</script>';
  } else {
      echo 'Error' . $e->getMessage();
      echo 'Error' . $e->getCode();
      echo "<a href='./insertar_persona_curso.php'>Volver</a>";
  }
}
?>
