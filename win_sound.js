var audio = new Audio("audio/felicidades.mp3");

win.addEventListener("click", ()=>{
    audio.currentTime = 0;
    audio.play();
})

pausar.addEventListener("click", ()=>{
    audio.pause();
})
