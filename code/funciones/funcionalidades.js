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
    empezarDetener();
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
//para el comodin del publico, que le pase el valor del grid al js de comodin_publico.js
function setNumPadreGrid() {
    let cont =0;
    return cont
}
function createCont() {
    let c =0;
    return c;
}
function trueClick(button, pregunta_id) {
    //para el comodin del publico, que incremente el valor del grid para el js de comodin_publico.js
    
    if (createCont()==0) {
        let cont = createCont();
        console.log("cont de valor: "+cont);
        window.localStorage.setItem("numPregunta",cont);
        cont ++
    } else{
        cont++
        window.localStorage.setItem("numPregunta",cont);
    }
    
    //para el comodin del publico, que le pase el valor del grid al js de comodin_publico.js
    
    playCorrect();
    button.style.color = "rgb(0, 255, 0)";

    

    
    //aciertos++;
    let galletas = document.cookie;
    let galleta = galletas.split(";");
    let valorGalleta
    for (let i = 0; i < galleta.length; i++) {
        let nombreGalleta = galleta[i].split("=")
        //console.log(nombreGalleta[0],nombreGalleta[1]);
        if(nombreGalleta[0].trim()=="aciertos"){
            
            valorGalleta = nombreGalleta[1];
        }
        
    }
    let nivel = Math.floor(valorGalleta/3);
    let aciertos = valorGalleta%3;
    document.getElementById("res" + aciertos).disabled = true;
    let fails = document.getElementsByClassName("fail" + aciertos);
    for (let i = 0; i < fails.length; i++) {
        fails[i].style.color = "rgb(255, 0, 0)";
        fails[i].disabled = true;
    }

    if (parseInt(nivel) >= 5 && 1+aciertos >= 3) {
        document.getElementById("win_button").style.display = "block";
        let contador = document.getElementById('contadorRegresivo');
        contador.style.display = 'none'; // Oculta el contador al mostrar el botón de "Next Level"
        empezarDetener();
    } else if (aciertos >= totalPreguntas) {
        document.getElementById("botones").style.display = "block";
        let contador = document.getElementById('contadorRegresivo');
        contador.style.display = 'none'; // Oculta el contador al mostrar el botón de "Menu"
    } else {
        mostrarSiguiente(1+aciertos);
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


// *********************************************************************************************************
// FUNCION COMODIN TIEMPO EXTRA
function tiempoExtra() {
    const contador = document.getElementById('tiempoRestante');
    tiempoRestante += 30;
    contador.textContent = tiempoRestante + ' s';

    const botonTiempoExtra = document.getElementById('comodinTiempoExtra');
    botonTiempoExtra.disabled = true;
    //botonTiempoExtra.classList.add('boton-usado'); // Agrega una clase para aplicar estilos de botón usado
}
// *********************************************************************************************************





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

function index() {
    window.location.href = "index.php";
}

function recompensa() {
    document.getElementById("pantalla").style.display = "block";
    document.getElementById("mensaje").style.display = "none";
}



