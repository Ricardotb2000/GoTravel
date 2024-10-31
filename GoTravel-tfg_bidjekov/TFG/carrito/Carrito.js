// Suavizar el desplazamiento al hacer clic en los enlaces de navegación
document.querySelectorAll('a.nav-link[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// Inicializa el estado del carrito
let itemsEnCarrito = [];

// Función para mostrar el estado del carrito
function mostrarEstadoCarrito() {
    const carritoVacio = document.getElementById('carrito-vacio');
    const carritoConItems = document.getElementById('carrito-con-items');
    if (itemsEnCarrito.length === 0) {
        carritoVacio.classList.remove('d-none');
        carritoConItems.classList.add('d-none');
    } else {
        carritoVacio.classList.add('d-none');
        carritoConItems.classList.remove('d-none');
    }
}

// Función para eliminar un producto del carrito
function removeItem(index) {
    // Eliminar el producto del carrito
    fetch('remove_item.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ index: index })
    })
    .then(response => response.json())
    .then(data => {
        // Actualizar el carrito y el total
        if (data.success) {
            const row = document.querySelector(`tr[data-index="${index}"]`);
            if (row) {
                row.remove();
            }
            itemsEnCarrito.splice(index, 1); // Elimina del array de productos
            
            // Actualiza el total después de la eliminación
            updateCartTotal();
            mostrarEstadoCarrito(); // Actualiza el estado del carrito
        } else {
            alert('Error al eliminar el producto');
        }
    })
    .catch(error => console.error('Error:', error));
}

// Enviar datos del paquete al carrito al hacer clic en el botón de reserva
document.querySelectorAll('.btn-primary').forEach(button => {
    button.addEventListener('click', function () {
        const packageData = {
            destination: this.getAttribute('data-destination'),
            description: this.getAttribute('data-description'),
            duration: this.getAttribute('data-duration'),
            people: this.getAttribute('data-people'),
            price: parseFloat(this.getAttribute('data-price'))
        };

        // Enviar packageData a Carrito.php
        fetch('carrito.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(packageData)
        })
        .then(response => response.json()) // Cambiar a JSON para asegurar la respuesta correcta
        .then(data => {
            if (data.success) {
                itemsEnCarrito.push(packageData); // Agrega el producto al array de productos
                updateCartTotal(); // Actualiza el total al agregar
                mostrarEstadoCarrito(); // Actualiza el estado del carrito
            } else {
                alert('Error al agregar el producto al carrito');
            }
        })
        .catch(error => console.error('Error:', error));
    });
});

// Función para cambiar la cantidad de un item
function changeQuantity(index, change) {
    const quantityInput = document.getElementById(`quantity-${index}`);
    const priceCell = document.getElementById(`price-${index}`);

    let currentQuantity = parseInt(quantityInput.value);

    // Actualizar cantidad solo si el cambio es positivo o la cantidad actual es mayor que 1
    if (change === -1 && currentQuantity <= 1) {
        return; // No permitimos que la cantidad baje de 1
    }

    currentQuantity += change;

    // Actualizar el valor en el input de cantidad
    quantityInput.value = currentQuantity;

    // Obtener el precio unitario desde un atributo de la celda del precio
    const itemPrice = parseFloat(priceCell.getAttribute('data-unit-price'));

    // Calcular el nuevo precio total basado en la cantidad
    if (!isNaN(itemPrice)) {
        const newPrice = (itemPrice * currentQuantity).toFixed(2);
        priceCell.textContent = `${newPrice}€`; // Actualizar precio en la celda
    }

    // Actualizar el total general del carrito
    updateCartTotal(); // Llama a la función para actualizar el total
}

// Función para actualizar el total del carrito
function updateCartTotal() {
    const rows = document.querySelectorAll('#cart-items tr');
    let total = 0;

    rows.forEach(row => {
        const priceCell = row.querySelector('td[id^="price-"]');
        if (priceCell) {
            const priceValue = parseFloat(priceCell.textContent.replace('€', '').replace(',', '.'));
            if (!isNaN(priceValue)) {
                total += priceValue; // Solo sumar si es un número válido
            }
        }
    });

    const iva_percentage = 21;
    const subtotal = total / (1 + (iva_percentage / 100));
    const iva_amount = total - subtotal;

    // Mostrar el HTML con los estilos
    const totalHTML = `
        <div style='margin-bottom: 5px;'><div style='font-weight: bold;'>Subtotal: </div><span>${subtotal.toFixed(2)}€</span></div>
        <div style='margin-bottom: 5px;'><div style='font-weight: bold;'>IVA (${iva_percentage}%): </div><span>${iva_amount.toFixed(2)}€</span></div>
        <div style='margin-bottom: 5px;'><div style='font-weight: bold; color: #27a7ff;'>Total: </div><span style='font-size: 1.1em; color: #27a7ff;'>${total.toFixed(2)}€</span></div>
    `;

    // Actualizar el contenido
    document.getElementById('cart-total').innerHTML = totalHTML;
}

// Actualizar el total del carrito
function updateCartTotal() {
    const rows = document.querySelectorAll('#cart-items tr');
    let total = 0;

    rows.forEach(row => {
        const priceCell = row.querySelector('td[id^="price-"]');
        if (priceCell) {
            const priceValue = parseFloat(priceCell.textContent.replace('€', '').replace(',', '.'));
            if (!isNaN(priceValue)) {
                total += priceValue; // Solo sumar si es un número válido
            }
        }
    });

    const iva_percentage = 21;
    const subtotal = total / (1 + (iva_percentage / 100));
    const iva_amount = total - subtotal;

    // Mostrar el HTML con los estilos
    const totalHTML = `
        <div style='margin-bottom: 5px;'><div style='font-weight: bold;'>Subtotal: </div><span>${subtotal.toFixed(2)}€</span></div>
        <div style='margin-bottom: 5px;'><div style='font-weight: bold;'>IVA (${iva_percentage}%): </div><span>${iva_amount.toFixed(2)}€</span></div>
        <div style='margin-bottom: 5px;'><div style='font-weight: bold; color: #27a7ff;'>Total: </div><span style='font-size: 1.1em; color: #27a7ff;'>${total.toFixed(2)}€</span></div>
    `;

    // Actualizar el contenido
    document.getElementById('cart-total').innerHTML = totalHTML;
}

// Aplicar código promocional
document.getElementById('apply_code').addEventListener('click', function () {
    const promoCode = document.getElementById('promo_code').value;

    // Enviar el código promocional a la misma página
    fetch('carrito.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ promo_code: promoCode })
    })
    .then(response => response.json())
    .then(data => {
        if (data.error) {
            document.getElementById('promo-message').innerText = data.error; // Mostrar mensaje de error
        } else {
            // Actualizar el total en el carrito
            updateCartTotal(); // Llama a la función para actualizar el total
            const totalDisplay = document.getElementById('total-display');
            totalDisplay.innerHTML = `<div style='font-weight: bold; color: #27a7ff;'>Total: </div><span style='font-size: 1.1em; color: #27a7ff;'>${data.total}€</span>`;
            document.getElementById('promo-message').innerText = ''; // Limpiar mensaje de error
        }
    })
    .catch(error => console.error('Error:', error));
});

// Llama a esta función al cargar la página para garantizar que el carrito se muestre correctamente
mostrarEstadoCarrito();
