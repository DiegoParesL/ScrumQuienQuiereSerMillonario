var audioCorrect = new Audio("audio/correct.mp3");
res.addEventListener("click", ()=>{
    audioCorrect.currentTime = 0;
    audioCorrect.play();
}) 