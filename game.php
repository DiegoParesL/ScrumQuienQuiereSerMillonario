<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joc</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    global $nivel;
    $nivel = 1;
    function preguntas()
    {
        global $nivel;
        $question_mark = '*';
        $preguntas_nivel = file("questions/catalan_" . strval($nivel) . ".txt");
        $preguntas_por_nivel = [];

        for ($i = 0; $i < count($preguntas_nivel); $i++) {
            if ($preguntas_nivel[$i][0] === $question_mark) {
                $llave = $preguntas_nivel[$i];
            } 
            elseif ($preguntas_nivel[$i][0] === "+") {
                $preguntas_por_nivel[$llave][] = $preguntas_nivel[$i];
            }
            elseif ($preguntas_nivel[$i][0] === "-") {
                $preguntas_por_nivel[$llave][] = $preguntas_nivel[$i];
            }
        }
        var_dump($preguntas_por_nivel);
        return $preguntas_por_nivel;
    }

    function numeros_aleatorios($max)
    {
        //shuffle($preguntas_por_nivel);
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
                echo "<h2>$key</h2>";
                foreach ($value as $respuestas) {
                    if($respuestas[0]=== "+"){
                        echo "<p class=\"oculto\" id='respuesta".($total-$preguntas_restantes)."'>$respuestas</p>";
                        echo "<button id=\"res".($total-$preguntas_restantes)."\" onclick=\"trueClick()\">".trim($respuestas,"+-")."</button>";
                    }else{
                        echo "<button class=\"fail".($total-$preguntas_restantes)."\" onclick=\"failClick()\">".trim($respuestas,"+-")."</button>";
                    }
                }
                
                echo "</div>";
            } else {
                echo "<div id='pregunta".($total-$preguntas_restantes+1)."' class='oculto'>";
                echo "<h2>$key</h2>";
                foreach ($value as $respuestas) {
                    if($respuestas[0]=== "+"){
                        echo "<p class=\"oculto\" id='respuesta".($total-$preguntas_restantes)."'>$respuestas</p>";
                        echo "<button id=\"res".($total-$preguntas_restantes)."\" onclick=\"trueClick()\">".trim($respuestas,"+-")."</button>";
                    }else{
                        echo "<button class=\"fail".($total-$preguntas_restantes)."\" onclick=\"failClick()\">".trim($respuestas,"+-")."</button>";
                    }
                }  
                echo "</div>";
            }
            $preguntas_restantes--;
        }
    }
    print_preguntas_aleatorias();
    ?>
    <div class='oculto'>
    <button>Següents preguntes</button>
    <button>Tornar a l'inici</button>
    </div>
    
    <script src="funcionalidades.js"></script>
</body>
</html>