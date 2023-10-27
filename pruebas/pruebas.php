<!DOCTYPE html>
<html>
<head>
  <title>Cuenta Regresiva</title>
</head>
<body>
  <h1 id="contador">10</h1>
  <script>
    // Establece el tiempo inicial en segundos
    let tiempoRestante = 10;

    // Función para actualizar el contador
    function actualizarContador() {
      document.getElementById('contador').textContent = tiempoRestante;
      tiempoRestante--;

      // Detiene la cuenta regresiva cuando llega a cero
      if (tiempoRestante < 0) {
        clearInterval(intervalo);
        document.getElementById('contador').textContent = '¡Tiempo terminado!';
      }
    }

    // Llama a la función actualizarContador cada segundo
    const intervalo = setInterval(actualizarContador, 1000);
  </script>
</body>
</html>
