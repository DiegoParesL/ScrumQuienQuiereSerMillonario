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
        $preguntas_nivel = file("questions/catalan_".strval($nivel).".txt");
        $preguntas_nivel_separadas = [];
        for ($i = 0; $i < count($preguntas_nivel); $i++) {
            if ($preguntas_nivel[$i][0] == "*") {
                array_push($preguntas_nivel_separadas, $preguntas_nivel[$i]);
            }
            else {
                $preguntas_nivel_separadas[$i] = $preguntas_nivel[$i];
            }
            echo "" . $preguntas_nivel[$i] . "<br>";
        }
        var_dump($preguntas_nivel_separadas);
    }
    preguntas();
    ?>
</body>
</html>