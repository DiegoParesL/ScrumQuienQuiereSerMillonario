function animacion(child, padre, i, res, cond) {
    //create array for store the class of each element
    let arrayClass;
    let respuesta;
    let calculoCorrecto;
    let calculoIncorrecto;
    //mostrar el div oculto
    padre.style.display = "flex";
    if(cond){
        console.log("soy",cond)
        calculoCorrecto =   (30+(Math.floor(Math.random()*9)))+"vh";
        calculoIncorrecto= (10+(Math.floor(Math.random()*20))+"vh");
    }   else{
        console.log("soy",cond)
        calculoCorrecto =   (5+(Math.floor(Math.random()*5))+"vh");
        calculoIncorrecto= ((10+(Math.floor(Math.random()*30)))+"vh");
    }
    
    let color = child.getAttribute("class");
    //console.log(color); //necesario en el timeout si se quiere mostrar bien
    arrayClass= color;
    child.setAttribute("class", color + " start"+i);
    let modificarCSS = document.documentElement;
    if(res.getAttribute("id") !=null){
        console.log(res.getAttribute("id"))
        respuesta = res.getAttribute("id");
    }else if(res.getAttribute("class") ==="fail0"){
        console.log(res.getAttribute("class"))
        respuesta = "nada"
    }
    
    if (respuesta.localeCompare("res0")===0) {
        console.log(respuesta.localeCompare("res0")===0, "num:",calculoCorrecto,"res:", "index:",i)
        setTimeout(() => {
            modificarCSS.style.setProperty("--height"+i, calculoCorrecto);
        }, "100");
    } else{
        console.log("num:",calculoIncorrecto,"res:",respuesta.localeCompare("res")===0, "index:",i)
        setTimeout(() => {
            modificarCSS.style.setProperty("--height"+i,calculoIncorrecto);    
        }, "100");
    }
    setTimeout(() => {
        //console.log(arrayClass[i]);//comprovar que existe, necesario que esté dentro del timeout o no se pausará hasta que llegue aqui
        padre.style.display ="none";
        child.setAttribute("class", arrayClass);
        modificarCSS.style.setProperty("--height"+i,0)
    }, "8000");


    
    
    
}

function preguntaAlPublico() {
    let padreAnimacion = document.getElementById("oculto");
    //get child elements from div id = oculto
    let bars =document.getElementById("oculto").children;
    let res = document.getElementsByClassName("grid")[0].children;
    let cond = Math.floor(Math.random()*100)<=80;
    let cont = 0;
    for (let i = 0; i < res.length; i++) {
        
        if(res[i].tagName === "BUTTON"){
            if(res[i].disabled != true){
                cont++;
                console.log(res[i]);
                animacion(bars[cont-1],padreAnimacion, cont, res[i],cond);
            }
        }
    }
}