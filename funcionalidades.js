
let aciertos = 0;
function failClick(){
    window.location.href="lose.php"
}
function trueClick(){
    document.getElementById("res"+aciertos).style.color= "rgb(0,255,0)";
    document.getElementsByClassName("fail"+aciertos)[0].style.color="rgb(255,0,0)";
    document.getElementsByClassName("fail"+aciertos)[1].style.color="rgb(255,0,0)";
    document.getElementsByClassName("fail"+aciertos)[2].style.color="rgb(255,0,0)";
    aciertos++;
    mostrarSiguiente(aciertos);
    
    
}

function mostrarSiguiente(numeroPregunta) {
    if(numeroPregunta>2){

    }else{
        document.getElementById("pregunta"+(numeroPregunta+1)).style.display= "inline";
        
    }
}