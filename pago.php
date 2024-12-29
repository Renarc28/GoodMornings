<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");  // Redirigir al login si no está autenticado
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/StylesPago.css">
    <title>Detalles de Pago</title>
</head>
<body>
    <h1>DETALLES DE PAGO</h1>
    <!-- Mostrar los detalles del carrito -->
    <h2>PRODUCTOS DEL CARRITO:</h2>
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


    <form action="completar_pago.php" method="POST" id="payment-form">
    <h3>Formulario de Pago:</h3><br>
        <label for="direccion">Dirección de Envío:</label>
        <input type="text" id="direccion" name="direccion" required><br><br>

        <label for="tarjeta">Número de Tarjeta:</label>
        <input type="number" id="tarjeta" name="tarjeta" required maxlength="16" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"><br><br>

        <label for="fecha_expiracion">Fecha de Expiración:</label>
        <input type="date" id="fecha_expiracion" name="fecha_expiracion" required><br><br>

        <label for="cvv">CVV:</label><br>
        <input type="number" id="cvv" name="cvv" required maxlength="3" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"><br><br>

        <p><strong>Total: S/. <span id="cart-total">0.00</span></strong></p>

        <input type="hidden" name="total" id="total">
        <input type="hidden" name="cart" id="cart"> 

        <input type="submit" value="Completar Pago">
    </form>

    <div style="text-align: center; margin-top: 20px;">
        <a href="Main.php" class="btn-volver">Volver a la Página Principal</a>
    </div>
    
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
        }
        document.addEventListener('DOMContentLoaded', function() {
            loadCart();
        });

        document.getElementById('payment-form').addEventListener('submit', function(e) {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const total = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);

            document.getElementById('total').value = total.toFixed(2);
            document.getElementById('cart').value = JSON.stringify(cart);
        });
    </script>
</body>
</html>
