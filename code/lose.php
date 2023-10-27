<?php
session_start();

if (!isset($_SERVER['HTTP_REFERER']) || !strpos($_SERVER['HTTP_REFERER'], "game.php")) {
    // Si la página no se accede desde "game.php", redirige o muestra un mensaje de error.
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
    
    <div id="mensaje">
        <h3 >You lose </h3>
        <p><button id="lose" class="boton-mediano" onclick="recompensa()">Show Correct Answers</button></p>
        <form action="index.php" method="post">
            <button class="boton-mediano">Back to start</button>
        </form>
    </div>

    <div class="oculto" id="pantalla">
    <img src="images/lose.png" alt="" srcset="" width="540px" height="540px">
    <p><button class="boton-mediano" onclick="window.location.href = 'index.php'">Back To Start</button>
    <button id="publish_button" name="publish_button" type="submit"  class="boton-mediano"onclick="publish()">Publish</button></p>
    </div>
    <div class="oculto" id="publicar">
    <form method="post" id="publicar">
            <input type="text" name="nombre" id="nombre" placeholder="Introduce Your Name">
            <button type="submit" name="send" id="send">Send</button>
    </form> 
    </div>

    <script src="funciones/lose_sound.js"></script>
    <script src="funciones/funcionalidades.js"></script>
    <?php
        session_start();
        if (isset($_POST["nombre"])) {
            $file = fopen("records.txt", "a+");
            fwrite($file,$_POST["nombre"].", 0, ".session_create_id()."\n");
            fclose($file);            
        }
        session_destroy();
    ?>
</body>
</html>

