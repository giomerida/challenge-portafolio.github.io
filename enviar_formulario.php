<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nombre = $_POST['nombre'];
  $correo = $_POST['email'];
  $asunto = $_POST['asunto'];
  $mensaje = $_POST['mensaje'];

  $destinatario = 'giomerida@cuttux.com';
  $asuntoCorreo = 'Nuevo mensaje del portafolio V.1';

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

if (empty($nombre)) {
  echo 'El campo "Nombre" es obligatorio.';
  exit;
}

if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
  echo 'El campo "E-mail" no es un correo electrónico válido.';
  exit;
}

if (empty($asunto)) {
  echo 'El campo "Asunto" es obligatorio.';
  exit;
}

if (empty($mensaje)) {
  echo 'El campo "Mensaje" es obligatorio.';
  exit;
}

// Informe de errores
if (!mail($destinatario, $asuntoCorreo, $contenido, $cabeceras)) {
  echo 'Error al enviar el mensaje: ' . error_get_last()['message'];
}
?>