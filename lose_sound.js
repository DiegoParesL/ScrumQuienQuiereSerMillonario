var audioLose = new Audio("audio/lose.mp3");
lose.addEventListener("click", ()=>{
    audioLose.currentTime = 0;
    audioLose.play();
})
pausar.addEventListener("click", ()=>{
    audioLose.pause();
}) 