document.addEventListener('DOMContentLoaded', function() {
    // Seleccionar el formulario y los campos de entrada
    const form = document.querySelector('form');
    const formControls = document.querySelectorAll('.form-control');
    const saveButton = form.querySelector('.btn-save');

    // Añadir el evento para manejar el botón de guardar cambios
    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevenir el envío del formulario para no recargar la página

        // Recorrer los campos del formulario
        formControls.forEach(control => {
            const currentValue = control.value;

            // Guardar el valor ingresado y fijarlo en el campo
            control.setAttribute('data-original', currentValue); // Guardar el valor en un atributo personalizado
            control.disabled = true; // Deshabilitar el campo después de guardar el cambio
        });

        // Cambiar el texto del botón a "Cambios Guardados"
        saveButton.textContent = 'Cambios Guardados';
        saveButton.disabled = true; // Deshabilitar el botón después de guardar los cambios
    });

    // Añadir iconos de edición a los campos
    formControls.forEach(control => {
        const editIcon = document.createElement('span');
        editIcon.classList.add('edit-icon');
        editIcon.innerHTML = '<i class="fas fa-pencil-alt"></i>';
        
        // Insertar el icono al lado del campo de entrada
        control.parentNode.appendChild(editIcon);

        // Función para habilitar el campo cuando el icono de edición es clickeado
        editIcon.addEventListener('click', () => {
            control.disabled = false; // Habilitar el campo para editar
            saveButton.disabled = false; // Habilitar el botón de guardar
            saveButton.textContent = 'Guardar Cambios'; // Volver a cambiar el texto del botón
        });
    });

    // Añadir tooltips a los elementos estadísticos (si los hubiera)
    const statItems = document.querySelectorAll('.stat-item');
    statItems.forEach(item => {
        item.setAttribute('data-tooltip', 'Click para ver más detalles');
    });

    // Animación de números en estadísticas
    const statNumbers = document.querySelectorAll('.stat-item h3');
    statNumbers.forEach(number => {
        const finalNumber = parseInt(number.textContent);
        let currentNumber = 0;
        const duration = 1000; // 1 segundo
        const steps = 20;
        const increment = finalNumber / steps;
        const stepTime = duration / steps;

        const animate = () => {
            currentNumber += increment;
            if (currentNumber <= finalNumber) {
                number.textContent = Math.round(currentNumber);
                setTimeout(animate, stepTime);
            } else {
                number.textContent = finalNumber;
            }
        };

        // Iniciar animación cuando el elemento está en vista
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animate();
                    observer.unobserve(entry.target);
                }
            });
        });

        observer.observe(number);
    });
});
