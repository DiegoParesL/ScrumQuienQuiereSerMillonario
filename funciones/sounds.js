var audioCorrect = new Audio("audio/correct.mp3");
var audioError = new Audio("audio/incorrect.mp3");
var audioLose = new Audio("audio/lose.mp3");
var audioWin = new Audio("audio/felicidades.mp3");

//Incorrect answer
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
//Correct Answer
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