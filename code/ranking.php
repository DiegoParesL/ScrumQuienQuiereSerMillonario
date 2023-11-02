<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <noscript>
    <h1 id="jsDisabledMessage">Javascript is disabled, activate it to play</h1>
</noscript>
<h1>Hall of Fame</h1>
<div class="table-container">
    <table>
        <thead>
            <tr>
                <th style='font-size: 40px; padding-right: 20px;'>Name</th>
                <br>
                <th style='font-size: 40px; padding-left: 20px;'>Score</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $file = fopen("records.txt", "r");
            $ranking = [];
            $num_user = 0;
            while (!feof($file)) {
                $line = fgets($file);
                trim($line, " ");
                if (!ctype_space($line)) {
                    $users = explode(",", $line);
                    if(!empty($users[0])) {
                        $ranking[$users[0]." ".$num_user] = $users[1];
                        $num_user++;
                    }
                }
            }
            arsort($ranking);
            foreach ($ranking as $order => $valor) {
                $name = substr($order, 0, strlen($order)-3);
                
                echo "<tr>";
                
                echo "<td style='font-size: 30px;'>$name</td>";
                echo "<td style='font-size: 30px;'>$valor</td>";
                
                echo "</tr>";
            }
            fclose($file);
            ?>
        </tbody>
    </table>
</div>
<br><br><br>
<div class="button-container">
    <form action="index.php" method="post">
        <button class="boton-mediano" type="submit" id="index">Home</button>
    </form>
</div>
</body>
</html>
