<!DOCTYPE html>
<html lang="cat">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <a href="formulari.html">Tancar Sessió</a>
</body>
</html>

<?php
$_SESSION["email"] = "oriol@gmail.com";
session_destroy();
?>

