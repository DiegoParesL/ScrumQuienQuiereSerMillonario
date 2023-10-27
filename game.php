<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joc</title>
    <link rel="stylesheet" href="style.css">
</head>
<body onload="inicio()">
    <img src="images/milionari.png" alt="" height="150px" width="150px">
    <br>
    <span class="cronometro-sticky">
        <p class="reloj" id="Minutos">00</p>
        <p class="reloj" id="Segundos">00</p>    
    </span>
    <br>
    <div id="preguntasContainer" onload="inicio()">
<?php
session_start();

// Obtener el idioma del campo oculto



$idioma = isset($_GET['lang']) ? $_GET['lang'] : 'catalan'; // Cambia 'catalan' al idioma predeterminado que desees
$nivel = isset($_SESSION['nivel']) ? $_SESSION['nivel'] : 1;


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['siguiente'])) {
    // Verifica si el jugador ha completado el tercer nivel
    $nivel++;
    if ($nivel < 6) {
        $_SESSION['nivel'] = $nivel;
    }
}

echo "<p class='' id='aciertos'>Nivel: " . $nivel . "</p";

function preguntas()
{
    global $nivel, $idioma;
    $question_mark = '*';
    $preguntas_nivel = file("questions/{$idioma}_{$nivel}.txt");
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

function numeros_aleatorios($max)
{
    $array_of_number = [];
    for ($i = 0; $i < 3; $i++) {
        while (true) {
            $num = rand(0, $max - 1);
            if (!in_array($num, $array_of_number)) {
                array_push($array_of_number, $num);
                break;
            }
        }
    }
    return $array_of_number;
}

function preguntas_aleatorias()
{
    $i = 0;
    $preguntas = preguntas();
    $positions = numeros_aleatorios(count($preguntas));
    $preguntas_nivel = [];
    foreach ($preguntas as $key => $value) {
        if (in_array($i, $positions)) {
            foreach ($value as $respuestas) {
                $preguntas_nivel[$key][] = $respuestas;
            }
        }
        $i++;
    }
    return $preguntas_nivel;
}

function print_preguntas_aleatorias()
{
    $preguntas_escogidas = preguntas_aleatorias();
    $total = count($preguntas_escogidas);
    $preguntas_restantes = $total;

    foreach ($preguntas_escogidas as $key => $value) {
        if ($preguntas_restantes == $total) {
            echo "<div>";
            echo "<h2>" . substr($key, 1) . "</h2>"; // Quita el signo "*" en el título
            echo "<p id='cronometro-preguntas'></p>";
            echo "<div class='grid' >";
            foreach ($value as $respuestas) {
                if ($respuestas[0] === "+") {
                    echo "<p class=\"oculto\" id='respuesta" . ($total - $preguntas_restantes) . "'>$respuestas</p>";
                    echo "<button name='incrementar' id=\"res" . ($total - $preguntas_restantes) . "\" onclick=\"trueClick(this)\">" . trim($respuestas, "+-") . "</button>";
                } else {
                    echo "<button class=\"fail" . ($total - $preguntas_restantes) . "\" onclick=\"failClick(this)\">" . trim($respuestas, "+-") . "</button>";
                }
            }
            echo "</div>";
            echo "</div>";
        } else {
            echo "<div id='pregunta" . ($total - $preguntas_restantes + 1) . "' class='oculto' >";
            echo "<p id='cronometro-preguntas'></p>";
            echo "<h2>" . substr($key, 1) . "</h2>"; // Quita el signo "*" en el título
            echo "<div class='grid' onload='cuenta_atras()'>";
            foreach ($value as $respuestas) {
                if ($respuestas[0] === "+") {
                    echo "<p class=\"oculto\" id='respuesta" . ($total - $preguntas_restantes) . "'>$respuestas</p>";
                    echo "<button name='incrementar' id=\"res" . ($total - $preguntas_restantes) . "\" onclick=\"trueClick(this);contador_regresivo()\">" . trim($respuestas, "+-") . "</button>";
                } else {
                    echo "<button class=\"fail" . ($total - $preguntas_restantes) . "\" onclick=\"failClick(this)\">" . trim($respuestas, "+-") . "</button>";
                }
            }
            echo "</div>";
            echo "</div>";
        }

        $preguntas_restantes--;
    }
}
print_preguntas_aleatorias();
?>
        </div>
    <div class='oculto' id="botones">
        <form method="post">
            <button name="siguiente" class="boton-accion" id="siguiente">Next Questions</button>
        </form>
    </div>

    <p><button id="win_button" class="centrar-boton" onclick="window.location.href = 'win.php'">Show Stats</button></p>
    <p><button id="lose_button" class="centrar-boton" onclick="window.location.href = 'lose.php'">Wrong Answer</button></p>
    <a href="win.php"><img src="images/milionari.png" alt="" height="3px" width="3px"></a>
        
    <script src="funciones/cronometro.js"></script>
    <script src="funciones/funcionalidades.js"></script>
    <script src="funciones/sounds.js"></script>
</body>
</html>
