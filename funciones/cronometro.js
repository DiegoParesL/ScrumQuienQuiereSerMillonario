let centesimas = 0;
let segundos;
let minutos;

if (document.getElementById("Minutos").value == '00' || document.getElementById("Minutos").value =='') {
    minutos=0;
}else {
    minutos = document.getElementById("Minutos").value;
}

if (document.getElementById("Segundos").value == '00' || document.getElementById("Segundos").value =='') {
    segundos=0;
}else {
    segundos = document.getElementById("Segundos").value;
}

function setTiempo() {
    document.cookie = "segundos="+segundos;
    document.cookie = "minutos="+minutos;
    document.getElementById("Minutos").value = minutos;
    document.getElementById("Segundos").value = segundos;
}

function inicio() {
    setTiempo();
    control = setInterval(cronometro, 10);
}

function cronometro () {
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
		minutos = -1;
	}
}

