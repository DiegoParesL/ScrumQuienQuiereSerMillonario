var inicio=0;
var timeout=0;

function empezarDetener()
{
	if(timeout==0)
	{

		inicio=new Date().getTime();

		localStorage.setItem("inicio",inicio);
		funcionando();
	}else{
		clearTimeout(timeout);

		localStorage.removeItem("inicio");
		timeout=0;
	}
}

function funcionando()
{
	var actual = new Date().getTime();

	var diff=new Date(actual-inicio);

	var result=LeadingZero(diff.getUTCHours())+":"+LeadingZero(diff.getUTCMinutes())+":"+LeadingZero(diff.getUTCSeconds());
	document.getElementById('crono').innerHTML = result;

	timeout=setTimeout("funcionando()",1000);
	document.cookie = "crono="+result
}

function LeadingZero(Time)
{
	return (Time < 10) ? "0" + Time : + Time;
}

window.onload=function()
{
	if(localStorage.getItem("inicio")!=null)
	{
		// Si al iniciar el navegador, la variable inicio que se guarda
		// en la base de datos del navegador tiene valor, cargamos el valor
		// y iniciamos el proceso.
		inicio=localStorage.getItem("inicio");
		document.getElementById("boton").value="Detener";
		funcionando();
	}
}