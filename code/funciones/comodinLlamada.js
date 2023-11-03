function showCall(){
    let telephone = document.getElementById("imgTel")
    telephone.style.display="block";
    setTimeout(() => {
        hideCall();
    }, "1000");
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
    document.getElementById("tel").style.display="none";
    document.getElementById("xtel").style.display="flex";
    document.getElementById("contenedorTelefono").style.display="flex";
    document.getElementById("CLlamada").disabled = true;
    document.cookie="llamada=1";
    let x = 1+Math.floor(Math.random()*9);
    console.log(x);
    for(i=0;i<(x*2);i++){
        if(i%2==0){
            setTimeout(() => {
                showCall();
            }, (i)+"000");
        }
        
        
    }
    setTimeout(() => {
        document.getElementById("contenedorTelefono").style.display="none";
    }, (x*2)+"100");
}


