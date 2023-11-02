<?php
session_start();

if (!isset($_SERVER['HTTP_REFERER']) || !strpos($_SERVER['HTTP_REFERER'], "game.php")) {
    // Si la página no se accede desde "game.php", redirige o muestra un mensaje de error.
    header("HTTP/1.1 403 Forbidden");
   
    exit;
}
// El contenido de la página "win.php" continua aquí
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Win</title>
</head>
<body>
    <div id="mensaje">
        <h3>You got it</h3>
        <p><button id="win" class="boton-mediano" onclick="recompensa()">Show Correct Answers</button></p>
        <form action="index.php" method="post">
            <button class="boton-mediano" >Back To Start</button>
        </form>
    </div>

    <div class="oculto" id="pantalla">
    <img src="images/congratulations.gif" alt="" >

    <p>
    <button class="boton-mediano" onclick="window.location.href = 'index.php'">Back To Start</button>
    <button class="boton-mediano" id="publish_button" name="publish_button" type="submit" onclick="publish()">Publish</button>
    </p>
    </div>
    <br>
    <div class="oculto" id="publicar">
    <form method="post" id="publicar">
        <input type="text" name="nombre" id="nombre">
        <button type="submit" name="send" id="send">Enviar</button>
    </form>
    </div>

    <script src="funciones/win_sound.js"></script>
    <script src="funciones/funcionalidades.js"></script>
    <?php
        $tiempo = $_COOKIE["crono"];
        $tiempo_separado = str_split($tiempo);
        echo $tiempo_separado;
        if (isset($_POST["nombre"])) {
            $file = fopen("records.txt", "a+");
            fwrite($file,$_POST["nombre"].", ".$_COOKIE["aciertos"].", ".session_create_id().", ".$tiempo."\n");
            fclose($file);           
        }
        session_destroy();
    ?>
</body>
</html>