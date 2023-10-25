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
    <header>
        <p>
            <a href="#" onclick="changeLanguage('spanish');"><img src="images/spain.png" alt="Español" height="50px"></a>&nbsp;
            <a href="#" onclick="changeLanguage('catalan');"><img src="images/catalan.png" alt="Catalán" height="50px"></a>&nbsp;
            <a href="#" onclick="changeLanguage('english');"><img src="images/english.jpg" alt="Inglés" height="50px"></a>
        </p>
    </header>
    <h1 id="titulo">Benvigut a Qui vol ser milionari?</h1>
    <img src="images/milionari.png" alt="milionariIMG" width="300px" height="300px">
    <p id="descripcion">Aquest joc aquesta basat en el programa del mateix nom.<br>En el qual hi ha diferents nivells de dificultat respecte les preguntes.<br>Començarem en el nivell 1 i conforme anem encertat preguntes ira pujant el nivell, fins al nivell 6.<br>Cada nivell de dificultat té en total 3 preguntes y una vez encertades las 3 passarem a la següent dificultat, fins que encertem les 18 preguntes totals o fallem.</p>
    <br>
    <form action="gamePrueba.php" method="get">
        <input type="hidden" name="lang" id="selectedLanguage" value="catalan"> <!-- Cambia "es" a "ca" o "en" según el idioma seleccionado -->
        <button type="submit" id="boton-jugar" class="boton-grande">Jugar</button>
    </form>
    <br>
    <form action="ranking.php" method="post">
        <button type="submit" id="ranking" class="boton-mediano">Hall of fame</button>
    </form>

    <script src="funciones/funcionalidades.js"></script>
   

    <script>
        // Función para cambiar el idioma de la página
        function changeLanguage(lang) {
            // Aquí puedes definir objetos de idioma con los textos correspondientes
            const languageData = {
                'spanish': {
                    'titulo': 'Bienvenido a ¿Quién quiere ser millonario?',
                    'descripcion': 'Este juego está basado en el programa del mismo nombre...',
                    // Agrega más textos aquí
                },
                'catalan': {
                    'titulo': 'Benvingut a Qui vol ser milionari?',
                    'descripcion': 'Aquest joc aquesta basat en el programa del mateix nom...',
                    // Agrega más textos aquí
                },
                'english': {
                    'titulo': 'Welcome to Who Wants to Be a Millionaire?',
                    'descripcion': 'This game is based on the program of the same name...',
                    // Agrega más textos aquí
                }
            };

            // Cambiar el contenido de la página según el idioma seleccionado
            document.getElementById('titulo').textContent = languageData[lang]['titulo'];
            document.getElementById('descripcion').textContent = languageData[lang]['descripcion'];

           // Actualiza el campo oculto con el idioma seleccionado
            document.getElementById('selectedLanguage').value = lang;

            // Establece el idioma seleccionado en la sesión
            sessionStorage.setItem('idioma', lang);

        }
    </script>
</body>
</html>
