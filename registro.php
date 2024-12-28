<?php
$servername = "localhost";
$username = "root";  
$password = ""; 
$dbname = "goodmornings";  

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST['usuario'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];  
    $conn = new mysqli("localhost", "root", "", "goodmornings");

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "INSERT INTO usuarios (usuario, correo, contraseña) VALUES (?, ?, ?)";
    
    if ($stmt = $conn->prepare($sql)) {

        $stmt->bind_param("sss", $usuario, $correo, $contraseña); 
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Registro exitoso!";
            header("Location: Main.php");
            exit();
        } else {
            echo "Error al registrar el usuario.";
        }

        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conn->error;
    }


    $conn->close();
}
?>
