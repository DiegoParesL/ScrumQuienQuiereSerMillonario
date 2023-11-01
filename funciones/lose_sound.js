var audio = new Audio("audio/lose.mp3");
lose.addEventListener("click", ()=>{
    audio.currentTime = 0;
    audio.play();
})
pausar.addEventListener("click", ()=>{
    audio.pause();
})