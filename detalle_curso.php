<!DOCTYPE html>
<html>
<head>
    <title>Detalle del Curso</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <br>
        <br>
        <h1>Detalle del Curso</h1>
        <br>
        <a href="index.php" class="btn btn-primary">Volver</a>
        <br>
        <br>

        <?php
        // Conexión a la base de datos
        $conn = new mysqli("localhost", "root", "", "chillclass");
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        $curso_id = $_GET['id']; // Asegúrate de obtener el ID del curso correctamente

        // Mostrar detalles del curso
        $sql = "SELECT * FROM curso WHERE cod_curso = '$curso_id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo '<h2>' . $row['descripcion'] . '</h2>';
            echo '<p>' . $row['video'] . '</p>';

            // Botones para agregar/quitar curso favorito
            echo '<form action="agregar_quitar_favorito.php" method="POST">';
            echo '<input type="hidden" name="curso_id" value="' . $curso_id . '">';
            
            // Verificar si el curso es favorito del usuario
            $usuario_id = $_SESSION['usuario_id']; // Asegúrate de obtener el ID del usuario correctamente
            $favorito_sql = "SELECT favorito FROM persona_curso WHERE id_persona = '$usuario_id' AND cod_curso = '$curso_id'";
            $favorito_result = $conn->query($favorito_sql);

            if ($favorito_result->num_rows > 0) {
                $favorito_row = $favorito_result->fetch_assoc();
                $es_favorito = $favorito_row['favorito'];

                if ($es_favorito == 1) {
                    echo '<button type="submit" name="accion" value="quitar">Quitar de Favoritos</button>';
                } else {
                    echo '<button type="submit" name="accion" value="agregar">Agregar a Favoritos</button>';
                }
            } else {
                echo '<button type="submit" name="accion" value="agregar">Agregar a Favoritos</button>';
            }

            echo '</form>';
        } else {
            echo 'Curso no encontrado.';
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
