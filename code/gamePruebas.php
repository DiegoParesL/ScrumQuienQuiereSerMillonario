<?php
session_start();

// Obtener el idioma de la URL o usar un idioma predeterminado
$idioma = isset($_GET['lang']) ? $_GET['lang'] : 'ca'; // Cambia 'ca' por el idioma predeterminado que desees

$nivel = isset($_SESSION['nivel']) ? $_SESSION['nivel'] : 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['siguiente'])) {
    // Verifica si el jugador ha completado el tercer nivel
    $nivel++;
    if ($nivel < 6) {
        $_SESSION['nivel'] = $nivel;
    }
}

echo "<p class='' id='aciertos'>" . $nivel . "</p>";

function preguntas()
{
    global $nivel, $idioma;
    $question_mark = '*';
    $file_path = "questions/{$idioma}_" . strval($nivel) . ".txt";
    $preguntas_nivel = file($file_path);
    $preguntas_por_nivel = [];
    $llave = '';
    foreach ($preguntas_nivel as $linea) {
        if ($linea[0] === $question_mark) {
            $llave = $linea;
        } elseif ($linea[0] === "+") {
            $preguntas_por_nivel[$llave][] = $linea;
        } elseif ($linea[0] === "-") {
            $preguntas_por_nivel[$llave][] = $linea;
        }
    }
    return $preguntas_por_nivel;
}

// Resto de tu código para imprimir preguntas, respuestas y botones
