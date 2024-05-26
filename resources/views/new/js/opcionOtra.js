function mostrarInputOtro(selectId) {
    var select = document.getElementById(selectId);
    var otroInput = select.nextElementSibling;

    if (select.value === "otra") {
        otroInput.style.display = "block";
    } else {
        otroInput.style.display = "none";
        otroInput.value = ""; // Establece el valor del campo adicional como vacío
    }
}

function prepararEnvio(form) {
    var camposAdicionales = form.getElementsByClassName("campo-adicional");

    for (var i = 0; i < camposAdicionales.length; i++) {
        var campo = camposAdicionales[i];
        var select = campo.previousElementSibling;
        
        if (campo.style.display !== "none") {
            select.value = campo.value; // Asigna el valor del campo adicional al valor del select
        }
    }
}
