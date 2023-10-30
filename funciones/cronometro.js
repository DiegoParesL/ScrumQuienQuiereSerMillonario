let centesimas=0;
let cookies = document.cookie;
storage = window.localStorage;
let minutos=document.getElementById("Minutos").innerText;
let segundos=document.getElementById("Segundos").innerText;

window.onload=function(){
    if (localStorage.getItem("segundos")!=null && localStorage.getItem("minutos")!=null){
        // Si al iniciar el navegador, la variable inicio que se guarda
        // en la base de datos del navegador tiene valor, cargamos el valor
        // y iniciamos el proceso.
        sobreescribir();
    }
}

function sobreescribir() {
	let list_cookies = cookies.split(";");
	let segundos_cookie = list_cookies[1];
	let minutos_cookie = list_cookies[2];
	minutos_cookie = minutos_cookie.split("=");
	segundos_cookie = segundos_cookie.split("=");
	localStorage.setItem("minutos",minutos_cookie[1])
	localStorage.setItem("segundos",segundos_cookie[1])
}
sobreescribir();
function inicio() {
    control = setInterval(cronometro, 10);
}
inicio();
function cronometro () {
	var minutos = parseInt(localStorage.getItem("minutos"));
	var segundos = parseInt(localStorage.getItem("segundos"));
	console.log(minutos)
	if (centesimas < 99) {
		centesimas++;
		if (centesimas < 10) { centesimas = "0"+centesimas }
	}
	if (centesimas == 99) {
		centesimas = -1;
	}
	if (centesimas == 0) {
		segundos ++;
		if (segundos < 10) { segundos = "0"+segundos }
		Segundos.innerHTML = ":"+segundos;
	}
	if (segundos == 59) {
		segundos = -1;
	}
	if ( (centesimas == 0)&&(segundos == 0) ) {
		minutos++;
		if (minutos < 10) { minutos = "0"+minutos }
		Minutos.innerHTML = ""+minutos;
	}
	if (minutos == 59) {
		minutos	 = -1;
	}
	sum_minutos = parseInt(localStorage.getItem("minutos"));
	sum_segundos = parseInt(localStorage.getItem("segundos"));
	
	setTotalTime(minutos,segundos);
}

function setTotalTime(minutos_Set,segundos_Set) {
	
	localStorage.setItem("minutos",minutos_Set);
	localStorage.setItem("segundos",segundos_Set);
}