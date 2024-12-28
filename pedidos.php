<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");  // Redirigir al login si no está autenticado
    exit();
}

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "GoodMornings");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$id_usuario = $_SESSION['usuario_id'];
$sql_pedidos = "SELECT p.id_pedido, p.direccion, p.tarjeta, p.fecha_expiracion, p.cvv, p.total, p.fecha_pedido 
                FROM pedidos p
                WHERE p.id_usuario = '$id_usuario'
                ORDER BY p.fecha_pedido DESC";

$result_pedidos = $conexion->query($sql_pedidos);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/StylesPedidos.css">
    <title>Mis Pedidos</title>
</head>
<body>
    <h1>Mis Pedidos</h1>
    <div style="text-align: center; margin-top: 20px;">
        <a href="Main.php" class="btn-volver">Volver a la Página Principal</a>
    </div>
    <?php
    if ($result_pedidos->num_rows > 0) {
        while ($pedido = $result_pedidos->fetch_assoc()) {
            $id_pedido = $pedido['id_pedido'];
            $fecha_pedido = $pedido['fecha_pedido'];
            $direccion = $pedido['direccion'];
            $tarjeta = $pedido['tarjeta'];
            $fecha_expiracion = $pedido['fecha_expiracion'];
            $cvv = $pedido['cvv'];
            $total = $pedido['total'];
            
            $sql_detalles = "SELECT nombre_producto, precio, cantidad 
                             FROM detalle_pedidos 
                             WHERE id_pedido = '$id_pedido'";
            $result_detalles = $conexion->query($sql_detalles);
            ?>
                <div class="pedido-container">
                <div class="Tabla" style="border: 1px solid #ccc; padding: 20px; margin-bottom: 20px;">
                    <h3>PEDIDO #<?php echo $id_pedido; ?> - Fecha: <?php echo $fecha_pedido; ?></h3>
                    <p><strong>DIRECCIÓN:</strong> <?php echo $direccion; ?></p>
                    <p><strong>TOTAL:</strong> S/. <?php echo number_format($total, 2); ?></p>

                    <h4>PRODUCTOS:</h4>
                    <table border="1" cellspacing="0" cellpadding="5">
                        <thead>
                            <tr>
                                <th>PRODUCTO</th>
                                <th>CANTIDAD</th>
                                <th>PRECIO UNITARIO</th>
                                <th>TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($detalle = $result_detalles->fetch_assoc()) {
                                $nombre_producto = $detalle['nombre_producto'];
                                $precio = $detalle['precio'];
                                $cantidad = $detalle['cantidad'];
                                $total_producto = $precio * $cantidad;
                                ?>
                                <tr>
                                    <td><?php echo $nombre_producto; ?></td>
                                    <td><?php echo $cantidad; ?></td>
                                    <td>S/. <?php echo number_format($precio, 2); ?></td>
                                    <td>S/. <?php echo number_format($total_producto, 2); ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>

                    <h4>DATOS DE LA TARJETA:</h4>
                    <p><strong>TARJETA:</strong> <?php echo $tarjeta; ?></p>
                    <p><strong>FECHA DE EXPIRACIÓN:</strong> <?php echo $fecha_expiracion; ?></p>
                    <p><strong>CVV:</strong> <?php echo $cvv; ?></p>
                </div>
                </div>
            <?php
        }
    } else {
        echo "<p>No tienes pedidos aún.</p>";
    }

    $conexion->close();
    ?>
</body>
</html>
