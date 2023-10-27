let centesimas = 0;
let segundos = document.getElementById("Segundos").innerHTML;
let minutos = document.getElementById("Minutos").innerHTML;
let segundos_pregunta = 30;


function inicio() {
    control = setInterval(cronometro, 10);
}

function cronometro () {
    segundos_totales = segundos
    minutos_totales = minutos
    document.cookie = "segundos="+segundos_totales+"; SameSite=None";
    document.cookie = "minutos="+minutos_totales+"; SameSite=None";
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
		Segundos.innerHTML = ""+segundos;
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
		minutos = -1;
	}
}

function cuenta_atras() {
    document.getElementById("cronometro-preguntas").innerHTML = segundos_pregunta;
    if(totalTime==0){
        failClick();
      }else{
        totalTime-=1;
        setTimeout(cuenta_atras,1000);
      }
}
cuenta_atras();
