<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form action="index.php" method="post">
        <button type="submit" id="index" class="boton-grande">Inicio</button>
    </form>
    <h1>Hall of fame</h1>
    <?php
    $file = fopen("records.txt", "r");
    $ranking = [];
    while (!feof($file)) {
        $line = fgets($file);
        $users = explode(",", $line);
        $ranking[$users[0]." ".$users[1]] = $users[1];
    }
    arsort($ranking);
    foreach ($ranking as $order => $valor) {
        echo "<p>" . substr($order,0,strlen($order)-3) . "" . $valor . "</p>";
    }
    fclose($file);

    ?>
    
</body>
</html>