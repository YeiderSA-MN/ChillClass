
<?php


// solo ejecuta cuando todas los campos de la forma están llenos
//por eso pregunto si todos son diferentes de vacío

if (!empty($_GET["mensaje"]) && !empty($_GET["nombre"]) )

{
    //en donde dice cataarias2001@gmail.com poner el correo que crearon del proyecto
    //el otro es una concatenación para que envíe una copia al correo del que está
    //contactando (es decir lo envía a los dos)



    $recibe ="chillclass3@gmail.com,".$_GET["correo"];
    $asunto = "Contacto con la empresa Chillclass"; // cambiar el asunto según el proyecto
    $cuerpo = "Se recibe correo con el siguiente contenido:  ".$_GET["asunto"].",".$_GET["mensaje"].",".$_GET["nombre"].",".$_GET["tel"].",".$_GET["correo"];
    $envia = "from:chillclass3@gmail.com";// el correo que crearon del proyecto
    if(mail($recibe, $asunto, $cuerpo, $envia)){
         
        unset($_GET["mensaje"]);
        unset($_GET["nombre"]);
        unset($_GET["mensaje"]);
        unset($_GET["correo"]);
        header("location: contactenos2.php");
              
    }
     else{
        echo "Lo lamento el correo no se envió con exito revise de nuevo los datos";
    }



}
else {
    echo "Debe llenar el todos los campos.";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contáctenos</title>
    <!-- Agregar enlaces a Bootstrap CSS y Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

 <h1> Contáctenos </h1>

  <form id='miforma' action='contactenos.php' method='GET' >

     <label for='asunto'>Asunto:</label>
     <select id="asunto" name="asunto">
            <option value="A">Queja</option>
            <option value="B">Reclamo</option>
            <option value="C">Pregunta-Sugerencia</option>
            
          </select>'
          <br><br>

     <label for='nombre'>Nombres Completos:</label>
     <input type='text' id='nombre' name='nombre' value='' required><br><br>

     <label for='tel'>Teléfono:</label>
     <input type='text' id='tel' name='tel' value='' required><br><br>


     <label for='correo'>Correo Electrónico:</label>
     <input type='email' id='correo' name='correo' value='' required><br><br>


    <label for='mensaje'>Mensaje:</label>
     <textarea  id='mensaje' name='mensaje' rows="10" cols="50" value='' required></textarea>
     <br><br>

     <input id='boton' type='submit' value='Enviar' ><br><br>

    
        
</form>




</body>
</html>
