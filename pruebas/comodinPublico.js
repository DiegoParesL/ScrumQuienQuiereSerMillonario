function animacion(child, padre, i, res, cond) {
    //create array for store the class of each element
    let arrayClass;
    let respuesta = "";
    let calculoCorrecto;
    let calculoIncorrecto;
    //mostrar el div oculto
    padre.style.display = "flex";
    if(cond){
        calculoCorrecto =   3+(Math.floor(Math.random()*9)).toString()+"vh";
        calculoIncorrecto= (10+(Math.floor(Math.random()*20))+"vh");
    }   else{
        calculoCorrecto =   (5+(Math.floor(Math.random()*5))+"vh");
        calculoIncorrecto= ((10+(Math.floor(Math.random()*30)))+"vh");
    }
    
    setTimeout(() => {
        let color = child.getAttribute("class");
        //console.log(color); //necesario en el timeout si se quiere mostrar bien
        arrayClass= color;
        child.setAttribute("class", color + " start"+i);
        let modificarCSS = document.documentElement;
        if(res.getAttribute("id") !=null){
            respuesta = res.getAttribute("id");
        }else{
            respuesta = "nada"
        }
        
        if (respuesta.localeCompare("res")===0) {
            console.log("num:",calculoCorrecto,"res:",respuesta.localeCompare("res")===0, "index:",i)
            setTimeout(() => {
                modificarCSS.style.setProperty("--height"+i, calculoCorrecto);
            }, "100");
        } else{
            console.log("num:",calculoIncorrecto,"res:",respuesta.localeCompare("res")===0, "index:",i)
            setTimeout(() => {
                modificarCSS.style.setProperty("--height"+i,calculoIncorrecto);    
            }, "100");
        }
    }, "10");

    
    setTimeout(() => {
        //console.log(arrayClass[i]);//comprovar que existe, necesario que esté dentro del timeout o no se pausará hasta que llegue aqui
        padre.style.display ="none";
        child.setAttribute("class", arrayClass);
    }, "8000");
    
}

function empezarAnimacion() {
    let trigger = document.getElementById("trigger");
    let padreAnimacion = document.getElementById("oculto");
    //get child elements from div id = oculto
    let children =document.getElementById("oculto").children;
    let res = document.getElementById("respuestas").children;
    let cond = Math.floor(Math.random()*100)<=80
    console.log(cond)
    for (let i = 0; i < children.length; i++) {
        animacion(children[i],padreAnimacion, i+1, res[i],cond);
    }
}
