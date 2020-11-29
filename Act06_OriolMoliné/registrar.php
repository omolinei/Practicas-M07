<?php
$correo = $_POST["correo"];
$palabra_secreta = $_POST["palabra_secreta"];
$palabra_secreta_confirmar = $_POST["palabra_secreta_confirmar"];

if ($palabra_secreta !== $palabra_secreta_confirmar) {
    echo "Las contraseñas no coinciden, intente de nuevo";
    exit;
}

include_once "funciones.php";

$existe = usuarioExiste($correo);
if ($existe) {
    echo "Lo siento, ya existe alguien registrado con ese correo";
    exit;
}

$registradoCorrectamente = registrarUsuario($correo, $palabra_secreta);
if ($registradoCorrectamente) {
    echo "Registrado correctamente. Ahora puedes iniciar sesión";
} else {
    echo "Error al registrarte. Intenta más tarde";
}