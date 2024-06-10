document.addEventListener('DOMContentLoaded', function() {
  // Pedir al usuario la cantidad de pisos y subsuelos

  // Crear una matriz para almacenar el estado de los botones A y B
  var estadoBotonesMatriz = [];

  window.estadoBotonesMatriz = estadoBotonesMatriz;

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
      button.addEventListener('click', function() {
        var indice = parseInt(this.dataset.indice);
        var estadoBoton = estadoBotonesMatriz[indice];
        estadoBoton[texto === 'A' ? 0 : 1] = 1 - estadoBoton[texto === 'A' ? 0 : 1]; // Alternar entre 0 y 1
        actualizarColorBotones();
        actualizarInputsHidden();
        console.log('Estado de botones:', estadoBotonesMatriz);
      });
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

  // Función para actualizar el color de los botones A y B según el estado actual
  function actualizarColorBotones() {
    var botones = botonera.getElementsByClassName('btn');
    for (var i = 0; i < botones.length; i++) {
      var boton = botones[i];
      if (boton.textContent === 'A' || boton.textContent === 'B') {
        var indice = parseInt(boton.dataset.indice);
        var estadoBoton = estadoBotonesMatriz[indice];
        if (estadoBoton[boton.textContent === 'A' ? 0 : 1] === 1) {
          boton.style.backgroundColor = 'red';
        } else {
          boton.style.backgroundColor = '';
        }
      }
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
    var formulario = document.getElementById('form_habilitaciones'); // Reemplaza 'tu_formulario' con el ID de tu formulario

    // Agregar un evento 'submit' al formulario para prevenir el envío automático
    formulario.addEventListener('submit', function(event) {
        event.preventDefault(); // Evitar el envío automático del formulario
        // Agrega cualquier lógica adicional que necesites aquí
    });
});