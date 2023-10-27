<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Lose</title>
</head>
<body>
<?php session_start(); ?>
    <div id="mensaje">
        <h3 >You lose </h3>
        <h2>Stats: <?php echo $_COOKIE["aciertos"] ." acierto";?></h2>
        <form action="index.php" method="post">
            <button class="boton-mediano">Back to start</button>
        </form>
        <button id="publish_button" name="publish_button" type="submit"  class="boton-mediano"onclick="publish()">Publish</button></p>
    </div>
        <div class="oculto" id="publicar">
            <form action="index.php" method="post" id="publicar">
                <input type="text" name="nombre" id="nombre" placeholder="Introduce Your Name" required>
                <?php
                    $aciertos = $_COOKIE["aciertos"];
                    if (isset($_POST["nombre"])) {
                        $file = fopen("records.txt", "a+");
                        fwrite( $file,$_POST["nombre"].", ". strval($aciertos).", ".session_create_id()."\n");
                        fclose($file);            
                    }
                    session_destroy();
                ?>
                
                <button onclick="toIndex()" name="send" id="send">Send</button>
            </form>
        </div>
    
    <div class="oculto" id="pantalla">
    <img src="images/lose.png" alt="" srcset="" width="540px" height="540px">
    <p><button class="boton-mediano" onclick="window.location.href = 'index.php'">Back To Start</button>
     
    </div>

    <script src="funciones/lose_sound.js"></script>
    <script src="funciones/funcionalidades.js"></script>
    
</body>
</html>

