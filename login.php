<?php

$email_correcte = "oriol@gmail.com";
$contra_correcte = "Moline23";

$email = $_POST["email"];
$contra = $_POST["contra"];

if ($email === $email_correcte && $contra === $contra_correcte) {

    session_start();

    $_SESSION["email"] = $email;

    header("Location: privada.php");
} else {
    echo "El correu o la contrasenya son incorrectes";
    
}
?>
