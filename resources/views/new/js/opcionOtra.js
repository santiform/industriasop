function mostrarInputOtro(select) {
    var otroInputDiv = select.nextElementSibling;
    var otroInput = otroInputDiv.querySelector('input');

    if (select.value === "otra") {
        otroInputDiv.style.display = "block";
    } else {
        otroInputDiv.style.display = "none";
        otroInput.value = ""; // Establece el valor del campo adicional como vacío
    }
}

function prepararEnvio(form) {
    var selects = form.querySelectorAll('select');

    selects.forEach(function(select) {
        var otroInputDiv = select.nextElementSibling;
        var otroInput = otroInputDiv.querySelector('input');

        if (select.value === "otra" && otroInput.value.trim() !== "") {
            select.setAttribute('name', ''); // Vacía el nombre del select para no enviarlo
            otroInput.setAttribute('name', select.id); // Asigna el nombre del campo adicional al nombre del select
        } else {
            select.setAttribute('name', select.id); // Asegúrate de que el select tenga su nombre original
            otroInput.setAttribute('name', ''); // Vacía el nombre del campo adicional para no enviarlo
        }
        console.log('Valor antes de enviar:', select.id, select.value, 'Otro:', otroInput.value); // Depuración
    });
}

document.addEventListener('DOMContentLoaded', function() {
    var selects = document.querySelectorAll('select');

    selects.forEach(function(select) {
        // Restaurar el estado del select y el campo adicional
        var storedValue = localStorage.getItem(select.id);
        if (storedValue) {
            select.value = storedValue;
            mostrarInputOtro(select);
        }

        // Añadir evento 'change' para mostrar/ocultar el campo adicional y guardar el estado
        select.addEventListener('change', function() {
            mostrarInputOtro(select);
            if (select.value === "otra") {
                localStorage.setItem(select.id, "otra");
            } else {
                localStorage.removeItem(select.id);
            }
        });
    });
});

function goBack() {
    var selects = document.querySelectorAll('select');
    selects.forEach(function(select) {
        if (select.value === "otra") {
            localStorage.setItem(select.id, "otra");
        } else {
            localStorage.removeItem(select.id);
        }
    });
    window.history.back();
}
