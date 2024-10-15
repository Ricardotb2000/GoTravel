document.addEventListener('DOMContentLoaded', function () {
    // Suavizado de desplazamiento para enlaces
    document.querySelectorAll('a.nav-link[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    // Manejo del botón de búsqueda
    document.getElementById('search-btn').addEventListener('click', function () {
        // Mostrar la pantalla de carga
        document.getElementById('loading-screen').style.display = 'block';

        // Simulación de la barra de progreso
        let progressBar = document.getElementById('progress-bar');
        let width = 0;
        let progressInterval = setInterval(function () {
            if (width >= 100) {
                clearInterval(progressInterval);
                // Ocultar la pantalla de carga después de 3 segundos
                setTimeout(function () {
                    document.getElementById('loading-screen').style.display = 'none';
                }, 500);
            } else {
                width += 10;  // Incremento del progreso
                progressBar.style.width = width + '%';
                progressBar.setAttribute('aria-valuenow', width);
            }
        }, 300);  // Incremento de la barra cada 300ms para simular el proceso de carga
    });

    // Inicializa el datepicker en los inputs correspondientes
    $('#date1 input').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true,  // Cierra automáticamente al seleccionar una fecha
        todayHighlight: true,  // Resalta la fecha actual
        templates: {
            leftArrow: '&laquo;',  // Flecha de navegación izquierda
            rightArrow: '&raquo;'  // Flecha de navegación derecha
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
});
