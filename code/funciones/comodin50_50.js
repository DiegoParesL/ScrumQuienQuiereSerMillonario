function detectarIncorrectas() {
    let galletas = document.cookie;
    let splitGalletas = galletas.split(";");
    let arrayIncorrectas=[];
    for (let i = 0; i < splitGalletas.length; i++) {
        let galleta = splitGalletas[i].split("=");
        if (galleta[0]=="aciertos"){
            let numeroAciertos = galleta[1];
            let elementos = document.getElementsByClassName("grid")[numeroAciertos%3].children;
            for (let j = 0; j < elementos.length; j++) {
                if(elementos[j].tagName === "BUTTON"){
                    if(elementos[j].getAttribute("id")!="res"+(numeroAciertos%3)){
                        arrayIncorrectas.push(elementos[j]);
                    }
                    
                }
            }
        }
        
    }
    return arrayIncorrectas;
    //document.getElementsByClassName("fail")
}
function bloquearEntreNiveles50_50(){
let galletas = document.cookie;
let galleta = galletas.split(";");
let valorGalleta
for (let i = 0; i < galleta.length; i++) {
    let nombreGalleta = galleta[i].split("=")
    if(nombreGalleta[0].trim()=="cincuenta"){
        valorGalleta = nombreGalleta[1];
    }
    
}
if(parseInt(valorGalleta)==1){
    document.getElementById("C50").style.display = "none";
    document.getElementById("xC50").style.display = "flex"; 
}

}
bloquearEntreNiveles50_50();

function comodin50_50() {
    
    let arrayIncorrecto = detectarIncorrectas();
    let arrayABloquear = [];
    cont = 0;
    let galletas = document.cookie;
    let galleta = galletas.split(";");
    let valorGalleta
    for (let i = 0; i < galleta.length; i++) {
        let nombreGalleta = galleta[i].split("=")
        //console.log(nombreGalleta[0],nombreGalleta[1]);
        if(nombreGalleta[0].trim()=="cincuenta"){
            
            valorGalleta = nombreGalleta[1];
        }
        
    }
    if(valorGalleta!=1){
        
        if(arrayABloquear.length<1){
            while (arrayABloquear.length <2) {
                let cond = Math.floor(Math.random()*100);
                if(cond <=33){
                    if(typeof arrayABloquear.find((element)=>element ==0)=="undefined"){
                        arrayABloquear.push(0);
                        
                    }
                } else if(cond>33 && cond <=66 ){
                    if(typeof arrayABloquear.find((element)=>element ==1)=="undefined"){
                        arrayABloquear.push(1);
                    }
                } else if (cond>66 && cond<=100){
                    if(typeof arrayABloquear.find((element)=>element ==2)=="undefined"){
                        arrayABloquear.push(2);
                    }
                }
            }
        }
        let galletas = document.cookie;
        let splitGalletas = galletas.split(";");
        for (let i = 0; i < splitGalletas.length; i++) {
            let galleta = splitGalletas[i].split("=");
            if (galleta[0].trim()=="aciertos"){
                let numeroAciertos = galleta[1];
                for (let i = 0; i < arrayABloquear.length; i++) {
                    document.getElementsByClassName("fail"+(numeroAciertos%3))[arrayABloquear[i]].disabled = true;
                    //console.log(arrayABloquear[i]);
                }
            } 
        }
        document.cookie="cincuenta=1"
        document.getElementById("C50").style.display = "none";
        document.getElementById("xC50").style.display = "flex"; 
       window.localStorage.setItem("used5050",1); 
       //console.log("localStorage del 50 50",window.localStorage.getItem("used5050",1) );
    }
}