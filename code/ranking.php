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
    <header>
        <p>
            <a href="#" onclick="changeLanguage('spanish');"><img src="images/spain.png" alt="Español" height="50px"></a>&nbsp;
            <a href="#" onclick="changeLanguage('catalan');"><img src="images/catalan.png" alt="Catalán" height="50px"></a>&nbsp;
            <a href="#" onclick="changeLanguage('english');"><img src="images/english.jpg" alt="Inglés" height="50px"></a>
        </p>
    </header>
<h1 class="ranking1">Hall of Fame</h1>
<div class="table-container">
    <table>
        <thead>
            <tr>
                <th style='font-size: 40px; padding-right: 20px;'>Name</th>
                <br>
                <th style='font-size: 40px; padding-left: 20px;'>Answers</th>
                <br>
                <th style='font-size: 40px; padding-left: 20px;'>Time</th>
                <br>
                <th style='font-size: 40px; padding-left: 20px;'>Total Score</th>
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
                        $ranking[$users[0]." ".$num_user][] = $users[1];
                        $ranking[$users[0]." ".$num_user][] = $users[2];
                        $ranking[$users[0]." ".$num_user][] = $users[3];
                        $num_user++;
                    }
                }
            }
            arsort($ranking);
            foreach ($ranking as $order => $valor) {
                $name = substr($order, 0, strlen($order)-3);
                $last_user = ((int)trim(substr($order, strlen($order)-3)));
                echo "<tr>";
                if ($last_user==$num_user-1) {
                    echo "<td style='font-size: 30px;' bgcolor='green';>$name</td>";
                    echo "<td style='font-size: 30px;' bgcolor='green';>".$valor[0]."</td>";
                    echo "<td style='font-size: 30px;' bgcolor='green';>".$valor[1]."</td>";
                    echo "<td style='font-size: 30px;' bgcolor='green';>".$valor[2]."</td>";
                }else {
                    echo "<td style='font-size: 30px;'>$name</td>";
                    echo "<td style='font-size: 30px;'>".$valor[0]."</td>";
                    echo "<td style='font-size: 30px;'>".$valor[1]."</td>";
                    echo "<td style='font-size: 30px;'>".$valor[2]."</td>";
                }

                echo "</tr>";
            }
            fclose($file);
            ?>
        </tbody>
    </table>
</div>
<br><br><br>
<script src="funciones/translation.js"></script>
<div class="button-container">
    <form action="index.php" method="post">
        <button class="boton-mediano" type="submit" id="index">Home</button>
    </form>
</div>
</body>
</html>
