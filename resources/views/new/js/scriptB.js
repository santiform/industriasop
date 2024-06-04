document.addEventListener('DOMContentLoaded', function() {
    // Pedir al usuario la cantidad de pisos y subsuelos

    // Crear una matriz para almacenar el estado de los botones A y B
    var estadoBotonesMatriz = [];

    // Crear la botonera de ascensor
    var botonera = document.getElementById('botonera');

    // Agregar encabezado para la primera fila
    crearEncabezado('A', botonera, true, true); // Primer botón de encabezado
    crearEncabezado('Pisos', botonera, true, true); // Segundo botón de encabezado
    crearEncabezado('B', botonera, true, true); // Tercer botón de encabezado
    botonera.appendChild(document.createElement('br'));

    // Crear botones para los pisos superiores (N, N-1, N-2, ...)
    for (var i = totalPisos; i >= 0; i--) {
        console.log("Creando botón para piso:", i);
        crearBoton('A', botonera, true, i);
        crearBoton(i == 0 ? 'PB' : i, botonera, false, i);
        crearBoton('B', botonera, true, i);
        botonera.appendChild(document.createElement('br'));
        estadoBotonesMatriz.push([0, 0]); // Inicializar cada fila con el estado de los botones A y B como 0
    }

    // Crear botones para los subsuelos en orden descendente (-1, -2, -3, ...)
    for (var i = -1; i >= -totalSubsuelos; i--) {
        console.log("Creando botón para subsuelo:", i);
        var indicePositivo = totalPisos + Math.abs(i); // Mapear el índice negativo a un índice positivo
        crearBoton('A', botonera, true, indicePositivo);
        crearBoton(i == 0 ? 'PB' : i, botonera, false, indicePositivo);
        crearBoton('B', botonera, true, indicePositivo);
        botonera.appendChild(document.createElement('br'));
        estadoBotonesMatriz.push([0, 0]); // Inicializar cada fila con el estado de los botones A y B como 0
    }

    // Función para crear botones
    function crearBoton(texto, contenedor, noCambiaColor, indice) {
        var button = document.createElement('button');
        button.textContent = texto;
        button.classList.add('btn');

        // Si el botón es A o B, se le asigna la clase 'btn' para cambiar de color
        if (texto === 'A' || texto === 'B') {
            button.classList.add('btn-ascensor');
            button.dataset.indice = indice;
            button.addEventListener('click', handleClickBoton);
        }

        // Agregar el botón al contenedor
        contenedor.appendChild(button);

        // Si no es A o B, se le asigna la clase 'piso' para diferenciarlos
        if (texto !== 'A' && texto !== 'B') {
            button.classList.add('piso');
            button.disabled = true; // Deshabilitar el botón para evitar que se active
        }
    }

    // Función para crear el encabezado
    function crearEncabezado(texto, contenedor, noCambiaColor) {
        var button = document.createElement('button');
        button.textContent = texto;
        button.classList.add('btnEnc');
        if (!noCambiaColor) {
            button.classList.add('btnEncPiso');
        }
        if (texto !== 'A' && texto !== 'B') {
            button.classList.add('btnEncPiso');
        }
        contenedor.appendChild(button);
    }

    
    // Función para manejar el clic en los botones A y B
    function handleClickBoton(event) {
        var indice = parseInt(this.dataset.indice);
        var estadoBoton = estadoBotonesMatriz[indice];
        var otroIndice = estadoBoton[0] === 1 ? 1 : 0; // Índice del otro botón en la misma fila

        // Verificar si el botón clicado está activado
        var botonClick = this.textContent === 'A' ? 0 : 1;

        // Cambiar el estado del botón clicado
        estadoBoton[botonClick] = 1 - estadoBoton[botonClick];

        // Deshabilitar el botón opuesto en la misma fila
        estadoBoton[otroIndice] = 0;

        var botonesFila = document.querySelectorAll('button[data-indice="' + indice + '"]');
        botonesFila.forEach(function(boton) {
            actualizarColorBoton(boton, estadoBotonesMatriz[indice]);
        });
        actualizarInputsHidden();
        console.log('Estado de botones:', estadoBotonesMatriz);
    }





    // Función para actualizar el color de un botón según su estado
    function actualizarColorBoton(boton, estado) {
        if (estado[0] === 1) {
            boton.style.backgroundColor = 'red'; // Si el botón A está activado, ponerlo en rojo
        } else if (estado[1] === 1) {
            boton.style.backgroundColor = 'green'; // Si el botón B está activado, ponerlo en verde
        } else {
            boton.style.backgroundColor = ''; // De lo contrario, eliminar el color de fondo
        }
    }

    // Función para actualizar los inputs hidden con los valores de la matriz
    function actualizarInputsHidden() {
        var inputsHidden = document.getElementsByClassName('estadoBotonesInput');
        for (var i = 0; i < estadoBotonesMatriz.length; i++) {
            var estadoBoton = estadoBotonesMatriz[i];
            for (var j = 0; j < estadoBoton.length; j++) {
                inputsHidden[i * 2 + j].value = estadoBoton[j];
            }
        }
    }

    // Crear inputs hidden para almacenar el estado de los botones
    for (var i = 0; i < estadoBotonesMatriz.length; i++) {
        for (var j = 0; j < 2; j++) {
            var inputHidden = document.createElement('input');
            inputHidden.type = 'hidden';
            inputHidden.name = 'estadoBotones[' + i + '][' + j + ']';
            inputHidden.classList.add('estadoBotonesInput');
            botonera.appendChild(inputHidden);
        }
    }

    // Obtener el formulario
    var formulario = document.getElementById('form_habilitaciones');

    // Agregar un evento 'submit' al formulario para prevenir el envío automático
    formulario.addEventListener('submit', function(event) {
        event.preventDefault(); // Evitar el envío automático del formulario
        // Agrega cualquier lógica adicional que necesites aquí
    });

    // Asignar el evento 'click' a todos los botones A y B
    document.querySelectorAll('.btn-ascensor').forEach(function(boton) {
        boton.addEventListener('click', handleClickBoton);
    });
});
