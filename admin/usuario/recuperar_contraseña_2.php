<?php
// Conexión a la base de datos (debes configurar tus credenciales)
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "chillclass";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Obtener datos del formulario
$username = $_POST['username'];
$security_answer = $_POST['security_answer'];
$new_password = $_POST['new_password'];

// Consulta SQL para verificar la respuesta de seguridad
$sql = "SELECT * FROM persona WHERE nombre_usuario='$username' AND respuesta_seguridad='$security_answer'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Usuario y respuesta de seguridad correctos
    // Actualizar la contraseña
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    $update_sql = "UPDATE persona SET contrasena='$hashed_password' WHERE nombre_usuario='$username'";
    
    if ($conn->query($update_sql) === TRUE) {
        echo "Contraseña actualizada con éxito. Puedes iniciar sesión con tu nueva contraseña.";
    } else {
        echo "Error al actualizar la contraseña: " . $conn->error;
    }
} else {
    echo "Nombre de usuario o respuesta de seguridad incorrectos.";
}

$conn->close();
?>
