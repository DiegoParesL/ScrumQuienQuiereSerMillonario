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
        <h2>No lo has conseguido </h2>
        <p><button id="lose" onclick="recompensa()">Pulsa aqui para mostrar tu recompensa</button></p>
    </div>

    <div class="oculto" id="pantalla">
    <h2>Que pena</h2>
        <img src="images/lose.gif" alt="" srcset="">
    <form action="index.php" method="post">
        <button>Tornar a l'inici</button>
    </form>
    <p><button id="publish_button" name="publish_button" type="submit" onclick="publish()">Publish?</button></p>
    </div>
    <div class="oculto" id="publicar">
    <form action="index.php" method="post" id="publicar">
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