<?php
try {
    $conexion = new PDO('mysql:host=localhost;port=3306;dbname=chillclass', 'root', '');
} catch (PDOException $e) {
    echo 'Error: '. $e->getMessage();
}

try {
    $vcodigo = filter_var($_GET['num']);

    $delete = $conexion->prepare("DELETE FROM tematica WHERE cod_tematica = :code");
    $delete->bindParam(':code', $vcodigo);
    $delete->execute();

    header("location: tematica.php");
} catch (PDOException $e) {
    $error = $e->getCode();

    if ($error == 23000) {
        echo '<script>confirmar=confirm("Esta tematica no se puede eliminar");
            if (confirmar)
                window.location.href="./tematica.php";</script>';
        echo "<a href='./tematica.php'>Volver</a>";
    } else {
        echo 'Error ' . $e->getMessage();
        echo 'Error ' . $e->getCode();
        echo "<a href='./tematica.php'>Volver</a>";
    }
}
?>

