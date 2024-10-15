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

    // Contador del carrito
    let count = 0;
    function incrementCounter(event) {
        event.preventDefault();
        count++;
        document.getElementById('cartCount').innerText = count;
    }

    // Manejo del chatbot
    const chatbotButton = document.getElementById('chatbotButton');
    const chatbotPopup = document.getElementById('chatbotPopup');

    if (chatbotButton && chatbotPopup) {
        chatbotButton.onclick = function () {
            chatbotPopup.style.display = chatbotPopup.style.display === 'block' ? 'none' : 'block';
        };

        window.onclick = function (event) {
            if (event.target === chatbotPopup) {
                chatbotPopup.style.display = 'none';
            }
        };
    }

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
