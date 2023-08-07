//Haz tú validación en javascript acá
document.getElementById('form').addEventListener('submit', function(event) {
    event.preventDefault(); // Evita el envío del formulario por defecto
  
    // Obtén los valores de los campos del formulario
    var nombre = document.getElementById('nombre').value;
    var correo = document.getElementById('email').value;
    var asunto = document.getElementById('asunto').value;
    var mensaje = document.getElementById('mensaje').value;
  
    // Realiza la validación de los campos del formulario
    if (nombre === '' || email === '' || asunto === '' || mensaje === '') {
      alert('Por favor, completa todos los campos del formulario.');
      return;
    }
  
    // Construye el cuerpo del mensaje de correo electrónico
    var contenido = 'Nombre: ' + nombre + '\n';
    contenido += 'E-mail: ' + email + '\n';
    contenido += 'Asunto: ' + asunto + '\n';
    contenido += 'Mensaje: ' + mensaje;
  
    // Envía el correo electrónico utilizando una solicitud AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'enviar_formulario.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        alert('Mensaje enviado con éxito.');
        // Restablece los valores del formulario
        document.getElementById('formulario').reset();
      } else if (xhr.readyState === 4 && xhr.status !== 200) {
        alert('Error al enviar el mensaje. Por favor, intenta nuevamente.');
      }
    };
    xhr.send('nombre=' + encodeURIComponent(nombre) +
             '&email=' + encodeURIComponent(email) +
             '&asunto=' + encodeURIComponent(asunto) +
             '&mensaje=' + encodeURIComponent(mensaje));
  });