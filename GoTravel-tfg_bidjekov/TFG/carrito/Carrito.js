document.querySelectorAll('a.nav-link[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// Simulación de la lógica del carrito
const itemsEnCarrito = []; // Aquí se manejarán los items
const carritoVacio = document.getElementById('carrito-vacio');
const carritoConItems = document.getElementById('carrito-con-items');

// Muestra el carrito vacío o con items según corresponda
if (itemsEnCarrito.length === 0) {
    carritoVacio.classList.remove('d-none');
    carritoConItems.classList.add('d-none');
} else {
    carritoVacio.classList.add('d-none');
    carritoConItems.classList.remove('d-none');
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
            updateTotal(data.total);
        } else {
            alert('Error al eliminar el producto');
        }
    });
}

// Función para actualizar el total
function updateTotal(newTotal) {
    document.getElementById('cart-total').innerHTML = `<strong>Total: </strong>${newTotal}€`;
}

// Enviar datos del paquete al carrito al hacer clic en el botón de reserva
document.querySelectorAll('.btn-primary').forEach(button => {
    button.addEventListener('click', function() {
        const packageData = {
            destination: this.getAttribute('data-destination'),
            description: this.getAttribute('data-description'),
            duration: this.getAttribute('data-duration'),
            people: this.getAttribute('data-people'),
            price: parseFloat(this.getAttribute('data-price')) // Asegúrate de que sea un número
        };

        // Enviar packageData a Carrito.php
        fetch('carrito/Carrito.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(packageData)
        })
        .then(response => response.text())
        .then(data => {
            console.log(data); // Para ver si se agregó correctamente
            // Aquí podrías actualizar el carrito o mostrar un mensaje de éxito
        })
        .catch(error => console.error('Error:', error));
    });
});

function changeQuantity(index, change) {
    const quantityInput = document.getElementById(`quantity-${index}`);
    const priceCell = document.getElementById(`price-${index}`);
    let currentQuantity = parseInt(quantityInput.value);

    // Actualizar cantidad
    currentQuantity += change;

    // Asegurarse de que la cantidad no sea menor que 1
    if (currentQuantity < 1) {
        currentQuantity = 1;
    }

    quantityInput.value = currentQuantity;

    // Calcular el nuevo precio total para este item (con IVA)
    const itemPrice = parseFloat(priceCell.textContent) / currentQuantity; // Obtener precio unitario
    const newPrice = (itemPrice * currentQuantity).toFixed(2); // Calcular nuevo precio total

    priceCell.textContent = `${newPrice}€`; // Actualizar precio en la celda

    // Actualizar el total general del carrito
    updateCartTotal();
}

function changeQuantity(index, change) {
    const quantityInput = document.getElementById(`quantity-${index}`);
    const priceCell = document.getElementById(`price-${index}`);
    let currentQuantity = parseInt(quantityInput.value);

    // Actualizar cantidad
    currentQuantity += change;

    // Asegurarse de que la cantidad no sea menor que 1
    if (currentQuantity < 1) {
        currentQuantity = 1;
    }

    quantityInput.value = currentQuantity;

    // Calcular el nuevo precio total para este item (con IVA)
    const itemPrice = parseFloat(priceCell.textContent) / (currentQuantity - change); // Obtener precio unitario
    const newPrice = (itemPrice * currentQuantity).toFixed(2); // Calcular nuevo precio total

    priceCell.textContent = `${newPrice}€`; // Actualizar precio en la celda

    // Actualizar el total general del carrito
    updateCartTotal();
}

function changeQuantity(index, change) {
    const quantityInput = document.getElementById(`quantity-${index}`);
    const priceCell = document.getElementById(`price-${index}`);
    let currentQuantity = parseInt(quantityInput.value);

    // Actualizar cantidad solo si el cambio es positivo o la cantidad actual es mayor que 1
    if (change === -1 && currentQuantity <= 1) {
        return; // No permitir que la cantidad baje de 1
    }

    currentQuantity += change;

    quantityInput.value = currentQuantity;

    // Calcular el nuevo precio total para este item (con IVA)
    const itemPrice = parseFloat(priceCell.textContent) / (currentQuantity - change); // Obtener precio unitario
    const newPrice = (itemPrice * currentQuantity).toFixed(2); // Calcular nuevo precio total

    priceCell.textContent = `${newPrice}€`; // Actualizar precio en la celda

    // Actualizar el total general del carrito
    updateCartTotal();
}

function changeQuantity(index, change) {
    const quantityInput = document.getElementById(`quantity-${index}`);
    const priceCell = document.getElementById(`price-${index}`);
    let currentQuantity = parseInt(quantityInput.value);

    // Actualizar cantidad solo si el cambio es positivo o la cantidad actual es mayor que 1
    if (change === -1 && currentQuantity <= 1) {
        return; // No permitir que la cantidad baje de 1
    }

    currentQuantity += change;

    quantityInput.value = currentQuantity;

    // Calcular el nuevo precio total para este item (con IVA)
    const itemPrice = parseFloat(priceCell.textContent) / (currentQuantity - change); // Obtener precio unitario
    const newPrice = (itemPrice * currentQuantity).toFixed(2); // Calcular nuevo precio total

    priceCell.textContent = `${newPrice}€`; // Actualizar precio en la celda

    // Actualizar el total general del carrito
    updateCartTotal();
}

function updateCartTotal() {
    const rows = document.querySelectorAll('#cart-items tr');
    let total = 0;

    rows.forEach(row => {
        const priceCell = row.querySelector('td[id^="price-"]');
        if (priceCell) {
            total += parseFloat(priceCell.textContent);
        }
    });

    const iva_percentage = 21;
    const subtotal = total / (1 + (iva_percentage / 100)); // Precio sin IVA
    const iva_amount = total - subtotal; // Cantidad de IVA

    // Crear el HTML para el total sin perder estilos
    const totalHTML = `
        <div style='margin-bottom: 5px;'><div style='font-weight: bold;'>Subtotal: </div><span>${subtotal.toFixed(2)}€</span></div>
        <div style='margin-bottom: 5px;'><div style='font-weight: bold;'>IVA (${iva_percentage}%): </div><span>${iva_amount.toFixed(2)}€</span></div>
        <div style='margin-bottom: 5px;'><div style='font-weight: bold; color: gold;'>Total: </div><span style='font-size: 1.1em; color: gold;'>${total.toFixed(2)}€</span></div>
    `;

    // Actualizar solo el contenido interior del contenedor de total
    document.getElementById('cart-total').innerHTML = totalHTML;
}