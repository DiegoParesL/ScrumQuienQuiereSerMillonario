<?php
session_start();

if (
    !isset($_SERVER['HTTP_REFERER']) || 
    (
        strpos($_SERVER['HTTP_REFERER'], "game.php") === false && 
        strpos($_SERVER['HTTP_REFERER'], "win.php") === false
    )
) {
    // Si la página no se accede desde "game.php" ni desde "win.php", redirige o muestra un mensaje de error.
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
    <audio id="my_audio" src="audio/felicidades.mp3"></audio>
    <h3>You got it</h3>
    <img src="images/winner.gif" alt="" height="290px" width="290px">
   

    <div  id="pantalla">
    <br> <br>
    <?php
    $_COOKIE["aciertos"]=18;
    echo "<p>Questions answered correctly: " . $_COOKIE["aciertos"] . "</p>";
    ?>

    <br><br>
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
    $palabras_prohibidas = file("nombres_prohibidos.txt");
    $file = fopen("records.txt", "a+");
    $palabra_valida = true;
    $tiempo = $_COOKIE["crono"];
    $tiempo_separado = explode(":", $tiempo);
    $segundos_totales = (($tiempo_separado[0] * 3600) + ($tiempo_separado[1] * 60) + ($tiempo_separado[2]));
    $puntuacion =floor((intval($_COOKIE["aciertos"]))*80/(intval($segundos_totales)+10)*1.4) - intval($_COOKIE["publico"])*5 - intval($_COOKIE["llamada"])*5 - intval($_COOKIE["cincuenta"])*5;
            if ($puntuacion < 0) {
                $puntuacion = 0;
            }
    if (isset($_POST["nombre"])) {
        for ($i = 0; $i < count($palabras_prohibidas); $i++) {
            if (str_contains($palabras_prohibidas[$i], $_POST["nombre"])) {
                $palabra_valida = false;
            }
        }
        if ($palabra_valida) {
            fwrite($file, $_POST["nombre"] . " , " . $_COOKIE["aciertos"] . ", " . $tiempo . ", " . $puntuacion . ", " . session_create_id() . "\n");
            fclose($file);
            ?>
                <script>
                    document.location.href = "ranking.php";
                </script>
            <?php
        } else {
            ?>
                <script>
                    window.alert("Nombre no apropiado")
                </script>
            <?php
        }
    }
    ?>
</body>
</html>