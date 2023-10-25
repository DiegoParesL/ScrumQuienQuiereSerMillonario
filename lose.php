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
        <h2>You lose </h2>
        <p><button id="lose" onclick="recompensa()">Pulsa aqui para mostrar tu recompensa</button></p>
        <form action="index.php" method="post">
            <button>Tornar a l'inici</button>
        </form>
    </div>

    <div class="oculto" id="pantalla">
    <img src="images/lose.png" alt="" srcset="" width="540px" height="540px">

    <p><button id="publish_button" name="publish_button" type="submit" onclick="publish()">Publish?</button></p>
    </div>
    <div class="oculto" id="publicar">
    <form method="post" id="publicar">
            <input type="text" name="nombre" id="nombre">
            <button type="submit" name="send" id="send">Enviar</button>
    </form> 
    </div>

    <script src="funciones/lose_sound.js"></script>
    <script src="funciones/funcionalidades.js"></script>
    <?php
        session_start();
        if (isset($_POST["nombre"])) {
            $file = fopen("records.txt", "a+");
            fwrite($file,$_POST["nombre"].", 18, ".session_id()."\n");
            fclose($file);            
        }
        session_destroy();
    ?>
</body>
</html>