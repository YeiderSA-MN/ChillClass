<?php 

try {
    $conexion = new PDO('mysql:host=localhost;port=3306;dbname=chillclass;', 'root', ''); 
   
  } catch (PDOException $e) {
     echo "Fallo la conexión ".$e->getMessage();
  }



try{
    $vcodigo=filter_var($_GET['cod2']);
    $vpersona=filter_var($_GET['cod']);


    $delete = $conexion->prepare("DELETE FROM persona_curso WHERE id_persona = :per AND cod_curso = :codigo");
    $delete->bindParam(':per', $vpersona);
    $delete->bindParam(':codigo', $vcodigo);
    $delete->execute();

    header("location: persona_curso.php");

} catch(PDOException $e) {
    echo'error'. $e->getMessage();

}


?>