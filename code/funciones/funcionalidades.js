let aciertos = 0;
const totalPreguntas = 3; // El número total de preguntas en el juego
let currentQuestion = 1; // Inicializar con la primera pregunta

const botonesAccion = document.querySelectorAll(".boton-accion"); // Selecciona ambos botones

document.getElementById("botones").style.display = "none";
document.getElementById("nombre").style.display = "none";
document.getElementById("publicar").style.display = "none";
document.getElementById("win_button").style.display = "none";
document.getElementById("lose_button").style.display = "none";
document.getElementById("pantalla").style.display = "none";



function disableButtons(buttons) {
    for (let button of buttons) {
        button.disabled = true;
    }
}

function failClick() {
    playIncorrect();
    document.getElementById("lose_button").style.display = "block";
    let fails = document.getElementsByClassName("fail" + aciertos);
    for (let i = 0; i < fails.length; i++) {
        fails[i].style.color = "rgb(255, 0, 0)";
        fails[i].disabled = true;
    }
    let correct = document.getElementById("res" + aciertos);
    correct.style.color = "rgb(0, 255, 0)";
    correct.disabled = true;

    // Ocultar el contador al fallar una pregunta
    document.getElementById('contadorRegresivo').style.display = 'none';
}


function trueClick(button, pregunta_id) {
    playCorrect();
    button.style.color = "rgb(0, 255, 0)";

    let fails = document.getElementsByClassName("fail" + aciertos);
    for (let i = 0; i < fails.length; i++) {
        fails[i].style.color = "rgb(255, 0, 0)";
        fails[i].disabled = true;
    }

    document.getElementById("res" + aciertos).disabled = true;
    aciertos++;

    let nivel = document.getElementById("aciertos").innerText;

    if (parseInt(nivel, 10) >= 6 && aciertos >= 3) {
        document.getElementById("win_button").style.display = "block";
        const contador = document.getElementById('contadorRegresivo');
        contador.style.display = 'none'; // Oculta el contador al mostrar el botón de "Next Level"
    } else if (aciertos >= totalPreguntas) {
        document.getElementById("botones").style.display = "block";
        const contador = document.getElementById('contadorRegresivo');
        contador.style.display = 'none'; // Oculta el contador al mostrar el botón de "Menu"
    } else {
        mostrarSiguiente(aciertos);
        currentQuestion++;

        var preguntaElement = document.getElementById("pregunta" + currentQuestion);
        if (preguntaElement) {
            preguntaElement.scrollIntoView({ behavior: "smooth" });
        }

        // Reiniciar el contador a 30 segundos después de responder correctamente
        if (aciertos >= 1) {
            reiniciarContador();
        }
    }
}
function iniciarContador() {
    const contador = document.getElementById('tiempoRestante');

    const intervalo = setInterval(() => {
        if (tiempoRestante <= 0) {
            clearInterval(intervalo); // Detener el contador cuando el tiempo se agote
            document.getElementById('mensajeOK').style.display = 'block'; // Mostrar el mensaje
            contador.style.display = 'none'; // Ocultar el contador cuando se agota el tiempo
            window.location.href = 'lose.php'; // Redirigir a la página lose.php
            alert("TIME IS OVER");
        } else {
            tiempoRestante--; // Reducir el tiempo restante
            contador.textContent = tiempoRestante + ' s'; // Actualizar el contador
        }
    }, 1000); // Intervalo de actualización: 1 segundo
}


// Función para reiniciar el contador
function reiniciarContador() {
    tiempoRestante = 30; // Reiniciar el tiempo a 30 segundos
}

function tiempoExtra() {
    const contador = document.getElementById('tiempoRestante');
    tiempoRestante += 30;
    contador.textContent = tiempoRestante + ' s';

    const botonTiempoExtra = document.getElementById('comodinTiempoExtra');
    botonTiempoExtra.disabled = true;
    botonTiempoExtra.classList.add('boton-usado'); // Agrega una clase para aplicar estilos de botón usado
}






function mostrarSiguiente(numeroPregunta) {

    if (numeroPregunta >= totalPreguntas) {
        aciertos ++
        // El jugador ha respondido todas las preguntas correctamente
        // Mostrar los botones "Següents preguntes" e "Tornar a l'inici"
        document.getElementById("botones").style.display = "block";
        //enableButtons(botonesAccion); // Habilita los botones de clase "boton-accion"
    } else {
        document.getElementById("pregunta" + (numeroPregunta + 1)).style.display = "inline";
            //enableButtons(document.querySelectorAll("#pregunta" + (numeroPregunta + 1) + " button"));
    }
}

 function funcionUno() {
        // Obtener todos los botones de respuesta
        var botonesRespuesta = document.querySelectorAll('.grid button');
        
        // Contar los botones de respuesta visibles
        var botonesVisibles = 0;
        botonesRespuesta.forEach(function(boton) {
            if (getComputedStyle(boton).display !== 'none') {
                botonesVisibles++;
            }
        });

        // Si hay más de 2 visibles, ocultar 2 al azar
        if (botonesVisibles > 2) {
            var ocultos = 0;
            while (ocultos < 2) {
                var indice = Math.floor(Math.random() * botonesRespuesta.length);
                var boton = botonesRespuesta[indice];
                if (getComputedStyle(boton).display !== 'none') {
                    boton.style.display = 'none';
                    ocultos++;
                }
            }
        }
    }


// Agregar la función para redirigir a index.php
document.getElementById("inicio").addEventListener("click", function () {
    window.location.href = "index.php";
});

function publish() {
    document.getElementById('publicar').style.display = "block";
}

function toLose() {
    window.location.href = "lose.php";
}

function toWin() {
    window.location.href = "win.php";
}

function index() {
    window.location.href = "index.php";
}

function recompensa() {
    document.getElementById("pantalla").style.display = "block";
    document.getElementById("mensaje").style.display = "none";
}




