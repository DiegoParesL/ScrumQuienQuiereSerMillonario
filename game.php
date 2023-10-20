<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>GAME</title>
</head>
<body>
    <?php
    $pregunta =1;
    $hilo ="";
    while ($pregunta <=18){
        if($pregunta == 1){
            echo "<div class=\"visible\">";
            echo "<h2>Pregunta $pregunta</h2>";
        } else{
           echo "<div class=\"oculto\">";
            echo "<h2>Pregunta $pregunta</h2>"; 
        }
        
        for($res = 1; $res<=4; $res++){
            
            if($res%4!=0) {
                echo"<button id=\"button$pregunta"."_$res\" onclick=\"failClick()\">respuesta $res</button>\t\t\t";
            }else{
                echo"<button id=\"button$pregunta"."_$res\" onclick =\"trueClick()\">respuesta $res</button>\t\t\t";
            }       
            if ($res ==2){
                echo "<br><br>";
            }     
            
        }
        echo "<p id=\"result\"></p>";
        echo "</div>";
        $pregunta++;
    }
    
    ?>
    <script src="funcionalidades.js"></script>
</body>
</html>