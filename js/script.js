const boton = document.getElementById('cambiarMensaje');
const mensaje = document.getElementById('mensaje4');
const form = document.getElementById('form');
const messageField = form.elements['message'];

form.addEventListener('submit', (e) => {
  e.preventDefault();
  const guardar = messageField.value;
  mensaje.textContent = "¡Hola, " + guardar + "!";
});
