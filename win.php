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
        <h2>Has acertado todo</h2>
        <p><button id="win" onclick="recompensa()">Pulsa aqui para mostrar tu recompensa</button></p>
    </div>
    <div class="oculto" id="pantalla">
    <h2>Felicidades</h2>
    <img src="images/congratulations.gif" alt="" >
    
    <form action="index.php" method="post">
    
    </form>
    <p>
    <button onclick="window.location.href = 'index.php'">Tornar a l'inici</button>
    <button id="publish_button" name="publish_button" type="submit" onclick="publish()">Publish?</button>
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