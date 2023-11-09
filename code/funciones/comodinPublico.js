function animacion(child, padre, i, res, cond,numPregunta) {
    //create array for store the class of each element
    let arrayClass;
    let respuesta;
    let calculoCorrecto;
    let calculoIncorrecto;
    //mostrar el div oculto
    padre.style.display = "flex";
    if(cond){
        //console.log("soy",cond)
        calculoCorrecto =   (30+(Math.floor(Math.random()*9)))+"vh";
        calculoIncorrecto= (10+(Math.floor(Math.random()*19))+"vh");
    }   else{
        //console.log("soy",cond)
        calculoCorrecto =   (5+(Math.floor(Math.random()*5))+"vh");
        calculoIncorrecto= ((10+(Math.floor(Math.random()*30)))+"vh");
    }
    
    let color = child.getAttribute("class");
    //console.log(color); //necesario en el timeout si se quiere mostrar bien
    arrayClass= color;
    child.setAttribute("class", color + " start"+i);
    let modificarCSS = document.documentElement;
    if(res.getAttribute("id") !=null){
        //console.log(res.getAttribute("id"))
        respuesta = res.getAttribute("id");
    }else if(res.getAttribute("class") ==="fail"+numPregunta){
        //console.log(res.getAttribute("class"))
        respuesta = "nada"
    }
    
    if (respuesta.localeCompare("res"+numPregunta)===0) {
        
        for (let k = 0; k < 4; k++) {
            setTimeout(() => {
                randomizarVotos(modificarCSS, i);
            }, k+"000");
        }
        setTimeout(() => {
            modificarCSS.style.setProperty("--seconds"+i,2+"s");
            setTimeout(() => {
                modificarCSS.style.setProperty("--height"+i,calculoCorrecto);   
            }, "100");
        }, "5000");
    } else{
        //console.log("num:",calculoIncorrecto,"res:",respuesta.localeCompare("res")===0, "index:",i)
            for(let k = 0; k < 4 ; k++){
                setTimeout(() => {
                    randomizarVotos(modificarCSS, i);
                }, k+"000");
            }
        setTimeout(() => {
            modificarCSS.style.setProperty("--seconds"+i,2+"s");
            setTimeout(() => {
                modificarCSS.style.setProperty("--height"+i,calculoIncorrecto);   
            }, "100");
        }, "5000");
    }
    setTimeout(() => {
        //console.log(arrayClass[i]);//comprovar que existe, necesario que esté dentro del timeout o no se pausará hasta que llegue aqui
        padre.style.display ="none";
        child.setAttribute("class", arrayClass);
        modificarCSS.style.setProperty("--height"+i,0)
        window.localStorage.setItem("usedPublic",1)

    }, "10000");  
}
function randomizarVotos(cssHeight, i) {
    let varRand = Math.floor(Math.random()*40)+"vh"
    setTimeout(() => {
        cssHeight.style.setProperty("--height"+i, varRand)
    }, "100");
    
}
function bloquearEntreNivelesPublico() {
    let galletas = document.cookie;
    let galleta = galletas.split(";");
    let valorGalleta
    for (let i = 0; i < galleta.length; i++) {
        let nombreGalleta = galleta[i].split("=")
        if(nombreGalleta[0].trim()=="publico"){
            valorGalleta = nombreGalleta[1];
            //console.log("galleta publico = 1")
        }
        
    }
    if(parseInt(valorGalleta)==1){
        document.getElementById("publ").style.display = "none";
        document.getElementById("xpubl").style.display = "flex"; 
    }
    
}
bloquearEntreNivelesPublico();

function preguntaAlPublico() {
    document.getElementById("publ").style.display ="none";
    document.getElementById("xpubl").style.display ="flex";

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
    
    if(window.localStorage.getItem("usedPublic") !=1){
        let numPregunta = valorGalleta;
        //console.log(numPregunta);
        let padreAnimacion = document.getElementById("oculto");
        //get child elements from div id = oculto
        let bars =document.getElementById("oculto").children;
        //console.log(valorGalleta)
        let res = document.getElementsByClassName("grid")[(numPregunta%3)].children;
        let cond = Math.floor(Math.random()*100)<=80;
        document.getElementById("comodinPublico").disabled=true;
        let cont = 0;
        document.cookie="publico=1";
        
        for (let i = 0; i < res.length; i++) {
            
            if(res[i].tagName === "BUTTON"){
                cont++;
                if(res[i].disabled != true){
                    if(cont ==1){
                        var audioPublico = new Audio("audio/comodinPublico10s.mp3");
                        audioPublico.play();
                    }
                    //console.log(res[i]);
                    animacion(bars[cont-1],padreAnimacion, cont, res[i],cond,(numPregunta%3));
                }
            }
        }
        
    }  
}