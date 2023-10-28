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
    } else if (aciertos >= totalPreguntas) {
        document.getElementById("botones").style.display = "block";
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
    const contador = document.getElementById('contadorRegresivo');

    const intervalo = setInterval(() => {
        contador.textContent = `Tiempo restante: ${tiempoRestante} s`;

        if (tiempoRestante <= 0) {
            clearInterval(intervalo); // Detener el contador cuando el tiempo se agote
            // Aquí puedes agregar lógica adicional cuando el tiempo se agote
        } else {
            tiempoRestante--; // Reducir el tiempo restante
        }
    }, 1000); // Intervalo de actualización: 1 segundo
}

// Función para reiniciar el contador
function reiniciarContador() {
    tiempoRestante = 30; // Reiniciar el tiempo a 30 segundos
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

function toWin() {
    window.location.href = "win.php";
}

function recompensa() {
    document.getElementById("pantalla").style.display = "block";
    document.getElementById("mensaje").style.display = "none";
}




