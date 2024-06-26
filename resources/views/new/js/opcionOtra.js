// opcionOtra.js

document.addEventListener('DOMContentLoaded', function() {
    var selects = document.querySelectorAll('select');

    selects.forEach(function(select) {
        select.addEventListener('change', function() {
            mostrarInputOtro(select);
        });

        // Restaurar estado desde localStorage si está almacenado
        var storedValue = localStorage.getItem(select.id);
        if (storedValue) {
            select.value = storedValue;
            mostrarInputOtro(select);
        }
    });

    var form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Evitar envío automático del formulario
            prepararEnvio(form);
        });
    } else {
        console.error('Formulario no encontrado en la página.');
    }
});

function mostrarInputOtro(select) {
    var campoAdicional = select.nextElementSibling;
    if (!campoAdicional) {
        console.error('Campo adicional no encontrado para el select:', select);
        return;
    }
    
    var inputAdicional = campoAdicional.querySelector('input');
    if (!inputAdicional) {
        console.error('Input adicional no encontrado para el campo adicional:', campoAdicional);
        return;
    }

    if (select.value === "otra") {
        campoAdicional.style.display = "block";
        inputAdicional.setAttribute('name', select.name); // Asignar nombre original al input
        select.removeAttribute('name'); // Quitar nombre del select para evitar confusión
    } else {
        campoAdicional.style.display = "none";
        inputAdicional.value = ""; // Limpiar valor del input adicional
        inputAdicional.removeAttribute('name'); // Remover nombre del input si no se selecciona "otra"
        select.setAttribute('name', select.id); // Restaurar nombre original del select
    }
}

function prepararEnvio(form) {
    var selects = form.querySelectorAll('select');

    selects.forEach(function(select) {
        var campoAdicional = select.nextElementSibling;
        if (!campoAdicional) {
            console.error('Campo adicional no encontrado para el select:', select);
            return;
        }

        var inputAdicional = campoAdicional.querySelector('input');
        if (!inputAdicional) {
            console.error('Input adicional no encontrado para el campo adicional:', campoAdicional);
            return;
        }

        var valorParaEnviar;
        var nombreCampo;

        if (select.value === "otra") {
            valorParaEnviar = inputAdicional.value.trim(); // Obtener valor del input adicional
            nombreCampo = select.name; // Obtener nombre original del select
            if (valorParaEnviar === "") {
                console.log('Input adicional está vacío para:', select.id);
                return; // Evitar enviar valor vacío
            }
        } else {
            valorParaEnviar = select.value;
            nombreCampo = select.name;
        }

        console.log('Campo:', nombreCampo, 'Valor a enviar:', valorParaEnviar);
        // Aquí deberías enviar los datos usando nombreCampo y valorParaEnviar
        // enviarDato(valorParaEnviar, nombreCampo);
    });

    // Enviar formulario después de procesar datos
    form.submit();
}

function enviarDato(valor, nombreCampo) {
    console.log('Campo:', nombreCampo, 'Valor a enviar:', valor);
}
