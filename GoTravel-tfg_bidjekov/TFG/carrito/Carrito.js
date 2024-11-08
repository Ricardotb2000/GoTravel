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

    // Asegúrate de que los elementos existen antes de intentar acceder a classList
    if (carritoVacio && carritoConItems) {
        if (itemsEnCarrito.length === 0) {
            carritoVacio.classList.remove('d-none');
            carritoConItems.classList.add('d-none');
        } else {
            carritoVacio.classList.add('d-none');
            carritoConItems.classList.remove('d-none');
        }
    }
}

// Función para eliminar un producto del carrito
function removeItem(index) {
    fetch('remove_item.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ index: index })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const row = document.querySelector(`tr[data-index="${index}"]`);
            if (row) {
                row.remove();
            }
            itemsEnCarrito.splice(index, 1);
            updateCartTotal();
            mostrarEstadoCarrito();
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

        fetch('carrito.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(packageData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                itemsEnCarrito.push(packageData);
                updateCartTotal();
                mostrarEstadoCarrito();
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

    if (change === -1 && currentQuantity <= 1) {
        return;
    }

    currentQuantity += change;
    quantityInput.value = currentQuantity;

    const itemPrice = parseFloat(priceCell.getAttribute('data-unit-price'));

    if (!isNaN(itemPrice)) {
        const newPrice = (itemPrice * currentQuantity).toFixed(2);
        priceCell.textContent = `${newPrice}€`;
    }

    // Actualiza el total del carrito después de cambiar la cantidad
    updateCartTotal();
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
                total += priceValue;
            }
        }
    });

    const iva_percentage = 21;
    const subtotal = total / (1 + (iva_percentage / 100));
    const iva_amount = total - subtotal;

    const totalHTML = `
        <div style='margin-bottom: 5px;'><div style='font-weight: bold;'>Subtotal: </div><span>${subtotal.toFixed(2)} €</span></div>
        <div style='margin-bottom: 5px;'><div style='font-weight: bold;'>IVA (${iva_percentage}%): </div><span>${iva_amount.toFixed(2)} €</span></div>
        <div style='margin-bottom: 5px;'><div style='font-weight: bold; color: #27a7ff;'>Total: </div><span style='font-size: 1.1em; color: #27a7ff;'>${total.toFixed(2)} €</span></div>
    `;

    const totalElement = document.getElementById('cart-total');
    if (totalElement) {
        totalElement.innerHTML = totalHTML;
    } else {
        console.error('Error: Elemento "cart-total" no encontrado.');
    }
}

document.addEventListener('DOMContentLoaded', function () {
    const applyPromoButton = document.getElementById('apply_code');

    if (applyPromoButton) {
        applyPromoButton.addEventListener('click', function () {
            const promoCode = document.getElementById('promo_code').value;

            fetch('carrito.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ promo_code: promoCode })
            })
            .then(response => {
                if (!response.ok) throw new Error('Error en la respuesta del servidor');
                return response.json();
            })
            .then(data => {
                console.log('Datos recibidos:', data);

                if (data.error) {
                    alert(data.error);
                } else {
                    alert(`Código promocional aplicado. Nuevo total: ${data.total}€`);

                    // Quita separadores de miles y convierte los valores a float
                    const formatValue = (value) => parseFloat(value.replace(/[^\d.-]/g, ''));

                    // Configura el porcentaje de IVA si el servidor no lo devuelve
                    const iva_percentage = data.iva_percentage ? formatValue(data.iva_percentage) : 21;

                    // Calcula `subtotal` e `iva_amount` si faltan
                    let subtotal, iva_amount;
                    if (data.subtotal && data.iva_amount) {
                        subtotal = formatValue(data.subtotal);
                        iva_amount = formatValue(data.iva_amount);
                    } else {
                        const total = formatValue(data.total);
                        subtotal = total / (1 + iva_percentage / 100);
                        iva_amount = total - subtotal;
                    }

                    const totalDisplay = document.getElementById('cart-total');
                    if (totalDisplay) {
                        totalDisplay.innerHTML = `
                            <div><strong>Subtotal:</strong> ${subtotal.toFixed(2)} €</div>
                            <div><strong>IVA (${iva_percentage}%):</strong> ${iva_amount.toFixed(2)} €</div>
                            <div class='text-primary'><strong>Total:</strong> ${formatValue(data.total).toFixed(2)} €</div>
                        `;
                    } else {
                        console.error('Error: Elemento "cart-total" no encontrado.');
                    }
                }
            })
            .catch(error => console.error('Error:', error));
        });
    } else {
        console.error('El botón de aplicar código no se encontró');
    }
});

