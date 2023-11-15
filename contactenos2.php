<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<script>
    alert("Email enviado con éxito");
    window.location.href = "index_persona.php#container"; // Reemplaza con el nombre de tu archivo
</script>


<?php
// solo ejecuta cuando todas los campos de la forma están llenos
//por eso pregunto si todos son diferentes de vacío

if (!empty($_POST["mensaje"])&& !empty($_POST["asunto"])  && !empty($_POST["nombre"]) && !empty($_POST["tel"]) && !empty($_POST["correo"]) )

{ 
    $recibe = "chillclass3@gmail.com";
    $asunto = "Contacto con chillclass"; 
    $cuerpo = "Se recibe correo con el siguiente contenido: ".$_POST["asunto"].",".$_POST["mensaje"].",".$_POST["nombre"].",".$_POST["tel"].",".$_POST["correo"];
    $envia = "From:chillclass3@gmail.com" ;
   
    if(mail($recibe, $asunto, $cuerpo, $envia)){
        echo "<h2>Email enviado con éxito a: $recibe</h2>";
    }else{
        echo "Lo lamento el correo no se envió con exito revise de nuevo los datos";
    }


} else {
    echo "Debe llenar el todos los campos.";
}

?>
</body>


</html>