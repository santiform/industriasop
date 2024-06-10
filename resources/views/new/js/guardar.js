document.addEventListener('DOMContentLoaded', function() {
    function recopilarDatos() {
        let estadoBotonesMatriz;

        // Determine qué script está presente y recopile los datos correspondientes
        if (typeof window.estadoBotonesMatriz !== 'undefined') {
            estadoBotonesMatriz = window.estadoBotonesMatriz;
        } else {
            throw new Error('No se encontraron datos de scripts conocidos.');
        }

        // Obtener la URL de la acción del formulario
        const formulario = document.getElementById('form_habilitaciones');
        const url = formulario.getAttribute('data-action');

        // Agregar la URL al objeto de datos
        estadoBotonesMatriz.url = url;

        return estadoBotonesMatriz;
    }

    function enviarDatosALaravel(datos) {
        const formulario = document.createElement('form');
        formulario.method = 'POST';
        formulario.action = datos.url; // URL de la acción en Laravel

        // Agrega los datos como campos ocultos al formulario
        for (const key in datos) {
            if (Object.hasOwnProperty.call(datos, key) && key !== 'url') {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = key;
                input.value = datos[key];
                formulario.appendChild(input);
            }
        }

        // Agrega el formulario al cuerpo del documento y envíalo
        document.body.appendChild(formulario);
        formulario.submit();
    }

    const formulario = document.getElementById('form_habilitaciones');
    formulario.addEventListener('submit', function(event) {
        event.preventDefault();
        const datos = recopilarDatos();
        enviarDatosALaravel(datos);
    });
});
