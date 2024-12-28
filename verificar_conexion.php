<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Conexión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
        }
        .success {
            color: green;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <h1>Verificar Conexión a la Base de Datos</h1>
    <?php
    // Datos de conexión
    $servidor = "localhost";
    $usuario = "root";
    $contrasena = ""; // Si tienes contraseña, escríbela aquí
    $base_datos = "GoodMornings";

    // Crear conexión
    $conexion = new mysqli($servidor, $usuario, $contrasena, $base_datos);

    // Verificar conexión
    if ($conexion->connect_error) {
        echo "<p class='error'>Error al conectar con la base de datos: " . $conexion->connect_error . "</p>";
    } else {
        echo "<p class='success'>Conexión exitosa a la base de datos '<strong>$base_datos</strong>'.</p>";
    }

    // Cerrar conexión
    $conexion->close();
    ?>
</body>
</html>
