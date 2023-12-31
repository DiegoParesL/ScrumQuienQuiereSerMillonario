<?php
session_start();

if (
    !isset($_SERVER['HTTP_REFERER']) || 
    (
        strpos($_SERVER['HTTP_REFERER'], "game.php") === false && 
        strpos($_SERVER['HTTP_REFERER'], "lose.php") === false
    )
) {
    // Si la página no se accede desde "game.php" ni desde "lose.php", redirige o muestra un mensaje de error.
    header("HTTP/1.1 403 Forbidden");
    exit;
}


// El contenido de la página "lose.php" continua aquí
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Lose</title>
</head>
<body>
    
    

    <div  id="pantalla">
        <br>
    <h3 >You lose </h3>
    <?php 
    echo "<p>You answered " . $_COOKIE["aciertos"] . " questions correctly.</p>";
    ?>
    <br><br>
    <p><button class="boton-mediano" onclick="window.location.href = 'index.php'">Back To Start</button>
    <button id="publish_button" name="publish_button" type="submit"  class="boton-mediano"onclick="publish()">Publish</button></p>
    </div>
    <div class="oculto" id="publicar">
    <form method="post"  id="publicar">
            <input type="text" name="nombre" id="nombre" placeholder="Introduce Your Name">
            <button type="submit" name="send" id="send">Send</button>
    </form> 
    </div>

    <script src="funciones/lose_sound.js"></script>
    <script src="funciones/funcionalidades.js"></script>
    <?php
        $tiempo = $_COOKIE["crono"];
        $tiempo_separado = explode(":", $tiempo);
        $segundos_totales = (($tiempo_separado[0]*3600)+($tiempo_separado[1]*60)+($tiempo_separado[2]));
        //print_r($segundos_totales);
        if (isset($_POST["nombre"])) {
            $file = fopen("records.txt", "a+");
            fwrite($file,$_POST["nombre"].", ".$_COOKIE["aciertos"].", ".session_create_id().", ".$tiempo."\n");
            fclose($file);            
        }
    ?>
</body>
</html>