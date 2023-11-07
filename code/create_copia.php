<?php
session_start();

if (
    !isset($_SERVER['HTTP_REFERER']) ||
    (
        strpos($_SERVER['HTTP_REFERER'], "login.php") === false &&
        strpos($_SERVER['HTTP_REFERER'], "create.php") === false
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
    <title>Create</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="index.php" method="">
        <input type="submit" value="Logout">
    </form>
    <br>
    <form action="" method="post" id="create">
        <label for="nivel">Elije el nivel</label>
        <select name="nivel" id="nivel">
            <option value="1">Nivel 1</option>
            <option value="2">Nivel 2</option>
            <option value="3">Nivel 3</option>
            <option value="4">Nivel 4</option>
            <option value="5">Nivel 5</option>
            <option value="6">Nivel 6</option>
        </select>
        <label for="idioma">Elije el idioma</label>
        <select name="idioma" id="idioma">
            <option value="catalan">Catalan</option>
            <option value="spanish">Español</option>
            <option value="english">Ingles</option>
        </select>
    <br>
    <p>Pregunta</p>
    <input type="text" name="question" id="question">
    <br>
    <p>Respuestas</p>
    <p>Para indicar la respuesta correcta escribe + delante de la respuesta y las incorrectas con -</p>

    <label for="">Respuesta 1</label><input type="text" name="respuesta1" id="respuesta1"> 
    <label for="">Respuesta 2</label><input type="text" name="respuesta2" id="respuesta2">
    <br>
    <label for="">Respuesta 3</label><input type="text" name="respuesta3" id="respuesta3"> 
    <label for="">Respuesta 4</label><input type="text" name="respuesta4" id="respuesta4">
    <br>
    <br>
    <input type="submit" value="Send">

</form>
    <?php
    $file = fopen("questions/".$_POST["idioma"]."_".$_POST["nivel"].".txt","a+");
    $respuesta_correcta = 0;
    if ($_POST["question"]!="" && $_POST["respuesta1"]!="" && $_POST["respuesta2"]!=""
        && $_POST["respuesta3"]!="" && $_POST["respuesta4"]!="") {
            for ($i= 0; $i<4;$i++) {
                if (substr($_POST["respuesta".$i+1],0,1) == "+") {
                    $respuesta_correcta++;
                }
            }
            if ($respuesta_correcta != 1) {
                ?>
                <script>
                    window.alert("Respuestas no validas")
                </script>
                <?php
            } elseif ($respuesta_correcta==1) {
            fwrite($file,"\n* ".$_POST["question"]."\n".$_POST["respuesta1"]."\n".
            $_POST["respuesta2"]."\n".$_POST["respuesta3"]."\n".$_POST["respuesta4"]); 
            }
        }
    ?>
</body>
</html>