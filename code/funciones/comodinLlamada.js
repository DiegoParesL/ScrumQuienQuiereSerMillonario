function showCall(){
    let telephone = document.getElementById("imgTel")
    telephone.style.display="flex";
}
function hideCall(){
    let telephone = document.getElementById("imgTel")
    telephone.style.display="none";
}
function bloquearEntreNivelesLlamada() {
    let galletas = document.cookie;
    let galleta = galletas.split(";");
    let valorGalleta
    for (let i = 0; i < galleta.length; i++) {
        let nombreGalleta = galleta[i].split("=")
        if(nombreGalleta[0].trim()=="llamada"){
            valorGalleta = nombreGalleta[1];
        }
        
    }
    if(parseInt(valorGalleta)==1){
        document.getElementById("tel").style.display = "none";
        document.getElementById("xtel").style.display = "flex"; 
    }
    
}
bloquearEntreNivelesLlamada();

function llamada() {
    
    document.getElementById("CLlamada").disabled = true;

    let x = 1+Math.floor(Math.random()*9);
    //console.log(x);
    let galletas = document.cookie;
    let galleta = galletas.split(";");
    let valorGalleta
    for (let i = 0; i < galleta.length; i++) {
        let nombreGalleta = galleta[i].split("=")
        //console.log(nombreGalleta[0],nombreGalleta[1]);
        if(nombreGalleta[0].trim()=="aciertos"){
            
            valorGalleta = nombreGalleta[1];
        }
        
    }
    var audioLlamada = new Audio("audio/telefono_original3s.mp3");
    if(window.localStorage.getItem("llamada") !=1){
        document.getElementById("tel").style.display="none";
        document.getElementById("xtel").style.display="flex";
        document.getElementById("contenedorTelefono").style.display="flex";
        document.cookie="llamada=1";
        for(i=0;i<(x*2);i++){
            if(i%2==1){
                if(i==0){
                    showCall();
                    audioLlamada.play();
                }else{
                    setTimeout(() => {
                        showCall();
                        audioLlamada.play();
                    }, (i*2)+"000");
                }
            }else{
                setTimeout(() => {
                    audioLlamada.pause();
                    audioLlamada.currentTime=0;
                    hideCall();
                }, (i*2)+"000");
            }
            
            
        }
        setTimeout(() => {
            document.getElementById("contenedorTelefono").style.display="none";
            setTimeout(() => {
                alertShowResult(x);

            }, "1000");
        }, (x*6)+"100");
    }
}


function alertShowResult(numRand) {
    let result = prompt("Cuants cops ha sonat el telefon?")
    if(result.trim() ==numRand){
        let galletas = document.cookie;
        let splitGalletas = galletas.split(";");
        let arrayIncorrectas=[];
        for (let i = 0; i < splitGalletas.length; i++) {
            let galleta = splitGalletas[i].split("=");
            if (galleta[0].trim()=="aciertos"){
                let numeroAciertos = galleta[1];
                let elementos = document.getElementsByClassName("grid")[numeroAciertos%3].children;
                for (let j = 0; j < elementos.length; j++) {
                    if(elementos[j].tagName === "BUTTON"){
                        if(elementos[j].getAttribute("id")=="res"+(numeroAciertos%3)){
                            elementos[j].style.backgroundColor = "green";
                        }
                        
                    }
                }
            }
            
        }
    }
}