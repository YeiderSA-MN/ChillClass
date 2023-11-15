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


$insertar = $conexion->prepare("insert into persona (id_persona, nombre, apellido, edad, contrasena, cod_genero, tipo_persona)
values (:Codigo, :name, :ape, :ed, :cont, :gen, :per)");


$insertar->bindParam(':name', $vnombre);
$insertar->bindParam(':ape', $vapellido);
$insertar->bindParam(':ed', $vedad);
$insertar->bindParam(':cont', $vcontraseña);
$insertar->bindParam(':gen', $vgenero);
$insertar->bindParam(':per', $persona);
$insertar->bindParam(':Codigo', $vcodigo);



$insertar->execute();

header("location: usuario.php");

} catch (PDOException $e) {
  // Error;
  $error = $e->getCode();

  if ($error == 23000) {
      echo '<script>confirmar=confirm("Ese código de persona ya existe");
            if (confirmar)
              window.location.href="registro.php";
            else
              window.location.href="registro.php";</script>';
  } else {
      echo 'Error' . $e->getMessage();
      echo 'Error' . $e->getCode();
      echo "<a href='registro.php'>Volver</a>";
  }
}
?>



