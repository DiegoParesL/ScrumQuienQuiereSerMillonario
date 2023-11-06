<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="" method="post" id="login">
        <p>Usuario<input type="text" name="user" id="user"></p>
        <p>Contraseña<input type="password" name="pwd" id="pwd"></p>
        <input type="submit" value="Login">
    </form>

    <?php
        $user = ["admin" => "P@ssw0rd"];
        if (isset($_POST["user"]) && $_POST["pwd"]) {
            if (array_key_exists($_POST["user"], $user)) {
                if ($_POST["pwd"] == $user[$_POST["user"]]) {
                    ?>
                        <script>
                            window.location.href = "create.php";
                        </script>
                    <?php
                }
                else {
                    echo "<p>Usuario o contraseña incorrectos</p>";
                }
            } else {
                echo "<p>Usuario o contraseña incorrectos</p>";
            }
        } 
    ?>
</body>
</html>