<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joc</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <noscript>
    <h1 id="jsDisabledMessage">Javascript is disabled, activate it to play</h1>
</noscript>
<?php
        echo"<div id=\"oculto\" class=\"publico\">";
        echo"<div class=\"publicOcult red-bar\">";
        //echo "<p>(1,1)</p>";
        echo"</div>";
        echo"<div class=\"publicOcult blue-bar\">";
        //echo "<p>(1,2)</p>";
        echo"</div>";
        echo"<div class=\"publicOcult orange-bar\">";
        //echo "<p>(2,1)</p>";
        echo"</div>";
        echo"<div class=\"publicOcult yellow-bar\">";
        //echo "<p>(2,2)</p>";
        echo"</div>";
        echo"</div>";

        echo "<div id='contenedorTelefono'>";
        echo "<img id='imgTel' src='./images/telefono.png' alt='Imagen Comodin Telefono'  class='responsive'>";
        echo "</div>";
    ?>  
    <a href="win.php">
        <img class="imgGame" src="images/milionari.png" alt="" height="150px" width="150px">
    </a>
    <br>
    
    <input type="button" class="oculto" value="Empezar" id="boton" >
    <br>

    <div class="preguntasContainer" id="preguntasContainer">
                <h2 id='crono' class="crono">00:00:00</h2>

        <div class="vertical-buttons">
            <button  id="CLlamada" onclick="llamada()">
                <img id="tel" src="images/telefono.png" alt="" width="50" height="50">
                <img id="xtel" src="images/xtel.png" alt="" width="50" height="50">
            
            </button>
            <button onclick="comodin50_50()">
                <img id="C50" src="images/comodin50.png" alt="" width="50" height="50">
                <img id="xC50" src="images/xcomodin50.png" alt="" width="50" height="50">
            
            </button>
            <button onclick="preguntaAlPublico()" id="comodinPublico">
                <img id="publ" src="images/comodinpublico.png" alt="" width="50" height="50">
                <img id="xpubl" src="images/xcomodinpublico.png" alt="" width="50" height="50">
                
            </button>
            <button onclick="tiempoExtra()" id="comodinTiempoExtra" >
                <img id="TE" src="images/comodintiempoextra.png" alt="" width="550" height="50">
                <img id="XTE" src="images/xcomodintiempoextra.png" alt="" width="550" height="50">
            </button>
        </div>
    
   
    
    <?php
    error_reporting(0);
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

    echo "<h2 class='nvl' id='aciertos'>LEVEL " . $nivel . "</h2>";


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
            } elseif ($linea[0] === "#") {
                $imagenes_por_nivel[$llave] = $linea;
            }
        }
        return $preguntas_por_nivel;
    }
    function imagenes_preguntas() {
        global $nivel, $idioma;
        $question_mark = '*';
        $preguntas_nivel = file("questions/{$idioma}_{$nivel}.txt");
        $imagenes_por_nivel = [];
        $llave = '';
        foreach ($preguntas_nivel as $linea) {
            if ($linea[0] === $question_mark) {
                $llave = $linea;
            }  elseif ($linea[0] === "#") {
                $imagenes_por_nivel[$llave] = $linea;
            }
        }
        return $imagenes_por_nivel;
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
    if (!isset($_COOKIE["aciertos"])) {
        $_COOKIE["aciertos"] = 0;
        $aciertos = $_COOKIE["aciertos"];
    } else {
        $aciertos = $_COOKIE["aciertos"];
    }
    echo "<form>";
    echo "<input type='hidden' id='valueAciertos' name='aciertos' value='$aciertos' > ";
    echo "</form>";
   
    function print_preguntas_aleatorias()
    {
        $preguntas_escogidas = preguntas_aleatorias();
        $total = count($preguntas_escogidas);
        $preguntas_restantes = $total;
        $imagenes = imagenes_preguntas();
        
        //echo "<input type='text' id='valueAciertos' name='aciertos' value='$aciertos' > ";
        foreach ($preguntas_escogidas as $key => $value) {
            if ($preguntas_restantes == $total) {
                echo "<div class='contenedorPreguntas'>";
                echo "<h2 class='tamañoPreguntas'  >" . substr($key, 1) . "</h2>"; // Quita el signo "*" en el título
                echo "<p id='cronometro-preguntas'></p>";
                $clean_img = substr($imagenes[$key],1);
                $clean_img = trim($clean_img, " ");
                if ($clean_img != "") {
                    echo "<img src=". $clean_img ." alt='' height='250px' width='250px'>";
                }
                echo "<div class='grid'>";
                foreach ($value as $respuestas) {
                    if ($respuestas[0] === "+") {
                        echo "<p class=\"oculto\" id='respuesta" . ($total - $preguntas_restantes) . "'>$respuestas</p>";
                        echo "<button name='incrementar' id=\"res" . ($total - $preguntas_restantes) . "\" style='font-size: 20px;' onclick=\"trueClick(this);setAciertos();\">" . trim($respuestas, "+-") . "</button>";
                    } else {
                        echo "<button class=\"fail" . ($total - $preguntas_restantes) . "\" style='font-size: 20px;' onclick=\"failClick(this)\">" . trim($respuestas, "+-") . "</button>";
                    }
                }
                echo "</div>";
                echo "</div>";
            } else {
                echo "<div id='pregunta" . ($total - $preguntas_restantes + 1) . "' class='oculto'>";
                echo "<p id='cronometro-preguntas'></p>";
                echo "<h2 class='tamañoPreguntas' >" . substr($key, 1) . "</h2>"; // Quita el signo "*" en el título
                echo "<div class='grid'>";
                foreach ($value as $respuestas) {
                    if ($respuestas[0] === "+") {
                        echo "<p class=\"oculto\" id='respuesta" . ($total - $preguntas_restantes) . "'>$respuestas</p>";
                        echo "<button name='incrementar' id=\"res" . ($total - $preguntas_restantes) . "\" style='font-size: 20px;'onclick=\"trueClick(this);setAciertos();\">" . trim($respuestas, "+-") . "</button>";
                    } else {
                        echo "<button class=\"fail" . ($total - $preguntas_restantes) . "\" style='font-size: 20px;' onclick=\"failClick(this)\">" . trim($respuestas, "+-") . "</button>";
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
            <button type="button" class="boton-accion grande" onclick="window.location.href='index.php'">Menu</button>
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

        


    <p><button id="win_button" class="centrar-boton" onclick="window.location.href = 'win.php'">Ver estadisticas</button></p>
    <p><button id="lose_button" class="centrar-boton" onclick="window.location.href = 'lose.php'">Ver estadisticas</button></p>

    
     <script src="funciones/sounds.js"></script>
    <script src="funciones/funcionalidades.js"></script>
    <script src="funciones/pass_aciertos.js"></script>
    <script src="funciones/comodinPublico.js"></script>
    <script src="funciones/comodin50_50.js"></script>
    <script src="funciones/comodinLlamada.js"></script>
    <script src="funciones/cronometro.js"></script>

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