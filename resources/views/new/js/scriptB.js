document.addEventListener('DOMContentLoaded', function() {

    // Crear una matriz para almacenar el estado de los botones A y B
    var estadoBotonesMatriz = [];

    // Crear la botonera de ascensor
    var botonera = document.getElementById('botonera');

    // Agregar encabezado para la primera fila
    crearEncabezado('A', botonera);
    crearEncabezado('Pisos', botonera);
    crearEncabezado('B', botonera);
    botonera.appendChild(document.createElement('br'));

    // Crear botones para los pisos superiores (N, N-1, N-2, ...)
    for (var i = totalPisos; i >= 0; i--) {
        crearBoton('A', botonera, i);
        crearBoton(i == 0 ? 'PB' : i, botonera, false);
        crearBoton('B', botonera, i);
        botonera.appendChild(document.createElement('br'));
        estadoBotonesMatriz.push([1, 0]); // Inicializar cada fila con el estado de los botones A (verde) y B (rojo)
    }

    // Crear botones para los subsuelos en orden descendente (-1, -2, -3, ...)
    for (var i = -1; i >= -totalSubsuelos; i--) {
        var indicePositivo = totalPisos + Math.abs(i); // Mapear el índice negativo a un índice positivo
        crearBoton('A', botonera, indicePositivo);
        crearBoton(i == 0 ? 'PB' : i, botonera, false);
        crearBoton('B', botonera, indicePositivo);
        botonera.appendChild(document.createElement('br'));
        estadoBotonesMatriz.push([1, 0]); // Inicializar cada fila con el estado de los botones A (verde) y B (rojo)
    }

    // Función para crear botones
    function crearBoton(texto, contenedor, indice) {
        var button = document.createElement('button');
        button.textContent = texto;
        button.classList.add('btn');

        // Si el botón es A o B, se le asigna la clase 'btn' para cambiar de color
        if (texto === 'A' || texto === 'B') {
            button.classList.add('btn-ascensor');
            button.dataset.indice = indice;
            button.dataset.tipo = texto;
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
    function crearEncabezado(texto, contenedor) {
        var button = document.createElement('button');
        button.textContent = texto;
        button.classList.add('btnEnc');
        if (texto === 'Pisos') {
            button.classList.add('btnEncPiso');
        }
        contenedor.appendChild(button);
    }

    // Función para manejar el clic en los botones A y B
    function handleClickBoton(event) {
        var indice = parseInt(this.dataset.indice);
        var tipo = this.dataset.tipo;
        var estadoBoton = estadoBotonesMatriz[indice];
        var otroIndice = tipo === 'A' ? 1 : 0; // Índice del otro botón en la misma fila

        // Cambiar el estado del botón clicado
        estadoBoton[tipo === 'A' ? 0 : 1] = 1 - estadoBoton[tipo === 'A' ? 0 : 1];
        
        // Asegurar que el otro botón tenga el estado opuesto
        estadoBoton[otroIndice] = 1 - estadoBoton[tipo === 'A' ? 0 : 1];

        var botonesFila = document.querySelectorAll('button[data-indice="' + indice + '"]');
        botonesFila.forEach(function(boton) {
            actualizarColorBoton(boton, estadoBotonesMatriz[indice]);
        });
        actualizarInputsHidden();
        console.log('Estado de botones:', estadoBotonesMatriz);
    }

    // Función para actualizar el color de un botón según su estado
    function actualizarColorBoton(boton, estado) {
        if (boton.dataset.tipo === 'A') {
            boton.style.backgroundColor = estado[0] === 1 ? 'green' : 'red';
        } else if (boton.dataset.tipo === 'B') {
            boton.style.backgroundColor = estado[1] === 1 ? 'green' : 'red';
        }
    }

    // Aplicar los colores iniciales a los botones después de crearlos
    document.querySelectorAll('.btn-ascensor').forEach(function(boton) {
        var indice = parseInt(boton.dataset.indice);
        actualizarColorBoton(boton, estadoBotonesMatriz[indice]);
    });

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
    var formulario = document.getElementById('form_habilitaciones'); // Reemplaza 'tu_formulario' con el ID de tu formulario

    // Agregar un evento 'submit' al formulario para prevenir el envío automático
    formulario.addEventListener('submit', function(event) {
        event.preventDefault(); // Evitar el envío automático del formulario
        // Agrega cualquier lógica adicional que necesites aquí
    });

});

    
