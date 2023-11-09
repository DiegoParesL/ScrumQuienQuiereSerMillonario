// translations.js
function changeLanguage(lang) {
    // Aquí puedes definir objetos de idioma con los textos correspondientes
    const languageData = {
        'spanish': {
            'titulo': 'Bienvenido al juego ¿Quién quiere ser millonario?',
            'descripcion': 'Este juego está basado en el programa de televisión. En él, hay diferentes niveles de dificultad en las preguntas. Comenzaremos en el nivel 1 y a medida que respondamos preguntas, n\' subiremos de nivel hasta el nivel 6. Cada nivel de dificultad consta de 3 preguntas en total y una vez que respondamos correctamente las 3, pasaremos al siguiente nivel, hasta que respondamos las 18 preguntas en total o fallemos.',
            'boton-jugar': 'Jugar',
            'ranking' : 'Salón de la fama',
            'nom_ranking' : 'Nombre',
            'puntuacion_ranking' : 'Puntuación',
            'correctes_ranking' : 'Correctas',
            'temps_ranking' : 'Tiempo total'
           
        },
        'catalan': {
            'titulo': 'Benvingut al joc Qui vol ser milionari?',
            'descripcion': 'Aquest joc està basat en el programa de televisió. En ell, hi ha diferents nivells de dificultat en les preguntes. Començarem en el nivell 1 i a mesura que anem encertant preguntes, pujarem de nivell fins al nivell 6. Cada nivell de dificultat consta de 3 preguntes en total i un cop n\'haguem encertat les 3, passarem al següent nivell, fins que n\'haguem encertat les 18 preguntes en total o fallat.',
            'boton-jugar': 'Jugar',
            'ranking' : 'Saló de la fama',
            'nom_ranking' : 'Nom',
            'puntuacion_ranking' : 'Puntuació',
            'correctes_ranking' : 'Correctes',
            'temps_ranking' : 'Temps total'
        },
        'english': {
            'titulo': 'Welcome at Who Wants to Be a Millionaire?',
            'descripcion': 'This game is based on the TV show. It has different levels of difficulty in the questions. We will start at level 1 and as we answer questions, we will move up to level 6. Each level of difficulty consists of 3 questions in total, and once we answer all 3 correctly, n\' we will move on to the next level, until we answer all 18 questions in total or make a mistake.',
            'boton-jugar': 'Play',
            'ranking' : 'Hall of Fame',
            'nom_ranking' : 'Name',
            'puntuacion_ranking' : 'Points',
            'correctes_ranking' : 'Correct',
            'temps_ranking' : 'Total Time'
            
        }
    };

    // Cambiar el contenido de la página según el idioma seleccionado
    document.getElementById('titulo').textContent = languageData[lang]['titulo'];
    document.getElementById('descripcion').textContent = languageData[lang]['descripcion'];
    document.getElementById('boton-jugar').textContent = languageData[lang]['boton-jugar'];
    document.getElementById('ranking').textContent = languageData[lang]['ranking'];
    document.getElementById('nom_ranking').textContent = languageData[lang]['nom_ranking'];
    document.getElementById('puntuacion_ranking').textContent = languageData[lang]['puntuacion_ranking'];
    document.getElementById('correctes_ranking').textContent = languageData[lang]['correctes_ranking'];
    document.getElementById('temps_ranking').textContent = languageData[lang]['temps_ranking'];



   // Actualiza el campo oculto con el idioma seleccionado
    document.getElementById('selectedLanguage').value = lang;

    // Establece el idioma seleccionado en la sesión
    sessionStorage.setItem('idioma', lang);

}
