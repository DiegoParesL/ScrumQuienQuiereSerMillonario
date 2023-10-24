var audioCorrect = new Audio("audio/correct.mp3");
var audioError = new Audio("audio/incorrect.mp3");

function playIncorrect() {
    audioError.currentTime = 0;
    if (audioCorrect.paused !== true) {
        audioCorrect.pause();
        audioError.play();
    }
    else {
        audioError.play();
    }
}
function playCorrect() {
    audioCorrect.currentTime = 0;
    if (audioError.paused !== true) {
        audioError.pause();
        audioCorrect.play();
    }
    else {
        audioCorrect.play();
    }
}
