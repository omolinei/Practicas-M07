<?php

include_once "base_de_datos.php";

function usuarioExiste($correo)
{
    $base_de_datos = obtenerBaseDeDatos();
    $sentencia = $base_de_datos->prepare("SELECT correo FROM usuarios WHERE correo = ? LIMIT 1;");
    $sentencia->execute([$correo]);
    return $sentencia->rowCount() > 0;
}

function obtenerUsuarioPorCorreo($correo)
{
    $base_de_datos = obtenerBaseDeDatos();
    $sentencia = $base_de_datos->prepare("SELECT correo, palabra_secreta FROM usuarios WHERE correo = ? LIMIT 1;");
    $sentencia->execute([$correo]);
    return $sentencia->fetchObject();
}

function registrarUsuario($correo, $palabraSecreta)
{
    $palabraSecreta = hashearPalabraSecreta($palabraSecreta);
    $base_de_datos = obtenerBaseDeDatos();
    $sentencia = $base_de_datos->prepare("INSERT INTO usuarios(correo, palabra_secreta) values(?, ?)");
    return $sentencia->execute([$correo, $palabraSecreta]);
}

function login($correo, $palabraSecreta)
{
    $posibleUsuarioRegistrado = obtenerUsuarioPorCorreo($correo);
    if ($posibleUsuarioRegistrado === false) {
        return false;
    }
    $palabraSecretaDeBaseDeDatos = $posibleUsuarioRegistrado->palabra_secreta;
    $coinciden = coincidenPalabrasSecretas($palabraSecreta, $palabraSecretaDeBaseDeDatos);
    if (!$coinciden) {
        return false;
    }

    iniciarSesion($posibleUsuarioRegistrado);
    return true;
}

function iniciarSesion($usuario)
{
    session_start();
    $_SESSION["correo"] = $usuario->correo;
}


function coincidenPalabrasSecretas($palabraSecreta, $palabraSecretaDeBaseDeDatos)
{
    return password_verify($palabraSecreta, $palabraSecretaDeBaseDeDatos);
}

function hashearPalabraSecreta($palabraSecreta)
{
    return password_hash($palabraSecreta, PASSWORD_BCRYPT);
}