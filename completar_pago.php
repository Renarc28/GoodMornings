<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php"); 
    exit();
}

$conexion = new mysqli("localhost", "root", "", "goodmornings");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$direccion = $_POST['direccion'];
$tarjeta = $_POST['tarjeta'];
$fecha_expiracion = $_POST['fecha_expiracion'];
$cvv = $_POST['cvv'];

$id_usuario = $_SESSION['usuario_id'];

$cart = json_decode($_POST['cart'], true); 

$total = 0;
foreach ($cart as $item) {
    $total += $item['price'] * $item['quantity'];
}

$sql_pedido = "INSERT INTO pedidos (id_usuario, direccion, tarjeta, fecha_expiracion, cvv, total) 
               VALUES ('$id_usuario', '$direccion', '$tarjeta', '$fecha_expiracion', '$cvv', '$total')";

if ($conexion->query($sql_pedido) === TRUE) {
    $id_pedido = $conexion->insert_id;

    foreach ($cart as $item) {
        $nombre_producto = $item['name'];
        $precio = $item['price'];
        $cantidad = $item['quantity'];

        $sql_detalle = "INSERT INTO detalle_pedidos (id_pedido, nombre_producto, precio, cantidad)
                        VALUES ('$id_pedido', '$nombre_producto', '$precio', '$cantidad')";

        if (!$conexion->query($sql_detalle)) {
            echo "Error al insertar detalle del pedido: " . $conexion->error;
            exit();
        }
    }
    header("Location: confirmacion.php");
    exit();
} else {
    echo "Error al realizar el pedido: " . $conexion->error;
}

$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de Pago</title>
</head>
<body>
    <h1>Detalles de Pago</h1>

    <!-- Mostrar los detalles del carrito -->
    <h2>Productos en el Carrito:</h2>
    <table id="cart-table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <!-- Los productos serán insertados aquí desde JavaScript -->
        </tbody>
    </table>

    <p><strong>Total: S/. <span id="cart-total">0.00</span></strong></p>

    <h3>Formulario de Pago:</h3>
    <form action="completar_pago.php" method="POST">
        <label for="direccion">Dirección de Envío:</label>
        <input type="text" id="direccion" name="direccion" required><br><br>

        <label for="tarjeta">Número de Tarjeta:</label>
        <input type="text" id="tarjeta" name="tarjeta" required><br><br>

        <label for="fecha_expiracion">Fecha de Expiración:</label>
        <input type="text" id="fecha_expiracion" name="fecha_expiracion" required><br><br>

        <label for="cvv">CVV:</label>
        <input type="text" id="cvv" name="cvv" required><br><br>

        <input type="hidden" name="cart" id="cart-data">
        <input type="submit" value="Completar Pago">
    </form>

    <script>
        function loadCart() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            let cartTotal = 0;
            const cartTable = document.getElementById('cart-table').getElementsByTagName('tbody')[0];
            cartTable.innerHTML = '';

            cart.forEach(item => {
                const row = cartTable.insertRow();
                row.innerHTML = `
                    <td>${item.name}</td>
                    <td>${item.quantity}</td>
                    <td>S/. ${item.price.toFixed(2)}</td>
                    <td>S/. ${(item.price * item.quantity).toFixed(2)}</td>
                `;
                cartTotal += item.price * item.quantity;
            });

            document.getElementById('cart-total').textContent = cartTotal.toFixed(2);


            document.getElementById('cart-data').value = JSON.stringify(cart);
        }

        document.addEventListener('DOMContentLoaded', function() {
            loadCart();
        });
    </script>
</body>
</html>