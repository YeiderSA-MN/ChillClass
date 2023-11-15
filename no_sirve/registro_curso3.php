<?php 
try {
    // ... tu código de inserción aquí ...

    // Después de la inserción, obtén el estado y redirige según corresponda
    $result = $conexion->query("SELECT b.cod_curso, b.cod_estado FROM persona_curso a,  estado b WHERE a.cod_curso = b.cod_curso");
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $row = $result->fetch();
    $curso = $row['cod_curso'];
    $estado = $row['cod_estado'];

    if ($estado == '02') {
        header("Location: pprofile.php");
        exit();
    } else {
        header("Location: actualizar_perfil.php");
        exit();
    }
} catch (PDOException $e) {
    echo 'Error' . $e->getMessage();
}
?>