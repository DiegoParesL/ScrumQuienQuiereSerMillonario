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
    <h5 class="tittleCreate">Pregunta</h5>
    <input type="text" name="question" id="question">
    <br>
    <h5>Escribe las respuestas</h5>

    <label for="">Respuesta 1</label><input type="text" name="respuesta1" id="respuesta1"> 
    <label for="">Respuesta 2</label><input type="text" name="respuesta2" id="respuesta2">
    <br>
    <label for="">Respuesta 3</label><input type="text" name="respuesta3" id="respuesta3"> 
    <label for="">Respuesta 4</label><input type="text" name="respuesta4" id="respuesta4">
    <br>
    <br>
    <h5>Indica la respuesta correcta</h5>
    <div><input type="radio" name="correcta" id="respuesta_1" value="respuesta1" checked><label for="respuesta_1">Respuesta 1</label>
    <input type="radio" name="correcta" id="respuesta_2"  value="respuesta2" ><label for="respuesta_2">Respuesta 2</label></div>
    <div><input type="radio" name="correcta" id="respuesta_3" value="respuesta3" ><label for="respuesta_3">Respuesta 3</label>
    <input type="radio" name="correcta" id="respuesta_4" value="respuesta4" ><label for="respuesta_4">Respuesta 4</label></div>
    <br>
    <br>
    <input type="file" name="img" id="img" accept="image/png, image/gif, image/jpeg">
    <input type="submit" value="Send">

</form>
    <?php
    error_reporting(0);
    $file = fopen("questions/".$_POST["idioma"]."_".$_POST["nivel"].".txt","a+");
    $correcta = $_POST["correcta"];
    $respuestas = "";
    for ($i=1;$i<5;$i++) {
        if ($_POST["respuesta".$i] != $_POST[$correcta]) {
            $respuestas .= "\n- ".$_POST["respuesta".$i];
        } else {
            $respuestas .= "\n+ ".$_POST[$correcta];
        }
    }
    if ($_POST["question"]!="" && $_POST["respuesta1"]!="" && $_POST["respuesta2"]!=""
        && $_POST["respuesta3"]!="" && $_POST["respuesta4"]!="") {
            if (!$_POST["img"]) {
                fwrite($file,"\n* ".$_POST["question"].$respuestas);
                echo "<h2>Pregunta enviada</h2>";
            } else {
                fwrite($file,"\n* ".$_POST["question"].$respuestas."\n# imagesGame/".$_POST["img"]);
                echo "<h2>Pregunta enviada</h2>";
                $FileName=$_FILES['img']['name'];
                $upload_dir = 'imagesGame';
                $TmpName=$_FILES['img']['tmp_name'];
                move_uploaded_file($TmpName,"./imagesGame/");
            }
    }
    ?>
</body>
</html>