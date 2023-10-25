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
    <button class="boton-mediano" type="submit" id="index">Index</button>
</form>
<h1>Hall of Fame</h1>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Score</th>
        </tr>
    </thead>
    <tbody>
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
            $name = substr($order, 0, strlen($order) - 3);
            echo "<tr>";
            echo "<td>$name</td>";
            echo "<td>$valor</td>";
            echo "</tr>";
        }
        fclose($file);
        ?>
    </tbody>
</table>
</body>
</html>
