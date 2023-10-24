// translations.js
const translations = {
    'es': {
        'titulo': 'Bienvenido a ¿Quién quiere ser millonario?',
        'descripcion': 'Este juego está basado en el programa del mismo nombre.<br>En él, hay diferentes niveles de dificultad en las preguntas.<br>Comenzaremos en el nivel 1 y a medida que respondamos preguntas, subiremos de nivel hasta el nivel 6.<br>Cada nivel de dificultad consta de 3 preguntas en total y una vez que respondamos correctamente las 3, pasaremos al siguiente nivel, hasta que respondamos las 18 preguntas en total o fallemos.',
        'boton-jugar': 'Jugar'
    },
    'ca': {
        'titulo': 'Benvingut a Qui vol ser milionari?',
        'descripcion': 'Aquest joc està basat en el programa del mateix nom.<br>En ell, hi ha diferents nivells de dificultat en les preguntes.<br>Començarem en el nivell 1 y a mesura que anem encertant preguntes, pujarem de nivell fins al nivell 6.<br>Cada nivell de dificultat consta de 3 preguntes en total y un cop n\'haguem encertat les 3, passarem al següent nivell, fins que n\'haguem encertat les 18 preguntes en total o fallat.',
        'boton-jugar': 'Jugar'
    },
    'en': {
        'titulo': 'Welcome to Who Wants to Be a Millionaire?',
        'descripcion': 'This game is based on the program of the same name.<br>It has different levels of difficulty in the questions.<br>We will start at level 1 and as we answer questions, we will move up to level 6.<br>Each level of difficulty consists of 3 questions in total, and once we answer all 3 correctly, we will move on to the next level, until we answer all 18 questions in total or make a mistake.',
        'boton-jugar': 'Play'
    }
};

function changeLanguage(lang) {
    const translation = translations[lang];
    if (translation) {
        for (let key in translation) {
            const element = document.getElementById(key);
            if (element) {
                element.innerHTML = translation[key];
            }
        }
    }
}