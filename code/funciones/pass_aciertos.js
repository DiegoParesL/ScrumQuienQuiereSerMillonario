
function setAciertos() {
    let numAciertos;
    if(document.getElementById("valueAciertos").value == 0 || document.getElementById("valueAciertos").value =='' ) {
        numAciertos=0;
        console.log(numAciertos,"numAciertos")
    }else{
        numAciertos = document.getElementById("valueAciertos").value;
        console.log(numAciertos,"numAciertos")
    }
    numAciertos++;
    document.cookie='aciertos='+numAciertos; 
    document.getElementById("valueAciertos").value = numAciertos;
}