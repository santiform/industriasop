// opcionOtra.js

function mostrarCampoAdicional(selectId) {
    var select = document.getElementById(selectId);
    if (!select) return; // Salir si el select no se encuentra

    var campoAdicional = select.nextElementSibling;
    if (!campoAdicional) return; // Salir si no hay un siguiente elemento después del select

    var inputAdicional = campoAdicional.querySelector('input');
    if (!inputAdicional) return; // Salir si no se encuentra un input dentro del campo adicional

    if (select.value === "otra") {
        campoAdicional.style.display = "block";
        // Asignar el nombre original del select al input adicional
        inputAdicional.setAttribute('name', select.getAttribute('name').replace('_pers', ''));
    } else {
        campoAdicional.style.display = "none";
        inputAdicional.value = ""; // Limpiar el valor del campo adicional si está visible
        // Remover el nombre del input adicional para evitar enviarlo
        inputAdicional.removeAttribute('name');
    }
}

function prepararEnvio(form) {
    var selects = form.querySelectorAll('select');

    selects.forEach(function(select) {
        var campoAdicional = select.nextElementSibling;
        if (!campoAdicional) {
            console.error('Campo adicional no encontrado para:', select.id);
            return; // Salir si no hay un siguiente elemento después del select
        }

        var inputAdicional = campoAdicional.querySelector('input');
        if (!inputAdicional) {
            console.error('Input adicional no encontrado para:', select.id);
            return; // Salir si no se encuentra un input dentro del campo adicional
        }

        var valorParaEnviar;
        var nombreCampo;

        if (select.value === "otra") {
            valorParaEnviar = inputAdicional.value.trim(); // Obtener el valor del campo adicional
            nombreCampo = select.getAttribute('name').replace('_pers', ''); // Obtener el nombre del select sin _pers
            inputAdicional.setAttribute('name', nombreCampo); // Asignar el nombre del select al input sin el sufijo _pers
            select.removeAttribute('name'); // Remover el nombre del select para evitar confusión al enviar el formulario

            if (valorParaEnviar === "") {
                console.log('Input adicional está vacío para:', select.id);
                return; // Salir de la función para no enviar un valor vacío
            }
        } else {
            valorParaEnviar = select.value;
            nombreCampo = select.getAttribute('name');
        }

        console.log('Campo:', nombreCampo, 'Valor a enviar:', valorParaEnviar); // Log para depurar
        // Aquí deberías enviar el dato usando el nombreCampo y valorParaEnviar
        // enviarDato(valorParaEnviar, nombreCampo);
    });

    // Aquí envía el formulario después de procesar los datos
    form.submit();
}

function enviarDato(valor, nombreCampo) {
    // Simula el envío del dato (aquí deberías implementar la lógica real para enviar los datos)
    console.log('Campo:', nombreCampo, 'Valor a enviar:', valor);
}

document.addEventListener('DOMContentLoaded', function() {
    var selects = document.querySelectorAll('select');

    selects.forEach(function(select) {
        // Añadir evento 'change' para mostrar/ocultar el campo adicional y guardar el estado
        select.addEventListener('change', function() {
            mostrarCampoAdicional(select.id);
            if (select.value === "otra") {
                localStorage.setItem(select.id, "otra");
            } else {
                localStorage.removeItem(select.id);
            }
        });

        // Restaurar el estado del select y el campo adicional si hay un valor almacenado
        var storedValue = localStorage.getItem(select.id);
        if (storedValue) {
            select.value = storedValue;
            mostrarCampoAdicional(select.id);
        }
    });

    // Manejar cambios directos en los campos de texto asociados a "otra"
    var inputsAdicionales = document.querySelectorAll('.campo-adicional input');

    inputsAdicionales.forEach(function(input) {
        input.addEventListener('input', function() {
            var selectId = input.parentElement.previousElementSibling.id;
            mostrarCampoAdicional(selectId);
        });
    });

    // Manejar el envío del formulario al hacer clic en el botón "Siguiente"
    var form = document.querySelector('form');
    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Evitar el envío automático del formulario para controlarlo manualmente
        prepararEnvio(form);
        // Aquí podrías agregar la lógica para enviar el formulario utilizando AJAX u otro método
    });
});
