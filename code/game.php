<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joc</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img src="images/milionari.png" alt="" height="150px" width="150px">
    <div id="preguntasContainer">
   
    <div class="vertical-buttons">
        <button onclick="funcionUno()">
            <img src="images/comodin50.png" alt="" width="50" height="50">
           
        </button>
        <button onclick="funcionDos()">
            <img src="images/comodinpublico.png" alt="" width="50" height="50">
            
        </button>
        <button onclick="funcionTres()" id="comodinTiempoExtra" disabled>>
            <img src="images/comodintiempoextra.png" alt="" width="550" height="50">
        </button>
    </div>
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

    echo "<p class='' id='aciertos'>" . $nivel ."</p";

    function preguntas() {
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

    function numeros_aleatorios($max) {
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

    function preguntas_aleatorias() {
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

    function print_preguntas_aleatorias() {
    $preguntas_escogidas = preguntas_aleatorias();
    $total = count($preguntas_escogidas);
    $preguntas_restantes = $total;

    foreach ($preguntas_escogidas as $key => $value) {
        // Agrega un identificador único a cada pregunta
        $pregunta_id = "pregunta" . ($total - $preguntas_restantes + 1);

        // Extraer la información de la imagen asociada, si está presente
        $imagen_path = "";
        if (strpos($key, '#') !== false) {
            $parts = explode("#", $key);
            $imagen_path = trim($parts[1]);
        }

        if ($preguntas_restantes == $total) {
            echo "<div>";
            echo "<h2>" . substr($key, 1) . "</h2>"; // Quita el signo "*" en el título
            echo "<div class='grid'>";
            if (!empty($imagen_path)) {
                echo "<img src='$imagen_path' alt='Imagen asociada a la pregunta'>";
            }
            foreach ($value as $respuestas) {
                if ($respuestas[0] === "+") {
                    echo "<p class=\"oculto\" id='respuesta" . ($total - $preguntas_restantes) . "'>$respuestas</p>";
                    // Agrega la función de scroll hacia la siguiente pregunta en el botón de respuesta correcta
                    echo "<button style=\"font-size: 25px;\" id=\"res" . ($total - $preguntas_restantes) . "\" onclick=\"trueClick(this, '$pregunta_id')\">" . trim($respuestas, "+-") . "</button>";
                } else {
                    echo "<button class=\"fail" . ($total - $preguntas_restantes) . "\" style=\"font-size: 25px;\" onclick=\"failClick(this)\">" . trim($respuestas, "+-") . "</button>";
                }
            }
            echo "</div>";
            echo "</div>";
        } else {
            echo "<div id='$pregunta_id' class='oculto'>";
            echo "<h2>" . substr($key, 1) . "</h2>"; // Quita el signo "*" en el título
            echo "<div class='grid'>";
            if (!empty($imagen_path)) {
                echo "<img src='$imagen_path' alt='Imagen asociada a la pregunta'>";
            }
            foreach ($value as $respuestas) {
                if ($respuestas[0] === "+") {
                    echo "<p class=\"oculto\" id='respuesta" . ($total - $preguntas_restantes) . "'>$respuestas</p>";
                    // Agrega la función de scroll hacia la siguiente pregunta en el botón de respuesta correcta
                    echo "<button style=\"font-size: 25px;\" id=\"res" . ($total - $preguntas_restantes) . "\" onclick=\"trueClick(this, '$pregunta_id')\">" . trim($respuestas, "+-") . "</button>";
                } else {
                    echo "<button class=\"fail" . ($total - $preguntas_restantes) . "\" style=\"font-size: 25px;\" onclick \"failClick(this)\">" . trim($respuestas, "+-") . "</button>";
                }
            }
            echo "</div>";
            echo "</div>";
        }
        $preguntas_restantes--;
    }
    }


    // Llama a la función para imprimir las preguntas
    print_preguntas_aleatorias();

    ?>
    
    <div class='oculto' id="botones">
        <form method="post" class="botones-container">
            <br>
            <button name="siguiente" class="boton-accion grande" id="siguiente">Next Level</button>
            <br>
            <button class="boton-accion grande" onclick="window.location.href='index.php'">Menu</button>
        </form>
    </div>


    


    <?php if ($nivel >= 2) { ?>
        <br><br>
    <div id="contadorRegresivo">
        <span class="normal-text">
            <span class="red-blinking-text">Time Left:</span>
        </span>
        <span id="tiempoRestante" class="red-blinking-text">30 s</span>
    </div>
    <div id="mensajeOK" class="hidden-message">¡Tiempo agotado! Has perdido.</div>
<?php } ?>




    <p><button id="win_button" class="centrar-boton" onclick="window.location.href = 'win.php'">Show Stats</button></p>
    <p><button id="lose_button" class="centrar-boton" onclick="window.location.href = 'lose.php'">Wrong Answer</button></p>

    
     <script src="funciones/sounds.js"></script>
    <script src="funciones/funcionalidades.js"></script>
    <script src="funciones/pass_aciertos.js"></script>
    <script>
    let tiempoRestante = 30; // Por ejemplo, 30 segundos
    // Solo si el nivel es mayor o igual a 2, inicia el contador

    <?php if ($nivel >= 2) { ?>
        // Establecer el tiempo inicial en segundos
        

       

        // Llamar a la función para iniciar el contador
        iniciarContador();
    <?php } ?>
    </script>

 

</body>
</html>
