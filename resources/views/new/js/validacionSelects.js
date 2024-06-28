// validacionSelects.js

document.addEventListener('DOMContentLoaded', function() {
    // Escucha el evento de envío del formulario
    document.querySelector('form').addEventListener('submit', function(event) {
        // Busca todos los selects dentro del formulario
        let selects = document.querySelectorAll('select');

        let allValid = true; // Variable para verificar todos los selects válidos

        selects.forEach(function(select) {
            // Verifica si el select tiene una opción seleccionada
            if (!select.value || select.value === 'Seleccione una opción') {
                allValid = false; // Marca que no todos los selects son válidos
            }
        });

        // Si no todos los selects son válidos, muestra una alerta que desaparece automáticamente
        if (!allValid) {
            let alertBox = document.createElement('div');
            alertBox.classList.add('alert', 'alert-warning');
            alertBox.textContent = 'Por favor, seleccione una opción válida en todos los campos.';
            document.body.appendChild(alertBox);

            // Desaparece la alerta después de 3 segundos
            setTimeout(function() {
                alertBox.remove();
            }, 3000);

            event.preventDefault(); // Evita el envío del formulario
        }
    });
});
