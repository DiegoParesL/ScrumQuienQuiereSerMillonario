var audio = new Audio("audio/felicidades.mp3");
audio.volume = 1;
win.addEventListener("click", ()=>{
    audio.currentTime = 0;
    audio.play();
})