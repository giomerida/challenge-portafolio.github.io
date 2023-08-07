<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nombre = $_POST['nombre'];
  $correo = $_POST['email'];
  $asunto = $_POST['asunto'];
  $mensaje = $_POST['mensaje'];

  $destinatario = 'giomerida@cuttux.com';
  $asuntoCorreo = 'Nuevo mensaje del formulario de contacto';

  $contenido = "Nombre: $nombre\n";
  $contenido .= "E-mail: $email\n";
  $contenido .= "Asunto: $asunto\n";
  $contenido .= "Mensaje: $mensaje\n";

  $cabeceras = "From: $nombre <$correo>";

  if (mail($destinatario, $asuntoCorreo, $contenido, $cabeceras)) {
    echo 'Mensaje enviado con éxito.';
  } else {
    echo 'Error al enviar el mensaje. Por favor, intenta nuevamente.';
  }
}
?>