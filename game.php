<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GAME</title>
</head>
<body>
    <?php
    $pregunta =0;
    $hilo ="";
    while ($pregunta <18){
        echo "<h2>Pregunta$pregunta</h2>";
        for($res = 1; $res<=4; $res++){
            
            if($res%4!=0) {
                echo"<button onclick =\"trueClick()\">pregunta$res</button>\t";
            }else{
                echo"<button onclick=\"failClick()\">pregunta$res</button>\t";
            }       
            if ($res ==2){
                echo "<br>";
            }     
            
        }
        $pregunta++;
    }
    
    ?>
</body>
</html>