<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Hall of Fame</h1>
<div class="table-container">
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
</div>
<div class="button-container">
    <form action="index.php" method="post">
        <button class="boton-mediano" type="submit" id="index">Home</button>
    </form>
</div>
</body>
</html>
