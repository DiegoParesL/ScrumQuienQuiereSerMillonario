<?php
session_start();
// Restablecer el nivel del juego al nivel 1
    
unset($_SESSION['nivel']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Qui vol ser milionari?</title>
</head>

<body>
    <noscript>
        <h1>Javascript esta desactivado, activalo para jugar</h1>
    </noscript>
    <header>
        <p>
            <a href="#" onclick="changeLanguage('spanish');"><img src="images/spain.png" alt="Español" height="50px"></a>&nbsp;
            <a href="#" onclick="changeLanguage('catalan');"><img src="images/catalan.png" alt="Catalán" height="50px"></a>&nbsp;
            <a href="#" onclick="changeLanguage('english');"><img src="images/english.jpg" alt="Inglés" height="50px"></a>
        </p>
    </header>
    <h1 id="titulo">Benvigut a Qui vol ser milionari?</h1>
    <img src="images/milionari.png" alt="milionariIMG" width="300px" height="300px">
    <p id="descripcion">Aquest joc aquesta basat en el programa del mateix nom.<br>En el qual hi ha diferents nivells de dificultat respecte les preguntes.<br>Començarem en el nivell 1 i conforme anem encertat preguntes ira pujant el nivell, fins al nivell 6.<br>Cada nivell de dificultat té en total 3 preguntes i una vegada encertades las 3 passarem a la següent dificultat, fins que encertem les 18 preguntes totals o fallem.</p>
    <br>
    <form action="game.php" method="get" >
        <input type="hidden" name="lang" id="selectedLanguage" value="catalan"> <!-- Cambia "es" a "ca" o "en" según el idioma seleccionado -->
        <button type="submit" id="boton-jugar" class="boton-grande">Play</button>
    </form>
    <br>
    <form id="partida" action="ranking.php" method="post">
        <button type="submit" id="ranking" class="boton-mediano">Hall Of Fame</button>
    </form>

    <script src="funciones/resetCookies.js"></script>
    <script src="funciones/funcionalidades.js"></script>
    <script src="funciones/translation.js"></script>
  
</body>
</html>
