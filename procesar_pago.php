<?php
session_start();

// Verificar si el carrito está vacío
if (empty($_SESSION['cart'])) {
    header("Location: carrito.php");
    exit();
}

// Verificar si se enviaron los datos del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener datos del formulario
    $direccion = $_POST['direccion'];
    $tarjeta = $_POST['tarjeta'];  // Se recomienda encriptar la tarjeta (en este ejemplo no lo hacemos)
    $vencimiento = $_POST['vencimiento'];
    $cvv = $_POST['cvv'];

    // Obtener el total del carrito
    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $total += $item['price'] * $item['quantity'];
    }

    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "goodmornings");

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Insertar el pedido en la tabla 'pedidos'
    $id_usuario = $_SESSION['usuario_id']; // Suponiendo que el id del usuario está guardado en la sesión
    $sql_pedido = "INSERT INTO pedidos (id_usuario, direccion, tarjeta, vencimiento, cvv, total) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql_pedido);
    $stmt->bind_param("issssi", $id_usuario, $direccion, $tarjeta, $vencimiento, $cvv, $total);
    $stmt->execute();

    // Obtener el id del pedido insertado
    $id_pedido = $conexion->insert_id;

    // Insertar los productos del carrito en la tabla 'detalle_pedidos'
    foreach ($_SESSION['cart'] as $item) {
        $sql_detalle = "INSERT INTO detalle_pedidos (id_pedido, nombre_producto, precio, cantidad) VALUES (?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql_detalle);
        $stmt->bind_param("isdi", $id_pedido, $item['name'], $item['price'], $item['quantity']);
        $stmt->execute();
    }

    // Limpiar el carrito después de la compra
    unset($_SESSION['cart']);

    // Redirigir a una página de confirmación
    header('Location: confirmacion.php');
    exit();
}
?>