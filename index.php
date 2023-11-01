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
    <h1 id="titulo">Benvingut al joc Qui vol ser milionari?</h1>
    <img src="images/milionari.png" alt="milionariIMG" width="300px" height="300px">
    <p id="descripcion">Aquest joc està basat en el programa de televisió. En ell, hi ha diferents nivells de dificultat en les preguntes. Començarem en el nivell 1 i a mesura que anem encertant preguntes, pujarem de nivell fins al nivell 6. Cada nivell de dificultat consta de 3 preguntes en total y un cop n\'haguem encertat les 3, passarem al següent nivell, fins que n\'haguem encertat les 18 preguntes en total o fallat.</p>
    <br>
    <form action="game.php" method="get" >
        <input type="hidden" name="lang" id="selectedLanguage" value="catalan"> <!-- Cambia "es" a "ca" o "en" según el idioma seleccionado -->
        <button type="submit" id="boton-jugar" class="boton-grande" onclick="empezarDetener(this);">Jugar</button>
    </form>
    <br>
    <form id="partida" action="ranking.php" method="post">
        <button type="submit" id="ranking" class="boton-mediano">Saló de la Fama</button>
    </form>
    <script src="funciones/cronometro.js"></script>
    <script src="funciones/resetCookies.js"></script>
    <script src="funciones/funcionalidades.js"></script>
    <script src="funciones/translation.js"></script>
  
</body>
</html>
