<?php
session_start();
if (isset($_POST['correo']) && isset($_POST['contraseña'])) {
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    $conexion = new mysqli("localhost", "root", "", "GoodMornings");

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    $sql = "SELECT * FROM Usuarios WHERE correo = ? AND contraseña = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ss", $correo, $contraseña);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
        $_SESSION['usuario'] = $usuario['usuario'];  
        $_SESSION['usuario_id'] = $usuario['id_usuario'];
        header("Location: Main.php"); 
    } else {
        echo "Correo o contraseña incorrectos.";
    }

    $conexion->close();
}
?>
