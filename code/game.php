<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joc</title>
</head>
<body>
    <?php
    global $nivel;
    $nivel = 1;
    function preguntas()
    {
        global $nivel;
        $question_mark = '*';
        $correct_mark = '=';
        $incorrect_mark = '-';
        $preguntas_nivel = file("questions/catalan_".strval($nivel).".txt");
        $preguntas_por_nivel = [];
        
        for ($i = 0; $i < count($preguntas_nivel); $i++) {
            if ($preguntas_nivel[$i][0] === $question_mark) {
                $llave = $preguntas_nivel[$i];
            }
            else {
                $preguntas_por_nivel[$llave][] .= $preguntas_nivel[$i];
            }
        }
        return $preguntas_por_nivel;
    }
    
    function preguntas_aleatorias() {
        $preguntas_por_nivel = preguntas();
        //shuffle($preguntas_por_nivel);
        var_dump($preguntas_por_nivel);
        foreach ($preguntas_por_nivel as $key => $array) {
            echo "<h2>$key<h2>";
            foreach ($array as $respuestas) {
                echo "<button>$respuestas</button>";
            }
        }
        
        
        
    }
    preguntas_aleatorias();
    ?>
</body>
</html>