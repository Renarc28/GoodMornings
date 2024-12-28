let cart = [];
let cartTotal = 0;

function updateCartCount() {
    const cartCount = document.querySelector('.cart-count');
    cartCount.textContent = cart.reduce((total, item) => total + item.quantity, 0);
}

function updateCartTotal() {
    cartTotal = cart.reduce((total, item) => total + (item.price * item.quantity), 0);
    document.getElementById('cart-total').textContent = cartTotal.toFixed(2);
}

function updateCartDisplay() {
    const cartItems = document.getElementById('cart-items');
    cartItems.innerHTML = '';

    cart.forEach((item, index) => {
        const cartItem = document.createElement('div');
        cartItem.className = 'cart-item';
        cartItem.innerHTML = `
            <img src="${item.image}" alt="${item.name}">
            <div class="cart-item-details">
                <h6>${item.name}</h6>
                <div class="cart-item-price">S/.${item.price.toFixed(2)}</div>
                <div class="cart-item-quantity">
                    <button onclick="updateQuantity(${index}, -1)">-</button>
                    <span>${item.quantity}</span>
                    <button onclick="updateQuantity(${index}, 1)">+</button>
                </div>
            </div>
            <button class="btn btn-danger btn-sm" onclick="removeFromCart(${index})">
                <i class="fas fa-trash"></i>
            </button>
        `;
        cartItems.appendChild(cartItem);
    });

    updateCartCount();
    updateCartTotal();

    // Guardar el carrito en localStorage
    localStorage.setItem('cart', JSON.stringify(cart));
}

function addToCart(name, price, image) {
    const existingItem = cart.find(item => item.name === name);

    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({
            name,
            price,
            image,
            quantity: 1
        });
    }

    updateCartDisplay();
}

function updateQuantity(index, change) {
    cart[index].quantity += change;

    if (cart[index].quantity <= 0) {
        cart.splice(index, 1);
    }

    updateCartDisplay();
}

function removeFromCart(index) {
    cart.splice(index, 1);
    updateCartDisplay();
}


// Agregar el evento click a todos los botones "Agregar al carrito"
document.addEventListener('DOMContentLoaded', function () {
    const addToCartButtons = document.querySelectorAll('.btn-success');
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function () {
            const modal = button.closest('.modal');
            const name = modal.querySelector('.modal-title').textContent; //nombre
            const priceText = modal.querySelector('.fw-bold').textContent;
            const price = parseFloat(priceText.match(/S\/\.(\d+)/)[1]); //precio
            const image = modal.querySelector('.img-fluid').src; //imagen

            addToCart(name, price, image);
        });
    });
});

// Esperar a que la página cargue completamente
document.addEventListener('DOMContentLoaded', function () {
    // Obtener el botón "Proceder al pago" usando su id
    const checkoutButton = document.getElementById('checkout-btn');

    // Asignar el evento de clic al botón
    checkoutButton.addEventListener('click', function () {
        // Redirigir a la página de pago
        window.location.href = 'pago.php'; // Asegúrate de que 'pago.php' sea la ruta correcta
    });
});