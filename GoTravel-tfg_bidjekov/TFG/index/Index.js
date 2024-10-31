document.addEventListener('DOMContentLoaded', function () {
    // Manejo del checkbox
    var checkbox = document.getElementById('checkbox');
    var toggle = document.querySelector('.toggle');

    if (toggle) {
        toggle.addEventListener('click', function () {
            checkbox.checked = !checkbox.checked;
        });
    }

    // Scroll suave
    document.querySelectorAll('a.nav-link[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    // Inicializa el datepicker
    $('#date1 input').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true,
        todayHighlight: true,
        templates: {
            leftArrow: '&laquo;',
            rightArrow: '&raquo;'
        }
    });

    $('#date2 input').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true,
        todayHighlight: true,
        templates: {
            leftArrow: '&laquo;',
            rightArrow: '&raquo;'
        }
    });

    // Manejo del botón de búsqueda
    document.getElementById('search-btn').addEventListener('click', function() {
        document.getElementById('loading-screen').style.display = 'block';

        let progressBar = document.getElementById('progress-bar');
        let width = 0;
        let progressInterval = setInterval(function() {
            if (width >= 100) {
                clearInterval(progressInterval);
                setTimeout(function() {
                    document.getElementById('loading-screen').style.display = 'none';
                }, 500);
            } else {
                width += 10;
                progressBar.style.width = width + '%';
                progressBar.setAttribute('aria-valuenow', width);
            }
        }, 300);
    });
});

function addToCart(button) {
    const destination = button.getAttribute('data-destination');
    const description = button.getAttribute('data-description');
    const duration = button.getAttribute('data-duration');
    const people = button.getAttribute('data-people');
    const price = button.getAttribute('data-price');

    // Crear un objeto con los datos del paquete
    const packageData = {
        destination: destination,
        description: description,
        duration: duration,
        people: people,
        price: price
    };

    // Enviar los datos mediante una petición POST a carrito.php
    fetch('carrito/Carrito.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(packageData)
    })
    .then(response => response.text())
    .then(data => {
        // Mostrar el mensaje de confirmación usando Toastify
        Toastify({
            text: `Añadido al carrito:`,
            duration: 2000, // Duración en milisegundos
            gravity: "top", // `top` o `bottom`
            position: 'right', // `left`, `center` o `right`
            backgroundColor: "linear-gradient(to top right, #0d6efd, #1c1c1c)",
            borderRadius: "30px",

        }).showToast();
    })
    .catch(error => {
        console.error('Error al añadir al carrito:', error);
    });
}



