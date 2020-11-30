<?php
$username = $_POST["username"];
$password = $_POST["password"];
include_once "funciones.php";
$logueadoConExito = login($username, $password);
if ($logueadoConExito) {
    header("Location: home.php");
    exit;
} else {
    echo "Usuario o contraseña incorrecta";
}
?>
