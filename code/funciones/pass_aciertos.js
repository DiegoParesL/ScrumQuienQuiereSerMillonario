let numAciertos;
if(document.getElementById("valueAciertos").value == 0 || document.getElementById("valueAciertos").value =='' ) {
    numAciertos=0;
}else{
    numAciertos = document.getElementById("valueAciertos").value;
}


function setAciertos() {
    numAciertos++;
    document.cookie='aciertos='+numAciertos; 
    document.getElementById("valueAciertos").value = numAciertos;
}