<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Win</title>
</head>
<body>
    <div class="box">
    <h2>Felicidades</h2>
  
    <img src="images/congratulations.gif" alt="" >
    </div>
    <form action="index.php" method="post">
        <button>Tornar a l'inici</button>
    </form>
    
    <button id="win">play</button>
    <button id="pausar">stop</button>
    
    <br>
    <button id="publish_button" name="publish_button" type="submit" onclick="publish()">Publish</button>
    <div class="oculto" id="publicar">
    <form action="" method="post" id="publicar">
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
        }
    ?>
</body>
</html>