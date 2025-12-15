const boton = document.getElementById('cambiarMensaje');
const mensaje = document.getElementById('mensaje');

const mensajes = [
  '¡Gracias por visitar mi página!',
  '¡Espero que tengas un gran día!',
  '¡Sigue explorando y aprendiendo!',
  '¡Bienvenido de nuevo, amigo!',
  '¡Disfruta de esta web creada por Rodrigo!'
];

boton.addEventListener('click', () => {
  const aleatorio = Math.floor(Math.random() * mensajes.length);
  mensaje.textContent = mensajes[aleatorio];
});
