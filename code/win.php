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
    <audio id="congrats" src="audio/felicidades.mp3"></audio>

    
    <img src="images/congratulations.gif" alt="" >
    </div>
    <form action="index.php" method="post">
        <button class="boton-grande">Tornar a l'inici</button>
    </form>
    
    <button id="win">play</button>
    <button id="pausar">stop</button>

    <button id="publicar" name="publicar" type="submit">Publish</button>

    <form action="" method="post">
        <input type="text" name="nombre" id="nombre">
        <button type="submit" name="send" id="send" class="boton-grande">Enviar</button>
    </form>
    
    <script src="funciones/win_sound.js"></script>
    <script src="funciones/funcionalidades.js"></script>
    <?php
        if (isset($_POST["nombre"])) {
            $file = fopen("records.txt", "a+");
            fwrite($file,"\n".$_POST["nombre"].", 12");
        }
    ?>
</body>
</html>