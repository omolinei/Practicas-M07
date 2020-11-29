<?php
$correo = $_POST["correo"];
$palabra_secreta = $_POST["palabra_secreta"];
include_once "funciones.php";
$logueadoConExito = login($correo, $palabra_secreta);
if ($logueadoConExito) {
    header("Location: privada.php");
    exit;
} else {
    echo "Usuario o contraseña incorrecta";
}