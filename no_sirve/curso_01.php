<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
</head>
<body>
<center>
    <h1> Aquí mostrar la oferta de cursos </h1>
    <a href="Curso_chillclass.php"> <button  type="button"> Regresar </button> </a>
</center>

<?php
$mysql_host = 'localhost';
$mysql_user = 'root';
$password = '';

$dbhandle = mysqli_connect($mysql_host, $mysql_user, $password) or die('Problemas de conexión con BD');

$selected = mysqli_select_db($dbhandle, 'chillclass') or die("No se encontró el esquema");

$result = mysqli_query($dbhandle, "SELECT a.cod_curso, a.descripcion descripcion_curso, b.descripcion, a.fecha_creacion, a.duracion_curso, c.descripcion descripcion_2, d.descripcion descripcion_3, a.video FROM curso a, academia b, tematica c, estado d WHERE a.cod_academia=b.cod_academia and a.cod_tematica=c.cod_tematica and a.cod_estado=d.cod_estado and a.cod_curso='01'") or die(mysqli_error($dbhandle));

echo "<table>";
            echo "<tr>
                    <th>Codigo curso</th>

                    <th>Descripcion</th>
                    
                    <th>Academia</th>

                    <th>Fecha de creacion</th>

                    <th>Duracion del curso</th>

                    <th>Tematica</th>

                    <th>Estado</th>

                    <th>Video</th>
                </tr>";

                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo "<tr>";
                    echo "<td>".$row['cod_curso']."</td>";
                    echo "<td>".$row['descripcion_curso']."</td>";
                    echo "<td>".$row['descripcion']."</td>";
                    echo "<td>".$row['fecha_creacion']."</td>";
                    echo "<td>".$row['duracion_curso']."</td>";
                    echo "<td>".$row['descripcion_2']."</td>";
                    echo "<td>".$row['descripcion_3']."</td>";
                    echo "<td>".$row['video']."</td>";
                };
            echo "</table>";

?>
</body>
</html>

