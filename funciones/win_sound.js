var audio = new Audio("audio/felicidades.mp3");
audio.volume = 0.05;
win.addEventListener("click", ()=>{
    audio.currentTime = 0;
    audio.play();
})

pausar.addEventListener("click", ()=>{
    audio.pause();
})

