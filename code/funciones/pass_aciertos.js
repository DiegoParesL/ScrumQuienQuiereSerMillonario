let numAciertos;
if(document.getElementById("value").value == 0 || document.getElementById("value").value =='' ) {
    numAciertos=0;
}else{
    numAciertos = document.getElementById("value").value;
}


function setAciertos() {
    numAciertos++;
    document.cookie='aciertos='+numAciertos; 
    document.getElementById("value").value = numAciertos;
}
