<?php

include_once "base_de_datos.php";

function usuarioExiste($username)
{
    $base_de_datos = obtenerBaseDeDatos();
    $sentencia = $base_de_datos->prepare("SELECT username FROM usuaris_examen WHERE username = ? LIMIT 1;");
    $sentencia->execute([$username]);
    return $sentencia->rowCount() > 0;
}

function obtenerUsuario($username)
{
    $base_de_datos = obtenerBaseDeDatos();
    $sentencia = $base_de_datos->prepare("SELECT username, password FROM usuaris_examen WHERE username = ? LIMIT 1;");
    $sentencia->execute([$username]);
    return $sentencia->fetchObject();
}

function login($username, $password)
{
    $posibleUsuarioRegistrado = obtenerUsuario($username);
    if ($posibleUsuarioRegistrado === false) {
        return false;
    }
    $passwordDeBaseDeDatos = $posibleUsuarioRegistrado->password;
    $coinciden = coincidenPalabrasSecretas($password, $passwordDeBaseDeDatos);
    if (!$coinciden) {
        return false;
    }

    iniciarSesion($posibleUsuarioRegistrado);
    return true;
}

function iniciarSesion($usuario)
{
    session_start();
    $_SESSION["username"] = $usuario->username;
}


function coincidenPalabrasSecretas($password, $passwordDeBaseDeDatos)
{
    return password_verify($password, $passwordDeBaseDeDatos);
}

function hashearPalabraSecreta($password)
{
    return password_hash($password, PASSWORD_BCRYPT);
}

function generate_string($strength = 16) {
    $input = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
 
    return $random_string;
}
